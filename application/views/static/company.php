<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>裸游网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/normalize.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/static/about.css'); ?>"/>
  </head>
  <body>
    <?php include APPPATH . 'views/header.php';?>
    <div id="help" class="wrapbox clearfix">
    	<div class="content">
    		<div id="bd">
    			<?php include APPPATH . 'views/static/aside.php';?>
    			<div id="main" class="con">
    				<h1>杭州响马科技有限公司营业执照</h1>
    				<div class="box">
					<p><img src="<?php echo site_url('assets/images/yingyezhizhao.jpg'); ?>" alt="企业营业执照"></p> <br>
					<p><strong>如您要验证该营业执照合法性，请参照下列步骤进行：</strong></p>
					<p>1. 登陆<a href="http://www.hzaic.gov.cn/" target="_blank">杭州市工商行政管理局</a>网站</p>
					<p>2. 企业信用--- <a href="http://122.224.75.235:7082/wsdjpt/" target="_blank">企业基本信息</a>--输入“工商注册号”查询</p>
					</div>
    			</div>
    		</div>
    	</div>
    </div>
    <?php include APPPATH . 'views/footer.php';?>
  </body>
</html>