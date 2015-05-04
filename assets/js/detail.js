$(function(){
	function ShareTip(){

	};
	//分享到QQ空间  
	ShareTip.prototype.sharetoqqzone=function(title,url,picurl)  {  
		alert(url);
	var shareqqzonestring='http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(url)+'&pics='+encodeURIComponent(picurl);  
	window.open(shareqqzonestring);  
	}  
	//分享到腾讯微博  
	ShareTip.prototype.sharetoqq=function(content,url,picurl)  {  
		 var shareqqstring='http://v.t.qq.com/share/share.php?title='+encodeURIComponent(content)+'&url='+encodeURIComponent(url)+'&pic='+encodeURIComponent(picurl);  
		 window.open(shareqqstring);  
	}
	//分享到新浪微博  
	ShareTip.prototype.sharetosina=function(title,url,picurl) {  
	 var sharesinastring='http://v.t.sina.com.cn/share/share.php?title='+encodeURIComponent(title)+'&url='+encodeURIComponent(url)+'&content=utf-8&sourceUrl='+encodeURIComponent(url)+'&pic='+encodeURIComponent(picurl);  
	window.open(sharesinastring);  
	}
	//分享到人人  
	ShareTip.prototype.sharetorenren=function(title,url,picurl) {  
	 var sharerenrenstring='http://share.renren.com/share/buttonshare.do?link='+encodeURIComponent(url)+'&amp;title='+encodeURIComponent(title);  
	window.open(sharerenrenstring);  
	}
	//分享到豆瓣
	ShareTip.prototype.sharetodouban=function(title,url,picurl){
		var sahredoubanstring = 'http://www.douban.com/recommend/?url='+encodeURIComponent(url)+'&title='+encodeURIComponent(title);
		window.open(sahredoubanstring);
	};
	var shareTitle = $("#cache_share").data('title'),
		shareUrl = $("#cache_share").data('url'),
		sharePic = $("#cache_share").data('pic'),
		share = new ShareTip();
	$('#share').on("mousemove",function(){
		$(".bbs_tools_sharelay").show();
	})
	$(".bbs_tools_sharelay").on("mousemove",function(){
		$(this).show();
	})
	$(".bbs_tools_sharelay").on("mouseout",function(){
		$(this).hide();
	})
	$('#share').on("mouseout",function(){
		$(".bbs_tools_sharelay").hide();
	})
	$("#cache_share > .jiathis_button_tqq").on("click",function(){
		share.sharetoqq(shareTitle,shareUrl,sharePic);
	})
	$('#cache_share > .jtico_tsina').on("click",function(){
		share.sharetosina(shareTitle,shareUrl,sharePic);
	})
	$('#cache_share > .jiathis_button_qzone').on("click",function(){
		share.sharetoqqzone(shareTitle,shareUrl,sharePic);
	})
	$('#cache_share > .jiathis_button_renren').on("click",function(){
		share.sharetorenren(shareTitle,shareUrl,sharePic);
	})
	$('#cache_share > .jiathis_button_douban').on("click",function(){
		share.sharetodouban(shareTitle,shareUrl,sharePic);
	})
	$("#recommend_add").on("click",function(){
		if($(this).data('like') == '0'){
			var $member = $(this).data('member'),
			$article = $(this).data('id'),
			_this = this;
			if($member == '0'){
				alert("请先登录");
				var fullHeight = $('html,body').height(),
					clientHeight = $(window).height();
				if(fullHeight>clientHeight){
					$('html,body').animate({'scrollTop':(fullHeight-clientHeight)},'fast');
				}
			}else{
				$.get('./addLike',{member:$member,article:$article},function(data){
					if(data == 'success'){
						$(_this).removeClass('like').addClass('liked');
					}else{
						alert('操作出错！');
					}
				},'text');	
			}
		}else{
			return false;
		}
		
	})
	$(".fastreply").on("click",function(){
		var fullHeight = $('html,body').height(),
			clientHeight = $(window).height(),
			relateId = $(this).data('id');
		if(fullHeight>clientHeight){
			$('html,body').animate({'scrollTop':(fullHeight-clientHeight)},'fast');
		}
		$("#fastpostsubmit").attr("data-relate",relateId);
	})
	$("#fastpostsubmit").on("click",function(){
		var $memberId = $(this).data('member'),
			$articleId = $(this).data('article'), 
			$relateId = $(this).data('relate'),
			$content = $("#fastpostmessage").val(),
			$floor,
			_this = this;
		if($(".bbs_postview").length>0){
			$floor = $(".bbs_postview:last").find('.bbs_floor span').text()
		}else{
			$floor = 0;
		}
		if($content.length>0){
			if($(this).prev('#fastpostreturn').hasClass('onerror')){
				$(this).prev('#fastpostreturn').removeClass('onerror').empty();
			};
			$floor++;
			$.post('./addReply',{memberId:$memberId,articleId:$articleId,content:$content,floor:$floor,relate:$relateId},function(data){
				if(data=='success'){
					$(_this).attr('data-relate','0');
					window.location.reload();
					var fullHeight = $('html,body').height(),
						clientHeight = $(window).height();
					if(fullHeight>clientHeight){
						$('html,body').animate({'scrollTop':(fullHeight-clientHeight)},'fast');
					}
				}else{
					alert("回复出错！");
				}
			},'text')
		}else{
			$(this).prev('#fastpostreturn').addClass('onerror').text('您的帖子长度不符合要求：内容不能为空！');
			return false;
		}
	})
})
