<?php
	class AdminModel extends Model{
		protected $_validate = array(
		//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
			array('ano','require','没有填写员工编号'),
			array('name','require','没有填写员工姓名'),
			array('password','require','没有填写密码'),
			array('repassword','password','两次输入的密码不一致！',0,'confirm'),
			array('ano','','该员工已经存在！',0,'unique',1),
		);
		
		//自动完成
		protected $_auto=array(
			array('password','md5',1,'function'),
			//array('time','time',1,'function'),
		);
		
		
	}