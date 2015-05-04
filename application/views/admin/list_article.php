<!DOCTYPE html>
<html lang="en">
    <head>
        <title>控制面板/内容管理</title>
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
                            <div style="overflow:hidden; position:relative; width: 967px;"><div><ul style="width: 5000px;">
                                <li class="first">
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li class="last" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">
                                    内容管理
                                </li>
                            </ul></div></div>
                        </div>
                    </nav>
                     <div class="row-fluid">
            <div class="span12">
              <h3 class="heading">内容管理</h3>
              <div class="btn-group sepH_b">
                <button data-toggle="dropdown" class="btn dropdown-toggle">操作 <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#" class="delete_rows_simple" data-tableid="smpl_tbl"><i class="icon-trash"></i> 删除</a></li>
                  <li><a href="article/add" class="add-article"><i class="icon-plus"></i> 添加新帖</a></li>
                </ul>
              </div>
              <table class="table table-bordered table-striped" id="smpl_tbl">
                <thead>
                  <tr>
                    <th class="table_checkbox"><input type="checkbox" name="select_rows" class="select_rows" data-tableid="smpl_tbl"></th>
                    <th>帖子编号</th>
                    <th>帖子标题</th>
                    <th>作者</th>
                    <th>分类</th>
                    <th>添加时间</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($articles as $article) {?>
                    <tr>
                      <td><input type="checkbox" name="row_sel" class="select_row" value="<?php echo $article->article_id; ?>" /></td>
                      <td><?php echo $article->article_id; ?></td>
                      <td><a href="../admin/article/view/<?php echo $article->article_id; ?>"><?php echo $article->article_title; ?></a></td>
                      <td><?php echo $article->author; ?></td>
                      <td><?php echo $article->category_title; ?></td>
                      <td><?php echo $article->article_date; ?></td>
                      <td><a href="../admin/article/edit/<?php echo $article->article_id; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
                      <a href="../admin/article/view/<?php echo $article->article_id; ?>" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>
                      <a href="javascript:;" class="delete_row" data-aid="<?php echo $article->article_id; ?>"><i class="icon-trash"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div> 
          <!-- hide elements (for later use) -->
          <div class="hide">
            <!-- confirmation box -->
            <div id="confirm_dialog" class="cbox_content">
              <div class="sepH_c tac"><strong>Are you sure you want to delete this row(s)?</strong></div>
              <div class="tac">
                <a href="#" class="btn btn-gebo confirm_yes">Yes</a>
                <a href="#" class="btn confirm_no">No</a>
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
    <!-- datatable -->
        <script src="<?php echo site_url('assets/libs/datatables/jquery.dataTables.min.js'); ?>"></script>
    <!-- 页面级css -->
    <script src="<?php echo site_url('assets/admin/js/list_article.js'); ?>"></script>
    <script>
      $(document).ready(function() {
        //* show all elements & remove preloader
        setTimeout('$("html").removeClass("js")', 1000);
      });
    </script>
  </body>
</html>