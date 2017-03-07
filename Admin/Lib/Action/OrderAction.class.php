<?php
	class OrderAction extends CommonAction{
		public function order(){
			$order=D('Order');
			import('ORG.Util.Page');//导入分页类
			$count=$order->count();
			$Page=new Page($count,10);
			$show=$Page->show();//分页显示输出
			$arr=$order->relation(true)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$arr);
			$this->assign('page',$show);
			$this->display();
		}
		//处理订单
		public function handle(){
			$serial=$_GET['serial'];
			$order=M('Order');
			$where['serial']=$serial;
			$i=$order->where($where)->setField('state',2);
			if($i>0){
				$this->success('处理成功！','order');
			}else{
				$this->error('处理失败！');
			}
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