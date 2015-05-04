<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8">
		<title>裸游旅游网登录</title>
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/normalize.css'); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/login.css'); ?>"/>
	</head>
	<body> 
		<div class="header">
			<div class="ly-logo">
				<a href="<?php echo site_url('./'); ?>" class='logo_a'>
					 <span class="logo_text">裸游网</span>
              		<span class="logo_pic">luryer.com</span>
				</a>
			</div>
		</div>		
		<div class="wrap">
			<div class="content">
				<div class="cent_link">
					<a href="#" target="_blank"></a>
				</div>
				<div class="login_box">
					
					<div class="login_box_opacity">
						<div id="login_box">
							<ul id="login_tab">
								<li class="login_tab_user">裸游会员登录</li>
							</ul>
							<div id="login_error" class="error"></div>
							<form action="#" method="post" id="loginFrm">
								<ul class="login_tab_content">
									<li class="login_tab_username">
										<label class="prefix" for="username">账号</label>
										<input type="text" id="username" name="username" autocomplete="off" placeholder="邮箱"/>
									</li>
									<li>
										<label class="prefix" for="pwd">密码</label>
										<input type="password" id="pwd" name="pwd"/>
									</li>
									<li>
										<label class="prefix" for="identify">验证码</label>
										<input type="text" id="identify" name="identify" maxlength="4"/>
										<img src="<?php echo site_url('welcome/code')?>" id="yzm" alt="图片看不清？点击重新得到验证码" style="cursor:hand;width:110px;vertical-align: middle;" />
		    							<span class="tips" style="color:#999;">看不清？<a id="tips" style="cursor: pointer;color: #f60;text-decoration: underline;">换一个</a></span>
									</li>
									<li>
										<input type="image" src="<?php echo site_url('assets/images/login-btn.png'); ?>" class="btn-login"/>
									</li>
									<li style="margin:15px 50px;">
										<input id='rememberme' type="checkbox"/>
										<label class="remembertxt" for='rememberme'>保存登录信息两周内免登录</label>
									</li>	
									<li class="search-psw">
										<a target="_blank" href="#">找回密码</a> | <a target="_blank" href="<?php echo site_url('register'); ?>">免费注册</a>
									</li>									
								</ul>							
							</form>
						</div>
					</div>
					<div class="login_box_shadow"></div>
				</div>
			</div>
		</div>
		<script src="<?php echo site_url('assets/js/jquery-1.11.2.min.js'); ?>"></script>
		<script src="<?php echo site_url('assets/js/login.js'); ?>"></script>
	</body>
</html>