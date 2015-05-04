<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>裸游网_发表话题</title>
		<base href="<?php echo site_url(); ?>"/>
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/newarticle.css"/>
		<link rel="stylesheet" type="text/css" href="assets/libs/ueditor1_4_3-utf8-php/themes/default/css/ueditor.css">
	</head>
	<body>
	<?php include APPPATH . 'views/header.php';?>
		<div class="qyer_head_crumbg">
			<div class="qyer_head_crumb">
			<span class="text"><a href="<?php echo site_url('./'); ?>">裸游</a></span>
			<span class="space">&gt;</span>
			<span class="text">发新帖</span></div>
		</div>
		<form class="card_form clearfix" action="welcome/card_submit" method="post">
			<div class="send_title header_inner">
				<span>发新话题</span>
				<input name="title" id="send-title-input" type="text"autocomplete="off" placeholder="标题不能超过40个汉字"/>
				<div class="send_droplist">
					<select class="send_sort"  name="sort" value="">
						<option selected="selected" value="分类">分类</option>
						<?php foreach ($cates as $cate){?>
						<option value="<?php echo $cate->category_id;?>"><?php echo $cate->category_title;?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="send_content header_inner">
				<!-- <div id="newscontent">
				</div>  -->

				<!-- 加载编辑器的容器 -->
				<input class="card_sort" type="hidden" value="">
				<script id="newscontent" name="content" type="text/plain">
					
				</script>
				<input class="send_content_input" name="content" type="hidden" value="">
				<div class="send_dispose">
					<input type="hidden" name="memberId" value="<?php if($logged_user){echo $logged_user->member_id;} ?>" />
					<a class="send_submit" href="javascript:;">发表</a>
					<a class="send_cancel" href="javascript:;">取消</a>
				</div>

				<div class="up_cover">
					<iframe id="upiframe" scrolling="no" src="welcome/up_cover" frameborder="0" height="36px" width="100%"></iframe>
					<div class="up_pre">
						<span>预览区域</span>
						<iframe id="ifra" scrolling="no" src="welcome/pre_picture" frameborder="0"></iframe>			
					</div>
				</div>
			</div>
		</form>
		<div class="metta_box"></div>
		<div class="send_box">
			<span class="send_box_title">离开此页</span>
			<span class="send_box_content">您确定要离开此页吗？离开会丢失已经编写的帖子内容</span>
			<a class="send_box_submit" href="javascript:;">继续发帖</a>
			<a class="send_box_cancel" href="<?php echo site_url('./'); ?>">离开</a>
		</div>
		<div class="metta_box1"></div>
		<div class="send_box_error">
			<span class="send_box_error_title">提示信息</span>
			<span class="send_box_promit"></span>
			<input type="button" class="send_box_error_submit" value="&nbsp;确定&nbsp;">
		</div>
		<?php include APPPATH . 'views/footer.php';?>
		<script type="text/javascript" charset="utf-8" src="assets/libs/ueditor1_4_3-utf8-php/ueditor.config.js"></script>
		<script type="text/javascript" charset="utf-8" src="assets/libs/ueditor1_4_3-utf8-php/ueditor.all.js"></script>
		<script src="assets/js/newarticle.js"></script>
		<script type="text/javascript">
			var editor = UE.getEditor('newscontent');

			// var editor=new baidu.editor.ui.Editor();
			// editor.render('newscontent');
			$('#upiframe').load(function() {
				$('#ifra').attr('src', $('#ifra').attr('src'));
			});
		</script>

	</body>
</html>