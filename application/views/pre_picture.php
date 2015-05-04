<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
	<title>图片预览</title>
	<base href="<?php echo site_url();?>" >
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/send_card.css"/> -->	<!-- <link rel="stylesheet" type="text/css" href="assets/front/css/common.css"> -->
	<meta charset="UTF-8">
</head>
<body style="margin: 0;height: 100%;">
	<div id="up-img" style="height:100%;">
		<img src="" style="border: 0;width: 100%;height: 100%;">
	</div>
	<?php 
		$upload_pic=$this->session->userdata('upload_pic');
		if($upload_pic){
	?>
	<input id="fileName" type="hidden" value="<?php echo 'uploads/article/'.$upload_pic['file_name'];?>">
	<?php
		}else{ ?>
	<input id="fileName" type="hidden" value="<?php echo 'assets/images/default_article.jpg'; ?>">	
	<?php	}
	?>
	<script src="assets/js/jquery-1.11.2.min.js"></script>
	<script>
			$(function(){
				$('#up-img img').attr('src',$('#fileName').val());
			});
	</script>
</body>
</html>