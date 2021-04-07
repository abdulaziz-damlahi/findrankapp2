$(document).ready(function() {
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

    $("#device").change(function() {
        if($(this).val()==="Mobil"){
            let mobile_device ="Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53"
            $("#hidden_device").val(mobile_device);
        }
        else{
            $("#hidden_device").val("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36")
        }
    });

    $("#selectSecil").change(function() {
        $(".cityy").empty()
        $.ajax({
            type: 'get',
            url: "/api/v1/Locations",
            success: function (response) {
                jQuery.each( response, function( i, val ) {
                    jQuery.each( val, function( i, valll ) {
                        $sa = valll.attributes.Country_Code;
                        $saname = valll.attributes.name;
                        $aaaa=  $("#selectSecil").val();
                        if($sa===$aaaa){
                            $typecity=valll.attributes.Target_Type;
                            if(valll.attributes.Target_Type==='City') {
                                $("#cityy")
                                    .append('<option  class="cononical" value='+valll.attributes.Canonical_Name+'>' + valll.attributes.name + '</option>')
                            }
                        }
                    });
                });
            }
        });
        $("#cityy").change(function() {
            $("#hidden_collonial").val($(this).val());
            $("#hidden_device").val($("#hidden_collonial").val());
        });
    });
    $("#language").change(function() {
        $("#language_hidden").val($(this).val());

    });
    $.ajax({
        type: 'get',
        url: "/api/v1/Locations",
        success: function (response) {
        }
    });
});

