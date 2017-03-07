<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		load("extend");//模版文件中用到扩展函数库中的方法
		//echo __ROOT__;
		$book=D('Book');
		$arr=$book->select();
		//dump($arr);
		//exit;
		$this->assign('list',$arr);
		//echo __SELF__;
		$this->display();
	}
	
	//搜索
	public function search(){
		load("extend");//模版文件中用到扩展函数库中的方法
		import('ORG.Util.Page');//导入分页类
		$keywords=$_POST['keywords'];
		$book=M('Book');
		$where['title']=array('like','%'.$keywords.'%');
		$count=$book->where($where)->count();
		$Page=new Page($count,20);
		$show=$Page->show();//分页显示输出
		//dump($where);
		$arr=$book->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		//dump($arr);
		//exit;
		$this->assign('list',$arr);
		$this->assign('page',$show);
		$this->display();
	}
}
