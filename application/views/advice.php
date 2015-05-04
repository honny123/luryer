<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>裸游网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/normalize.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/advice.css'); ?>"/>
  </head>
  <body>
    <?php include APPPATH . 'views/header.php';?>
    <div id='wrap' class="wrap wrap_hellp">
    	<div id="container" class="container clearfix">
    		<h1 class="top_tit">有了您的建议，裸游网才能更好</h1>
    		<div id="main" class="main">
    			<div class="g_box">
    				<form id="postOpinion" method="post">
    					<ul class="opinion">
				          <li class="clearfix">
				            <label>建议描述：</label>
				            <div class="opinion_con">
				              <textarea id="comment" class="opinion_input" name="comment" minlength="20" maxlength="1000"></textarea>
				              <p class="num"><span id="commentTip" class="error"></span>您还可以输入<span id="limitNum" class="limit_num">1000</span>字</p>
				            </div>
				          </li>
				          <li class="clearfix">
				            <label>联系邮箱：</label>
				            <div class="opinion_con">
				              <input id="opinionEmail" name="opinionEmail" class="opinion_input opinion_js" type="text" placeholder="请留下联系方式，方便您及时收到我们的反馈">
				              <span id="opinionEmailTip" class="error">您输入的邮箱格式不对，格式如：XXXX@XXXX.com</span>
				            </div>
				          </li>
				          <li class="clearfix">
				            <label>联系手机：</label>
				            <div class="opinion_con">
				              <input id="opinionTel" name="opinionTel" class="opinion_input" type="text">
				              <span id="opinionTelTip" class="error">请填写正确的手机号码，以便及时与您联系</span>
				            </div>
				          </li>
				        </ul>
				        <div class="submit_btn">
				        	<input id="opinionBtn" type="button" class="btn" value="提交">
				        	<input type="hidden" value="<?php if($logged_user){ echo $logged_user->member_id;}else{echo 0;} ?>" />
				        </div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
     <?php include APPPATH . 'views/footer.php';?>
    <script src="<?php echo site_url('assets/js/advice.js'); ?>"></script>
  </body>
</html>