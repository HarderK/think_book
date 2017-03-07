<?php
	class InfoAction extends Action{
		public function info(){
			$user=M('User');
			//未登录转到登录页面
			if(!$_SESSION['username']||$_SESSION['username']==''){
				redirect(U('Login/login'), 3, '请先登录，页面跳转中...');
			}
			$username=$_SESSION['username'];
			$where['username']=$username;
			$arr=$user->where($where)->field('tel,email')->find();//获取电话和邮箱信息
			//dump($arr);
			$this->assign('list',$arr);
			//$this->list=$arr;
			$this->display();
		}
		
		public function order(){
			//未登录先转到登录页面
			if(!$_SESSION['username']||$_SESSION['username']==''){
				redirect(U('Login/login'), 3, '请先登录，页面跳转中...');
			}
			$order=D('Order');
			import('ORG.Util.Page');// 导入分页类
			$uid=$_SESSION['id'];
			$where['uid']=$uid;
			$count=$order->where($where)->count();
			$Page=new Page($count,10);//实例化分页类
			
			$show=$Page->show();//分页显示输出
			
			$arr=$order->relation(true)->where($where)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			//dump($arr);
			//exit;
			$this->assign('list',$arr);
			$this->assign('page',$show);
			$this->display();
		}
		//取消订单
		public function cancel(){
			$serial=$_GET['serial'];
			$order=D('Order');
			$book=D('Book');
			$where['serial']=$serial;
			$j=$order->where($where)->setField('state',1);//修改订单状态
			$arr=$order->where($where)->join('info on order.serial=info.iSerial')->select();
			//修改库存信息
			foreach($arr as $value){
					$i+=$book->where('bno='.$value['iBno'])->setInc('stock',$value['num']);
			}
			if($i>0&&$j>0){
				$this->success('订单取消成功！','order');
			}else{
				$this->error('订单取消失败！');
			}
			
		}
	}