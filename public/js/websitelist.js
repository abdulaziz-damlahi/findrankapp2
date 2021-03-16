let pageNumber = 1;
let currentPage2 = 1;
let xa =0
let wordcount;
let contdivide;
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
        url: "http://127.0.0.1:8000/api/v1/Keywords/?include=website&sort=-id",
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

                    for (var i2 = 0; i2 < len2; i2++) {

                        var websiteid = response['included'][i2].id

                        var id_website = response['included'][i2].attributes.user_id
                        var websitename = response['included'][i2].attributes.website_name


                        if (wordsiteid == websiteid) {

                            if (websiteid == websitidhtml) {

                                let sayi = response['data'][i].id
                                var str = "<tr><td class='anahtar' data-id='  " + i + "' id=\"ANAHTARKELİME\"> " + word + "</td>" +
                                    "<td id=\"rank\">  " + rank + "</td>" +
                                    "<td id=\"grafik\"><button id=\"grafik\">Open Modal</button></td>" +
                                    "<td scope=\"col\"><a href = 'deletekeyword/" + wordid + "'  class=\"fa fa-trash text-danger\"></a></td></tr>";
                                $('#row').append(str);

                            }

                        }
                    }

                }

            }



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
