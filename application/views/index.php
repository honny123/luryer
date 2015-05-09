<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta property="qc:admins" content="361526403164521526375" />
    <title>裸游网</title>
    <link rel="shortcut icon" href="/favicon.ico" /> 
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/normalize.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/index.css'); ?>"/>
  </head>
  <body>
    <?php include APPPATH . 'views/header.php';?>
    <!--主图轮播start-->
    <div class="flexslider">
      <ul class="slides">
        <li>
    	    <img src="<?php echo site_url('assets/images/lunbo/dixiadaliegu.jpg') ?>" />
    		</li>
    		<li>
    	    <img src="<?php echo site_url('assets/images/lunbo/liugongdao.jpg') ?>" />
    		</li>
    		<li>
    	    <img src="<?php echo site_url('assets/images/lunbo/shanglaoshan.jpg') ?>" />
    		</li>
    		<li>
    	    <img src="<?php echo site_url('assets/images/lunbo/taishan.jpg') ?>" />
    		</li>
      </ul>
    </div>
    <!--主图轮播end-->
    <div id="content" class="content clearfix">
    	<div id="aside" class="aside">
			<div class="bbs_hot24 section">
				<h3 class="bbs_sidetit fontYaHei">24小时热帖</h3>
				<ol class="bbs_tiehotlist">
					<?php if(count($hot_article)>0){
						for ($i=0; $i < count($hot_article); $i++) { ?>
						<li class="<?php echo 'item'.($i+1); ?>"><p>
							<a href="<?php echo site_url('article/'.$hot_article[$i]->article_id); ?>" data-bn-ipg="bbs-hot24-1" title="<?php echo $hot_article[$i]->article_title; ?>" target="_blank"><?php echo mb_strlen($hot_article[$i] -> article_title)>30?mb_substr($hot_article[$i] -> article_title, 0,30)."……":$hot_article[$i] -> article_title; ?>
							</a></p></li>
					<?php	}
					} ?>
				</ol>
			</div>
    	</div>
    	<div id="main" class="main">
    		<?php foreach ($cates as $cate) { ?>
				<div class="mainBox mainBox_pic">
                <div class="mainTit clearfix">
                    <h2><?php echo $cate->category_title; ?></h2>
                </div>
                <div class="mainCon section mainCon_pic">
                    <ul class="preferential clearfix">
                    	<?php if(count($cate->articles)>0){
                    		foreach ($cate->articles as $article) { ?>
							<li class="">
	                        	<a class="pic" href="<?php echo site_url('article/'.$article->article_id); ?>" target="_blank" title="<?php echo $article->article_title; ?>">
	                        		<img width="240" height="160" src="<?php if($article->cover){ echo site_url('uploads/article/'.$article->cover); }else{ echo site_url('assets/images/default_article.jpg'); } ?>" style="display: inline;">
	                        		</a>
							    <div class="preferential_mes">
							        <p class="hotel_name"><a href="<?php echo site_url('article/'.$article->article_id); ?>" target="_blank" title="<?php echo $article->article_title; ?>"><?php echo mb_strlen($article->article_title)>8?mb_substr($article->article_title, 0,8)."……":$article->article_title; ?></a>
							        </p>
							        <div class="hotel_price"><b><?php echo $article->views; ?></b>次浏览</div>
							    </div>
							</li>
						<?php	} 
                    	}?>
					</ul>
                </div>
            </div>
			<?php } ?>
    	</div>
    </div>
    <div id="right_scroll" class="right_scroll" style="right: 50px; bottom: 10px;">
    	<a class="add_advise" title="用户反馈" href="<?php echo site_url('welcome/advice') ?>" target="_blank"></a>
    	<a id="gotop" class="gotop"></a>
    </div>
    <?php include APPPATH . 'views/footer.php';?>
    <script src="<?php echo site_url('assets/js/jquery.flexslide.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/index.js'); ?>"></script>
  </body>
</html>