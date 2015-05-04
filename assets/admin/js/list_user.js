/* [ ---- Gebo Admin Panel - tables ---- ] */

  $(document).ready(function() {
    //* 先初始化表格中的数据
    gebo_galery_table.init();
        //* actions for tables, datatables
        gebo_select_row.init();
    gebo_delete_rows.simple();
    gebo_delete_row.init();
    gebo_edit_row.init();
    //gebo_add_row.init();
  });
  
  //* select all rows
  gebo_select_row = {
    init: function() {
      $('.select_rows').click(function () {
        var tableid = $(this).data('tableid');
                $('#'+tableid).find('input[name=row_sel]').attr('checked', this.checked);
      });
    }
  };
  
  //* delete rows
  gebo_delete_rows = {
    simple: function() {
      $(".delete_rows_simple").on('click',function (e) {
        e.preventDefault();
        var tableid = $(this).data('tableid');
        var $selectedRows = $('input[name=row_sel]:checked', '#'+tableid);
                if($selectedRows.length) {
                    $.colorbox({
                        initialHeight: '0',
                        initialWidth: '0',
                        href: "#confirm_dialog",
                        inline: true,
                        opacity: '0.3',
                        onComplete: function(){
                            $('.confirm_yes').click(function(e){
                                e.preventDefault();
                                var aStudents = [];
                                $selectedRows.each(function(index, elem){
                                  aStudents.push(elem.value);
                                });
                                $.get("../admin/admin/remove", {userIds:aStudents}, function(data){
                                  
                                  if(data == "success"){
                                    
                                    $selectedRows.closest('tr').fadeTo(300, 0, function () { 
                                        $(this).remove();
                                        $('.select_rows','#'+tableid).attr('checked',false);
                                    });
                                  }
                                },'text');
                                $.colorbox.close();
                            });
                            $('.confirm_no').click(function(e){
                                e.preventDefault();
                                $.colorbox.close(); 
                            });
                        }
                    });
                }
      });
    }
  };
  //delete row
  gebo_delete_row = {
    init: function(){
      $(".delete_row").on("click",function(e){
        e.preventDefault();
        var userId = $(this).data('aid');
        //$(this).parents("tr").remove();
        var _this = this;
        
        $.colorbox({
                    initialHeight: '0',
                    initialWidth: '0',
                    href: "#confirm_dialog",
                    inline: true,
                    opacity: '0.3',
                    onComplete: function(){
                        $('.confirm_yes').click(function(e){
                            e.preventDefault();
                            $.get("../admin/admin/remove", {userIds:userId}, function(data){
                              if(data == "success"){
                                $(_this).parents("tr").remove();
                              }
                            },'text');
                            $.colorbox.close();
                        });
                        $('.confirm_no').click(function(e){
                            e.preventDefault();
                            $.colorbox.close(); 
                        });
                    }
              });
      });
    }
  }     
  
  //* gallery table view
    gebo_galery_table = {
        init: function() {
           $('#dt_gal').dataTable({
        "sDom": "<'row'<'span6'<'dt_actions'>l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
               "sPaginationType": "bootstrap",
        "aoColumns": [
          { "bSortable": false },
          { "bSortable": false },
          { "sType": "string" },
          { "sType": "string" },
          { "sType": "string" },
          { "sType": "numeric" },
          { "bSortable": false }
        ]
      });
           $('.dt_actions').html($('.dt_gal_actions').html());
        }
    };
  //编辑记录
  gebo_edit_row = {
    init: function(){//初始化编辑连接的click操作
      $('.edit-row').on('click', function(e){
        e.preventDefault();//阻止默认行为
        var cateId = $(this).data('cid');
      });
    },
    post: function(){
      
      if(cateId){
          $.get("/admin/student/edit/"+cateId, function(data){
            if(data == "success"){
              
            }
          });
        }
    }
  };
  
  //添加记录
  // gebo_add_row = {
    // init: function(){
      // $('.add-article').on('click', function(e){
        // e.preventDefault();//阻止默认行为
        // //$.post();
      // });
    // }
  // };
