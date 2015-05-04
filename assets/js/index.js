$(function(){
  $('.flexslider').flexslider({
    animation: "slide"
  });
  $(window).on("scroll",function(){
  	var scrollTop = $(this).scrollTop();
  	if(scrollTop>=500){
  		$("#right_scroll").show();
  	}else{
  		$("#right_scroll").hide();
  	}
  })
  $("#right_scroll .gotop").on("click",function(){
  	$('html,body').animate({'scrollTop':0},300,'linear',function(){
  		$("#right_scroll").hide();
  	})
  })
})
