<?php $logged_user = $this->session->userdata('logged_user'); ?>
<!-- 头部start-->
    <!-- 登陆条start -->
    <div class="header_top">
      <div class="header_inner clearfix">
        <ul class="index_top_nav" id="user_login_info">
          <div class="login_menu clearfix">
          	<?php if($logged_user){ ?>
          		<li class='logged'>您好，</li>
	            <li class='logged username' style='cursor: pointer;'>
	            	<span><?php if($logged_user->nickname){echo $logged_user->nickname;}else{echo $logged_user->email;} ?></span>
	            	<ul>
	            		<li class="sub"><a href="<?php echo site_url('member/'.$logged_user->member_id) ?>">账户管理</a></li>
	            		<li class="sub"><a href="<?php echo site_url('logout'); ?>">退出</a></li>
	            	</ul>
	            </li>
	            <li class="poparrow logged"></li>
          	<?php }else{ ?>
          		<li class="logged"><a href="<?php echo site_url('login'); ?>">登录</a>|</li>
            	<li class="logged"><a href="<?php echo site_url('register'); ?>">注册</a></li>
          	<?php } ?>
          </div>
         </ul>
      </div>
    </div>
    <!-- 登陆条end -->
    <!-- 头部中start -->
    <div class="header_search">
      <div class="header_inner">
          <!-- logo start -->
          <div class="site_logo">
            <a href="<?php echo site_url('./') ?>" class="logo_a" title="裸游网">
              <!-- <img src="<?php echo site_url('assets/images/logo.png'); ?>" > -->
              <span class="logo_text">裸游网</span>
              <span class="logo_pic">luryer.com</span>
            </a>
          </div>
           <a href="<?php echo site_url('./') ?>" target="_blank" class="logo_a"></a>            
          <!-- logo end -->
          <!-- 预定城市start -->
                          <!-- 预定城市end -->
              <!-- 搜索框start -->
              <div class="tn_search_box ">
                  <div id="tnSearchBox" class="clearfix">
                    <form id="route_search" name="route_search" method="post" action="<?php echo site_url('welcome/search'); ?>" target="_self">
                      <div class="tn_s_select" id="typename">
                        <span style="">所有帖子</span>
                        <div id="spic" class="spic out"></div>
                        <div class="tn_search_bar">
                          <div class="type_s" style="display:none" data-id="0">所有帖子</div>
                          <div class="type_s" data-id='3' style="">AA结伴</div>
                          <div class="type_s" data-id='4' style="">裸游分享</div>
                          <div class="type_s" data-id='2' style="">裸游锦囊</div>
                       </div>
                      </div>
                   <p class="tn_s_input">
                     <input id="keyword-input" type="text" style="color: rgb(153, 153, 153);" autocomplete="off" name="keyword" />
                     <input type="hidden" id='cate-input' name="cate" value="0"/>
                   </p>
                   <p class="tn_s_button">
                     <button type="submit" id="searchSub"></button>
                   </p>
                 </form>
                 </div>
               </div>
              <!-- 搜索框end -->
              <!-- tuniu电话start -->
              <div class="site_contact">
              	<a href="<?php if($logged_user){ echo site_url('newarticle'); }else{ echo site_url('login'); } ?>" target="_blank">我要发帖</a>
               </div>                <!-- tuniu电话end -->
          </div>
      </div>
     <!-- 头部中end -->
     <!-- 横向导航菜单start -->
    <div class="header_nav index clearfix">
      <div class="index_nav_menu">
        <div class="menu_panel">
          <div class="inner clearfix">
            <ul class="menu_list clearfix">
              <li class="menu_first" data-id='1'>
                <a class="cur_nav" href="<?php echo site_url('./');?>" title="首页">首页</a>
              </li>
              <li data-id='2'>
                 <a href="javascript:;">裸游论坛</a>
              </li>
              <li data-id='3'>
                 <a href="<?php echo site_url('article/cate/2'); ?>">裸游锦囊</a>
              </li>
            </ul>
          </div>
          <div class="subMenu_panel subMenu_panel_2">
                  <i class="header_icon icon_arrowUp2"></i>
                  <ul>
                    <li class="">
                      <a href="<?php echo site_url('article/cate/3'); ?>">AA结伴</a>
                    </li>
                    <li class="">
                      <a href="<?php echo site_url('article/cate/4'); ?>">裸游分享</a>
                    </li>
                  </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- 横向导航菜单end -->
    <!-- 头部end-->
    <script src="<?php echo site_url('assets/js/jquery-1.11.2.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/header.js'); ?>"></script>