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
		var error= new Array();
		$('input[name="username"]').blur(function(){
		//alert(1);
			var username=$(this).val();
			$.get('__URL__/checkName',{'username':username},function(data){
				if(data=='No'){
					error['username']=1;
					$('#spantext').html("该用户名已注册");
				}else{
					error['username']=0
					$('#spantext').html("");
				}
			});
		});
		//提交表单
		$('#submit').click(function(){
			//alert(1);
			if(error['username']==1){
				$('#spantext').html("请重新输入用户名");
				//return false;
			}else{
				//alert(11);
				$('form[name="myForm"]').submit();
				}
		});
	});
	
	
  </script>
</head>
<body>
	<div class="mainContainer sixteen container">
            <!--Header Block-->
            <div class="header-wrapper">
              <header class="container">
                <h1 class="logo"><a href="__APP__/Index/index" title="Logo">
                  <img title="Logo" alt="Logo" src="__PUBLIC__/Home/images/logo.png" />
                  </a></h1>
              </header>
            </div>
            <!--Content Block-->
           <section class="content-wrapper">
	<div class="content-container container">
		<div class="main">
			<div class="account-login">
				<div class="col-2 registered-users">
					<div class="content">
						<h2>用户注册</h2>
						<form action="__URL__/doReg" method="post" name="myForm">
						<ul class="form-list">
							<li>
								
								<div class="input-box">
								<label class="required">用户名<em>*</em></label>
									<input type="text"  class="input-text required-entry validate-email" name="username" />
									　　　<span id="spantext" style="color:red;"></span>
								</div>
								<div class="clear"></div>
							</li>
							
							<li>
								<div class="input-box">
								<label class="required">密码<em>*</em></label>
									<input type="password" class="input-text required-entry validate-password" name="password" />
								</div>
								<div class="clear"></div>
							</li>
							
							<li>
								<div class="input-box">
								<label class="required">确认密码<em>*</em></label>
									<input type="password" class="input-text required-entry validate-password" name="repassword" />
								</div>
								<div class="clear"></div>
							</li>
							
							<li>
								<div class="input-box">
								<label >性别：　　男<input type="radio"  value="0" name="gender" />
									　　女<input type="radio" value="1" name="gender" />
								</label>
								</div>
								<div class="clear"></div>
							</li>
							
							<li>
								<div class="input-box">
								<label class="required">手机号码</label>
									<input type="text" class="input-text required-entry validate-password" name="tel" />
								</div>
								<div class="clear"></div>
							</li>
							
							<li>
								<div class="input-box">
								<label class="required">邮箱</label>
									<input type="text" class="input-text required-entry validate-password" name="email" />
								</div>
								<div class="clear"></div>
							</li>
							
							<li>
								<div class="input-box">
									<label class="required">验证码<em>*</em></label>
									<input type="text"  class="input-text required-entry validate-email" name="code" />
									<img src="<?php echo U('Public/code');?>" class="code" onclick="this.src=this.src+'?'+Math.random()"/>
								</div>
								<div class="clear"></div>
							</li>
						</ul>
						<input class='colors-btn' type="submit" id="submit" value="提交"/>
								<input class="colors-btn"  type="reset" value="重置"/>
								
						<form/>
						<p class="required">* 必须填写</p>
					</div>
            	</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>
</div>
    </div> 
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