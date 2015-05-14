$(function(){
  var $email = $("#email"), arr = ['qq.com', 'gmail.com', '126.com', '163.com', 'hotmail.com', 'yahoo.com', 'yahoo.com.cn', 'live.com', 'sohu.com', 'sina.com'], count = 60;
      function email_err(str) {
        $(".reg_tip").empty().append("<span class='reg_err'></span><span>"+str+"</span>");
      }
      function email_succ() {
        $(".reg_tip").empty().append("<span class='email_succ'></span>");
      }
      function email_tip() {
        $(".reg_tip").empty().append("<span class='reg_remind'><span class='reg_triangle'><span class='reg_small_triangle'></span></span>输入您常用的邮箱，方便登录和找回密码</span>");
      }
      function email_send_ok(adress) {
        $('.ipt_list').children().remove();
        $('.ipt_list').append("<li class='reg_send_ok'>" + "<span class='email_succ'></span>" + "<span>验证邮件已发送到邮箱</span>" + "<a href='javascript:;' class='reg_email'>"+adress+"</a>" + "</li><li class='reg_send_ok'><span>提示：</span><span style='font-size:12px;'>电子邮件偶尔会有延时状况，请耐心等待，如果收件箱没有请尝试到垃圾邮件里找找看</span></li>");
        $('.main_item').append("<div class='email_verify_box'>" + "<a href='javascript:;' data-id='"+adress+"' class='email_login'>登录邮箱验证</a>" + "<a href='javascript:;' class='email_resend'>重新发送验证邮件</a>" + "</div>");
      }
      // function set_pwd() {
        // $('.ipt_list').children().remove();
        // $('.email_verify_box').remove();
        // $('.ipt_list').append("<li class='reg_pwd'>" + "<label for='pwd'>登录密码:</label>" + "<input type='password' name='pwd' id='pwd' maxlength='16'/>" + "<span class='reg_tip'></span>" + "<div class='pwd_save'></div>" + "</li>" + "<li class='reg_re_pwd'>" + "<label for='re_pwd'>确认密码:</label>" + "<input type='password' name='re_pwd' id='re_pwd' maxlength='16'/>" + "<span class='reg_tip'></span>" + "</li>")
      // }
      $email.focus(function() {
        $(".reg_tip").children().remove();
        email_tip();
        $(this).keyup(function() {
          $(".reg_tip").children().remove();
          $(".email_tip").remove();
          var $val = $email.val(), leng = $val.length, len = $val.indexOf('@'), index = 0;
          if ($val != '') {
            if (len >= 0) {
              $val_start = $val.substring(0, len);
              $val_end = $val.substring(len + 1, leng);
              if ($val_start != '') {
                var $email_tip = $("<ul class='email_tip'></ul>");
                for (var i = 0; i < 10; i++) {
                  if (arr[i].indexOf($val_end) == 0) {
                    $email_tip.append("<li>" + $val_start + "@" + arr[i] + "</li>");
                    index++;
                  }
                }
                if (index > 0) {
                  $(".reg_ipt").append($email_tip);
                } else {
                  $(".reg_tip").children().remove();
                  email_err('您输入的邮箱格式有误！');
                }
              } else {
                $(".reg_tip").children().remove();
                email_err('您输入的邮箱格式有误！');
              }
            } else {
              $(".reg_ipt").append("<ul class='email_tip'><li>" + $val + "@qq.com</li><li>" + $val + "@gmail.com</li><li>" + $val + "@126.com</li><li>" + $val + "@163.com</li><li>" + $val + "@hotmail.com</li><li>" + $val + "@yahoo.com</li><li>" + $val + "@yahoo.com.cn</li><li>" + $val + "@live.com</li><li>" + $val + "@sohu.com</li><li>" + $val + "@sina.com</li><li>"+$val+"@sina.cn</li></ul>");
            }
          }
        });
      });
      $email.blur(function() {
        $(".reg_tip").children().remove();
        var $val = $email.val(), leng = $val.length, len = $val.indexOf('@');
        if ($val == '') {
          email_err('您的邮箱为空！');
        } else {
          if (len > 0) {
            $val_end = $val.substring(len + 1, leng);
            if ($val_end.indexOf('.com') >= 0||$val_end.indexOf('.cn') >= 0) {
            	 $.get('register/unique',{adress:$val},function(data){
		        	if(data == 'fail'){
		        		email_err('您输入的邮箱已存在！');
		        	}else{
		        		email_succ();
		        	}
		        });
            }
          } else {
            email_err('您输入的邮箱格式有误！');
          }
        }
      });
      $(document).on("click", ".email_tip>li", function() {
      	var $val = $(this).html();
        $(".reg_tip").children().remove();
        $(this).parent(".email_tip").remove();
        $email.val($val);
        $.get('register/unique',{adress:$val},function(data){
        	if(data == 'fail'){
        		email_err('您输入的邮箱已存在！');
        	}else{
        		email_succ();
        	}
        });
        return false;
      });
      $(document).on('click', '.step1_next', function() {
      	if($(".reg_user_email > .reg_ipt .reg_err").length>0){
      		alert('请输入有效的邮箱地址！');
      	}else{
      		var $val = $email.val();
      		$.get('register/sendMail',{adress:$val},function(data){
	       		if(data =='success'){
	       			$('.reg_submit').css('display', 'none');
	          		email_send_ok($val);
	       		}
	       });
      	}
      });
      $(document).on('click', '.email_verify_box > .email_resend', function() {
      	var _this = this,
      		timer,
      		$val=$('.reg_email').text();
      	if(timer){
      		clearInterval(timer);
      	}
  		timer = setInterval(function() {
          if (count > 0) {
            $(function() {
              count--;
              $(_this).html('重新发送验证邮件('+count+'s)');
            });
          } else {
            clearInterval(timer);
            $(_this).html('重新发送验证邮件');
          }
        }, 1000);
        $.get('register/sendMail',{adress:$val},function(data){
       		if(data =='success'){
       			clearInterval(timer);
       			$(_this).html('发送成功！');
       		}
       });	
      });
      // $(document).on('click', '.email_login', function() {
        // $('.step').removeClass('step1').addClass('step2');
        // $('.reg_submit').show();
        // $('.register_btn').removeClass('step1_next').addClass('step2_next');
        // set_pwd();
      // });
    $('#pwd').keyup(function() {
      var $val = $('#pwd').val(), leng = $val.length;
      if (leng > 0 && leng < 7) {
        $('.pwd_save').addClass('pwd_save_low').removeClass('pwd_save_middle pwd_save_high');
      } else if (leng > 6 && leng < 14) {
        $('.pwd_save').addClass('pwd_save_middle').removeClass('pwd_save_low pwd_save_high');
      } else if (leng > 13) {
        $('.pwd_save').addClass('pwd_save_high').removeClass('pwd_save_middle pwd_save_low');
      }
    });
      $('.ipt_list').on('blur', '.reg_pwd', function() {
        $('.reg_tip').children().remove();
        var $val = $('#pwd').val();
        if ($val == '') {
          $('.reg_pwd>.reg_tip').append("<span class='reg_err'></span><span>密码为空！</span>");
        } else if ($val.length < 6) {
          $('.reg_pwd>.reg_tip').append("<span class='reg_err'></span><span>请输入6位以上密码！</span>");
        }
      });
      $('.ipt_list').on('focus', '.reg_re_pwd', function() {
        $('.reg_re_pwd>.reg_tip').children().remove();
        $('.reg_re_pwd>.reg_tip').append("<span class='reg_err'></span><span>请再次输入密码！</span>");
      });
      $('.ipt_list').on('blur', '.reg_re_pwd', function() {
        $('.reg_re_pwd>.reg_tip').children().remove();
        if ($('#re_pwd').val() == '') {
          $('.reg_re_pwd>.reg_tip').append("<span class='reg_err'></span><span>确定密码不能为空</span>");
        } else if ($('#pwd').val() == $('#re_pwd').val()) {
          $('.reg_re_pwd>.reg_tip').append("<span class='email_succ'></span>");
        } else {
          $('.reg_re_pwd>.reg_tip').append("<span class='reg_err'></span><span>两次密码输入不一致，请重新输入</span>");
        }
      });
      $(document).on('click', '.step2_next', function() {
        var $val = $('#pwd').val(), leng = $val.length;
        if (leng > 5 && leng < 17 && $val == $('#re_pwd').val()) {
        	var $mail = $(this).data('mail'),
        		$code = $(this).data('code');
       	  $.get('register/savePass',{password:$val,mail:$mail,code:$code},function(data){
       	  	if(data == 'success'){
       	  		$('.step').removeClass('step2').addClass('step3');
		          $('.ipt_list').children().remove();
		          $('.reg_submit').remove();
		          $('.ipt_list').append("<li class='reg_succ'>恭喜您，注册成功！<a href='../luoyou'>去裸游网首页</a></li>" + "<li class='reg_perfect'>为了方便您更好的享受裸游服务，建议完善您的资料</li>");
       	  	}else{
       	  		alert('密码设置错误！');
       	  	}
       	  });
        }
      });
      $("a.agreement").on("click",function(){
          $("#dyPop").prev(".divMask").show().end().show();
      });
      $("#dyClose").on("click",function(){
        $("#dyPop").hide().prev(".divMask").hide();
      });
      $(document).on("click",'.email_verify_box > .email_login',function(){
      	var adress = $(this).data('id'),
      		start = adress.indexOf('@'),
      		end = adress.indexOf('.com'),
      		result = adress.substring(start+1,end);
      	window.open('http://mail.'+result+'.com');
      });
});
