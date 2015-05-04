$(function(){
	$("#tips").on("click",function(){
		$("#yzm").attr("src","welcome/code?abc="+Math.random());
	})
	$(".btn-login").on("click",function(){
		var iValid = $('#identify').val(),
		$username = $("#username").val(),
		$password = $("#pwd").val();
		$.post('welcome/checkcode',{'code':iValid},function(data){
				if(data=='fail'){
					$('#login_error').text('验证码输入有误！').show();
				}else{
					if($("#rememberme").is(':checked')){
						var $isRemember = 1;
					}else{
						var $isRemember = 0;
					}
					$.get('register/checkuser',{username:$username,password:$password,isRemember:$isRemember},function(data){
						if(data =='success'){
							window.location.href='./';
						}else{
							$('#login_error').text('账号或密码错误！').show();
						}
					},'text')
				}
			},'text');
			return false;
	})
})
