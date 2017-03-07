<?php
	class UserModel extends Model{
		protected $_validate = array(
		//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
			array('username','require','没有填写用户名'),
			array('password','require','没有填写密码'),
			array('repassword','password','两次输入的密码不一致！',0,'confirm'),
			array('code','require','没有填写验证码'),
			array('code','checkCode','验证码输入不正确!',0,'callback'),
			array('username','','该用户名已经存在！',0,'unique',1),
			array('username','/^\w{6,}$/','用户名必须6个字母以上',0,'regex',1),
			array('password','/^\w{6,15}$/','密码必须6-15个字母',0,'regex',1),
			//array('email','email','邮箱格式不正确'),
		);
		
		protected function checkCode($code){
			if(md5($code)!=$_SESSION['code']){
				return false;
			}else{
				return true;
			}
		}
		//自动完成
		protected $_auto=array(
			array('password','md5',1,'function'),
			array('time','time',1,'function'),
		);
		
		
	}