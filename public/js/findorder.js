$(document).ready(function() {
  $(".device").change(function() {
console.log($(".deviee").val())
    console.log($(this).val())
    console.log($(".deviee").val())
    $("#hidden_device").val($(".device").val());
    console.log($("#hidden_device").val());});
  $(".selectSecil").change(function() {
    $(".cityy").empty()
  $.ajax({
    type: 'get',
    url: "http://127.0.0.1:8000/api/v1/Locations",
    success: function (response) {
      jQuery.each( response, function( i, val ) {
        jQuery.each( val, function( i, valll ) {
         $sa = valll.attributes.Country_Code;
         $saname = valll.attributes.name;
         $aaaa=  $(".selectSecil").val();
         if($sa===$aaaa){
           $typecity=valll.attributes.Target_Type;
           if(valll.attributes.Target_Type==='City') {
             $(".cityy")
             .append('<option  class="cononical" value='+valll.attributes.Canonical_Name+'>' + valll.attributes.name + '</option>')
           }
         }
        });
      });
    }

  });
    $(".cityy").change(function() {

      $("#hidden_collonial").val($(".cityy").val());
      $("#hidden_device").val($("#hidden_collonial").val());
    });

    });
});