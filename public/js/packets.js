$(document).ready(function() {
<<<<<<< HEAD
=======

>>>>>>> 2f179e69fc7363bb0dc573e42a6cfd4604be2d26
  $('#Bireyselfrom').hide();
  $('#form2').hide();
  $('#form3').hide();
  $('#form4').hide();
  $('.kurumsal').hide();
  $('#settingsForm').hide();
  $('#settingsForm').height( 500 )
  $( "#kurumsal" ).on( "click", function() {
    $('#Bireyselfrom').hide();
    $('#Kurumsalform').show();
    $('.kurumsal').show();
    $('#settingsForm').height(700 )
    $('#themostunder').css('margin-right','60%');



<<<<<<< HEAD
  });  $( "#bireysel" ).on( "click", function() {
=======
  });
  $( ".PURCHACE" ).on( "click", function() {
    $('#settingsForm').show();
  });
  $( "#bireysel" ).on( "click", function() {
>>>>>>> 2f179e69fc7363bb0dc573e42a6cfd4604be2d26
    $('#Bireyselfrom').show();
    $('#Kurumsalform ').hide();
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

  if(i===0){
    if($( '#kurumsal' ).prop( "checked" )==='false'){
      $('.kurumsal').hide();
      console.log($('.kurumsal').text());

    }
    $('#form1').show();
    $('#form2').hide();
    $('#form3').hide();
    $('#form4').hide();
  }
else if(i===1){
      $('#form1').hide();
      $('#form2').show();
      $('#form3').hide();
      $('#form4').hide();
      $('#form2').height(300);

  }else if(i===2){

      $('#form1').hide();
      $('#form2').hide();
      $('#form3').show();
      $('#form4').hide();

  }else if(i===3){
      $('#form1').hide();
      $('#form2').hide();
      $('#form3').hide();
      $('#form4').show();
      $('#button_contact').hide();
      $('#button_contact2').hide();
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

    if(i===0){
        if($( '#kurumsal' ).prop( "checked" )==='false'){
            $('.kurumsal').hide();
            console.log($('.kurumsal').text());

        }
        $('#form1').show();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
    }
    else if(i===1){

        $('#form1').hide();
        $('#form2').show();
        $('#form3').hide();
        $('#form4').hide();
        $('#form2').height(300);

    }else if(i===2){

        $('#form1').hide();
        $('#form2').hide();
        $('#form3').show();
        $('#form4').hide();

    }else if(i===3){
        $('#form1').hide();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').show();
        $('#button_contact').hide();
        $('#button_contact2').hide();
    }

}
  });
  $('.setting_button').css('margin-right','0px');
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
<<<<<<< HEAD
=======
  function packets_reels () {
    $.ajax({
      type: 'get',
      url: "http://127.0.0.1:8000/api/v1/packets-reels",
      success: function (response) {
        jQuery.each(response, function (i, val) {
          jQuery.each(val, function (is, vall) {
            $start = vall.id - 1;
            $(".PURCHACE").eq($start).val(vall.id);
            console.log($(".PURCHACE").val());
          });
        });
      }
    });
  }
  packets_reels();

  $(".PURCHACE").click(function() {
    let number_id = $(this).val();
    get_one_packets(number_id);
    $("#packets_show").hide();
    $("#settingsForm").show();
  });
function get_one_packets(id){
  $.ajax({
    type: 'get',
    url: "http://127.0.0.1:8000/api/v1/packets-reels/"+id,
    success: function (response) {
      $(".price_packet").text(response.data.attributes.price+ " TL");
      $("#total_price").text("Toplam : "+response.data.attributes.price+ " TL");
      jQuery.each(response, function (i, val) {
        jQuery.each(val, function (is, vall) {
      console.log(vall);
          $(".hidden_word_count").val(vall.count_of_words)
          $(".hidden_websites_count").val(vall.websites_count)
          $(".başlangic").text(vall.names_packets);
          $(".hidden_description").val(vall.description)
        });
      });
    }
  });
}

  $( "#button_pay" ).click(function() {
    post_invoice();
  });
function post_invoice(){
  $.ajax({
    url: "http://127.0.0.1:8000/api/v1/invoicerecords",
    type: "POST",
    headers: { "Content-Type": "application/vnd.api+json",
      Accept: "application/vnd.api+json",
    },
    data: JSON.stringify({
      "data": {
        "type": "invoicerecords",

        "attributes": {
          "first_name":"first_name",
          "last_name":"last_name",
          "Id_number":"2201546589",
          "tax_no":"sa",
          "tax_address":"sa",
          "country":"sa",
          "city":"sa",
          "company_name":"sa"
        }
      }
    }),
   success: function (result) {
      console.log('işlem başarılı')
    }
  });
}
>>>>>>> 2f179e69fc7363bb0dc573e42a6cfd4604be2d26
});

// payment
