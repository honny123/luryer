<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>裸游网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/normalize.css'); ?>"/>
    <link rel="stylesheet" typpe="text/css" href="<?php echo site_url('assets/css/imgareaselect-default.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/uploadify.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/datepicker.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/select2.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/member.css'); ?>"/>
  </head>
  <body>
  	<div class="metta_box1"></div>
  	<div class="send_box_error">
		<span class="send_box_error_title">提示信息</span>
		<span class="send_box_promit">确定要删除此贴？</span>
		<input type="button" class="send_box_error_cancel" value="&nbsp;取消&nbsp;">
		<input type="button" class="send_box_error_submit" data-id='' value="&nbsp;确定&nbsp;">
	</div>
    <?php include APPPATH . 'views/header.php';?>
    <div id="wrapper">
    	<div class="u_headbar">
    	<div class="infos">
    	<!--用户图像 -->
    	<div class="face"><a href="<?php echo site_url('member/'.$member->member_id) ?>">
    		<img src="<?php if($member->thumb_photo != ''){ echo site_url('uploads/member/'.$member->thumb_photo); }else{echo site_url('uploads/member/default_photo.png');} ?>"></a>
    		</div>
        <!--用户名字 -->
    	<h3 class="name">
            <strong data-bn-ipg="usercenter-username" class="fontYaHei"><?php if($member->nickname != ''){echo $member->nickname;}else{echo $member->email;} ?></strong>                       
        </h3>
        <!--用户信息 -->
        <div class="text fontSong">
        	等级：<a data-bn-ipg="usercenter-grade" href="#" class="fb cBlue pr20">新进弟子</a> 
        	裸币：<a data-bn-ipg="usercenter-wealth" href="#" class="fb cBlue pr20">0</a>
       	</div>       
        </div>
    </div>
    <div class="u_set_cnt clearfix">
    	<div class="u_set_menu">
    		<ul class="fontSong">
		    	<li data-id="profile" class="current"><a href="javascript:;" class="data">个人资料</a></li>
		    	<li data-id="tiezi"><a href="javascript:;" class="article">发的帖子（<?php echo count($article); ?>）</a></li>
		    	<li data-id="userphoto"><a href="javascript:;" class="photo">修改头像</a></li>
		    </ul>
    	</div>
    	<div class="u_set_main profile">
    		<div class="u_set_title">
        	<strong class="text fontYaHei">个人资料</strong>
	            <a data-id="<?php echo $logged_user->member_id; ?>" href="javascript:;" class="ui_buttonB edit_link">编辑资料</a>
            </div>
            <div class="u_set_data">
	        	<ul class="clearfix fontArial">
	            	<li>
	                	<div class="left">用户名称：</div>
	                    <div class="right"><?php if($member->nickname != ''){echo $member->nickname;}else{echo $member->email.'<span class="email pl10 cLightgray">( 未设置昵称，默认使用邮箱地址 )</span>';} ?></div>
	                </li>
	                            	<li>
	                    <div class="left">注册邮箱：</div>
	                	                    <div class="right"><?php echo $member->email; ?><span class="email pl10 cLightgray">已验证 <!-- <a data-bn-ipg="usercenter-setprofile-email" href="#">修改邮箱</a> --></span></div>
	                                    </li>
	                            	<li>
	                	<div class="left">性　　别：</div>
	                	 <div class="right"><?php if($member->gender == 1){echo '男';}else if($member->gender == 2){echo '女';}else{echo '';} ?></div>           		            		                    
	                </li>
	                        	<li>
	                	<div class="left">生　　日：</div>
	                    <div class="right"><?php echo $member->birth; ?></div>
	                </li>
	                <li data-bn-ipg="usercenter-setprofile-living">
	                	<div class="left">现居住地：</div>
	                    <div class="right"><?php echo $member->homeText; ?></div>
	                </li>
	            	<!-- <li data-bn-ipg="usercenter-setprofile-lived">
	                	<div class="left">曾居住地：</div>
	                    <div class="right"></div>
	                </li> -->
	            	<li>
	                	<div class="left">个性签名：</div>
	                    <div class="right"><?php echo $member->signature;?></div>
	                </li>
	            	<!-- <li>
	                	<div class="left">个人网站：</div>
	                    <div class="right"></div>
	                </li> -->
	                
	            	<li>
	                	<div class="left">旅行偏好：</div>
	                    <div class="right">
	                    	<div class="hobby_list"><?php echo $member->preference;?></div>
	                    </div>
	                </li>
	            </ul>
	        </div>
    	</div>
    	<div class="u_set_main tiezi">
    		<div class="u_set_title">
        	<strong class="text fontYaHei">发的帖子</strong>
            </div>
            <div class="u_set_data">
	        	<ul class="clearfix fontArial">
	        		<?php if($article){foreach($article as $row){ ?>
	        			<li>
	                	<a href="<?php echo site_url('article/'.$row->article_id); ?>" class="clearfix" style="display: block;">
	                		<div class="left"><?php echo mb_strlen($row -> article_title)>30?mb_substr($row -> article_title, 0,30)."……":$row -> article_title; ?></div>
	                    	<div class="article-right"><?php echo $row->views ?>次浏览 | <?php echo $row->replys; ?>个回复</div>
	                    	<div title="删除" class="delete" data-id='<?php echo $row->article_id; ?>'></div>
	                	</a>
	                </li>
	        		<?php }}else{ ?>
	        			<li style="cursor: default;">您还没有发过帖子，赶紧去<a href="<?php echo site_url('article/edit') ?>" style="color:#f80;text-decoration:underline;">写一篇</a>吧~</li>
	        		<?php } ?>
	            </ul>
	        </div>
    	</div>
    	<div class="u_set_main userphoto">
    		<div class="u_set_title">
        	<strong class="text fontYaHei">修改头像</strong>
            </div>
            <div class="u_set_face">
	        	<div class="default">
	            	<div class="face"><img src="<?php if($member->thumb_photo != ''){ echo site_url('uploads/member/'.$member->thumb_photo); }else{echo site_url('uploads/member/default_photo.png');} ?>" width="120" height="120" alt=""></div>
	                <div class="select clearfix">
	                	<input type='file' id="uploadify" name='Filedata' multiple="true"/>
	                    <p class="fl fontTahoma">支持jpg、png、gif、jpeg、bmp，图片大小5M以内</p>
	                </div>
	                <div class="container" style="margin-top: 30px;position: relative;">
	                	<div id="preview-pane">
	                		<div class="preview-container">
	                		</div>
	                	</div>
	                </div>
	                <div class="button clearfix">
					    <input type="hidden" value="0" size="4" id="x" name="x">
					    <input type="hidden" value="0" size="4" id="y" name="y">
					    <input type="hidden" value="0" size="4" id="w" name="w">
					    <input type="hidden" value="0" size="4" id="h" name="h">
						<a href="javascript:void(0);" class="js_create_avatar ui_buttonB fl mr10">确定</a>
						<a href="javascript:void(0);" id='cancel_photo' class="ui_button_cancel fl">取消</a>
		            </div>
	            </div>
	        </div>
    	</div>
    	<div class="u_set_main edituser">
    		<div class="u_set_title">
	        	<strong class="text fontYaHei">修改个人资料</strong>
	        </div>
	        <div class="u_set_data_edit">
	        	<form method="post" name="m_edit" id='editform'>
	        		<ul class="clearfix fontArial">
	        			<li class="list">
		                	<div class="left">用户名称：</div>
		                    <div class="right">
		                    	<input type="text" class="ui2_input" id="username" value="<?php echo $member->nickname; ?>" placeholder='中文、英文、数字、下划线、4-16个字符' name="username" autocomplete="off">
		                    	<div class="btm clearfix">
		                            <div class="ui2_error_layer" style="top:-1px;">
		                                <p class="ui2_error_layer_arrow"></p>
		                                <p class="ui2_error_layer_arrow2"></p>
		                                <p class="ui2_error_layer_text">用户名只 能用 中文、英文、数字、下划线、4-16个字符</p>
		                            </div>
		                        </div>
		                    </div>
		                </li>
		                <li class="list no_p">
                			<div class="left">注册邮箱：</div>
    	                    <div class="right"><?php echo $member->email; ?><span class="email pl10 cLightgray">已验证 <!-- | <a href="http://www.qyer.com/u/editmail">修改邮箱</a> --></span></div>
                        </li>
                        <li class="list no_p">
		                	<div class="left">性　　别：</div>
		                    <div class="right">
		                    	<?php if($member->gender==1){ ?>
		                    		<label class="gender"><input type="radio" name="gender" checked="checked" class="edit_radio" value="1">男</label>
		                    	<label class="gender"><input type="radio" name="gender" class="edit_radio" value="2">女</label>
		                    	<label class="gender"><input type="radio" name="gender" class="edit_radio" value="0">未知</label>
		                    	<?php }else if($member->gender==2){ ?>
		                    		<label class="gender"><input type="radio" name="gender" class="edit_radio" value="1">男</label>
		                    	<label class="gender"><input type="radio" name="gender" checked="checked" class="edit_radio" value="2">女</label>
		                    	<label class="gender"><input type="radio" name="gender" class="edit_radio" value="0">未知</label>
		                    	<?php }else{ ?>
		                    		<label class="gender"><input type="radio" name="gender" class="edit_radio" value="1">男</label>
		                    	<label class="gender"><input type="radio" name="gender" class="edit_radio" value="2">女</label>
		                    	<label class="gender"><input type="radio" name="gender" checked="checked" class="edit_radio" value="0">未知</label>
		                    	<?php } ?>
		                    	
		                    </div>
		                </li>
		                <li class="list">
		                	<div class="left">生　　日：</div>
		                    <div class="right">
		                      	<input type="text" class="ui2_input" id="userbirth" name='birth' value='<?php echo $member->birth; ?>' autocomplete="off">
		                    </div>
		                </li>
		                <li class="list">
		                	<div class="left">现居住地：</div>
		                    <div class="right">
		                    	<select id="loc_province" style="width:120px;" name="prov"></select>
  								<select id="loc_city" style="width:120px; margin-left: 10px" name="city"> </select>
  								<select id="loc_town" style="width:125px;margin-left: 10px" name="town"></select>
  								<input type="hidden" value="<?php echo $member->homeText; ?>" id='homeText' />
  								<input type="hidden" value="<?php echo $member->nowHome; ?>" id='homeCode' />
		                    </div>
		                </li>
		                <li class="list">
		                	<div class="left">个性签名：</div>
		                    <div class="right">
		                    	<textarea class="ui2_textarea" name="bio" id="input_bio" style="height: 24px;" placeholder='最多不超过70字'><?php echo $member->signature; ?></textarea>
		                        <div class="btm clearfix">
		                            <div class="ui2_error_layer">
		                                <p class="ui2_error_layer_arrow"></p>
		                                <p class="ui2_error_layer_arrow2"></p>
		                                <p class="ui2_error_layer_text">最多不超过70字</p>
		                            </div>
		                        </div>
		                                            </div>
		                </li>
		                <li class="list">
                	<div class="left">个人网站： </div>
                    <div class="right">
                    	<input type="text" class="ui2_input" name="site" value="<?php echo $member->website; ?>" id="website">
                            <div class="btm clearfix">
                            <div class="ui2_error_layer" id="_jssite_error" style="top:-1px;">
                                <p class="ui2_error_layer_arrow"></p>
                                <p class="ui2_error_layer_arrow2"></p>
                                <p class="ui2_error_layer_text">您输入的个人网站有误，请以http://开头</p>
                            </div>
                        </div>
                                            </div>
                </li>
                <li class="list">
                	<div class="left">旅行偏好：</div>
                    <div class="right">
                    	<textarea class="ui2_textarea" name="preference" id="input_preference" style="height: 24px;" placeholder='最多不超过70字'><?php echo $member->preference; ?></textarea>
                         <input type="hidden" name="memberId" value="<?php echo $logged_user->member_id; ?>" />
                         <div class="btm clearfix">
                            <div class="ui2_error_layer">
                                <p class="ui2_error_layer_arrow"></p>
                                <p class="ui2_error_layer_arrow2"></p>
                                <p class="ui2_error_layer_text">最多不超过70字</p>
                            </div>
                        </div>
                                            </div>
                </li>
	        		</ul>
	        	</form>
	        	<div class="button clearfix">
	                <input type="button" id="btnsub" class="ui_buttonB fl mr10" value="保存">
	                <input type="button" id='cancel_edit' class="ui_button_cancel fl" value="取消">
	            </div>
	        </div>
    	</div>
    </div>
    </div>
     <?php include APPPATH . 'views/footer.php';?>
     <script src="<?php echo site_url('assets/js/jquery.uploadify.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/jquery.imgareaselect.pack.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/datepicker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/area.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/location.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/select2.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/select2_locale_zh-CN.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/member.js'); ?>"></script>
  </body>
</html>