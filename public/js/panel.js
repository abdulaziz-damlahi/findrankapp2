$(document).ready(function () {
    var pageNumber = 1;
    // differance();
    getcount();
    chart();
    StatisticsPage(pageNumber);
    Statistics();
    get();
    appendDifferent();
})
$(document).ready(function () {
    //today
    var today = new Date();
    today.setDate(today.getDate() + 30);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth()).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    //yesterday
    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() + 29);
    var dd = String(yesterday.getDate()).padStart(2, '0');
    var mm = String(yesterday.getMonth()).padStart(2, '0');
    var yyyy = yesterday.getFullYear();
    yesterday = yyyy + '-' + mm + '-' + dd;

    $.ajax({
        type: 'get',
        url: "/api/v1/keywordsRequests",
        success: function (response) {
            //len keyword requests
            var len3 = 0;
            if (response['data'] != null) {
                len3 = response['data'].length;
            }
            if (len3 > 0) {
                for (var i3 = 0; i3 < len3; i3++) {
                    //today
                    var KeyWordRequestKeywordId = response['data'][i3].attributes.keyword_id
                    var KeyWordRequestrank = response['data'][i3].attributes.rank
                    var KeyWordRequestcreatedAt = response['data'][i3].attributes.createdAt
                    var KeyWordRequestcreatedAt2 = KeyWordRequestcreatedAt.toString().slice(0, 10)

                    if (KeyWordRequestcreatedAt2 == today || KeyWordRequestcreatedAt2 == yesterday) {

                        if (KeyWordRequestcreatedAt2 == today) {
                            var KeyWordRequestranktoday = KeyWordRequestrank
                        }
                        if (KeyWordRequestcreatedAt2 == yesterday) {
                            var KeyWordRequestrankyesterday = KeyWordRequestrank
                        }
                        if (KeyWordRequestranktoday != null && KeyWordRequestrankyesterday != null) {
                            compare(KeyWordRequestranktoday, KeyWordRequestrankyesterday, KeyWordRequestKeywordId)
                        }

                    }

                }

            }

        }
    })
})

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

let equal = 0;
let plus = 0;
let minus = 0;


function compare(KeyWordRequestranktoday, KeyWordRequestrankyesterday, KeyWordRequestKeywordId) {
    equal = 0;
    plus = 0;
    minus = 0;

    var KeyWordRequestKeywordIdYedek = KeyWordRequestKeywordId
    var keywordid = String(KeyWordRequestKeywordIdYedek)
    //diffrance = 1 -> minus , diffrance = 2 -> equal , diffrance = 3 -> plus
    var different = 0;
    if (KeyWordRequestranktoday < KeyWordRequestrankyesterday) {
        minus = minus + 1
        different = 1

    }
    if (KeyWordRequestranktoday == KeyWordRequestrankyesterday) {
        equal = equal + 1;
        different = 2

    }
    if (KeyWordRequestranktoday > KeyWordRequestrankyesterday) {
        plus = plus + 1
        different = 3

    }

    //  update diffrance ajax
    $.ajax({
        url: "/api/v1/Keywords/" + KeyWordRequestKeywordId,
        type: "PATCH",
        headers: {
            "Content-Type": "application/vnd.api+json",
            Accept: "application/vnd.api+json",
        },
        data: JSON.stringify({
            "data":
                {
                    "type": "Keywords",
                    "id": keywordid,
                    "attributes": {
                        "different": different
                    }
                }
        }),

    });
}

$("#nextPageButton").click(function () {
    pageNumber = currentPage2;
    pageNumber = pageNumber + 1;
    StatisticsPage(pageNumber);
});

$("#prevPageButton").click(function () {
    pageNumber = currentPage2;
    pageNumber = pageNumber - 1;
    StatisticsPage(pageNumber);
});

function StatisticsPage(pageNumber) {
    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords/?include=website&page[number]=" + pageNumber + "&page[size]=10",
        success: function (response) {
            $('#row').html("")
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
                    var wordsiteid = response['data'][i].attributes.website_id
                    var dataid = response['data'][i].id
                    var rank = response['data'][i].attributes.rank

                    for (var i2 = 0; i2 < len2; i2++) {
                        var websiteid = response['included'][i2].id
                        var id_website = response['included'][i2].attributes.user_id
                        var websitename = response['included'][i2].attributes.website_name
                        var url = '{{route("grafik",":id")}}';
                        url = url.replace(':id', dataid);
                        if (wordsiteid == websiteid) {
                            var str = "<tr><td id=\"colmun2\" style='max-width: 40px;overflow-wrap:break-word;overflow: auto ' class='col-2'> <b> " + websitename + "</b></td>" +
                                "<td id=\"ANAHTARKELİME\" style='max-width: 40px;overflow-wrap:break-word;overflow: auto 'class='col-2'> " + word + "</td>" +
                                "<td  id=\"rank\"class='col-2'>  " + rank + "</td>" +
                                "<td   id=\"editbtn\"><a  class=\"fa fa-bar-chart text-primary\" href='/user/website/grafik/" + dataid + "'> </a></td></tr>";
                            $('#row').append(str);
                        }
                    }
                }
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
                StatisticsPage(pageNumber);
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

// popup chart
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

//ilk 3 js
window.addEventListener('load', (event) => {

// Get the modal
    var modal = document.getElementById("ilk3modal");

// Get the button that opens the modal
    var btn = document.getElementById("ilke3btn");

// Get the <span> element that closes the modal
    var span = document.getElementById("closeilk3");

// When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

// ilk 10 js
window.addEventListener('load', (event) => {

// Get the modal
    var modal = document.getElementById("ilk10modal");

// Get the button that opens the modal
    var btn = document.getElementById("ilke10btn");

// Get the <span> element that closes the modal
    var span = document.getElementById("closeilk10");

// When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

// ilk 100 js
window.addEventListener('load', (event) => {

// Get the modal
    var modal = document.getElementById("ilk100modal");

// Get the button that opens the modal
    var btn = document.getElementById("ilke100btn");

// Get the <span> element that closes the modal
    var span = document.getElementById("closeilk100");

// When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

$(document).ready(function () {
    if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
        var colmun1 = document.getElementById("colmun1");

        colmun1.style.maxWidth = "150px";
        colmun1.style.overflowWrap = "break-word";
        colmun1.style.overflow = "auto";

    }

})

function get() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/v1/Websites",
        type: "GET",
        headers: {
            "Content-Type": "application/vnd.api+json",
            Accept: "application/vnd.api+json",
        },

        success: function (response) {
            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var websitename = response['data'][i].attributes.website_name
                    var down = response['data'][i].attributes.down
                    var equal = response['data'][i].attributes.equal
                    var up = response['data'][i].attributes.up
                    var wordcount = response['data'][i].attributes.wordcount
                    var websiteid = response['data'][i].id
                    var idweb = 'webid' + websiteid;
                    var idiff = 'idiff' + websiteid;
                    var str = "<tr> <th id='" + idweb + "' class='hidden' style='font-size: 15px'>" + websiteid + "</th> <th scope='col'><a href=website/" + websiteid + ">" +
                        "<div id='colmun1'></div>" + websitename + "</a></th>" +
                        "<td style='font-size: 15px' class='hidden-xs' scope='col' id='" + idiff + "'>" +
                        "<i class=\"fa fa-chevron-circle-up text-success\"> " + up + " </i>" +
                        "<i class=\"fa fa-circle \"> " + equal + " </i>" +
                        "<i class=\"fa fa-chevron-circle-down text-danger\"> " + down + " </i></td>" +
                        "<td  +scope='col' >" + wordcount + "</td>" +
                        "<td scope='col'><a id='randomm'href=deletewebsite/" + websiteid + " class='fa fa-trash text-danger'></a></td></tr>";
                    $('#followedWebsites').append(str);
                }
            }

        }
    })
}

function getcount() {

    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords/?include=website",
        success: function (response) {
            //len websites

            var len1 = 0;
            if (response['included'] != null) {
                len1 = response['included'].length;
            }
            //len keyword
            var len2 = 0;
            if (response['data'] != null) {
                len2 = response['data'].length;
            }

            if (len1 > 0) {
                for (var i1 = 0; i1 < len1; i1++) {
                    var wordcount2 = 0;
                    var websiteid = response['included'][i1].id
                    var type = response['included'][i1].type;
                    var createdAt = response['included'][i1].attributes.createdAt;
                    var updatedAt = response['included'][i1].attributes.updatedAt;
                    var user_id = response['included'][i1].attributes.user_id
                    var website_name = response['included'][i1].attributes.website_name;
                    // wordcount = response['data'][i3].attributes.wordcount;
                    for (var i2 = 0; i2 < len2; i2++) {
                        var keywordwebsiteid = response['data'][i2].attributes.website_id
                        if (websiteid == keywordwebsiteid) {
                            wordcount2++
                        }
                    }
                    $.ajax({
                        url: "/api/v1/Websites/" + websiteid,
                        type: "PATCH",
                        headers: {
                            "Content-Type": "application/vnd.api+json",
                            Accept: "application/vnd.api+json",
                        },
                        data: JSON.stringify({
                            "data": {
                                "type": "Websites",
                                'id': websiteid,
                                "attributes": {
                                    "user_id": user_id,
                                    "website_name": website_name,
                                    "wordcount": wordcount2,
                                }
                            }
                        }),

                    });

                }
            }
        }
    });
}

function Statistics() {
    $.ajax({
        url: "/api/v1/Websites",
        type: "GET",
        headers: {
            "Content-Type": "application/vnd.api+json",
            Accept: "application/vnd.api+json",
        },
        success: function (response) {
        }
    })
}

let minusappend
let equalappend
let plusappend
function appendDifferent() {


    $.ajax({
        type: 'get',
        url: "/api/v1/Keywords/?include=website",
        success: function (response) {
            //len websites

            var len1 = 0;
            if (response['included'] != null) {
                len1 = response['included'].length;
            }
            //len keyword
            var len2 = 0;
            if (response['data'] != null) {
                len2 = response['data'].length;
            }

            if (len1 > 0) {
                for (var i1 = 0; i1 < len1; i1++) {
                    minusappend = 0
                    equalappend = 0
                    plusappend = 0
                    var wordcount2 = 0;
                    var websiteid = response['included'][i1].id
                    var website_name = response['included'][i1].attributes.website_name;
                    for (var i2 = 0; i2 < len2; i2++) {
                        var keywordwebsiteid = response['data'][i2].attributes.website_id
                        var keyworddifferent = response['data'][i2].attributes.different
                        if (websiteid == keywordwebsiteid) {
                            if (keyworddifferent == 1) {
                                minusappend =minusappend + 1
                            }
                            if (keyworddifferent == 2) {
                                equalappend =  equalappend + 1
                            }
                            if (keyworddifferent == 3) {
                                plusappend = plusappend + 1
                            }
                            $.ajax({
                                url: "/api/v1/Websites/" + keywordwebsiteid,
                                type: "PATCH",
                                headers: {
                                    "Content-Type": "application/vnd.api+json",
                                    Accept: "application/vnd.api+json",
                                },
                                data: JSON.stringify({
                                    "data": {
                                        "type": "Websites",
                                        'id': websiteid,
                                        "attributes": {
                                            "down": minusappend,
                                            "equal": equalappend,
                                            "up": plusappend,
                                        }
                                    }
                                }),

                            });
                        }
                    }


                }
            }
        }
    });

}

