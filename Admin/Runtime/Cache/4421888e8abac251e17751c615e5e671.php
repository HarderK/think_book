<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>网上书店后台管理</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/css/common.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/css/main.css" />
	<script type="text/javascript" src="__PUBLIC__/Admin/js/libs/modernizr.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/js/jquery.js"></script>
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
           <div class="crumb-list"><i class="icon-font"></i><a href="__APP__/Index/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="__APP__/Order/order">订单管理</a><span class="crumb-step">&gt;</span><span>订单列表</span></div>
        </div>
   
        <div class="result-wrap">
            <form name="myform" id="myform" action="__APP__/Order/del" method="post">
               
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>订单编号</th>
                            <th>用户名</th>
                            <th>商品数量</th>
                            <th>商品总价</th>
                            <th>下单时间</th>
                            <th>订单状态</th>
                            <th>订单操作</th>
                        </tr>
                        </tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($i); ?></td>
                            <td><?php echo ($vo["serial"]); ?></td>
                            <td><?php echo ($vo["username"]); ?></td>
                            <td><?php echo ($vo["totalNum"]); ?></td>
                            <td>￥<?php echo ($vo["totalPrice"]); ?></td>
                            <td><?php echo (date("Y-m-d H:i:s",$vo["time"])); ?></td>
							<?php if($vo["state"] == 0): ?><td>未处理</td>
							<?php elseif($vo["state"] == 1): ?>
							<td>已取消</td>
							<?php elseif($vo["state"] == 2): ?>
							<td>已处理</td><?php endif; ?>
                            <td>
							<?php if($vo["state"] == 0): ?><a class="link-del" href="__APP__/Order/handle?serial=<?php echo ($vo["serial"]); ?>">处理</a>　
                                <a class="link-del" href="__APP__/Order/cancel?serial=<?php echo ($vo["serial"]); ?>">取消</a>
							<?php else: ?>
								<a class="link-del1">处理</a>　
                                <a class="link-del1">取消</a><?php endif; ?>
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