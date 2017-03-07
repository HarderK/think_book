<?php
	class CartAction extends Action{
		public function cart(){
			$arr=$_SESSION['cart'];
			//dump($arr);
			$this->assign('list',$arr);
			$this->display();
		}
		//添加到购物车操作
		public function doCart(){
			$id=$_GET['id'];//添加的商品的id
			$book=D("book");
			$where['bno']=$id;
			$data=$book->where($where)->find();
			//dump($data);
			$arr=$_SESSION['cart'];
			//是数组说明已购买过
			if(is_array($arr)){
				//是否重复购买
				if(array_key_exists($id,$arr)){
					$arr[$id]['num']++;//同一商品数量
					$arr[$id]['total']=$arr[$id]['num']*$arr[$id]['price'];//同一商品的总价
					$_SESSION['totalNum']++;//商品总数量
					$_SESSION['sum']+=$data['price'];//总商品数
				}else{//购买不同商品
				$arr[$id]=array('id'=>$id,'num'=>1,'title'=>$data['title'],'price'=>$data['price'],'total'=>$data['price'],'pic'=>$data['pic']);
					$_SESSION['totalNum']++;
					$_SESSION['sum']+=$data['price'];
				}
			}else{//首次购买
				$arr[$id]=array('id'=>$id,'num'=>1,'title'=>$data['title'],'price'=>$data['price'],'total'=>$data['price'],'pic'=>$data['pic']);
				$_SESSION['totalNum']=1;
				$_SESSION['sum']=$data['price'];
			}
			$_SESSION['cart']=$arr;//将某一商品信息加入session
			$num=$_SESSION['totalNum'];
			
			echo $num;//用于Ajax输出
			
		}
		
		//增加商品数量
		public function addNum(){
			$id=$_GET['id'];//获取商品id
			$_SESSION['cart'][$id]['num']+=1;
			$_SESSION['cart'][$id]['total']+=$_SESSION['cart'][$id]['price'];
			$_SESSION['sum']+=$_SESSION['cart'][$id]['price'];
			$_SESSION['totalNum']+=1;
			
			$this->redirect('Cart/cart');//页面重定向至购物车页面
		}
		
		//减少商品数量
		public function minusNum(){
			$id=$_GET['id'];
			if($_SESSION['cart'][$id]['num']>1){
				$_SESSION['cart'][$id]['num']-=1;
				$_SESSION['cart'][$id]['total']-=$_SESSION['cart'][$id]['price'];
				$_SESSION['sum']-=$_SESSION['cart'][$id]['price'];
				$_SESSION['totalNum']-=1;
			}
			$this->redirect('Cart/cart');
		}
		
		//清空购物车
		public function clear(){
			
			if($_GET['id']){//从session中删除指定的商品信息
					$_SESSION['totalNum']-=$_SESSION['cart'][$_GET['id']]['num'];
					
					$_SESSION['sum']-=$_SESSION['cart'][$_GET['id']]['total'];
					
					unset($_SESSION['cart'][$_GET['id']]);
					
				}else{
					//清空session中商品
					unset($_SESSION["cart"]);
					unset($_SESSION["sum"]);
					unset($_SESSION["totalNum"]);
				}
				$this->redirect('Cart/cart');
		}
		
		
		
		//提交订单
		public function subOrder(){
			//未登录先登录
			if(!$_SESSION['username']||$_SESSION['username']==''){
				redirect(U('Login/login?type=cart'), 3, '请先登录，页面跳转中...');//未登录先登录，根据参数跳回提交购物车页面
			}
			else{
				//添加到订单表
				$order=D('Order');
				$where['serial']=$this->build_order_no();//生存唯一订单号
				$where['uid']=$_SESSION['id'];
				$where['totalNum']=$_SESSION['totalNum'];
				$where['totalPrice']=$_SESSION['sum'];
				$where['time']=time();
				$where['state']=0;
				$back=$order->data($where)->add();//添加订单信息至订单表
				if(!$back){
					$this->error('订单提交失败！');
				}
				//添加到info表
				$info=D('Info');
				$book=D('Book');
				$arr=$_SESSION['cart'];
				foreach($arr as $value){//添加订单信息至info表
					$data['iBno']=$value['id'];
					$data['num']=$value['num'];
					$data['iSerial']=$where['serial'];
					$info->data($data)->add();	
					$where1['bno']=$value['id'];
					$step=$value['num'];
					$book->where($where1)->setDec('stock',$step);
				}
				
			//提交订单后清空购物车
				unset($_SESSION["cart"]);
				unset($_SESSION["sum"]);
				unset($_SESSION["totalNum"]);
			$this->success('订单提交成功！', U('Info/order'));
			}
		}
		
		//生成唯一订单号
		public function build_order_no(){
			return date('Ymd').substr(implode(NULL,array_map('ord', str_split(substr(uniqid(),7,13),1))), 0, 8);
			}
	}