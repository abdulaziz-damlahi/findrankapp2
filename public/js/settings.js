$(document).ready(function(){
  $('.personal_settings').hide();
  $('.custumize').hide();
  $(".setting_but").click(function() {
    $('.setting_button').not(self).removeClass('active');
    $(this).parent().addClass('active');
    $(this).addClass("active");
   if($('#button_first').hasClass('active')){
     $('.personal_settings').hide();
     $('.password_process').show();
     $('.custumize').hide();
   }
   else if($('#button_second').hasClass('active')){
     $('.personal_settings').show();
     $('.custumize').hide();
     $('.password_process').hide();
   } else if($('#button_third').hasClass('active')){
     $('.personal_settings').hide();
     $('.password_process').hide();
     $('.custumize').show();
   }
});
});
