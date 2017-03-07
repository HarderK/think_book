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
			$('#selectAll').click(function(){
				if($("#selectAll").attr("checked")){
					$(":checkbox").attr("checked",true);
				}else{
					$(":checkbox").attr("checked",false);
				}
			});
			$('#batchDel').click(function(){
				$('#myform').submit();
			});
			
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
           <div class="crumb-list"><i class="icon-font"></i><a href="__APP__/Index/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="__APP__/Admin/admin">管理员管理</a><span class="crumb-step">&gt;</span><span>管理员列表</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="__APP__/Admin/change" method="post">
                    <table class="search-tab">
                        <tr>
                           
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" id="" type="text"/></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" action="__APP__/Admin/del" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="__APP__/Admin/insert"><i class="icon-font"></i>新增管理员</a>
                        <button id="batchDel"><i class="icon-font"></i>批量删除</button>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" id="selectAll" type="checkbox"></th>
                            <th>ID</th>
                            <th>管理员编号</th>
                            <th>姓名</th>
                            <th>权限</th>
                            <th>操作</th>
                        </tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="id[]" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
                            <td><?php echo ($i); ?></td>
                            <td><?php echo ($vo["ano"]); ?></td>
                            <td><?php echo ($vo["name"]); ?></td>
							<?php if($vo["authority"] == 0): ?><td>超级管理员</td>
							<?php elseif($vo["authority"] == 1): ?>
                            <td>普通管理员</td><?php endif; ?>
                            <td>
							<?php if(($_SESSION['authority'] == 0) and ($vo["ano"] != $_SESSION['ano'])): ?><a class="link-del" href="__APP__/Admin/del1?id=<?php echo ($vo["id"]); ?>">删除</a>
							<?php elseif(($_SESSION['authority'] == 1) and ($vo["authority"] == 1) and ($vo["ano"] != $_SESSION['ano'])): ?>
                                <a class="link-del" href="__APP__/Admin/del1?id=<?php echo ($vo["id"]); ?>">删除</a>
							<?php else: ?>
                                <a class="link-del1">删除</a><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                      
                    </table>
                    <div class="list-page"><?php echo ($page); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>