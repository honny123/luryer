<?php
	$path = $this -> uri -> segment(1);
?>
<div id="sidebar">
	<div class="left-nav">
		<ul class="pdt">
			<li class="<?php echo $path == 'aboutus'?'cur':''; ?>"><a href="<?php echo site_url('./aboutus'); ?>">关于我们</a></li>
			<li class="<?php echo $path == 'contactus'?'cur':''; ?>"><a href="<?php echo site_url('./contactus'); ?>">联系我们</a></li>
			<li class="<?php echo $path == 'advertising'?'cur':''; ?>"><a href="<?php echo site_url('./advertising'); ?>">广告服务</a></li>
			<li class="<?php echo $path == 'privacy'?'cur':''; ?>"><a href="<?php echo site_url('./privacy'); ?>">隐私保护</a></li>
			<li class="<?php echo $path == 'duty'?'cur':''; ?>"><a href="<?php echo site_url('./duty'); ?>">免责声明</a></li>
			<li class="<?php echo $path == 'agreement'?'cur':''; ?>"><a href="<?php echo site_url('./agreement'); ?>">用户协议</a></li>
			<li class="<?php echo $path == 'sitemap'?'cur':''; ?>"><a href="<?php echo site_url('./sitemap'); ?>">网站地图</a></li>
			<!-- <li><a href="http://www.tuniu.com/corp/links.shtml">友情链接</a></li> -->	
			<li class="<?php echo $path == 'rules'?'cur':''; ?>"><a href="<?php echo site_url('./rules'); ?>">论坛规则</a></li>
			<li class="<?php echo $path == 'company'?'cur':''; ?>"><a href="<?php echo site_url('./company'); ?>">营业执照</a></li>	
			<!-- <li><a href="http://www.tuniu.com/corp/intellectual_property.shtml">知识产权声明</a></li>
		    <li><a href="http://www.tuniu.com/corp/zizhi.shtml">旅游度假资质</a></li>
		    <li><a href="http://www.tuniu.com/corp/slogan.shtml">要旅游，找途牛</a></li> -->
		</ul>
	</div>
</div>