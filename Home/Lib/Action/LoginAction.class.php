<?php
		class LoginAction extends Action{
			public function login(){
				//echo __APP__;
				if($_GET['type']){
					$this->assign('data',$_GET['type']);//输出type用于判断登录后进入哪个页面
				}
				$this->display();
			}
			
			//获取登录信息
			public function doLogin(){
				//dump($_GET);
				//exit;
				$username=$_POST['username'];
				$password=md5($_POST['password']);
				$code=$_POST['code'];
				if(md5($code)!=$_SESSION['code']){//验证码验证
					$this->error('验证码错误!');
				}
				$user=M('User');
				$where=array('username'=>$username,'password'=>$password);
				$arr=$user->field('id')->where($where)->find();
				if($arr){
					$_SESSION['username']=$username;
					$_SESSION['id']=$arr['id'];
					if($_GET['type']=="cart"){//如果从购物车跳到登录页面则跳回购物车，否则跳回首页
						$this->success('用户登录成功',U('Cart/cart'));
					}else{
						$this->success('用户登录成功',U('Index/index'));
					}
				}else{
					$this->error('用户名或密码错误');
				}
			}
			//退出登录
			public function doLogout(){
				$_SESSION=array();
				if(isset($_COOKIE[session_name()])){	//设置了cookie则删除cookie
					setcookie(session_name(),'',time()-1,'/');
				}
				session_destroy();
				$this->redirect('Index/index');
			}
			
			//注册页面
			public function reg(){
				//echo __URL__;
				$this->display();
			}
			
			//进行注册
			public function doReg(){
				//dump($_POST);
				$user=D('User');
				//dump($user->create());
				//exit;
				if(!$user->create()){//进行自动验证
					$this->error($user->getError());
				}
				//exit;
				$lastid=$user->add();
				if($lastid){
					$this->success('注册成功！',U('Login/login'));
				}else{
					$this->error("用户注册失败，请重新注册");
				}
			}
			//检查用户名是否有重名
			public function checkName(){
				$username=$_GET['username'];
				$user=M('User');
				$where['username']=$username;
				$count=$user->where($where)->count();
				if($count>0){
					echo "No";
				}else{
					echo "Yes";
				}
			}
		}