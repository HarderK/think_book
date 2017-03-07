<?php
	class LoginAction extends Action{
		public function login(){
			$this->display();
		}
		
		public function doLogin(){
			$ano=$_POST['ano'];
			$password=md5($_POST['password']);
			$admin=D('Admin');
			$where=array('ano'=>$ano,'password'=>$password);
			$arr=$admin->where($where)->find();
			//有数据，则将数据写进session
			if($arr){
				$_SESSION['ano']=$arr['ano'];
				$_SESSION['name']=$arr['name'];
				$_SESSION['authority']=$arr['authority'];
				//dump($_SESSION);
				//exit;
				$this->success('用户登录成功!',U('Index/index'));
			}else{
				$this->error('用户名或密码错误！');
			}
		}
		//进入修改密码
		public function password(){
			$this->display();
		}
		//进行修改密码
		public function doPassword(){
			$password=md5($_POST['password']);
			$repassword=md5($_POST['repassword']);
			$ano=$_SESSION['ano'];//获取员工编号
			//判断两次输入的密码是否一致
			if($password!=$repassword){
				$this->error("两次输入的密码不一致！");
			}else{
				$admin=M('Admin');
				$i=$admin->where('ano='.$ano)->setField('password',$password);//更改密码
			}
			if($i>0){
				$_SESSION=array();//清空session
				session_destroy();
				$this->success('密码更改成功！',U('Login/login'));
			}else{
				$this->error('密码更新失败！');
			}
		}
		//退出登录
		public function logout(){
			$_SESSION=array();
				if(isset($_COOKIE[session_name()])){	//设置了cookie则删除cookie
					setcookie(session_name(),'',time()-1,'/');
				}
				session_destroy();
				$this->redirect('Login/login');
		}
	}