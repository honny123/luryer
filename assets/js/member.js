$(function(){
	var imgArea;
	$("#uploadify").uploadify({
		buttonText:'选择图片',
		height        : 30,
        swf           : '../assets/js/uploadify.swf',
        uploader      : '../welcome/uploadify',
        width         : 120,
        'onUploadSuccess' : function(file, data, response) {
        	$("#uploadify").uploadify('disable', true);  //(上传成功后)'disable'禁止再选择图片  
        	data = JSON.parse(data);
        	var img = new Image();
        	img.src = '../uploads/member/'+data.file_name;
        	img.onload = function(){
        		var originRatio = img.width/img.height,
        			frameW = 370,
        			frameH = 370/originRatio,
        			scaleX,
        			scaleY;
        		img.width = frameW;
        		img.height = frameH;
        		setTimeout(function(){
        			$('#preview-pane .preview-container').append(img.outerHTML);
        			$(".u_set_face .container").prepend(img).show().next(".button").show();
        		 imgArea = $(img).imgAreaSelect({
        		 	x1:10,
        		 	y1:0,
        		 	x2:210,
        		 	y2:200,
        		 	 instance: true,  //配置为一个实例，使得绑定的imgAreaSelect对象可通过imgArea来设置  
		            handles: true,   //选区样式，四边上8个方框,设为corners 4个  
		            fadeSpeed: 300, //选区阴影建立和消失的渐变
		            aspectRatio:'1:1',
		            show:true,
		            onInit:function(img,selection){
		            	if (!selection.width || !selection.height)
					        return;
					      scaleX = 200 / selection.width;
						  scaleY = 200 / selection.height;
						    $('#preview-pane img').css({
						        width: Math.round(scaleX * frameW),
						        height: Math.round(scaleY * frameH),
						        marginLeft: -Math.round(scaleX * selection.x1),
						        marginTop: -Math.round(scaleY * selection.y1)
						    });
		            },
		            onSelectChange:function(img, selection) {
					    if (!selection.width || !selection.height)
					        return;
					      scaleX = 200 / selection.width;
						  scaleY = 200 / selection.height;
						    $('#preview-pane img').css({
						        width: Math.round(scaleX * frameW),
						        height: Math.round(scaleY * frameH),
						        marginLeft: -Math.round(scaleX * selection.x1),
						        marginTop: -Math.round(scaleY * selection.y1)
						    });
					},
					onSelectEnd:function(img,selection){
						$('#x').val(selection.x1);
						$("#y").val(selection.y1);
						$("#w").val(selection.width);
						$("#h").val(selection.height);
					}
        		 })
        		},4000)
        	}
        }
	})
	$(".button .js_create_avatar").on("click",function(){
		var oImg = $('#preview-pane img');
		var $x = -parseInt(oImg.css('marginLeft')),
			$y = -parseInt(oImg.css('marginTop')),
			$w = $('#w').val(),
			$h = $('#h').val(),
			$pw = oImg.width(),
			$ph = oImg.height();
		$.get("../welcome/packImg",{x:$x,y:$y,w:$w,h:$h,pw:$pw,ph:$ph},function(data){
			if(data.thumbPhoto != ''){
				$(".u_set_face .face > img").attr('src','../uploads/member/'+data.thumbPhoto);
				$(".infos .face img").attr('src','../uploads/member/'+data.thumbPhoto);
				$(".u_set_face .container").hide().next(".button").hide();
				imgArea.remove();
				
			}else{
				alert('上传头像出错！');
			}
		},'json')
	})
	$("#cancel_photo").on("click",function(){
		$(".u_set_face .container").hide().next(".button").hide();
		imgArea.remove();
	})
	$(".u_set_menu li").on("click",function(){
		var name = $(this).data('id');
		$(this).addClass('current').siblings('li').removeClass('current');
		$('.u_set_main').hide();
		$("."+name).show();
	})
	$(".profile .edit_link").on("click",function(){
		var id = $(this).data('id'),
			homeCode = $('#homeCode').val(),
			homeText = $("#homeText").val(),
			textArr = homeText.split('-'),
			codeArr = homeCode.split('-');
		if(codeArr[0] !=''){
			$('#select2-chosen-1').text(textArr[0]);
			$('#loc_province option[value='+codeArr[0]+']').attr('selected','selected');
			$('#select2-chosen-2').text(textArr[1]);
			$('#select2-chosen-3').text(textArr[2]);
		}
		$('.u_set_main').hide();
		$(".edituser").show();
	})
	$("#userbirth").DatePicker({
		format:'Y-m-d',
		date: $('#userbirth').val(),
		onChange: function(formated, dates){
			$('#userbirth').val(formated);
			$('#userbirth').DatePickerHide();
		}
	});
	var flag = true;
	$('#username').on("blur",function(){
		var username = $(this).val();
		if(username.length>0){
			var reg =  /^[\u4E00-\u9FA5\uf900-\ufa2d\w]{4,16}$/;
			if(reg.test(username)){
				$(this).next(".btm").children(".ui2_error_layer").hide();
				flag = true;
			}else{
				$(this).next(".btm").children(".ui2_error_layer").show();
				flag = false;
			}
		}else{
			$(this).next(".btm").children(".ui2_error_layer").hide();
			flag = true;
		}
	})
	$('#input_bio').on("blur",function(){
		var signature = $(this).val();
		if(signature.length>0){
			if(signature.length>70){
				$(this).next(".btm").children(".ui2_error_layer").show();
				flag = false;
			}else{
				$(this).next(".btm").children(".ui2_error_layer").hide();
				flag = true;
			}
		}else{
			$(this).next(".btm").children(".ui2_error_layer").hide();
			flag = true;
		}
	})
	$("#website").on("blur",function(){
		var site = $(this).val();
		if(site.length>0){
			var reg = /^http:/;
			if(reg.test(site)){
				$(this).next(".btm").children(".ui2_error_layer").hide();
				flag = true;
			}else{
				$(this).next(".btm").children(".ui2_error_layer").show();
				flag = false;
			}
		}else{
			$(this).next(".btm").children(".ui2_error_layer").hide();
			flag = true;
		}
	})
	$("#input_preference").on('blur',function(){
		var preference = $(this).val();
		if(preference.length>0){
			if(preference.length>70){
				$(this).next(".btm").children(".ui2_error_layer").show();
				flag = false;
			}else{
				$(this).next(".btm").children(".ui2_error_layer").hide();
				flag = true;
			}
		}else{
			$(this).next(".btm").children(".ui2_error_layer").hide();
			flag = true;
		}
	})
	$("#btnsub").on('click',function(){
		if(flag){
			var homeText = '',userData;
			if($('#select2-chosen-1').val() == '省份'){
				homeText = '';
			}else{
				homeText = $('#select2-chosen-1').text() + ' - ' + $('#select2-chosen-2').text() + ' - ' +  $('#select2-chosen-3').text();
			}
			userData = $("#editform").serialize()+'&homeText='+encodeURIComponent(homeText);
			$.post('../welcome/saveuserInfo',userData,function(data){
				if(data == 'success'){
					window.location.reload();
				}else{
					alert('您未做任何编辑，退出设置请点取消！');
				}
			},'text')
		}
	})
	$('#cancel_edit').on("click",function(){
		$('.u_set_main').hide();
		$(".profile").show();
	})
	$('.tiezi .delete').on("click",function(){
		var id = $(this).data('id');
		$('.metta_box1').show().next('.send_box_error').show();
		$(".send_box_error .send_box_error_submit").attr('data-id',id);
		return false;
	})
	$('.send_box_error .send_box_error_cancel').on("click",function(){
		$('.metta_box1').hide().next('.send_box_error').hide();
	})
	$('.send_box_error .send_box_error_submit').on("click",function(){
		var id = $(this).attr('data-id');
		$.get('../article/delete',{articleId:id},function(data){
			if(data=='success'){
				$('.delete[data-id='+id+']').parents('li').remove();
				$('.metta_box1').hide().next('.send_box_error').hide();
			}else{
				alert('操作出错！');
			}
		},'text')
	})
})
