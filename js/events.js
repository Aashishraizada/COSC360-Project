$(document).ready(function(){  
  $(".nav li").mouseover(function(){
    $(this).addClass("active");
  });
  $(".nav li").mouseleave(function(){
    $(this).removeClass("active");
  });
});