$(function(){
	$(".login_menu > .username").on("mousemove",function(){
		$(this).next(".poparrow").css('background-position','0 0');
		$(this).css("background-color","#fff").children("ul").show();
	})
	$(".login_menu > .username").on("mouseout",function(){
		$(this).next(".poparrow").css('background-position','0 -9px');
		$(this).css("background-color","#f8f8f8").children("ul").hide();
	})
	$("#typename").on("mousemove",function(){
    $(this).children(".tn_search_bar").show().prev("#spic").removeClass('out').addClass('enter');
  }).on("mouseout",function(){
     $(this).children(".tn_search_bar").hide().prev("#spic").removeClass('enter').addClass('out');
  })
  $("#typename > .tn_search_bar > .type_s").on("click",function(){
    $("#typename > span").text($(this).text());
    $("#cate-input").val($(this).data('id'));
    $(this).hide().siblings(".type_s").show().end().parent(".tn_search_bar").hide();
  })
	$(".menu_list > li").on("mousemove",function(){
  	var index = $(this).data('id');
  	if($(".subMenu_panel_"+index).length > 0){
  		$(".subMenu_panel_"+index).show();	
  	} 	
  })
  $(".subMenu_panel").on("mousemove",function(){
  	$(this).show();
  	return false;
  })
  $(".subMenu_panel").on("mouseout",function(){
  	$(this).hide();
  	return false;
  })
  $(".menu_list > li").on("mouseout",function(){
  	var index = $(this).data('id');
  	if($(".subMenu_panel_"+index).length > 0){
  		$(".subMenu_panel_"+index).hide();	
  	} 	
  })
})
