$(document).ready(function(){
  $("#register_container").hide();
  $("#register").click(function(){
    $("#loginForm").hide();
    $("#register_container").show();
  });
  $("#LoginButton").click(function(){
    $("#register_container").hide();
    $("#loginForm").show();
  });
  $('.input').focus(function(){
    $(this).parent().find(".label-txt").addClass('label-active');
  });

  $(".input").focusout(function(){
    if ($(this).val() === '') {
      $(this).parent().find(".label-txt").removeClass('label-active');
    };
  });

});