<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>裸游网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/normalize.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/detail.css'); ?>"/>
  </head>
  <body>
    <?php include APPPATH . 'views/header.php';?>
    <div class="qyer_head_crumbg" id="nav">
		<div class="qyer_head_crumb">
			<span class="text"><a href="<?php echo site_url('./'); ?>">裸游</a></span>
			<span class="space">&gt;</span><span class="text"><a href="<?php echo site_url('article/cate/'.$article->category_id); ?>"><?php echo $article->category_title; ?></a></span><span class="space">&gt;</span><span class="text"><?php echo $article->article_title; ?></span>
		</div>
	</div>
	<div class="bbs_titboxs">
		<div class="bbs_titbox">
			<h1 class="bbs_titbox_title fontYaHei qyer_spam_text_filter"><?php echo $article->article_title; ?></h1>
			<div class="bbs_titbox_info">
			     <div class="infos">                                   
			                <a href="<?php echo site_url('member/'.$article->member_id); ?>" class="ml10" data-bn-ipg="4-2"><?php echo $article->author; ?></a>
			                    <span class="ml15 mr15">|</span>
			                    	发表于 <?php echo $article->article_date; ?>                   
			                    <span class="ml15 mr15">|</span>
			                    <span class="views"><?php echo $article->views; ?></span>
			                <span class="sum"><?php echo $article->replys; ?></span>
			                <span class="like"><?php echo $article->likes; ?></span>
			                <span class="ml15 mr15">|</span>
			       </div>
			
			</div>
		</div>
	</div>
	<div id='wrap' class="wrap clearfix">
		<div class="bbs_main">
			<?php echo $article->article_content; ?>
			<div class="bbs_tools bbs_tools_scroll">
		<p class="btns clearfix">
			<a href="javascript:;" id="share" class="share" rel="nofollow" data-bn-ipg="22">分享</a>
			<a href="javascript:;" id="recommend_add" data-id='<?php echo $article->article_id; ?>' data-member='<?php if($logged_user){echo $logged_user->member_id;}else{echo 0;} ?>' 
				class="<?php if($isLike == 0){ echo 'like'; }else{echo 'liked';} ?>" data-like='<?php echo $isLike; ?>' rel="nofollow">喜欢</a>
		</p>
		<div class="bbs_tools_sharelay">
			<div class="sharelay_top"></div>
			<!-- JiaThis Button BEGIN jiathis_style_24x24  jiathis_style-->
            <span class="jiathis_style_24x24 fl _js_jiathis_style_share" id="cache_share" data-url="<?php echo site_url('article/'.$article->article_id); ?>" 
            	data-title="跟各位分享一篇#裸游好帖#【<?php echo $article->article_title; ?>】。超级干货有木有！ 赶紧来围观！帖子地址>>" 
            	data-pic="<?php if($article->cover){echo site_url('uploads/article/'.$article->cover);}else{echo site_url('assets/images/default_article.jpg');} ?>
            	<a class="jiathis_button_tsina" title="分享到新浪微博"><span class="jiathis_txt jtico jtico_tsina"></span></a>
            	<a class="jiathis_button_tqq" title="分享到腾讯微博"><span class="jiathis_txt jtico jtico_tqq"></span></a>
            	<a class="jiathis_button_qzone" title="分享到QQ空间"><span class="jiathis_txt jtico jtico_qzone"></span></a>
            	<a class="jiathis_button_renren" title="分享到人人网"><span class="jiathis_txt jtico jtico_renren"></span></a>
            	<a class="jiathis_button_douban" title="分享到豆瓣"><span class="jiathis_txt jtico jtico_douban"></span></a>
            </span>
            <!-- JiaThis Button END -->
			</div>
	</div>
	<?php if($replys){
		foreach ($replys as $reply) { ?>
			<div class="bbs_postview">
		<div class="bbs_txttop clearfix">
			<div class="floor_arrow"></div>
			<div type="bbsusercard" class="avatar ui_headPort">
                <a href="<?php echo site_url('member/'.$reply->member_id) ?>" target="_blank">
                    <img src="<?php if($reply->thumb_photo){ echo site_url('uploads/member/'.$reply->thumb_photo); }else{ echo site_url('assets/images/default_user.png'); } ?>">                
               	</a>
            </div>
            <div class="bbs_floor">
        	<a href="javascript:;" class="num"><span><?php echo $reply->floor; ?></span>楼</a>
            </div>
            <div class="userinfo">
                <a href="<?php echo site_url('member/'.$reply->member_id) ?>" target="_blank"><?php if($reply->nickname){ echo $reply->nickname;}else{echo $reply->email;} ?></a>&nbsp;&nbsp;
        		<!-- <span class="cGray">5袋长老</span>&nbsp;&nbsp; -->                           
    		</div>
    		<div class="authorinfo">        
                <em id="authorposton11038876">发表于 <span title="<?php echo $reply->reply_date; ?>"><?php echo $reply->reply_date; ?></span></em>
                <!-- &nbsp;&nbsp;|&nbsp;&nbsp;<a href="viewthread.php?tid=1091165&amp;page=1&amp;authorid=3177737" rel="nofollow" data-bn-ipg="8-8-4">只看此用户</a> -->
            </div>
		</div>
		 <div class="bbs_txtbox t_msgfontfix">
			<table width="100%" cellspacing="0" cellpadding="0" class="bbs_txtbox_table">
			<tbody><tr>
			<td class="qyer_spam_text_filter">
			      <?php if($reply->pReply){
			      	$pReply = $reply->pReply;?>
			      	<strong>回复 <a href="javascript:;" target="_blank" rel="nofollow"><?php echo $pReply->floor; ?>#</a> 
			      		<i><?php if($pReply->nickname){ echo $pReply->nickname; }else{ echo $pReply->email; } ?></i> </strong>  
			        <br>&nbsp; &nbsp; <br>
			     <?php } ?>
			  <?php echo $reply->reply_content; ?> 
			</td>
			</tr>
			</tbody></table>
			    </div>
			    <div class="bbs_txtbtm postactions clearfix">
				<span class="fr">
			    	<a class="fastreply mr15" href="javascript:;" data-id="<?php echo $reply->reply_id; ?>" rel="nofollow">回复</a>
			    </span>
			</div>
	</div>
	<?php	}
	} ?>
	<div style="margin-top:20px;" class="mainbox viewthread" id="f_post">
		<div class="f14 fb mb10">快速回复</div>
		<div class="clearfix">
			<div style="float:left;" class="postauthor">
				<div class="avatar">
				<img width="80" height="80" src="<?php if($logged_user&&$logged_user->thumb_photo){ echo site_url('uploads/member/'.$logged_user->thumb_photo); }else{echo site_url('assets/images/default_user.png');} ?>">
				</div>
			</div>
			<div style="float:right;" class="postcontent">
				<div class="mod_discuss_cnt_triangle"></div>
				<?php if($logged_user){ ?>
					<textarea rows="5" cols="80" name="message" id="fastpostmessage" tabindex="4" class="txtarea"></textarea>
					<div id="fastpostreturn" style="margin-top:10px;"></div>
					<button type="submit" name="replysubmit" id="fastpostsubmit" data-relate='0' data-member="<?php echo $logged_user->member_id; ?>" data-article="<?php echo $article->article_id; ?>" value="replysubmit" tabindex="5" class="ui_button fr">回复</button>
				<?php }else{ ?>
					<p style="font-size:14px; line-height:16px;">需要登录才能回复</p>
					<div class="nopostcnt">
					<p class="fr"><a class="ui_buttonA" href="<?php echo site_url('register'); ?>">我要注册</a></p>
					<a class="ui_button" href="<?php echo site_url('login'); ?>">登录</a>
				<?php } ?>
				<!-- <span class="quick">快速登录：<a href="javascript:void(0);" class="_jsweibologin"><img width="20" height="16" src="http://static.qyer.com/images/common/head/head_weibo.png" alt="使用微博账号登录" title="使用微博账号登录"></a><a href="javascript:void(0);" class="_jsqqlogin"><img width="16" height="16" src="http://static.qyer.com/images/common/tpl/connect_logo_qq.png" alt="使用QQ账号登录" title="使用QQ账号登录"></a></span> -->
				
			</div>
			</div>
		</div>
	</div>
		</div>
	</div>
     <?php include APPPATH . 'views/footer.php';?>
    <script src="<?php echo site_url('assets/js/detail.js'); ?>"></script>
  </body>
</html>