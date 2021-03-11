$(document).ready(function () {
    $.ajax({
        type: 'get',
        url: "http://127.0.0.1:8000/api/v1/Keywords/?include=website",
        success: function (response) {
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
                var websiteid = response['included'][i3].attributes.id_website;
                if (userid == websiteid) {
                    websitebelong++;
                }
            }

            if (len > 0) {
                for (var i = 0; i < len; i++) {

                    var word = response['data'][i].attributes.name

                    var wordsiteid = response['data'][i].attributes.website_id

                    for (var i2 = 0; i2 < len2; i2++) {
                        var websiteid = response['included'][i2].id
                        var id_website = response['included'][i2].attributes.id_website
                        if (id_website == userid) {
                            if (wordsiteid == websiteid) {
                                var websitename = response['included'][i2].attributes.website_name
                                var str = " <tr><th scope=\"row\">" + i + "</th>" +
                                    "<td id=\"website\">" + websitename + "</td>" +
                                    "<td id=\"ANAHTARKELİME\"> " + word + "</td>" +
                                    "<td id=\"SIRA\"> SIRA</td>" +
                                    "<td id=\"DEĞİŞİM\"> DEĞİŞİM</td>" +
                                    "<td id=\"GRAFİK\">GRAFİK</td>" +
                                    "</tr>";
                                $('#row').append(str);
                            }
                        }
                    }
                }
            }
        }
    });
});

