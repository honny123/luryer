<?php
$logged_user = $this -> session -> userdata('logged_user');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>控制面板 - 欢迎：<?php echo $logged_user -> username; ?></title>
    	<?php include "meta.php"?>
    </head>
    <body>
		<div id="loading_layer" style="display:none"><img src="<?php echo site_url('assets/admin/img/ajax_loader.gif');?>" alt="" /></div>
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <?php include "header.php"?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    
                        
                   
                </div>
            </div>
			<!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <?php include 'sidebar.php'?>;
            <?php include 'footer.php'?>;
		</div>
	</body>
</html>