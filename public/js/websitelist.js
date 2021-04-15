$(document).ready(function () {
    Statistics();
    keywordsChanges();
    chart();
})

function Statistics() {
    // if ($("#ANAHTARKELİME").val('Mobil')){console;}
    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords/?include=website&sort=-id",
        success: function (response) {
            $('#row').html("")
            var websitidhtml =document.getElementById('websiteid').innerHTML;
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
                                var str = "<tr><td class='col' data-id='  " + i + "' id=\"ANAHTARKELİME\"> " + word + " </td>" +
                                    "<td id=\"rank\">  " + rank + "</td>" +
                                    "<td id=\"country\"  class='one' >  " + country + "</td>" +
                                    "<td id=\"city\"  class='one' > " + city + "</td>" +
                                    "<td id=\"device2\"class='one' > " + device + "</td>" +
                                    "<td id=\"language\"class='one' >  " + language + "</td>" +
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
    var btn = document.getElementById("addNewword");

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

function keywordsChanges() {
    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords",
        success: function (response) {
            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }
            $('#totalword').append(len);
            var up=0
            var down=0
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var different = response['data'][i].attributes.different;
                    //down calc
                    if (different===1){down=down+1}
                    //up calc
                    if (different===3){up=up+1}
                }
            }
            $('#totalup').append(up);
            $('#totaldown').append(down);
            if (up===0 && down===0){
                var mainprogress = document.getElementById("mainprogress");
                mainprogress.style.backgroundColor = "white";
            }
            percentage = (( up/ (down+up)) * 100);
            var KeywordTotalWordCount = document.getElementById("KeywordTotalWordCount");
            percentage2 = (percentage) + '%'
            KeywordTotalWordCount.style.width = percentage2;
        }
    });
}

function chart() {
    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords/?include=website",
        success: function (response) {
            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }

            var les3 = 0;
            var les10 = 0;
            var les100 = 0;
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var id = response['data'][i].id
                    var rank = response['data'][i].attributes.rank
                    var word = response['data'][i].attributes.name
                    if (rank > 0 && rank <= 3) {
                        les3 = les3 + 1;
                        var str = "<tr><td id=\"ANAHTARKELİME\"> " + id + "</td>" +
                            "<td id=\"ANAHTARKELİME\"> " + word + "</td>" +
                            "<td id=\"rank\">  " + rank + "</td>" +
                            "<td   id=\"editbtn\"><a  class=\"fa fa-bar-chart text-primary\" href='/user/website/grafik/" + id + "'> </a></td></tr>";
                        $('#ilk3table').append(str);
                    }
                    if (rank > 3 && rank <= 10) {
                        les10 = les10 + 1;
                        var str = "<tr><td id=\"ANAHTARKELİME\"> " + id + "</td>" +
                            "<td id=\"ANAHTARKELİME\"> " + word + "</td>" +
                            "<td id=\"rank\">  " + rank + "</td>" +
                            "<td   id=\"editbtn\"><a  class=\"fa fa-bar-chart text-primary\" href='/user/website/grafik/" + id + "'> </a></td></tr>";
                        $('#ilk10table').append(str);

                    }
                    if (rank > 10 && rank <= 100) {
                        les100 = les100 + 1;
                        var str = "<tr><td id=\"ANAHTARKELİME\"> " + id + "</td>" +
                            "<td id=\"ANAHTARKELİME\"> " + word + "</td>" +
                            "<td id=\"rank\">  " + rank + "</td>" +
                            "<td   id=\"editbtn\"><a  class=\"fa fa-bar-chart text-primary\" href='/user/website/grafik/" + id + "'> </a></td></tr>";
                        $('#ilk100table').append(str);
                    }
                }
                $('#ilk3').append(les3);
                $('#ilk10').append(les10);
                $('#ilk100').append(les100);
            }
            CanvasJS.addColorSet("customColorSet1",
                ["#fd9644", "#6495ed", "#fc5c65"]);

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                colorSet: "customColorSet1",
                data: [
                    {
                        colorSet: "customColorSet1",
                        //startAngle: 45,
                        indexLabelFontSize: 20,
                        indexLabelFontFamily: "Garamond",
                        indexLabelFontColor: "orange",
                        indexLabelLineColor: "darkgrey",
                        indexLabelPlacement: "outside",
                        type: "doughnut",
                        startAngle: 60,
                        //innerRadius: 60,
                        indexLabelFontSize: 17,
                        indexLabel: "{label} - #percent%",
                        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                        dataPoints: [
                            { y: les3, label: "les than 3", },
                            { y: les10, label: "les than 10" },
                            { y: les100, label: "les than 100" },
                        ]
                    }]
            });
            chart.render();
        }

    });

}
