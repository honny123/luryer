<?php
$logged_user = $this -> session -> userdata('logged_user');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>人员管理界面</title>
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
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <div style="overflow:hidden; position:relative; width: 967px;"><div><ul style="width: 5000px;">
                                <li class="first">
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li class="last" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">
                                      管理员管理
                                </li>
                            </ul></div></div>
                        </div>
                    </nav>
                     <div class="row-fluid">
            <div class="span12">
              <h3 class="heading">管理员管理</h3>
              <div class="btn-group sepH_b">
                <button data-toggle="dropdown" class="btn dropdown-toggle">操作 <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#" class="delete_rows_simple" data-tableid="smpl_tbl"><i class="icon-trash"></i> 删除</a></li>
                  <li><a href="admin/add" class="add-article"><i class="icon-plus"></i> 添加管理员</a></li>
                </ul>
              </div>
              <table class="table table-bordered table-striped" id="smpl_tbl">
                <thead>
                  <tr>
                    <th class="table_checkbox"><input type="checkbox" name="select_rows" class="select_rows" data-tableid="smpl_tbl"></th>
                    <th>管理员编号</th>
                    <th>管理员名称</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($users as $row): ?>
                  <tr>
                    <td><input type="checkbox" name="row_sel" class="select_row" value="<?php echo $row -> admin_id; ?>"></td>
                    <td><?php echo $row -> admin_id; ?></td>
                    <td><?php echo $row -> username; ?></td>
                    <!--<td><a href="<?php echo site_url('admin/article/');?>" class="edit-row" data-cid="<?php echo $article -> article_id; ?>"><i class="icon-pencil"></i></a></td>-->
                    <td><a href="../admin/admin/edit/<?php echo $row->admin_id ; ?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
                      <a href="../admin/admin/view/<?php echo $row -> admin_id;?>" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>
                      <a href="javascript:;" class="delete_row" data-aid="<?php echo $row -> admin_id; ?>"><i class="icon-trash"></i></a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div> 
          <!-- hide elements (for later use) -->
          <div class="hide">
            <!-- confirmation box -->
            <div id="confirm_dialog" class="cbox_content">
              <div class="sepH_c tac"><strong>Are you sure you want to delete this row(s)?</strong></div>
              <div class="tac">
                <a href="#" class="btn btn-gebo confirm_yes">Yes</a>
                <a href="#" class="btn confirm_no">No</a>
              </div>
            </div>
          </div>  
                </div>
                  </div>
            </div>
      <!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <?php include 'sidebar.php'?>;
            <?php include 'footer.php'?>;
    
    <script src="<?php echo site_url('assets/admin/js/list_user.js'); ?>"></script>
  </body>
</html>