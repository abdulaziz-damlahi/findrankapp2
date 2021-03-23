let pageNumber = 1;
let currentPage2 = 1;
let xa = 0
let wordcount;
let contdivide;
$(document).ready(function () {
    Statistics()
})

function Statistics() {
    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords/?include=website&sort=-id",
        success: function (response) {
            $('#row').html("")
            var websitidhtml = document.querySelector("#wrap > div:nth-child(3) > div > div > div.card-header > h5").innerHTML;

            //len keyword
            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }
            var elmId = $("#test").attr("id");
            //len websites
            var len2 = 0;
            if (response['included'] != null) {
                len2 = response['included'].length;
            }
            if (len > 0) {
                for (var i = 0; i < len; i++) {

                    var word = response['data'][i].attributes.name
                    var wordid = response['data'][i].id
                    var wordsiteid = response['data'][i].attributes.website_id
                    var dataid = response['data'][i].id
                    var rank = response['data'][i].attributes.rank
                    var country = response['data'][i].attributes.country
                    var language = response['data'][i].attributes.language
                    var device = response['data'][i].attributes.device
                    var city = response['data'][i].attributes.city

                    for (var i2 = 0; i2 < len2; i2++) {
                        var websiteid = response['included'][i2].id
                        var id_website = response['included'][i2].attributes.user_id
                        if (wordsiteid == websiteid) {
                            if (websiteid == websitidhtml) {
                                let sayi = response['data'][i].id
                                var str = "<tr><td  class='anahtar' data-id='  " + i + "' id=\"ANAHTARKELİME\"> " + word + " </td>" +
                                    "<td id=\"rank\">  " + rank + "</td>" +
                                    "<td id=\"country\">  " + country + "</td>" +
                                    "<td id=\"country\">  " + city + "</td>" +
                                    "<td id=\"language\">  " + language + "</td>" +
                                    "<td id=\"device\">  " + device + "</td>" +
                                    "<td   id=\"editbtn\"><a  class=\"fa fa-bar-chart text-primary\" href='grafik/" + wordid + "'> </a></td>" +
                                    "<td scope=\"col\"><a href = 'deletekeyword/" + wordid + "'  class=\"fa fa-trash text-danger \"></a></td>" +
                                    "<td   id=\"editbtn\"><a  class=\"fa fa-edit text-success \" href='editkeyword/" + wordid + "'> </a> </td></tr>";
                                $('#row').append(str);

                            }

                        }
                    }

                }

            }


        }
    });
}

// add word popup
window.addEventListener('load', (event) => {

// Get the modal
    var modal = document.getElementById("myModal");

// Get the button that opens the modal
    var btn = document.getElementById("addNewSite");

// Get the <span> element that closes the modal
    var span = document.getElementById("close");
    var span2 = document.getElementById("close2");


// When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
    span2.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

$("#device2").change(function () {
    if ($(this).val() === "Mobil") {
        let mobile_device = "Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53"
        $("#language_name2").val(mobile_device);
    } else {
        $("#hidden_device2").val("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36")
    }
});

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
                                $("#cityy")
                                    .append('<option  class="cononical" value=' + valll.attributes.Canonical_Name + '>' + valll.attributes.name + '</option>')
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

//chart popup
window.addEventListener('load', (event) => {

    var btn = document.getElementById("grafikbtn");
    btn.onclick = function () {
        modal.style.display = "block";
    }

    var span = document.getElementById("grafikclose");
    span.onclick = function () {
        modal.style.display = "none";
    }

    var span2 = document.getElementById("grafikclose2");
    span2.onclick = function () {
        modal.style.display = "none";
    }

    var modal = document.getElementById("grafikmodal");
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});


