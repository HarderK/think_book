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

<header>
<body>
	<div class="mainContainer sixteen container">
            <!--Header Block-->
            <div class="header-wrapper">
              <header class="container">
			  
				<!--包含顶部文件-->
                <div class="head-right">
                      <ul class="top-nav">
							<?php if(!$_SESSION['id'] ): ?><li class=""><a href="__APP__/Login/login">欢迎你，请登录</a></li>
							
							<?php else: ?>
							 <li class=""><a href="#">欢迎你，<?php echo ($_SESSION['username']); ?></a></li>
							 <li class=""><a href="__APP__/Login/doLogout">退出</a></li><?php endif; ?>
							
							
                            <li class="my-wishlist"><a href="__APP__/Login/reg" title="My Wishlist">免费注册</a></li>
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
						<li id='num'><?php echo ($_SESSION['totalNum']); ?></li>
						<li>
						<a href="__APP__/Cart/cart"><img title="Item" alt="Item" src="__PUBLIC__/Home/images/item_icon.png" />
						<li>购物车</li>
						</a>
						</li>
						
					</ul>
				</div>
                    <div class="search-block">
					<form action="__APP__/Index/search" method="post">
                      <input type="text" placeholder="搜索..." name="keywords" />
                      <input type="submit" value="搜索" />
					 </form>
                    </div>
                  </section>
                </div>
				
				<h1 class="logo"><a href="__APP__/Index/index" title="Logo">
                  <img title="首页" alt="首页" src="__PUBLIC__/Home/images/logo.png" />
                  </a></h1>
				
                
                <nav id="smoothmenu1" class="ddsmoothmenu mainMenu">
                  <ul id="nav">
                   <li class="active"><a href="__APP__" title="Home">首页</a></li>
                    <li class=""><a href="__APP__/Category/category?type=1">计算机</a> </li>
					<li class=""><a href="__APP__/Category/category?type=2">文学</a></li>
					<li class=""><a href="__APP__/Category/category?type=3">哲学</a></li>
					<li class=""><a href="__APP__/Category/category?type=4">经济学</a></li>
					<li class=""><a href="__APP__/Category/category?type=5">管理学</a></li>
                  </ul>
                </nav>
				
              </header>
            </div>
            <!--Banner Block-->
            <section class="banner-wrapper">
              <div class="banner-block container">
                <div class="flexslider">
                  <ul class="slides">
                    <li><img title="Banner" alt="Banner" src="__ROOT__/Uploads/images/index/552b4237N1616107e.jpg" /></li>
                    <li><img title="Banner" alt="Banner" src="__ROOT__/Uploads/images/index/552c6831Nf0133e17.jpg" /></li>
                    <li><img title="Banner" alt="Banner" src="__ROOT__/Uploads/images/index/5527b0bcNb31f2c6a.jpg" /></li>
                    <li><img title="Banner" alt="Banner" src="__ROOT__/Uploads/images/index/552b9fdcN81d8ee1a.jpg" /></li>
                  </ul>
                </div>
                <ul class="banner-add">
                  <li class="add1"><a href="#" title=""><img src="__ROOT__/Uploads/images/index/552b2e92Nbffd90c7.jpg" /></a></li>
                  <li class="add2"><a href="#" title=""><img src="__ROOT__/Uploads/images/index/552b3058N82e5e381.jpg" /></a></li>
                </ul>
              </div>
            </section>
            <!--Content Block-->
            <section class="content-wrapper">
              <div class="content-container container">
                <div class="heading-block">
                 <!--  <h1>图书城</h1> -->
                </div>
                <div class="feature-block">
				<hr/>
                  <ul id="mix" class="product-grid">
				  <?php if(is_array($list)): foreach($list as $key=>$vo): ?><li>
                      <div class="pro-img"><a href='__APP__/Category/show?id=<?php echo ($vo["bno"]); ?>'><img title="<?php echo ($vo["title"]); ?>" src="__ROOT__/Uploads/images/<?php echo ($vo["pic"]); ?>" /></a></div>
                      <div class="pro-content1"><p><?php echo (subtxt($vo["title"],10)); ?></p></div>
					  <div class="pro-price1">￥<?php echo ($vo["price"]); ?></div>
                    </li><?php endforeach; endif; ?>
                    
                    
                  </ul>
                </div>
                <hr/>
              </div>
            </section>
    </div> 
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