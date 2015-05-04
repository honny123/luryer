<!DOCTYPE html>
<html lang="en">
    <head>
        <title>内容管理/查看帖子</title> 
        <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap framework -->
    <link rel="stylesheet" href="<?=site_url('assets/libs/bootstrap/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?=site_url('assets/libs/bootstrap/css/bootstrap-responsive.min.css'); ?>" />
    <!-- gebo blue theme-->
    <link rel="stylesheet" href="<?=site_url('assets/admin/css/blue.css" id="link_theme'); ?>" />
    <!-- breadcrumbs-->
    <link rel="stylesheet" href="<?=site_url('assets/libs/jBreadcrumbs/css/BreadCrumb.css'); ?>" />
    <!-- tooltips-->
    <link rel="stylesheet" href="<?=site_url('assets/libs/qtip2/jquery.qtip.min.css'); ?>" />
    <!-- colorbox -->
    <link rel="stylesheet" href="<?=site_url('assets/libs/colorbox/colorbox.css'); ?>" />   
    <!-- notifications -->
    <link rel="stylesheet" href="<?=site_url('assets/libs/sticky/sticky.css'); ?>" />
    <!-- splashy icons -->
    <link rel="stylesheet" href="<?=site_url('assets/admin/img/splashy/splashy.css'); ?>" />
    <!-- main styles -->
    <link rel="stylesheet" href="<?=site_url('assets/admin/css/style.css'); ?>" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="<?=site_url('assets/admin/css/ie.css');?>" />
    <script src="<?=site_url('assets/admin/js/ie/html5.js');?>"></script>
    <script src="<?=site_url('assets/admin/js/ie/respond.min.js');?>"></script>
    <![endif]-->
    <script>
      //* hide all elements & show preloader
      document.documentElement.className += 'js';
    </script>     
    </head>
    <body>
    <div id="loading_layer" style="display:none"><img src="<?php echo site_url('assets/admin/img/ajax_loader.gif'); ?>" alt="" /></div>
    <div id="maincontainer" class="clearfix">
      <!-- header -->
            <?php include "header.php"?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                               <li><a><i class="icon-home"></i></a></li>
                <li><a href="<?php echo site_url('admin/article'); ?>">内容管理</a></li>                               
                                <li>查看帖子</li>
                            </ul>
                        </div>
                    </nav>
                     <div class="row-fluid">
            <div class="span12">
              <div class="row-fluid">
                <span class="span12">
                  <h3 class="heading span10"><?php echo $article -> article_title;?></h3>
                  <div class="span2">
                    <a href="<?php echo site_url('admin/article/add'); ?>">再添加一篇帖子</a>
                  </div>
                </span>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <div class="vcard">
                    <img class="thumbnail" width="100" height="100" src="<?php echo site_url('uploads/article/'.$article -> picture);?>" alt="<?php echo $article -> article_title;?>" />
                    <ul>
                      <li class="v-heading">
                        <a href="<?php echo site_url('article/detail/' . $article -> article_id);?>" target="_blank">点击在前台中查看</a>
                      </li>
                      <li>
                        <span class="item-key">帖子分类</span>
                        <div class="vcard-item"><?php echo $article -> category_title;?></div>
                      </li>
                      <li>
                        <span class="item-key">作者</span>
                        <div class="vcard-item"><?php echo $article -> author;?></div>
                      </li>
                      <li>
                        <span class="item-key">发表时间</span>
                        <div class="vcard-item"><?php echo $article -> article_date;?></div>
                      </li>
                      <li>
                        <span class="item-key">是否置顶</span>
                        <div class="vcard-item"><?php echo $article -> is_top;?></div>
                      </li>
                      <li>
                        <span class="item-key">内容</span>
                        <div class="vcard-item">
                          <?php echo $article -> article_content;?>&nbsp;
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>  
            </div>
          </div>                          
        </div>
            </div>
      <!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <?php include 'sidebar.php'?>;
    </div>
    <script src="<?php echo site_url('assets/admin/js/jquery.min.js'); ?>"></script>
    <!-- smart resize event -->
    <script src="<?php echo site_url('assets/admin/js/jquery.debouncedresize.min.js'); ?>"></script>
    <!-- hidden elements width/height -->
    <script src="<?php echo site_url('assets/admin/js/jquery.actual.min.js'); ?>"></script>
    <!-- js cookie plugin -->
    <script src="<?php echo site_url('assets/admin/js/jquery.cookie.min.js'); ?>"></script>
    <!-- main bootstrap js -->
    <script src="<?php echo site_url('assets/libs/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- bootstrap plugins -->
    <script src="<?php echo site_url('assets/admin/js/bootstrap.plugins.min.js'); ?>"></script>
    <!-- tooltips -->
    <script src="<?php echo site_url('assets/libs/qtip2/jquery.qtip.min.js'); ?>"></script>
    <!-- jBreadcrumbs -->
    <script src="<?php echo site_url('assets/libs/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js'); ?>"></script>
    <!-- sticky messages -->
        <script src="<?php echo site_url('assets/libs/sticky/sticky.min.js'); ?>"></script>
    <!-- fix for ios orientation change -->
    <script src="<?php echo site_url('assets/admin/js/ios-orientationchange-fix.js'); ?>"></script>
    <!-- scrollbar -->
    <script src="<?php echo site_url('assets/libs/antiscroll/antiscroll.js'); ?>"></script>
    <script src="<?php echo site_url('assets/libs/antiscroll/jquery-mousewheel.js'); ?>"></script>
    <!-- colorbox -->
    <script src="<?php echo site_url('assets/libs/colorbox/jquery.colorbox.min.js'); ?>"></script>
        <!-- common functions -->
    <script src="<?php echo site_url('assets/admin/js/gebo_common.js'); ?>"></script>
    <script>
      $(document).ready(function() {
        //* show all elements & remove preloader
        setTimeout('$("html").removeClass("js")', 1000);
      });
    </script>
  </body>
</html>