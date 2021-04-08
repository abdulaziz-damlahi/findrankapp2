$
$(document).ready(function () {
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
            $("#hidden_device2").val($("#hidden_collonial2").val());
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
});

$(document).ready(function () {
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
            $("#hidden_device").val($("#hidden_collonial").val());
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

// $(document).ready(function () {
//     $("#selectSecil").change(function () {
//         var FlagValue = $("#selectSecil").val();
//         var DeviceValue = $("#device").val();
//         console.log(FlagValue)
//         console.log(DeviceValue)
//         if (FlagValue == 'TR') {$("#flag").removeClass().addClass("flag-icon flag-icon-tr");}
//         if (FlagValue == 'AE') {$("#flag").removeClass().addClass("flag-icon flag-icon-ae");}
//         if (FlagValue == 'AR') {$("#flag").removeClass().addClass("flag-icon flag-icon-ar");}
//         if (FlagValue == 'AU') {$("#flag").removeClass().addClass("flag-icon flag-icon-au");}
//         if (FlagValue == 'AT') {$("#flag").removeClass().addClass("flag-icon flag-icon-at");}
//         if (FlagValue == 'BE') {$("#flag").removeClass().addClass("flag-icon flag-icon-be");}
//         if (FlagValue == 'CA') {$("#flag").removeClass().addClass("flag-icon flag-icon-ca");}
//         if (FlagValue == 'CL') {$("#flag").removeClass().addClass("flag-icon flag-icon-cl");}
//         if (FlagValue == 'CN') {$("#flag").removeClass().addClass("flag-icon flag-icon-cn");}
//         if (FlagValue == 'CZ') {$("#flag").removeClass().addClass("flag-icon flag-icon-cz");}
//         if (FlagValue == 'DE') {$("#flag").removeClass().addClass("flag-icon flag-icon-de");}
//         if (FlagValue == 'BG') {$("#flag").removeClass().addClass("flag-icon flag-icon-bg");}
//         if (FlagValue == 'BR') {$("#flag").removeClass().addClass("flag-icon flag-icon-br");}
//         if (FlagValue == 'CH') {$("#flag").removeClass().addClass("flag-icon flag-icon-ch");}
//         if (FlagValue == 'DE') {$("#flag").removeClass().addClass("flag-icon flag-icon-de");}
//         if (FlagValue == 'CO') {$("#flag").removeClass().addClass("flag-icon flag-icon-co");}
//         if (FlagValue == 'DK') {$("#flag").removeClass().addClass("flag-icon flag-icon-dk");}
//         if (FlagValue == 'EC') {$("#flag").removeClass().addClass("flag-icon flag-icon-ec");}
//         if (FlagValue == 'CO') {$("#flag").removeClass().addClass("flag-icon flag-icon-co");}
//         if (FlagValue == 'EG') {$("#flag").removeClass().addClass("flag-icon flag-icon-eg");}
//         if (FlagValue == 'ES') {$("#flag").removeClass().addClass("flag-icon flag-icon-es");}
//         if (FlagValue == 'FI') {$("#flag").removeClass().addClass("flag-icon flag-icon-fi");}
//         if (FlagValue == 'FR') {$("#flag").removeClass().addClass("flag-icon flag-icon-fr");}
//         if (FlagValue == 'GB') {$("#flag").removeClass().addClass("flag-icon flag-icon-gb");}
//         if (FlagValue == 'GR') {$("#flag").removeClass().addClass("flag-icon flag-icon-gr");}
//         if (FlagValue == 'HU') {$("#flag").removeClass().addClass("flag-icon flag-icon-hu");}
//         if (FlagValue == 'IN') {$("#flag").removeClass().addClass("flag-icon flag-icon-in");}
//         if (FlagValue == 'IE') {$("#flag").removeClass().addClass("flag-icon flag-icon-ie");}
//         if (FlagValue == 'IL') {$("#flag").removeClass().addClass("flag-icon flag-icon-il");}
//         if (FlagValue == 'IT') {$("#flag").removeClass().addClass("flag-icon flag-icon-it");}
//         if (FlagValue == 'JP') {$("#flag").removeClass().addClass("flag-icon flag-icon-jp");}
//         if (FlagValue == 'KR') {$("#flag").removeClass().addClass("flag-icon flag-icon-kr");}
//         if (FlagValue == 'LK') {$("#flag").removeClass().addClass("flag-icon flag-icon-lk");}
//         if (FlagValue == 'LU') {$("#flag").removeClass().addClass("flag-icon flag-icon-lu");}
//         if (FlagValue == 'MA') {$("#flag").removeClass().addClass("flag-icon flag-icon-ma");}
//         if (FlagValue == 'JP') {$("#flag").removeClass().addClass("flag-icon flag-icon-jp");}
//         if (FlagValue == 'MX') {$("#flag").removeClass().addClass("flag-icon flag-icon-mx");}
//         if (FlagValue == 'NG') {$("#flag").removeClass().addClass("flag-icon flag-icon-ng");}
//     });
//
//     $("#device").change(function () {
//         var deviceValue = $("#device").val();
//         console.log(deviceValue)
//         if (deviceValue == 'mobile') {$("#devicelogo").removeClass().addClass("fa fa-mobile fa-xs");}
//         if (deviceValue == 'desktop') {$("#devicelogo").removeClass().addClass("fa fa-laptop fa-xs");}
//     });
//
//     $("#language").change(function () {
//         var languageValue = $("#language").val();
//         console.log(languageValue)
//         if (languageValue == 'turkish') {$("#languagelogo").empty().css({ 'background-color': ''}).css({ 'background-color': '','color': '#222935' }).append('TR');}
//         if (languageValue == 'english') {$("#languagelogo").empty().css({ 'background-color': ''}).css({ 'background-color': '','color': '#222935' }).append('EN');}
//         if (languageValue == 'arabic') {$("#languagelogo").empty().css({ 'background-color': ''}).css({ 'background-color': '','color': '#222935' }).append('AR');}
//     });
// });
