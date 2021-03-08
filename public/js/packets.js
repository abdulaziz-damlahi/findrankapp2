$(document).ready(function() {
  $('#form1').hide();
  $('#form3').hide();
  $('#form4').hide();
  $('.kurumsal').hide();
  $('#settingsForm').height( 500 )
  $( "#kurumsal" ).on( "click", function() {
    $('#form1').show();
    $('#form2').hide();
    $('.kurumsal').show();
    $('#settingsForm').height( 700 )
    $('#themostunder').css('margin-right','60%');



  });  $( "#bireysel" ).on( "click", function() {
    $('#form2').show();
    $('#form1').hide();
    $('#settingsForm').height( 500 )
  });
  i=0;
  $( "#button_contact2" ).click(function() {
    $('.kurumsal').hide();
i;
if(i<3) {
  $('.menuy ul li').eq(i).removeClass('active');
  $('.menuy ul li').eq(i + 1).addClass('active');
  i++;
  console.log(i)
  if(i===2){
    if($( '#kurumsal' ).prop( "checked" )==='false'){
      $('.kurumsal').hide();
      console.log($('.kurumsal').text());

    }
    $('#form3').show();
    $('#form1').hide();
    $('#form2').hide();
    $('#form4').hide();
  }
else if(i===1){
    if($( '#kurumsal' ).prop( "checked" )=='false'){
      $('.kurumsal').hide();
    }
    $('#form2').show();
    $('#form1').hide();
    $('#form3').hide();
    $('#form4').hide();

  }else if(i===0){
    if($( '#kurumsal' ).prop( "checked" )=='false'){
      $('.kurumsal').hide();
      console.log($( '#kurumsal' ).prop( "checked" ));
    }
    $('#form1').show();
    $('#form2').hide();
    $('#form3').hide();
    $('#form4').hide();

  }else if(i===3){
    if($( '#kurumsal' ).prop( "checked" )==='false'){
      $('.kurumsal').hide();
    }
    $('#form4').show();
    $('#form1').hide();
    $('#form3').hide();
    $('#form2').hide();
  }

}

  });
  $( "#button_contact" ).click(function() {
    $('#themostunder').css('margin-right','0%');

    $('.kurumsal').hide();
i;
if(i<4 && i>0) {
  $('.menuy ul li').eq(i).removeClass('active');
  $('.menuy ul li').eq(i - 1).addClass('active');
  i--;
  console.log(i)
  if(i===2){
    if($( '#kurumsal' ).prop( "checked" )==='false'){
      $('.kurumsal').hide();
    }
    $('#form3').show();
    $('#form1').hide();
    $('#form2').hide();
    $('#form4').hide();


  }
  else if(i===1){
    if($( '#kurumsal' ).prop( "checked" )==='false'){
      $('.kurumsal').hide();
    }
    $('#form2').show();
    $('#form1').hide();
    $('#form3').hide();
    $('#form4').hide();
  }else if(i===0){
    if($( '#kurumsal' ).prop( "checked" )==='false'){
      $('.kurumsal').hide();
    }
    console.log($( '#kurumsal' ).prop( "checked" ))
    $('#form1').show();
    $('#form2').hide();
    $('#form3').hide();
    $('#form4').hide();
  }else if(i===3){
    console.log($( '#kurumsal' ).prop( "checked" ))

    if($( '#kurumsal' ).prop( "checked" )==='false'){
      $('.kurumsal').hide();
    }
    $('#form4').show();
    $('#form1').hide();
    $('#form3').hide();
    $('#form2').hide();
  }

}
  });
  $('.setting_button').css('margin-right','0px');
  $(".PURCHACE").click(function() {
 $("#packets_show").hide();
    $("#settingsForm").show();
  });
  $('.personal_settings').hide();
  $('.custumize').hide();
  $(".setting_but").click(function() {
    $('.setting_button').not(self).removeClass('active');
    $(this).parent().addClass('active');
    $(this).addClass("active");
    if($('#button_first').hasClass('active')){
      console.log('sa')
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