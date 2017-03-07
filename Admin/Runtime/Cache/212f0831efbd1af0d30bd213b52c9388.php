<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>网上书店后台管理</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/css/common.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/css/main.css" />
	<script type="text/javascript" src="__PUBLIC__/Admin/js/libs/modernizr.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/js/jquery.js"></script>
	<script>
		$(function(){
			$('input[name="submit"]').click(function(){
				var ano=$('input[name="ano"]').val();
				var name=$('input[name="name"]').val();
				var password=$('input[name="password"]').val();
				var repassword=$('input[name="repassword"]').val();
				if(!ano||!name||!password){
					alert("请完整填写信息！");
					return false;
				}else if(password!=repassword){
					alert("两次输入的密码不同！");
					return false;
				}else{
					$('form[name="myForm"]').submit();
				}
			})
		});
	</script>
</head>
<body>
	<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="__APP__/Index/index">网上书店后台首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a>管理员　<?php echo (session('name')); ?></a></li>
                <li><a href="__APP__/Login/password">修改密码</a></li>
                <li><a href="__APP__/Login/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
     <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="__APP__/Admin/admin"><i class="icon-font">&#xe003;</i>管理员管理</a>
                    
                </li>
				<li>
                    <a href="__APP__/User/user"><i class="icon-font">&#xe008;</i>会员管理</a>
                </li>
				<li>
                    <a href="__APP__/Index/index"><i class="icon-font">&#xe005;</i>图书管理</a>
                </li>
				<li>
                    <a href="__APP__/Order/order"><i class="icon-font">&#xe004;</i>订单管理</a>
                </li>
               
            </ul>
        </div>
    </div>
    <!--/sidebar-->
       <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="__APP__/Index/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="__APP__/Admin/admin">管理员管理</a><span class="crumb-step">&gt;</span><span>新增管理员</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="__APP__/Admin/doInsert" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>员工编号：</th>
                                <td>
                                    <input class="common-text required" id="ano" name="ano" size="50" type="text"/>
                                </td>
                            </tr>
							<tr>
                                <th><i class="require-red">*</i>姓名：</th>
                                <td>
                                    <input class="common-text required" id="name" name="name" size="50" type="text"/>
                                </td>
                            </tr>
							<tr>
                                <th><i class="require-red">*</i>密码：</th>
                                <td>
                                    <input class="common-text required" id="password" name="password" size="50" type="password"/>
                                </td>
                            </tr>
							<tr>
                                <th><i class="require-red">*</i>确认密码：</th>
                                <td>
                                    <input class="common-text required" id="repassword" name="repassword" size="50" type="password"/>
                                </td>
                            </tr>
							<tr>
                                <th><i class="require-red">*</i>操作权限：</th>
                                <td>
                                <select name="authority">
								<?php if($_SESSION['authority'] == 0): ?><option value="0">超级管理员</option>
                                    <option value="1">普通管理员</option>
								<?php else: ?>
									<option value="1">普通管理员</option><?php endif; ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" name="submit" type="submit">
                                    <input class="btn btn6" value="重置" type="reset">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>