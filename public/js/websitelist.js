$(document).ready(function () {
    var pageNumber = 1;
    Statistics(pageNumber);
    keywordsChanges();
    chart();
    popup();
    checked();
})
$("#nextPageButton").click(function () {
    pageNumber = currentPage2;
    pageNumber = pageNumber + 1;
    Statistics(pageNumber);
});

$("#prevPageButton").click(function () {
    pageNumber = currentPage2;
    pageNumber = pageNumber - 1;
    Statistics(pageNumber);
});

function Statistics(pageNumber) {
    // if ($("#ANAHTARKELİME").val('Mobil')){console;}
    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords/?include=website&page[number]="+pageNumber+"&page[size]=10",
        success: function (response) {
            var wordConut = 0
            $('#row').html("")
            var websitidhtml = document.getElementById('websiteid').innerHTML;
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
                                wordConut = wordConut + 1
                                let sayi = response['data'][i].id
                                var str = "<tr><td scope=\"col\"><input type='radio' name='checked' value='" + wordid + "'></td>" +
                                    "<td class='col' data-id='  " + i + "' id=\"ANAHTARKELİME\"> " + word + " </td>" +
                                    "<td id=\"rank\">  " + rank + "</td>" +
                                    "<td id=\"country\"  class='one' >  " + country + "</td>" +
                                    "<td id=\"city\"  class='one' > " + city + "</td>" +
                                    "<td id=\"device2\"class='one' > " + device + "</td>" +
                                    "<td id=\"language\"class='one' >  " + language + "</td>" +
                                    "<td   id=\"grafikbtn\"><a  class=\"fa fa-bar-chart text-primary\" href='grafik/" + wordid + "'> </a></td>" +
                                    "<td scope=\"col\"><a href = 'deletekeyword/" + wordid + "'  class=\"fa fa-trash text-danger \"></a></td>" +
                                    "</tr>";
                                $('#row').append(str);
                            }
                        }
                    }
                }
                var total = response['meta'].page.total
                $('#CountOfWords').append(wordConut);
                $('#CountOfWords').html("current page total is "+wordConut+"");

            }
            var currentPage = response['meta'].page["current-page"];
            var from = response['meta'].page.from;
            var to = response['meta'].page.to;
            var total = response['meta'].page.total;
            var lastPage = response['meta'].page["last-page"];
            var initpage = 0;
            currentPage2 = currentPage
            var currentPageTest = currentPage2 - 1;
            $('#pagination').html("")
            var firstButton = "<a href=\"#\" class='pagination-buttons'  " +
                "data-id='1' id=\"firstPageBtn\">1 ...</a>"
            $('#pagination').append(firstButton);
            while (initpage < lastPage) {

                initpage = initpage + 1;
                currentPageTest = currentPageTest + 1;

                var buttons = " <a href=\"#\" class='pagination-buttons'" +
                    "  data-id='" + initpage + "' id=\"" + initpage + "\">" + initpage + "</a>"

                $('#pagination').append(buttons);

            }
            var lastButton = "<a href=\"#\" class='pagination-buttons' " +
                " data-id='" + lastPage + "' id=\"lastPageBtn\">... " + lastPage + "</a>"

            $('#pagination').append(lastButton);

            document.getElementById(+currentPage + "").classList.toggle('active');

            // loop visible button
            for (i = 1; i <= lastPage; i++) {
                $("#" + i + "").hide();
            }
            if (currentPage < 5) {
                for (i = 1; i <= 5; i++) {
                    $("#" + i + "").show();
                }
            } else {
                nextaPage = currentPage + 1;
                prevPage1 = currentPage - 1
                prevPage2 = currentPage - 2
                prevPage3 = currentPage - 3
                $("#" + currentPage + "").show();
                $("#" + nextaPage + "").show();
                $("#" + prevPage1 + "").show();
                $("#" + prevPage2 + "").show();
                $("#" + prevPage3 + "").show();
            }

            // hide show next & prev & last

            if (lastPage != currentPage) {
                $("#nextPageButton").show();
            } else {
                $("#nextPageButton").hide();
            }
            //last button hide'show
            if (lastPage != currentPage && (lastPage - 1) != currentPage && lastPage != 5 && lastPage != 4 && lastPage != 3) {

                $("#lastPageBtn").show();
            } else {
                $("#lastPageBtn").hide();
            }
            //first button hide'show
            if (currentPage > 4) {
                $("#firstPageBtn").show();
            } else {
                $("#firstPageBtn").hide();
            }

            if (currentPage != 1) {
                $("#prevPageButton").show();
            } else {
                $("#prevPageButton").hide();
            }

            // button & next & prev action codes

            $(".pagination-buttons").click(function () {
                pageNumber = $(this).data('id');
                Statistics(pageNumber);
            });
            //convert date start here
            var CurrentData = response['data'];
            var len = 0;
            if (CurrentData != null) {
                len = CurrentData.length;
            }
            $('#notification-body').html("")
        }
    });
}
// add word popup
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
                                $("#cityy2").append('<option  class="cononical" value=' + valll.attributes.Canonical_Name + '>' + valll.attributes.name + '</option>')
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

$(document).ready(function () {
    $("#editdevice").change(function () {
        if ($(this).val() === "Mobil") {
            let mobile_device = "Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53"
            $("#hidden_device").val(mobile_device);
        } else {
            $("#hidden_device").val("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36")
        }
    });
    $("#editcountry").change(function () {
        $(".editcountry").empty()
        $.ajax({
            type: 'get',
            url: "http://127.0.0.1:8000/api/v1/Locations",
            success: function (response) {
                jQuery.each(response, function (i, val) {
                    jQuery.each(val, function (i, valll) {
                        $sa = valll.attributes.Country_Code;
                        $saname = valll.attributes.name;
                        $aaaa = $("#editcountry").val();
                        if ($sa === $aaaa) {
                            $typecity = valll.attributes.Target_Type;
                            if (valll.attributes.Target_Type === 'City') {
                                $("#editcity").append('<option  class="cononical" value=' + valll.attributes.Canonical_Name + '>' + valll.attributes.name + '</option>')
                            }
                        }
                    });
                });
            }
        });
        $("#editcity").change(function () {
            $("#hidden_collonial").val($(this).val());
            $("#hidden_device").val($("#hidden_collonial").val());
        });

    });
    $("#editlanguage").change(function () {
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
            var up = 0
            var down = 0
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var different = response['data'][i].attributes.different;
                    //down calc
                    if (different === 1) {down = down + 1}
                    //up calc
                    if (different === 3) {up = up + 1}
                }
            }
            $('#totalup').append(up);
            $('#totaldown').append(down);
            if (up === 0 && down === 0) {
                var mainprogress = document.getElementById("mainprogress");
                mainprogress.style.backgroundColor = "white";
            }
            percentage = ((up / (down + up)) * 100);
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

function popup() {
    window.addEventListener('load', (event) => {
// Get the modal
        var modal = document.getElementById("myModal");
        var editmyModal = document.getElementById("editmyModal");
// Get the button that opens the modal
        var btn = document.getElementById("addNewword");
        var editmyModalbtn = document.getElementById("editmyModalbtn");
// Get the <span> element that closes the modal
        var span1 = document.getElementById("close");
        var span2 = document.getElementById("close2");
        var span3 = document.getElementById("editclose");
        var span4 = document.getElementById("editclose2");
// When the user clicks the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }
// When the user clicks on <span> (x), close the modal
        span1.onclick = function () {
            modal.style.display = "none";
        }
        span2.onclick = function () {
            modal.style.display = "none";
        }
        span3.onclick = function () {
            editmyModal.style.display = "none";
        }
        span4.onclick = function () {
            editmyModal.style.display = "none";
        }
        $.ajax({
            type: 'get',
            url: "/api/v1/Packets",
            success: function (response) {
                var len = 0;
                if (response['data'] != null) {
                    len = response['data'].length;
                }
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        var userid_packet = response['data'][0].attributes.user_id;
                        if (userid_packet = userid) {
                            var endofpacket = response['data'][0].attributes.end_of_pocket;
                            var createdAt = response['data'][0].attributes.createdAt;
                            //todays DD/MM/YYYY
                            var today1 = new Date();
                            var dd = String(today1.getDate()).padStart(2, '0');
                            var mm = String(today1.getMonth() + 1).padStart(2, '0');
                            var yyyy = today1.getFullYear();
                            today1 = mm + '/' + dd + '/' + yyyy;
                            var today1format = new Date(today1);
                            var lastday = new Date(endofpacket);
                            //calc diffrance
                            var oneDay = 24 * 60 * 60 * 1000;
                            var diffDays = Math.round(Math.abs((today1format - lastday) / oneDay));
                            if (today1format>lastday){
                                diffDays="-"+diffDays
                            }
                            diffDays2 = (diffDays);
                            $('#daysleft').append(diffDays);
                        }
                    }
                }

            }
        });
        editmyModalbtn.onclick = function () {
            var remainingDays = document.getElementById('daysleft').innerHTML
             remainingDaysINTEGER = parseInt(remainingDays)
            if (remainingDaysINTEGER === 0 || remainingDaysINTEGER === null || remainingDaysINTEGER < 0) {
                editmyModal.style.display = "none";
                var packetalert = document.getElementById('packetalert');
                packetalert.style.display = "block";
            } else {
                editmyModal.style.display = "block";
            }
        }

        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
            // if (event.target === editmyModal) {
            //     editmyModal.style.display = "none";
            // }
        }
    });
}

function checked() {

    document.addEventListener('input', (e) => {
        if (e.target.getAttribute('name') === "checked") {
            var checkedRadio = e.target.value
            getcheckedRadio(checkedRadio)
            var editmyModalbtn = document.getElementById('editmyModalbtn');
            editmyModalbtn.style.display = "inline-block";
        }
    })
}

let checkedRadioGLOBAL

function getcheckedRadio(checkedRadio) {
    checkedRadioGLOBAL = checkedRadio
    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords/" + checkedRadio,
        success: function (response) {
            var countryname
            $('#editurls').html("")
            var id = response['data'].id;
            var website_id = response['data'].attributes.website_id;
            var name = response['data'].attributes.name;
            var device = response['data'].attributes.device;
            var language = response['data'].attributes.language;
            var country = response['data'].attributes.country;
            var city = response['data'].attributes.city;
            $("#editurls").append(name);
            var o = new Option("editselectSecil text", "value");
            if (country === 'TR') {countryname = 'Türkiye'}
            if (country === 'AE') {console.log('true');country = 'Birleşik Arap Emirlikleri'}
            $('#editselectSecil').append('<option value="' + country + '" hidden selected>' + country + '</option>');
            $('#editlanguage').append('<option value="' + language + '" hidden selected>' + language + '</option>');
            $('#editdevice').append('<option value="' + device + '" hidden selected>' + device + '</option>');
            $('#editcity').append('<option value="' + city + '" hidden selected>' + city + '</option>');
        }
    });
}

function onSubmit(form) {
    // event.preventDefault()
    var id = checkedRadioGLOBAL
    var data = JSON.stringify($(form).serializeArray());
    var json = JSON.parse(data);
    var editkeyword = json[1].value
    var editcountry = json[3].value
    var editlanguage = json[4].value
    var editdevice = json[5].value
    var editcity = json[6].value

    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords/" + id,
        success: function (response) {
            var rank = response['data'].attributes.rank;
            var different = response['data'].attributes.different;
            var website_id = response['data'].attributes.website_id;

            $.ajax({
                url: "/api/v1/Keywords/" + id,
                type: "PATCH",
                headers: {
                    "Content-Type": "application/vnd.api+json",
                    Accept: "application/vnd.api+json",
                },
                data: JSON.stringify({
                    "data": {
                        "type": "Keywords",
                        "id": "" + id,
                        "attributes": {
                            "name": editkeyword,
                            "rank": rank,
                            "different": different,
                            "device": editdevice,
                            "website_id": website_id,
                            "language": editlanguage,
                            "country": editcountry,
                            "city": editcity,
                            "updated_At": new Date(),
                        }
                    }
                }),
            });
        }
    });
}

