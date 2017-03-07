<?php
	class IndexAction extends CommonAction {
    public function index(){
		//echo "Hello world";
		load("extend");//模版文件中用到扩展函数库中的方法
		import('ORG.Util.Page');//导入分页类
		$book=M('Book');
		$count=$book->count();
		$Page=new Page($count,10);
		$show=$Page->show();//分页显示输出
		$arr=$book->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$arr);
		$this->assign('page',$show);
		$this->display();
    }
	//关键字查询
	public function changeType(){
			load("extend");//模版文件中用到扩展函数库中的方法
			import('ORG.Util.Page');//导入分页类
			$book=M('Book');
			$type=$_POST['type'];
			//echo $type;
			$keywords=$_POST['keywords'];
			if($type!=0){
				$where['type']=$type;
				$where['title']=array('like','%'.$keywords.'%');
			}else{
				$where['title']=array('like','%'.$keywords.'%');
			}
			$count=$book->where($where)->count();
			$Page=new Page($count,20);
			$show=$Page->show();//分页显示输出
			$arr=$book->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$arr);
			$this->assign('page',$show);
			$this->display('Index:index');
		}
		
	public function insert(){
		$this->display();
		
	}
	
	//添加图书
	public function doInsert(){
		$book=D('Book');
		$book->create();
		
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize=3145728 ;// 设置附件上传大小
		$upload->allowExts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath='./Uploads/images/show/';// 设置附件上传目录
		$upload->thumb = true;// 使用对上传图片进行缩略图处理
		$upload->imageClassPath = 'ORG.Util.Image';// 图库类包路径
		$upload->thumbPrefix = '';// 缩略图前缀
		$upload->thumbMaxWidth = '170,170'; // 缩略图最大宽度
		$upload->thumbMaxHeight = '170,170';//设置缩略图最大高度
		$upload->thumbPath = './Uploads/images/';// 缩略图保存路径
		//$upload->thumbType = 1;// 缩略图生成方式 1 按设置大小截取 0 按原图等比例缩略
		
		if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
		//dump($info);	
		//exit;
		$book->pic=$info[0]['savename'];
		
		$lastid=$book->add();
		//exit;
		if($lastid){
			$this->success("新增成功！");
		}else{
			$this->error("提交失败，请重新提交！");
		}
	}
	
	//批量删除
	public function del(){
		//dump($_POST['id']);
		$book=D('Book');
		$data=$_POST['id'];
		 foreach($data as $value){
			$where['bno']=$value;
			$da=$book->where($where)->getField('pic');
			$i+=$book->where($where)->delete();//删除图书
			//dump($da);
			unlink('./Uploads/images/'.$da);//删除文件
			unlink('./Uploads/images/show/'.$da);
		}
		if($i>0){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	//删除一条
	public function del1(){
		$book=D('Book');
		$bno=$_GET['id'];
		//dump($bno);
		//exit;
		$where['bno']=$bno;
		$da=$book->where($where)->getField('pic');
		$i=$book->where($where)->delete();
		unlink('./Uploads/images/'.$da);
		unlink('./Uploads/images/show/'.$da);
		if($i>0){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	//进入数据更新
	public function myUpdate(){
		$bno=$_GET['id'];
		//dump($bno);
		$book=M('Book');
		$where['bno']=$bno;
		$arr=$book->where($where)->find();
		$this->assign('list',$arr);
		$this->display();
	}
	//执行数据更新
	public function doUpdate(){
		$bno=$_GET['id'];
		$book=D('Book');
		$where['bno']=$bno;
		$data['title']=$_POST['title'];
		$data['type']=$_POST['type'];
		$data['isbn']=$_POST['isbn'];
		$data['author']=$_POST['author'];
		$data['publisher']=$_POST['publisher'];
		$data['pubDate']=$_POST['pubDate'];
		$data['price']=$_POST['price'];
		$data['stock']=$_POST['stock'];
		$lastid=$book->where($where)->data($data)->save();
		if($lastid){
			$this->success("更新成功！",U('Index/index'));
		}else{
			$this->error("提交失败，请重新提交！");
		}
	}
	
}