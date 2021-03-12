$(document).ready(function() {

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



  });
  $( ".PURCHACE" ).on( "click", function() {
    $('#settingsForm').show();
  });
  $( "#bireysel" ).on( "click", function() {
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
          $("#hidden_word_count").text(vall.word_count)
          $("#hidden_websites_count").text(vall.websites_count)
          $("#başlangic").text(vall.names_packets);
          $("#hidden_price").text(vall.price);

          $("#hidden_description").text(vall.description)
        });
      });
    }
  });
}let user_id =  $('#hidden_id').text();
  console.log(user_id)
  get_packets();
  $( "#button_pay" ).click(function() {
    const count =  $('.hidden_size').val();
    if(count<1){
      post_packets();
      post_invoice();
    }else if(count==1){
      console.log('sas')
      patch_packets();
      post_invoice();
    }
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
          "user_id":user_id,
          "first_name":"first_name",
          "last_name":"last_name",
          "Id_number":"2201546589",
          "tax_no":"sa",
          "tax_address":"sa",
          "country":"geldi",
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
  function post_packets(){
    $("#hidden_word_count").text(vall.word_count)
    $("#hidden_websites_count").text(vall.websites_count)
    $("#başlangic").text(vall.names_packets);
    $("#hidden_price").text(vall.price);
    $.ajax({
      url: "http://127.0.0.1:8000/api/v1/Packets",
      type: "POST",
      headers: { "Content-Type": "application/vnd.api+json",
        Accept: "application/vnd.api+json",
      },
      data: JSON.stringify({
        "data": {
      "type": "Packets",

        "attributes": {
      "id_sa":"1",
          "user_id":user_id,
          "count_of_words": $("#hidden_word_count").text(),
          "descrpitions":"sada",
          "end_of_pocket":"2021-03-03",

          "count_of_websites": $("#hidden_websites_count").text(),
          "packet_names":$("#başlangic").text(),

    }}
      }) ,
      success: function (result) {
        console.log('işlem başarılı')
      }
    });
  }   function patch_packets(){
   const id =  $('.id_hidden').val();
    $.ajax({
      url: "http://127.0.0.1:8000/api/v1/Packets/"+id,
      type: "PATCH",
      headers: { "Content-Type": "application/vnd.api+json",
        Accept: "application/vnd.api+json",
      },
      data: JSON.stringify({
        "data": {
      "type": "Packets",
          "id":id,
        "attributes": {
      "id_sa":"1",
          "user_id":user_id,
          "count_of_words":"0",
          "descrpitions":"patch",
          "end_of_pocket":"2021-03-03",
          "count_of_websites":"sdadasda",
          "packet_names":"packet"

    }
    }
      }),
      success: function (result) {
        console.log('işlem Güncellendi')
      }
    });
  }
  function get_packets(){
    $.ajax({
      url: "http://127.0.0.1:8000/api/v1/Packets",
      type: "GET",
      headers: { "Content-Type": "application/vnd.api+json",
        Accept: "application/vnd.api+json",
      },
      success: function (result) {
       let deneme =  result.data[0].attributes.createdAt

       console.log(yen,'eski');
       $('.id_hidden').val(result.data[0].id)
        $('.hidden_size').val(result.data.length);
        console.log($('.hidden_size').val());
      }
    });
  }
});

// payment
