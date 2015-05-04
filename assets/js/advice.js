$(function(){
	var flag = true;
	$("#comment").on('keyup',function(){
		var length = $(this).val().length;
		if(length>=1000){
			$(this).next(".num").children("#limitNum").text(0);
		}else{
			$(this).next(".num").children("#limitNum").text(1000-length);	
		}
	})
	$("#comment").on("focus",function(){
		$("#commentTip").empty().hide();
	})
	$("#comment").on("blur",function(){
		var comment = $(this).val();
		if(comment.length<20){
			$("#commentTip").text('请输入不少于20个字符').show();
			flag=false;
		}else if(comment.length>1000){
			$("#commentTip").text('请输入不多于1000个字符').show();
			flag=false;
		}else{
			flag=true;	
		}
	})
	$("#opinionEmail").on('focus',function(){
		$(this).next("#opinionEmailTip").hide();
	})
	$("#opinionEmail").on('blur',function(){
		var mail = $(this).val(),
			re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
		if(re.test(mail)){
			flag=true;
		}else{
			$(this).next("#opinionEmailTip").show();
			flag=false;
		}
	})
	$("#opinionTel").on("focus",function(){
		$(this).next("#opinionTelTip").hide();
	})
	$("#opinionTel").on("blur",function(){
		var phone = $(this).val(),
			re = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|170)+\d{8})$/;
		if(re.test(phone)){
			flag=true;
		}else{
			$(this).next("#opinionTelTip").show();
			flag=false;
		}
	})
	$("#opinionBtn").on("click",function(){
		var $comment = $('#comment').val(),
			$email = $("#opinionEmail").val(),
			$tel = $("#opinionTel").val(),
			$memberId = $(this).next("input").val();
		if(flag&&$comment!=''&&$email!=""&&$tel!=""){
			$.post('saveAdvice',{comment:$comment,email:$email,tel:$tel,memberId:$memberId},function(data){
				if(data =="success"){
					alert('您的建议已经提交，非常感谢您对我们的支持');
					window.location.href = '../';
				}else{
					alert("提交出错！");
				}
			},'text')
		}else{
			alert('请填入相关内容');
		}
		return false;
	})
})

