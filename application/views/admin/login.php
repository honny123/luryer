<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>后台登陆</title>
		<!-- Bootstrap framework -->
		<link rel="stylesheet" href="<?=site_url('assets/libs/bootstrap/css/bootstrap.min.css'); ?>" />
		<link rel="stylesheet" href="<?=site_url('assets/libs/bootstrap/css/bootstrap-responsive.min.css'); ?>" />
		<!-- theme color-->
		<link rel="stylesheet" href="<?=site_url('assets/admin/css/blue.css'); ?>" />
		<!-- tooltip -->
		<link rel="stylesheet" href="<?=site_url('assets/libs/qtip2/jquery.qtip.min.css'); ?>" />
		<!-- main styles -->
		<link rel="stylesheet" href="<?=site_url('assets/admin/css/style.css'); ?>" />
		<!-- Favicons and the like (avoid using transparent .png) -->
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="apple-touch-icon-precomposed" href="icon.png" />
		<!--[if lte IE 8]>
		<script src="<?=site_url('assets/admin/js/ie/html5.js');?>"></script>
		<script src="<?=site_url('assets/admin/js/ie/respond.min.js');?>"></script>
		<![endif]-->
	</head>
	<body class="login_page" style="background:#999">
		<div class="login_box">
			<form action="<?=site_url('admin/login'); ?>" method="post" id="login_form">
				<div class="top_b">
					后台管理登陆
				</div>
				<div class="cnt_b">
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span>
							<input type="text" id="username" name="username" placeholder="Username"  />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span>
							<input type="password" id="password" name="password" placeholder="Password"  />
						</div>
					</div>
					<!-- <div class="formRow clearfix">
					<label class="checkbox"><input type="checkbox" /> ��ס����</label>
					</div> -->
				</div>
				<div class="btm_b clearfix">
					<button class="btn btn-inverse pull-right" type="submit">
						登陆
					</button>
				</div>
			</form>
		</div>
		<script src="<?=site_url('assets/admin/js/jquery.min.js'); ?>"></script>
		<script src="<?=site_url('assets/admin/js/jquery.actual.min.js'); ?>"></script>
		<script src="<?=site_url('assets/libs/validation/jquery.validate.min.js'); ?>"></script>
		<script src="<?=site_url('assets/libs/validation/localization/messages_cn.js'); ?>"></script>
		<script src="<?=site_url('assets/libs/bootstrap/js/bootstrap.min.js'); ?>"></script>
		<script type="text/javascript">
			$('#login_form').validate({
				onkeyup : false,
				errorClass : 'error',
				validClass : 'valid',
				rules : {
					username : {
						required : true,
						minlength : 5
					},
					password : {
						required : true,
						minlength : 5
					}
				},
				highlight : function(element) {
					$(element).closest('div').addClass("f_error");
				},
				unhighlight : function(element) {
					$(element).closest('div').removeClass("f_error");
				},
				errorPlacement : function(error, element) {
					$(element).closest('div').append(error);
				}
			});
		</script>
	</body>
</html>

