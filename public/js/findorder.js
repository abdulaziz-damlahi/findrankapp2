$(document).ready(function () {
  console.log($("#hiddenToken").val())
  $('#check_now').click(function () {
    const token =parseInt($("#hiddenToken").val());
    var sifre = Base64.encode(token)
    var sifree = sifre+"A12";
    console.log('tıklandı')
    $.ajax({
      url: "http://127.0.0.1:8000/api/v1/all-google-search-datas",
      type: "POST",
      headers: { "Content-Type": "application/vnd.api+json",
        Accept: "application/vnd.api+json",
      },
      data: JSON.stringify({
        "data": {

          "type": "all-google-search-datas",

          "attributes": {

            "keyword": $("#keyword").val(),
            "user_id": parseInt($("#hiddenToken").val()),
            "website":$("#website").val(),
            "colonial_name":$("#hidden_collonial").val(),
            "device":$("#hidden_device").val(),
            "language":$("#language").val(),
            "token": sifree,
            "statusofresult": "1",
            "processtime": "Currency"
          }}

      }),
      success: function (result) {
        console.log('işlem başarılı')
        $('#success_message').css('display','grid');
      },
      error: function(result) {
        console.log('başarısSısz')
        $('#error_message').css('display','grid');

      }
    })
  });
  $('#post_method').submit(function () {
    console.log('girer')
  });

  const socket = io.connect("http://localhost:3000/", {});
  socket.emit('userIdToken', { userIdToken });
  socket.on('connect', function () {
    console.log('connected')
  });
  socket.on('user_id_token', function () {
    console.log('connected')
  });
 var userIdToken = $(".deneme").val();
  socket.on('socketcalisti', function (message) {
      console.log('socketcalisti', message)
    })
    socket.on('newmessage', function (message) {
      console.log('newmessage', message.inout[0])
      $("#newmessage").val(message.inout[0]);
      console.log(message.inout[0],'inoutttt')
      console.log( $("#newmessage").val(),'inoutttt22')
      $('#post_method').submit()
    })
    console.log('girer')
    socket.on('deneme', function (message) {
      console.log('sadsadsad')
      console.log('deneme', message)
      $('#post_method').submit()
      console.log('deneme', message)
    });
  /*    console.log('girer mi acep', message.inout[0])
      var match_deger = message.inout[0];
      let array = message.users
      console.log(array)
      for (i = 0; i < array.length; i++) {
        let deneme =  $("#newmessage").val();
        console.log(deneme,'deneme')
        var found = array[i].match(deneme);
        console.log(found,'found')
        const paragraph = array[i];
        const regex = ""+deneme;
        var found2 = array[i].match(match_deger);
        console.log(match_deger,'match_deger')
        if (found2 != null) {

          $(".full").append("<li id='matchedRank' class='list' value="+i+" val="+i+" style='height:30px;margin-bottom:10px;background-color: #ff6c3a'>"+i +"    "+ array[i] + "</li>");
        }else{
          console.log('degil')
          $(".full").append("<li class='list' style='height:30px; margin-bottom:10px;background-color: #0af9d7'>"+i +"    "+ array[i] + "</li>");
        }
      }
      if($("#matchedRank")!=null){
        console.log('girer')
        $(".findOrderTitle").append("<div class='alert alert-success' role='alert'>" +
            $("#matchedRank").val() + " Aradığınız eleman sırada"+
            "</div>");
      }
      else if($("#matchedRank").val()==null) {
        $(".findOrderTitle").append("<div class='alert alert-danger' role='alert'>" +
            " Aradığınız eleman sırada Değil"+
            "</div>");
        console.log('girmez')

      }
    })

   */
  let website = $("#website_value").text();
  let frm = $(".form_rank_order");
  let frmaction = $(".form_rank_order").data('route');
  let formData = {
    website
  }
  let formrsda = $('.form_rank_order').attr('content')
  console.log(formrsda);
  $('#post_method').submit(function (event) {
    var form_dataa = $(this);
    $.ajax({
      type: "POST",
      url: frmaction,
      data: form_dataa.serialize(),
      error: function (jqXHR, textStatus, errorMessage) {
        console.log(errorMessage); // Optional
      },
      success: function (data) {
        console.log(data)
        console.log('başarılı')
      }
    });
    event.preventDefault();
  });
  /*  $.ajax({
   url: "http://localhost:3000",
   type: "POST",
   dataType: 'json',
   headers: { "Content-Type": "application/vnd.api+json",
   "Accept": "application/vnd.api+json",
   "Access-Control-Allow-Origin": "*"
   },
   data: JSON.stringify({
   "data": {
   "foo": "barrrrrr",
   }

   }),
   success: function (result) {
   console.log('işlem başarılı')
   $('#success_message').css('display','grid');
   },
   error: function(result) {
   $('#error_message').css('display','grid');

   }
   })
   */
  $("#device2").change(function () {
    if ($(this).val() === "Mobil") {
      let mobile_device = "Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53"
      $("#hidden_device2").val(mobile_device);
    } else {
      $("#hidden_device2").val("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36")
    }
  });
  $("#selectSecil2").change(function () {
    $(".cityy2").empty()
    $.ajax({
      type: 'get',
      url: "http://127.0.0.1:8000/api/v1/Locations",
      success: function (response) {
        jQuery.each(response, function (i, val) {
          jQuery.each(val, function (i, valll) {
            $sa = valll.attributes.Country_Code;
            $saname = valll.attributes.name;
            $aaaa = $("#selectSecil2").val();
            if ($sa === $aaaa) {
              $typecity = valll.attributes.Target_Type;
              if (valll.attributes.Target_Type === 'City') {
                $("#cityy2")
                .append('<option  class="cononical" value=' + valll.attributes.Canonical_Name + '>' + valll.attributes.name + '</option>')
              }
            }
          });
        });
      }
    });
    $("#cityy2").change(function () {
      $("#hidden_collonial2").val($(this).val());
    });
  });
  $("#language2").change(function () {
    $("#language_hidden2").val($(this).val());

  });
  $.ajax({
    type: 'get',
    url: "http://127.0.0.1:8000/api/v1/Locations",
    success: function (response) {
    }
  });
  $("#device").change(function () {

    if ($(this).val() === "Mobil") {
      let mobile_device = "Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53"
      $("#hidden_device").val(mobile_device);
    } else {
      $("#hidden_device").val("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36")
    }
  });

  $("#selectSecil").change(function () {
    $(".cityy").empty()
    $.ajax({
      type: 'get',
      url: "http://127.0.0.1:8000/api/v1/Locations",
      success: function (response) {
        jQuery.each(response, function (i, val) {
          jQuery.each(val, function (i, valll) {
            $sa = valll.attributes.Country_Code;
            $saname = valll.attributes.name;
            $aaaa = $("#selectSecil").val();
            if ($sa === $aaaa) {
              $typecity = valll.attributes.Target_Type;
              if (valll.attributes.Target_Type === 'City') {
                $("#cityy").append('<option  class="cononical" value=' + valll.attributes.Canonical_Name + '>' + valll.attributes.name + '</option>')
              }
            }
          });
        });
      }
    });
    $("#cityy").change(function () {
      $("#hidden_collonial").val($(this).val());
    });

  });
  $("#language").change(function () {
    $("#language_hidden").val($(this).val());
  });
  $.ajax({
    type: 'get',
    url: "http://127.0.0.1:8000/api/v1/Locations",
    success: function (response) {
    }
  });
});

