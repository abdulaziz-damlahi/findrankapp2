window.onload = function () {
var chart = new CanvasJS.Chart("GRAFİK", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Simple Line Chart"
    },
    data: [{
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            { y: 450 },
            { y: 414},
            { y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
            { y: 460 },
            { y: 450 },
            { y: 500 },
            { y: 480 },
            { y: 480 },
            { y: 410 , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
            { y: 500 },
            { y: 480 },
            { y: 510 }
        ]
    }]
});
chart.render();
}


let pageNumber=1;
$(document).ready(function () {
    Statistics(pageNumber)
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
    $.ajax({
        type: 'get',
        url: "http://127.0.0.1:8000/api/v1/Keywords/?include=website&page[number]=" + pageNumber + "&page[size]=9",
        success: function (response) {


            $('#row').html("")
            // jQuery.each(response, function (i, val) {});
            var userid = document.querySelector("#id").innerHTML;
            //len keywords
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
            //len user->keywords
            var websitebelong = 0;
            for (var i3 = 0; i3 < len2; i3++) {
                var websiteid2 = response['included'][i3].attributes.id_website;
                if (userid == websiteid2) {
                    websitebelong++;
                }
            }

            if (len > 0) {
                for (var i = 0; i < len; i++) {

                    var word = response['data'][i].attributes.name
                    var wordsiteid = response['data'][i].attributes.website_id
                    var dataid = response['data'][i].id


                    for (var i2 = 0; i2 < len2; i2++) {

                        var websiteid = response['included'][i2].id
                        var id_website = response['included'][i2].attributes.id_website

                            var websitename = response['included'][i2].attributes.website_name
                            if (wordsiteid == websiteid) {


                                var str = " <tr><th scope=\"row\">" +dataid + "</th>" +
                                    "<td id=\"website\">" + websitename + "</td>" +
                                    "<td id=\"ANAHTARKELİME\"> " + word + "</td>" +
                                    "<td id=\"SIRA\"> SIRA</td>" +
                                    "<td id=\"DEĞİŞİM\"> DEĞİŞİM</td>" +
                                    "<td id=\"GRAFİK\"></td>" +
                                    "</tr>";
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



