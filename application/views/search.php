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
	<div class='lay_wrap clearfix' style="margin-top: 30px;">
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
                    		<?php if($article->category_title){echo '<a href="javascript:;" class="tag">'.$article->category_title.'</a>';} ?>
                    		<span class="reply"><a href="<?php echo site_url('member/'.$article->member_id); ?>" data-bn-ipg="board-threadlist-user-1"><?php if($article->nickname){ echo $article->nickname; }else{ $article->email; } ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $article->article_date; ?></span>
                    	</p>
                    </div>
				</li>
				<?php	}
				}else{ ?>
					<h1 style="margin-top: 30px;text-align: center;font-family: 微软雅黑;font-size: 18px;">抱歉，未能搜索到您要的结果！</h1>
				<?php } ?>
			</ul>
		</div>
	</div>
     <?php include APPPATH . 'views/footer.php';?>
  </body>
</html>