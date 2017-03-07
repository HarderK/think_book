<?php
	class UserAction extends CommonAction{
		public function user(){
			$user=D('User');
			import('ORG.Util.Page');//导入分页类
			$count=$user->count();
			$Page=new Page($count,10);
			$show=$Page->show();//分页显示输出
			$arr=$user->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$arr);
			$this->assign('page',$show);
			$this->display();
		}
		
		//关键字查询
		public function change(){
			$keywords=$_POST['keywords'];
			$user=D('User');
			import('ORG.Util.Page');//导入分页类
			$where['username']=array('like','%'.$keywords.'%');
			$count=$user->where($where)->count();
			$Page=new Page($count,20);
			$show=$Page->show();//分页显示输出
			$arr=$user->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$arr);
			$this->assign('page',$show);
			$this->display('User:user');
			
		}
	}