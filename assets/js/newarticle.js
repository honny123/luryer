$(function(){
	$('.send_cancel').click(function(){
		$('.metta_box').css('display','block');
		$('.send_box').css('display','block');
	});
	$('.send_box_submit').click(function(){
		$('.metta_box').css('display','none');
		$('.send_box').css('display','none');
	});
	$('.send_box_cancel').click(function(){
		location.href="welcome/index";
	});
	$('.send_droplist').hover(function(){
		$('.send_droplist ul').css('display','block');
	},function(){
		$('.send_droplist ul').css('display','none');
	});
	
	

	//	alert($('.send_content_input').val());
		
	$('.send_content_input').val($('#newscontent p').html());
	
	$('.send_submit').click(function(){
		
		if($('#send-title-input').val()==''){
			$('.metta_box1').css('display','block');
			$('.send_box_error').css('display','block');
			$('.send_box_promit').html('请完成标题！');
		}else if($('#newscontent p').html()==''){
			$('.metta_box1').css('display','block');
			$('.send_box_error').css('display','block');
			$('.send_box_promit').html('请完成内容！');
		}else if($('.send_sort').val()=='分类'){
			$('.metta_box1').css('display','block');
			$('.send_box_error').css('display','block');
			$('.send_box_promit').html('请选择分类！');
		}else{
			$('.card_form').submit();
		}
		
	});
	$('.send_box_error_submit').click(function(){
		$('.metta_box1').hide();
		$('.send_box_error').hide();
	});
});
