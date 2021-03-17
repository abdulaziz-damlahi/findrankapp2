$(document).ready(function() {
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
    url: "http://127.0.0.1:8000/api/v1/Locations",
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
});