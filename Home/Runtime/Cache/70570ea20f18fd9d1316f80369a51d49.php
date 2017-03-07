<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>网上图书商店</title>
<!--js-->
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.elastislide.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/jquery.accordion.js"></script>
<script type="text/javascript" src="__PUBLIC__/Home/js/light_box.js"></script>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/style.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/colors.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/skeleton.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/layout.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/home_flexslider.css" />

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/light_box.css" />
<script type="text/javascript" src="__PUBLIC__/Home/js/html5.js"></script>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/table.css" />
<header>
<body>
	<div class="mainContainer sixteen container">
            <!--Header Block-->
            <div class="header-wrapper">
              <header class="container">
                <div class="head-right">
                      <ul class="top-nav">
							<?php if(!$_SESSION['id'] ): ?><li class=""><a href="__APP__/Login/login">欢迎你，请登录</a></li>
							
							<?php else: ?>
							 <li class=""><a href="#">欢迎你，<?php echo ($_SESSION['username']); ?></a></li>
							 <li class=""><a href="__APP__/Login/doLogout">退出</a></li><?php endif; ?>
							
							
                            <li class="my-wishlist"><a href="__APP__/Login/reg" title="My Wishlist">免费注册</a></li>
                           <!--  <li class="contact-us"><a href="contact_us.html" >登录</a></li>
                            <li class="checkout"><a href="404_error.html">Checkout</a></li>
                            <li class="log-in"><a href="account_login.html" title="Log In">Log In</a></li> -->
                      </ul>
                    <ul class="currencyBox">
                        <li id="header_currancy" class="currency"> <a class="mainCurrency" href="#">　我的账户　</a>
                          <div id="currancyBox" class="currency_detial"> 
						  <a href="__APP__/Info/info">个人信息</a> <a href="#"></a>
						  <a href="__APP__/Info/order">我的订单</a> 
						  </div>
                        </li>
                    </ul>
                  <section class="header-bottom">
                    <div class="cart-block">
					<ul>
						<li><?php echo ($_SESSION['totalNum']); ?></li>
						<li>
						<a href="__APP__/Cart/cart" title="Cart"><img title="Item" alt="Item" src="__PUBLIC__/Home/images/item_icon.png" />
						<li>购物车</li>
						</a>
						</li>
						
					</ul>
				</div>
                    <div class="search-block" style="border:0px;">
                      
                    </div>
                  </section>
                </div>
                <h1 class="logo"><a href="__APP__/Index/index" title="Logo">
                  <img title="Logo" alt="Logo" src="__PUBLIC__/Home/images/logo.png" />
                  </a></h1>
                <nav id="smoothmenu1" class="ddsmoothmenu mainMenu">
                  <ul id="nav">
                   <li class=""><a href="__APP__" title="Home">首页</a></li>
                    <li class=""><a href="__APP__/Category/category?type=1">计算机</a> </li>
					<li class=""><a href="__APP__/Category/category?type=2">文学</a></li>
					<li class=""><a href="__APP__/Category/category?type=3">哲学</a></li>
					<li class=""><a href="__APP__/Category/category?type=4">经济学</a></li>
					<li class=""><a href="__APP__/Category/category?type=5">管理学</a></li>
                  </ul>
                </nav>
              </header>
            </div>
           <hr/>
            <!--Content Block-->
            <section class="content-wrapper">
	<div class="content-container container">
		<div class="col-1-layout">
			<table class="bordered">
				<thead>

				<tr >
					<th class="center">ID</th>        
					<th>商品图片</th>
					<th>商品名称</th>
					<th>单价</th>
					<th>商品数量</th>
					<th>商品总价</th>
					<th>删除</th>
				</tr>
				</thead>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($i); ?></td>
					<td><img title="<?php echo ($vo["title"]); ?>" src="__ROOT__/Uploads/images/thumb/<?php echo ($vo["pic"]); ?>" /></td>        
					<td><?php echo ($vo["title"]); ?></td>
					<td>￥<?php echo ($vo["price"]); ?></td>
					<td><a href="__URL__/minusNum?id=<?php echo ($vo["id"]); ?>"><img style="padding-bottom:4px;" src="__PUBLIC__/Home/images/coleps_icon.png"/></a>　<?php echo ($vo["num"]); ?>　
					<a href="__URL__/addNum?id=<?php echo ($vo["id"]); ?>"><img src="__PUBLIC__/Home/images/expand_icon.png"/></a></td>
					<td>￥<?php echo ($vo["total"]); ?></td>
					<td><a href="__URL__/clear?id=<?php echo ($vo["id"]); ?>"><img style="padding-bottom:4px;" src="__PUBLIC__/Home/images/delete_item_btn.png"/></a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		
			<div class="update-shopping-cart"><a href="__URL__/clear"><button class="colors-btn">清空购物车</button></a></div>
		
			<div class="shopping-cart-totals">
				
				<div class="grand-row"><div class="left">订单金额：</div><div class="right">￥<?php echo ($_SESSION['sum']); ?></div></div>
				<ul class="checkout-types">
					<li><a href="__URL__/subOrder"><button class="colors-btn" title="提交">提交订单</button></a></li>
					
				</ul>
			</div>	
		</div>
		
	</div>
</section>
    </div> 
	<hr/>
	<!-- 包含footer.html -->
 <!--Footer Block-->
            <section class="footer-wrapper">
              <footer class="container">
                <div class="link-block">
                  <ul>
                    <li class="link-title"><a href="#">　　关于我们</a></li>
                    <li><a href="#">　　关于我们</a></li>
                    <li><a href="#">　　客户服务</a></li>
                    <li><a href="#">　　隐私政策</a></li>
                  </ul>
                  <ul>
                    <li class="link-title"><a href="#">　　购物指南</a></li>
                    <li><a href="#">　　购物流程</a></li>
                    <li><a href="#">　　会员介绍</a></li>
                    <li><a href="contact_us.html">　　联系客服</a></li>
                  </ul>
                  <ul>
                    <li class="link-title"><a href="#">　　配送方式</a></li>
                    <li><a href="#">　　上面自提</a></li>
                    <li><a href="#">　　211限时达</a></li>
                    <li><a href="#">　　海外配送</a></li>
                  </ul>
                   <ul>
                    <li class="link-title"><a href="#">　　支付方式</a></li>
                    <li><a href="#">　　货到付款</a></li>
                    <li><a href="#">　　在线支付</a></li>
                    <li><a href="#">　　分期付款</a></li>
                  </ul>
                 
                </div>
               
              </footer>
            </section>

</body>
</html>