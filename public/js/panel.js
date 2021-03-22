$(document).ready(function () {
    var pageNumber = 1;
    getcount();
    Statistics2(pageNumber);
    Statistics();
    get();
})
$("#nextPageButton").click(function () {
    pageNumber = currentPage2;

    pageNumber = pageNumber + 1;
    Statistics2(pageNumber);
});

$("#prevPageButton").click(function () {
    pageNumber = currentPage2;
    pageNumber = pageNumber - 1;
    Statistics2(pageNumber);
});

function Statistics2(pageNumber) {
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
                        if (wordsiteid == websiteid) {
                            var str = " <tr><th scope=\"row\">" + dataid + "</th>" +
                                "<td id=\"colmun2\" style='max-width: 40px;overflow-wrap:break-word;overflow: auto ' class='col-2'> <b> " + websitename + "</b></td>" +
                                "<td id=\"ANAHTARKELİME\" style='max-width: 40px;overflow-wrap:break-word;overflow: auto 'class='col-2'> " + word + "</td>" +
                                "<td  id=\"rank\"class='col-2'>  " + rank + "</td>" +
                                "<td class='hidden-xs col-2' id=\"grafik\"><button id=\"grafik\">Open Modal</button></td></tr>";
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
                Statistics2(pageNumber);
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


window.onload = function () {

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
                            "<td id=\"grafik\"><button id=\"grafik\">Open Modal</button></td></tr>";
                        $('#ilk3table').append(str);
                    }
                    if (rank > 3 && rank <= 10) {
                        les10 = les10 + 1;
                        var str = "<tr><td id=\"ANAHTARKELİME\"> " + id + "</td>" +
                            "<td id=\"ANAHTARKELİME\"> " + word + "</td>" +
                            "<td id=\"rank\">  " + rank + "</td>" +
                            "<td id=\"grafik\"><button id=\"grafik\">Open Modal</button></td></tr>";
                        $('#ilk10table').append(str);

                    }
                    if (rank > 10 && rank <= 100) {
                        les100 = les100 + 1;
                        var str = "<tr><td id=\"ANAHTARKELİME\"> " + id + "</td>" +
                            "<td id=\"ANAHTARKELİME\"> " + word + "</td>" +
                            "<td id=\"rank\">  " + rank + "</td>" +
                            "<td id=\"grafik\"><button id=\"grafik\">Open Modal</button></td></tr>";
                        $('#ilk100table').append(str);
                    }
                }
                $('#ilk3').append(les3);
                $('#ilk10').append(les10);
                $('#ilk100').append(les100);
            }
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,

                data: [{
                    type: "doughnut",
                    startAngle: 60,
                    //innerRadius: 60,
                    indexLabelFontSize: 17,
                    indexLabel: "{label} - #percent%",
                    toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                    dataPoints: [
                        {y: les3, label: "les than 3"},
                        {y: les10, label: "les than 10"},
                        {y: les100, label: "les than 100"},
                    ]
                }]
            });
            chart.render();
        }

    });


}

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
                    var wordcount = response['data'][i].attributes.wordcount
                    var websiteid = response['data'][i].id
                    var str = "<tr><th scope='col'><a href=website/" + websiteid + "><div id='colmun1'></div>" + websiteid + "</a></th>" +
                        "<th scope='col'><a href=website/" + websiteid + "><div id='colmun1'></div>" + websitename + "</a></th>" +
                        "<td class='hidden-xs' scope='col' >GÜNLÜK DEĞİŞİM</td>" +
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

