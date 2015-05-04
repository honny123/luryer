<!DOCTYPE html>
<html lang="en">
    <head>
        <title>人员管理/修改信息</title> 
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
    <!-- kindeditor styles -->
    <link rel="stylesheet" href="<?=site_url('assets/libs/kindeditor-4.1.7/themes/default/default.css');?>" />
    <link rel="stylesheet" href="<?=site_url('assets/libs/kindeditor-4.1.7/plugins/code/prettify.css');?>" />
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
                <li><a href="<?php echo site_url('admin/user'); ?>">管路员管理</a></li>                               
                                <li>修改管理员</li>
                            </ul>
                        </div>
                    </nav>
                  <div class="row-fluid">
            <div class="span12">
              <h3 class="heading">修改管理员</h3>
              <form class="form-add-user" action="<?=site_url('admin/admin/post');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="user-form">
                <div class="formSep">
                  <div class="row-fluid">
                    <div class="col-md-4 col-md-offset-4">

                          <div class="form-group" style="padding-left: 150px;">
                            <label for="exampleInputEmail1">用户名</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>"/>
                          </div>
                          <div class="form-group" style="padding-left: 150px;">
                            <label for="exampleInputPassword1">密码</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $user->password; ?>"/>
                          </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions" style="padding-left: 150px;">
                  <button class="btn btn-inverse" type="submit">保存</button>
                  <button class="btn" type="reset">取消</button>
                  <input type="hidden" name="userId" value="<?php echo $user -> admin_id;?>"/>
                </div>

              </form>
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
    <!-- validation -->
        <script src="<?php echo site_url('assets/libs/validation/jquery.validate.min.js'); ?>"></script>
        <script src="<?=site_url('assets/libs/validation/localization/messages_cn.js'); ?>"></script>
    <!-- 页面级js -->
    <script src="<?php echo site_url('assets/admin/js/add_article.js'); ?>"></script>
    <!-- kindeditor -->
        <script src="<?=site_url('assets/libs/kindeditor-4.1.7/kindeditor-min.js'); ?>"></script>
      <script src="<?=site_url('assets/libs/kindeditor-4.1.7/lang/zh_CN.js'); ?>"></script>
    <script>
      $(document).ready(function() {
        //* show all elements & remove preloader
        setTimeout('$("html").removeClass("js")', 1000);
        //kindeditor
        
        KindEditor.ready(function(K) {
          var editor1 = K.create('textarea[name="content"]', {
            height: '400px',
            themeType : 'default',
            cssPath : '<?=site_url("assets/libs/kindeditor-4.1.7/plugins/code/prettify.css");?>',
            uploadJson : '<?=site_url("assets/libs/kindeditor-4.1.7/php/upload_json.php");?>',
            fileManagerJson : '<?=site_url("assets/libs/kindeditor-4.1.7/php/file_manager_json.php");?>',
            allowFileManager : true,
            afterCreate : function() {
              var self = this;
              K.ctrl(document, 13, function() {
                self.sync();
                K('form[name=article-form]')[0].submit();
              });
              K.ctrl(self.edit.doc, 13, function() {
                self.sync();
                K('form[name=article-form]')[0].submit();
              });
            }
          });
        });
      });
    </script>
  </body>
</html>