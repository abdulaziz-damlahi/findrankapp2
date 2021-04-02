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
  let window_size =$( window ).width();

  if(window_size<500){
    $('#settingsForm').height(1200);
    console.log('geldiBurayaKüçük');



  }else{
    if($('.menuy ul li').eq(1).hasClass('active')){
      console.log('geldiBurayaBüyük')
      $('#settingsForm').height(800);
    }
  }
  $('#success_message').css('display','none');
  $('#error_message').css('display','none');
  if($('#button_third').hasClass('active')){
    console.log('geldi')

  };
  $('#Bireyselfrom').hide();
  $('#form2').hide();
  $('#form3').hide();
  $('.kurumsal').hide();

  $('#settingsForm').height( 500 )
  $( "#kurumsal" ).on( "click", function() {
    $('#Bireyselfrom').hide();
    $('#packets_show').hide();
    $('#Kurumsalform').show();
    $('.kurumsal').show();
    $('#settingsForm').height(700)
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
        if(window_size<500){
          $('#settingsForm').height('500px')

        }
        else{
          $('#settingsForm').height('400')

        }
        $('#button_contact2').css('display','inline');
        $('#button_pay').hide();
        $('#form1').hide();
        $('#form2').show();
        $('#form3').hide();
        $('#form4').hide();
        $('#form2').height(300);

      }else if(i===2){
        if(window_size<500){
          $('#settingsForm').height('800')

        }
        else{
          $('#settingsForm').height('700')

        }
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
  $('#try_again').click(function() {
    if(window_size<500){
      $('#settingsForm').height(1000);

    }
    else{
      $('#settingsForm').height(800);
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
        let window_size =$( window ).width();

        if(window_size<500){
          $('#settingsForm').height('950')

        }
        else{
          $('#settingsForm').height('600')
        }
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
        let window_size =$( window ).width();

        if(window_size<500){
          $('#settingsForm').height('500')


        }
        else{
          $('#settingsForm').height('200')

        }
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
        let window_size =$( window ).width();

        if(window_size<500){
          $('#settingsForm').height(899 );

        }
        $('#button_contact2').css('display','inline');

        $('#form1').hide();
        $('#form2').hide();
        $('#form3').show();
        $('#form4').hide();

      }else if(i===3){
        let window_size =$( window ).width();

        if(window_size<500){
          $('#settingsForm').height(500 );

        }
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


        }
      }
    });
  }
});

// payment
