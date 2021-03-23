$(document).ready(function() {
  $('#packets_show').hide();
  $('#button_contact').hide();
  $('#try_again').show();
  $('#button_contact2').hide();
  $('#submitButton').hide();
  $('.menuy ul li').eq(0).removeClass('active');
  $('.menuy ul li').eq(3).addClass('active');
  $('#form1').hide();
  $('#form2').hide();
  $('#form3').hide();
  $('#form4').show();
  $('#success_message').css('display','none');
  $('#error_message').css('display','none');
  if($('#button_third').hasClass('active')){
    console.log('geldi')

  };
  $('#Bireyselfrom').hide();
  $('#form2').hide();
  $('#form3').hide();
  $('.kurumsal').hide();
  $( "#try_again" ).on( "click", function() {
    $('#packets_show').show();
    $('#button_contact').show();
    $('#button_contact2').show();
    $('#form1').show();
    $('#form2').hide();
    $('#form3').hide();
    $('#form4').hide();
    $('.menuy ul li').eq(3).removeClass('active');
    $('.menuy ul li').eq(0).addClass('active');


  });

  $('#settingsForm').height( 500 )
  $( "#kurumsal" ).on( "click", function() {
    $('#Bireyselfrom').hide();
    $('#packets_show').hide();
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
        $('#button_pay').hide();
        $('#button_contact2').css('display','inline');
        $('#form1').show();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
      }
      else if(i===1){
        $('#button_contact2').css('display','inline');
        $('#button_pay').hide();
        $('#form1').hide();
        $('#form2').show();
        $('#form3').hide();
        $('#form4').hide();
        $('#form2').height(300);

      }else if(i===2){
        $('#button_pay').css('display','inline');
        $('#button_contact2').css('display','none');
        $('#form1').hide();
        $('#form2').hide();
        $('#form3').show();
        $('#form4').hide();

      }else if(i===3){
        $('#button_pay').show();

        $('#form1').hide();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').show();
        $('#button_contact').hide();
        $('#button_contact2').hide();
      }else if (i<3){
        $('#button_contact2').css('display','inline');
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
        $('#button_contact2').css('display','inline');
        $('#form1').show();
        $('#button_pay').hide();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
      }
      else if(i===1){
        $('#button_contact2').css('display','inline');
        $('#invoice_type').css('display','none');
        $('.invoiceeetype').css('display','none');

        $('#button_pay').hide();
        $('#form1').hide();
        $('#form2').show();
        $('#form3').hide();
        $('#form4').hide();
        $('#form2').height(300);

      }else if(i===2){
        $('#button_contact2').css('display','inline');

        $('#form1').hide();
        $('#form2').hide();
        $('#form3').show();
        $('#form4').hide();

      }else if(i===3){
        $('#button_contact2').css('display','inline');

        $('#form1').hide();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').show();
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
            console.log(vall);
            $(".PURCHACE").eq($start).val(vall.id);

          });
        });
      }
    });
  }
  packets_reels();

  $(".PURCHACE").click(function() {
    let number_id = $(this).val();

    get_one_packets(number_id);


    console.log(number_id)

    $("#packets_show").hide();
    $("#settingsForm").show();
  });
  function get_one_packets(id){
    $.ajax({
      type: 'get',
      url: "http://127.0.0.1:8000/api/v1/packets-reels/"+id,
      success: function (response) {
        $(".price_packet").text(response.data.attributes.price+ " TL");
        $(".input_price").text(response.data.attributes.price);
        $(".input_price").val(response.data.attributes.price);
        $(".input_id").val(response.data.id);
        $(".input_id").text(response.data.id);
        $("#total_price").text("Toplam : "+response.data.attributes.price+ " TL");
        jQuery.each(response, function (i, val) {
          jQuery.each(val, function (is, vall) {
            $("#hidden_word_count").text(vall.word_count)
            $("#hidden_websites_count").text(vall.websites_count)
            $("#başlangic").text(vall.names_packets);
            $(".rank_follow").text(vall.rank_fosllow);
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
      console.log('geldii')

    }else {
      console.log('sas')
      patch_packets();
      post_invoice();
      console.log('gitti')

    }
  });
  function post_invoice(){
    let first = $('#first_name').val();
    let last = $('#last_name').val();
    let Id_number = $('#number_personal').val();
    let id_number = parseInt(Id_number);
    console.log(typeof id_number)

    let invoice_no = $('#invoice_noo').val();

    let companyName = $('#companyName').val();
    let invoice_Addres = $('#invoice_addresses').val();
    console.log(invoice_no,'invoice no');
    console.log(invoice_Addres,'invoice_addreses');
    let country = $('#country').val();
    let city = $('#city').val();
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
            "first_name":first,
            "last_name":last,
            "id_number":id_number,

            "country":country,
            "city":city

          }
        }

      }),
      success: function (result) {
        console.log('işlem başarılı')
        $('#success_message').css('display','grid');


      },
      error: function(result) {
        $('#error_message').css('display','grid');

      }
    });
  }
  function post_packets(){
    console.log($('#first_name').text());
    console.log($('#first_name').val());
    let hidden_word_count  =$("#hidden_word_count").text()
    let hidden_websites_count  =$("#hidden_websites_count").text()
    console.log(hidden_websites_count);
    let başlangic  =$("#başlangic").text()
    let rank_follow  =$(".rank_follow").text()
    let hidden_price  =$("#hidden_price").text()
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today2 = dd + '-' + mm + '-' + yyyy;
    let date_int_mm  = parseInt(mm);
    let date_int_day  = parseInt(dd);
    var new_mm = date_int_mm +1;
    var new_dd = date_int_day +1;
    today =  new_dd + "-" + '0'+new_mm  + "-" + yyyy;
    let ee =  Date.parse(today);
    let dateArray = today.split("-");
    let dateObj = new Date(`${dateArray[2]}-${dateArray[1]}-${dateArray[0]}`);
    let deyt =   new Date(new_dd,new_mm,yyyy);
    var con_date =
        ""+deyt.getFullYear() + (deyt.getMonth()+1) + deyt.getDate(); //converting the date
    let gdate = "" + yyyy +"-"+ new_mm+"-" + new_dd; //given date
    console.log(gdate,'giremedi');

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
            "user_id":user_id,
            "count_of_words": 0,
            "descrpitions":"sada",
            "end_of_pocket":gdate,
            "max_count_of_words":hidden_word_count,
            "rank_follow":0,
            "rank_follow_max":rank_follow,
            "count_of_websites":0,
            "max_count_of_websites": hidden_websites_count,
            "packet_names":başlangic,

          }}
      }) ,
      success: function (result) {
        console.log('işlem başarılı')
      }
    });
  }   function patch_packets(){
    let hidden_word_count  =parseInt($("#hidden_word_count").text());
    let hidden_websites_count  =parseInt($("#hidden_websites_count").text());
    let rank_follow_normal  =parseInt($(".rank_follow").text());
    console.log(rank_follow_normal)
    console.log(($(".rank_follow_max").val()))
    let hidden_websites_count_new= (hidden_websites_count-($('.my_count_of_websites').val()))+hidden_websites_count;
    let rank_follow_new= (rank_follow_normal-($(".rank_follow_max").val()))+rank_follow_normal;
    console.log(((rank_follow_normal-($(".rank_follow_max").val()))),'rank count');
    console.log((rank_follow_normal),'max count');
    let  hidden_word_count_new=(hidden_word_count-($('.my_count_of_words').val()))+ hidden_word_count;
    let başlangic  =$("#başlangic").text()
    let hidden_price  =$("#hidden_price").text()

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today2 = dd + '-' + mm + '-' + yyyy;
    let date_int_mm  = parseInt(mm);
    let date_int_day  = parseInt(dd);
    var new_mm = date_int_mm +1;
    var new_dd = date_int_day +1;
    today =  new_dd + "-" + '0'+new_mm  + "-" + yyyy;
    let ee =  Date.parse(today);
    let dateArray = today.split("-");
//dateArray[2] equals to 2021
//dateArray[1] equals to 02
//dateArray[0] equals to 13
    $('.my_count_of_words').val();
    $('.my_count_of_websites').val();
// using template literals below
    let dateObj = new Date(`${dateArray[2]}-${dateArray[1]}-${dateArray[0]}`);
    let deyt =   new Date(new_dd,new_mm,yyyy);
    var con_date =
        ""+deyt.getFullYear() + (deyt.getMonth()+1) + deyt.getDate(); //converting the date
    let gdate = "" + yyyy +"-"+ new_mm+"-" + new_dd; //given date
    console.log(gdate,'giremedi');
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
            "user_id":user_id,
            "count_of_words": $('.my_count_of_words').val(),
            "descrpitions":"sada",
            "end_of_pocket":gdate,
            "max_count_of_words":hidden_word_count_new,
            "rank_follow":$(".rank_follow_max").val(),
            "rank_follow_max":rank_follow_new,

            "count_of_websites": $('.my_count_of_websites').val(),
            "max_count_of_websites": hidden_websites_count_new,
            "packet_names":başlangic,

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

        let count = result.data.length
        if(count>0) {
          $('.id_hidden').val(result.data[0].id)
          $('.hidden_size').val(result.data.length);
          $('.my_count_of_words').val(result.data[0].attributes.count_of_words);
          $('.my_count_of_websites').val(result.data[0].attributes.count_of_websites);
          $('.rank_follow_max').val(result.data[0].attributes.rank_follow);
          console.log($('.rank_follow_max').val());

        }
      }
    });
  }
});

// payment
