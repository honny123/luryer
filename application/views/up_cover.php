<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Upload Form</title>
	<base href="<?php echo site_url(); ?>" />
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/send_card.css"/> -->
	<meta charset="UTF-8">
	<style>
		#upload-form a{
			width: 100px;
			height:28px;
			line-height:28px;
			padding-left:15px;
			display:block;
			color:#fff;
			font-size:16px;
			background: #1995dd;
			border-radius: 3px;
			position:relative;
			text-decoration:none;
			margin-left:-5px;
		}
		#upload-form input{
			position: absolute;
			left: 0;
			top: 0;
			width: 100px;
		    height: 28px;
		    margin: 0;
			padding: 0;
			opacity: 0;
		}
	</style>
</head>
<body>
	<form id="upload-form" action="welcome/do_upload" method="post" enctype="multipart/form-data">
		<a href="javascript:;">+&nbsp;添加封面<input type="file" id="btnUpload" name="userfile"></a> 	
	</form>
	    <script src="assets/js/jquery-1.11.2.min.js"></script>
	<script>
		$('#btnUpload').change(function(){
			$('#upload-form').submit();
		});
	</script>
</body>
</html>