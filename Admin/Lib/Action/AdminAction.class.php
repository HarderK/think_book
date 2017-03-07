<?php
	class AdminAction extends CommonAction{
		public function admin(){
			$admin=M('Admin');
			import('ORG.Util.Page');//导入分页类
			$count=$admin->count();
			$Page=new Page($count,10);
			$show=$Page->show();//分页显示输出
			$arr=$admin->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$arr);
			$this->assign('page',$show);
			$this->display();
		}
		//进入新增管理员
		public function insert(){
			$this->display();
		}
		//执行新增管理员
		public function doInsert(){
			$admin=D('Admin');
			if(!$admin->create()){//自动完成验证是否编号重复
				$this->error($admin->getError());
			}
			$arr=$admin->create();//返回数组
			if($_SESSION['authority']==1&&$arr['authority']==0){//普通管理员不能增加超级管理员
				$this->error('您不能增加超级管理员！');
			}
				$lastid=$admin->add();
			if($lastid){
				$this->success('新增成功！',U('Admin/admin'));
			}else{
				$this->error('新增失败！');
			}
		}
		
		//关键字查询
		public function change(){
			$keywords=$_POST['keywords'];
			$admin=D('Admin');
			$where['name']=array('like','%'.$keywords.'%');//构建查询语句
			$arr=$admin->where($where)->select();
			$this->assign('list',$arr);
			$this->display('Admin:admin');
		}
		
		//批量删除
	public function del(){
		$admin=D('Admin');
		$data=$_POST['id'];
		if($_SESSION['authority']==1){
		 foreach($data as $value){
			$where['id']=$value;
			$j=$admin->where($where)->getField('authority');
			if($j==0){//普通管理员不能删除超级管理员
				$this->error('您不能删除超级管理员！');
				}
			}
		}
			//进行删除
			foreach($data as $value){
				$where['id']=$value;
				$i+=$admin->where($where)->delete();
			}
		if($i>0){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	//删除一条
	public function del1(){
		$admin=D('Admin');
		$id=$_GET['id'];
		$where['id']=$id;
		$i=$admin->where($where)->delete();
		if($i>0){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
		
	}