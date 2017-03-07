<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>网上书店后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/css/admin_login.css" />
	<script type="text/javascript" src="__PUBLIC__/Admin/js/jquery.js"></script>
<script>
	$(function(){
		$("#myForm").submit(function(){
			if($('#password').val()!=$('#repassword').val()){
				alert("两次输入的密码不一致！");
				return false;
			}else if($('#password').val()==''){
				alert("密码不能为空！");
				return false;
			}else{
				return true;
			}
		});
		
	});
</script>
</head>
<body>
<div class="admin_login_wrap">
    <h1>修改密码</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form id="myForm" action="__APP__/Login/doPassword" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="password">密码：</label>
                        <input type="password" name="password" id="password" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="repassword">确认密码：</label>
                        <input type="password" name="repassword" id="repassword" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright">&copy; 2015 Powered by 网上书店</p>
</div>
</body>
</html>