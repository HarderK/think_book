<?php
	class CategoryAction extends Action{
		public function category(){
		load("extend");//模版文件中用到扩展函数库中的方法
		//echo __ROOT__;
		$book=D('Book');
		import('ORG.Util.Page');//导入分页类
		$type=$_GET['type'];
		$where['type']=$type;
		$count=$book->where($where)->count();
		$Page=new Page($count,8);
		$show=$Page->show();//分页显示输出
		//$arr=$book->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		$arr=$book->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		//dump($arr);
		//exit;
		$this->assign('type',$type);//输出图书种类
		$this->assign('list',$arr);
		$this->assign('page',$show);//输出分页
		$this->display();
		}
		
		//详情页
		public function show(){
			$id=$_GET['id'];//获取传值
			$book=D('Book');
			$where['bno']=$id;
			$arr=$book->where($where)->find();//查询单挑记录
			$this->assign('list',$arr);
			$this->display();
		}
	}