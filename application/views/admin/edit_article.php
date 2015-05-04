<!DOCTYPE html>
<html lang="en">
    <head>
        <title>内容管理/修改帖子</title> 
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
                                <li>修改帖子</li>
                            </ul>
                        </div>
                    </nav>
                  <div class="row-fluid">
            <div class="span12">
              <h3 class="heading">修改帖子</h3>
              <form class="form-add-article" action="<?=site_url('admin/article/post');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="formSep">
                  <div class="row-fluid">
                    <div class="span8">
                      <div class="row-fluid">
                        <div class="span8">
                          <label>标题 <span class="f_req">*</span></label>
                          <input type="text" name="title" class="span12" value="<?php echo $article->article_title;?>"/>
                          
                        </div>
                        <div class="span2">
                          <label>分类 <span class="f_req">*</span></label>
                          <select name="type_id" class="span12">
                            <?php foreach($cates as $cate):?>
                            <option value="<?php echo $cate -> category_id;?>" <?php echo $article->category_id==$cate -> category_id?"selected":""?>><?php echo $cate -> category_title;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                        <div class="span2">
                        <label>是否置顶</label>
                        <select name="is_top" class="span12">
                          <?php if($article->is_top=="置顶"){ ?>
                            <option value="1" selected>置顶</option>
                            <option value="0" >不置顶</option>
                          <?php }else{ ?>
                            <option value="1">置顶</option>
                           <option value="0" selected>不置顶</option>
                       <?php   } ?>
                        </select>
                      </div>
                      </div>
                    </div>
                    <div class="span4">
                      <div class="row-fluid">
                        <div class="span12">
                          <label>主图 </label>
                          <div data-fileupload="image" class="fileupload fileupload-exists">
                            <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""></div>
                            <div style="max-width: 200px; max-height: 150px; line-height: 0px;" class="fileupload-preview fileupload-exists thumbnail">
                              <img src="<?php echo site_url('uploads/article/'.$article -> picture);?>" style="max-height: 150px;">
                            </div>
                            <div>
                              <span class="btn btn-file">
                                <span class="fileupload-new">选择</span>
                                <span class="fileupload-exists">修改</span>
                                <input type="file" id="picture" name="picture"">
                              </span>
                              <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">删除</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row-fluid">
                    <div class="span12">
                      <label>内容 </label>
                      <textarea type="text" name="content" class="span12"><?php echo $article -> article_content;?></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <button class="btn btn-inverse" type="submit">保存</button>
                  <button class="btn" type="reset">取消</button>
                  <input type="hidden" name="articleId" value="<?php echo $article -> article_id;?>"/>
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