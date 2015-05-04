<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>裸游网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/normalize.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/cate.css'); ?>"/>
  </head>
  <body>
    <?php include APPPATH . 'views/header.php';?>
    <div class="qyer_head_crumbg">
		<div class="qyer_head_crumb">
		<span class="text"><a href="<?php echo site_url('./'); ?>">裸游</a></span>
		<span class="space">&gt;</span>
		<span class="text"><?php echo $cate->category_title; ?></span></div>
	</div>
	<div class="bbs_listtop clearfix">
		<p class="pic"><img src="<?php echo site_url('assets/images/cate_'.$cate->category_id.'.jpg'); ?>" width="80" height="80" alt="<?php echo $cate->category_title; ?>"></p>
		<div class="info">
		<h2 class="title fontYaHei"><?php echo $cate->category_title; ?></h2>
        <p class="text"><?php if($cate->category_title=='AA结伴'){
        	echo 'AA结伴是一种多人相约旅行的方式，在花费方面是自己承担自己的，在路上可以相互照顾，相互交流和学习（未完待续）';
        }else if($cate->category_title=='裸游分享'){
        	echo '裸游分享是将自己的裸游经历分享给大家，让更多的人感受到裸游的魅力（未完待续）';
        }else if($cate->category_title=='裸游锦囊'){
        	echo '裸游锦囊讲述了如何进行裸游，提供了在裸游中碰到问题的解决方法，目的是让更过的人会裸游，爱裸游（未完待续）';
        } ?></p>
        </div>
	</div>
	<div class="bbs_sldline2"></div>
	<div class='lay_wrap clearfix'>
		<div class="lay_main">
			<ul class="bbs_threadlist">
				<?php if($articles){
					foreach ($articles as $article) { ?>
					<li class="item">
					<h3 class="titles fontYaHei">
						<a href="<?php echo site_url('article/'.$article->article_id); ?>" class="tit titjh" title="<?php echo $article->article_title; ?>" target="_blank"><?php echo mb_strlen($article-> article_title)>50?mb_substr($article -> article_title, 0,50)."……":$article -> article_title; ?></a>
                    </h3>
                    <div class="infos">
                    	<p class="info"><span class="views"><?php echo $article->views; ?></span><span class="sum"><?php echo $article->replys; ?></span><span class="gap">|</span><span class="time">
                    		最后回复：<?php if($article->last_reply){$last_reply = $article->last_reply; echo $last_reply->reply_date;} ?></span></p>
                    	<p>
                    		<span class="reply"><a href="<?php echo site_url('member/'.$article->member_id); ?>" data-bn-ipg="board-threadlist-user-1"><?php if($article->nickname){ echo $article->nickname; }else{ $article->email; } ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $article->article_date; ?></span>
                    	</p>
                    </div>
				</li>
				<?php	}
				} ?>
			</ul>
			<div class="clearfix">
				<div class="ui_page">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</div>
     <?php include APPPATH . 'views/footer.php';?>
  </body>
</html>