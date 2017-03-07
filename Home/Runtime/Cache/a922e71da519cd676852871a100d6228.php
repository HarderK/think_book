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

<script>
	$(function(){
		$('button[class="form-button"]').click(function(){
			
			var va=<?php echo ($list["bno"]); ?>;
			//alert(va);
			$.get('__APP__/Cart/doCart?id='+va,function(data){
				$('#num').html(data);	
			});
		});
	});
</script>
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
                    <li class=""><a href="__APP__" title="Home">首页</a></li>
                    <li class="" id="id1"><a href="__APP__/Category/category?type=1">计算机</a> </li>
					<li class="" id="id2"><a href="__APP__/Category/category?type=2">文学</a></li>
					<li class="" id="id3"><a href="__APP__/Category/category?type=3">哲学</a></li>
					<li class="" id="id4"><a href="__APP__/Category/category?type=4">经济学</a></li>
					<li class="" id="id5"><a href="__APP__/Category/category?type=5">管理学</a></li>
                  </ul>
                </nav>
              </header>
            </div>
           <hr/>
            <!--Content Block-->
<section class="content-wrapper">
	<div class="content-container container">
		
		<div class="main">
			
			<div class="product-info-box">
				<div class="product-essential">
					<div class="product-img-box">
						<p class="product-image-zoom">
							<img src="__ROOT__/Uploads/images/show/<?php echo ($list["pic"]); ?>"  alt="Image" title="Image" />
						</p>
					</div>
					<div class="product-shop">
						<h3 class="product-name"><?php echo ($list["title"]); ?></h3>
						<div class="price-box">
                		    <span class="price"><?php echo ($list["author"]); ?></span>
							<span class="availability">著</span>
				        </div>
						<div class="price-box">
                		    <span class="price">￥<?php echo ($list["price"]); ?></span>
							<span class="availability">库存量：<?php echo ($list["stock"]); ?></span>
				        </div>
						<div class="model-block">
							<p>
								<span>促销信息: </span>满100减30
							</p>
						</div>
						<div class="first-review">
							累计评价：1890
						</div>
						<div class="color-size-block">
							<div class="label-row">
								<label><em>*</em> 配送至</label>
							
							</div>
							<div class="select-row">
								<select><option>-- 请选择 --</option>
									<option>洪山区</option>
									<option>武昌区</option>
									<option>江夏区</option>
									<option>青山区</option>
								</select>
							</div>
							
						</div>
						<div class="model-block">
							<p>
								<span>服务: </span>由　网上商城　发货并提供售后服务。 23：00之前下单预计明天送达
							</p>
						</div>
						<div class="add-to-cart-box">
							
							<button class="form-button"><span>加入购物车</span></button>
						
						</div>
					</div>
				</div>
			</div>
       
			<section  class="product-collateral">
            	<script type="text/javascript">
					$(function(){
						var tabContainers=$('section.product-collateral > div.commonContent');
						tabContainers.hide().filter(':first').show();
						$('section.product-collateral ul.tab-block a').click(function(){
							tabContainers.hide();
							tabContainers.filter(this.hash).show();
							$('section.product-collateral ul.tab-block a').removeClass('active');
							$(this).addClass('active');
							return false;
							}).filter(':first').click();
						});
					</script>
				<ul class="tab-block">
					<li><a href="#pro-detail" title="Description" class="active">商品介绍</a></li>
					<li><a href="#pro-review" title="Reviews">商品评价</a></li>
					<li><a href="#pro-tags" title="Product Tags">购买记录</a></li>
				</ul>
				<div id="pro-detail" class="pro-detail commonContent">
					<ol>
						<li>书名：　<?php echo ($list["title"]); ?></li>
						<li>ISBN:　<?php echo ($list["isbn"]); ?></li>
						<li>作者:　<?php echo ($list["author"]); ?></li>
						<li>出版社：　<?php echo ($list["publisher"]); ?></li>
						<li>出版日期：　<?php echo ($list["pubDate"]); ?></li>
					</ol>
					
				</div>
                
                <div id="pro-review" class="pro-detail commonContent">
					<p>
						<br/><br/><br/><br/><br/><br/>
					</p>
				</div>
                
                <div id="pro-tags" class="pro-detail commonContent">
					<p>
						<br/><br/><br/><br/><br/><br/>
					</p>
				</div>
      
			</section>

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