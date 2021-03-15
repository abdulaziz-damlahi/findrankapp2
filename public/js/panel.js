let pageNumber = 1;
let currentPage2 = 1;
$(document).ready(function () {
    Statistics(pageNumber)
})
$("#nextPageButton").click(function () {
    pageNumber = currentPage2;
    console.log(currentPage2)
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
        url: "http://127.0.0.1:8000/api/v1/Keywords/?include=website&page[number]=" + pageNumber + "&page[size]=10",
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
                                "<td id=\"website\">" + websitename + "</td>" +
                                "<td id=\"ANAHTARKELİME\"> " + word + "</td>" +
                                "<td id=\"rank\">  " + rank + "</td>" +
                                "<td id=\"DEĞİŞİM\"> DEĞİŞİM</td>" +
                                "<td id=\"grafik\"><button id=\"grafik\">Open Modal</button></td></tr>";
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


// function mywebsites() {
//     $.ajax({
//         type: 'get',
//         url: "http://127.0.0.1:8000/api/v1/Keywords/?include=website",
//         success: function (response) {
//             $('#mysites').html("")
//             //len keyword
//             var len = 0;
//             if (response['data'] != null) {
//                 len = response['data'].length;
//             }
//             var elmId = $("#test").attr("id");
//             //len websites
//             var len2 = 0;
//             if (response['included'] != null) {
//                 len2 = response['included'].length;
//             }
//             if (len > 0) {
//                 for (var i = 0; i < len; i++) {
//
//                     var word = response['data'][i].attributes.name
//                     var wordsiteid = response['data'][i].attributes.website_id
//                     var dataid = response['data'][i].id
//                     var rank = response['data'][i].attributes.rank
//
//                     for (var i2 = 0; i2 < len2; i2++) {
//
//                         var websiteid = response['included'][i2].id
//                         var id_website = response['included'][i2].attributes.user_id
//                         var websitename = response['included'][i2].attributes.website_name
//
//                         if (wordsiteid == websiteid) {
//                             var str = " <tr><th scope=\"row\">" + dataid + "</th>" +
//                                 "<td id=\"website\">" + websitename + "</td>" +
//                                 "<td id=\"ANAHTARKELİME\"> " + word + "</td>" +
//                                 "<td id=\"rank\">  " + rank + "</td>" +
//                                 "<td id=\"DEĞİŞİM\"> DEĞİŞİM</td>" +
//                                 "<td id=\"grafik\"><button id=\"grafik\">Open Modal</button></td></tr>";
//                             $('#mysites').append(str);
//                         }
//                     }
//                 }
//             }
//         }
//     })
// }






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
    btn.onclick = function() {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    span2.onclick = function() {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
