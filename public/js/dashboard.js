$(document).ready(function () {
    get();
});

function get() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/v1/packets-reels",
        headers: {
            "Content-Type": "application/vnd.api+json",
            Accept: "application/vnd.api+json",
        },
        type: "GET",
        success: function (result) {
            var lenght = 0;
            if (result['data'] != null) {
                lenght = result['data'].length;
            }

            console.log(lenght)
            console.log(result)
            for (i = 0; i < lenght; i++) {
                var price = result['data'][i].attributes.price;
                var names_packets = result['data'][i].attributes.names_packets;
                var id = result['data'][i].id;
                var word_count = result['data'][i].attributes.word_count;
                var websites_count = result['data'][i].attributes.websites_count;
                var description = result['data'][i].attributes.description;
                var rank_fosllow = result['data'][i].attributes.rank_fosllow;
                console.log(id)
                var str = "<tr><td>" + id + "</td><td>" + names_packets + "</td><td>" + word_count + "</td><td>" + websites_count + "</td><td>" + rank_fosllow + "</td><td>" + description + "</td><td>" + price + "</td>" +
                    "<td> <button type=\"button\" id='editbtn'  class=\"btn btn-success\" onclick='return edit2(" + id + ") ' data-toggle=\"modal\" data-target='#upModal'>EDIT</button></td> <td><button  type='button' id='deletebtn' onclick='return destroy(" + id + ") ' class='btn btn-danger ' data-toggle=\"modal\" data-target='#deleteModal'>DELETE</button></td></tr>"
                $("#bodyTable").append(str)
            }
            console.log('işlem başarılı')
        }
    });

}

//------------------------------------------------------------------EKLEME---------------------------------------------------------------------------------------------------

$(document).on('click', '#btnSave', function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/api/v1/packets-reels",
        headers: {
            "Content-Type": "application/vnd.api+json",
            Accept: "application/vnd.api+json",
        },
        data: JSON.stringify({
            "data": {
                "type": "packets-reels",

                "attributes": {
                    "names_packets": $("#names_packets").val(),
                    "word_count": $("#word_count").val(),
                    "websites_count": $("#websites_count").val(),
                    "rank_fosllow": $("#rank_fosllow").val(),
                    "description": $("#description").val(),
                    "price": $("#price").val(),
                }
            }
        }),
        success: function (response) {
            console.log(response)
            $('#addModal').modal('hide');
            //  alert("Packet Saved");
            location.reload();
        },
        error: function (error) {
            console.log(error);
        }
    });
});

//----------------------------------------------------------------------------DÜZENLEME-------------------------------------------------------------------------------------------------------------------------

function edit2(id) {

    let responseData = [];
    $.ajax({
        url: "http://127.0.0.1:8000/api/v1/packets-reels/" + id,
        type: 'get',

        success: function (response) {
            console.log(response)
            var price = response['data'].attributes.price;
            var names_packets = response['data'].attributes.names_packets;
            var word_count = response['data'].attributes.word_count;
            var websites_count = response['data'].attributes.websites_count;
            var description = response['data'].attributes.description;
            var rank_fosllow = response['data'].attributes.rank_fosllow;

            $('#price1').attr("value", price);
            $('#names_packets1').attr("value", names_packets);
            $('#word_count1').attr("value", word_count);
            $('#websites_count1').attr("value", websites_count);
            $('#rank_fosllow1').attr("value", rank_fosllow);
            $('#description1').attr("value", description);
        },
    });
    $(document).on('click', '#buttonSave', function (e) {

        $.ajax({
            url: "http://127.0.0.1:8000/api/v1/packets-reels/" + id,
            type: 'PATCH',
            headers: {
                "Content-Type": "application/vnd.api+json",
                Accept: "application/vnd.api+json",
            },

            data: JSON.stringify({
                "data":
                    {

                        "type": "packets-reels",
                        'id': "" + id,
                        "attributes": {
                            "names_packets": $("#names_packets1").val(),
                            "word_count": $("#word_count1").val(),
                            "websites_count": $("#websites_count1").val(),
                            "rank_fosllow": $("#rank_fosllow1").val(),
                            "description": $("#description1").val(),
                            "price": $("#price1").val(),
                        }
                    }
            }),
            success: function (response) {
                console.log(response)
                $('#upModal').modal('hide');
                //    alert("Packet Saved");
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
}

// ---------------------------- SİLME-----------------------------------------------------------------------------------------------------------------------------------------------------------
function destroy(id) {
    $(document).on('click', '#deleteButton', function (e) {
        console.log(id)
        $.ajax(
            {
                url: "http://127.0.0.1:8000/api/v1/packets-reels/" + id,
                type: 'delete',
                success: function (result) {
                    location.reload();
                }
            });
        return false;
    });
}

//---------------------------------------------------------------------------------------------------------------------user table and pagination--------------------------------------------------------------------------------------------

$(function () {
    let page = 1;
    const $paginationArea = $("#pagin");

    function updatePagination(pageResponse) {

        let pages = "";
        const currentPage = pageResponse['current-page']
        const lastPage = pageResponse['last-page']
        const DISPLAY_PAGES = [1, currentPage - 2, currentPage - 1, currentPage, currentPage + 1, currentPage + 2, lastPage];
        if (currentPage > 1) {
            pages += `<li><a href="#0" onclick='changePage(${currentPage - 1})'><i ></i><span>Prev</span></a></li>`
        }
        for (let i = 1; i <= lastPage; i++) {
            const classNames = (i === currentPage ? "active" : "")
            if (DISPLAY_PAGES.includes(i)) {
                pages += `<li><a href="#0" class="${classNames}" onclick="changePage(${i})">${i}</a></li>`
            }
        }
        if (currentPage < lastPage) {
            pages += `<li><a href="#0" onclick="changePage(${currentPage + 1})"><span>Next</span><i ></i></a></li>`
        }
        $paginationArea.html(pages)
    }

    window.changePage = function (newPage) {
        $paginationArea.find(".active").html();
        $.ajax({
            url: "http://127.0.0.1:8000/api/v1/packets-of-users?include=Users&page[size]=2&page[number]=" + newPage,
            method: "GET",
            headers: {
                "Content-Type": "application/vnd.api+json",
                Accept: "application/vnd.api+json",
            },
            success: function (response) {
                updatePagination(response.meta.page)
                $("#userBodyTable").html("")
                var lenghtab = 0;
                if (response['data'] != null) {
                    lenghtab = response.data.length;
                    console.log("lenghtab", lenghtab)
                }
                var includelenghtab = 0;
                if (response['included'] != null) {
                    includelenghtab = response.included.length;
                    console.log("lenghtab", lenghtab)
                }
                if (lenghtab > 0) {
                    for (k = 0; k < lenghtab; k++) {
                        var count_of_words = response['data'][k].attributes.count_of_words;
                        var max_count_of_words = response['data'][k].attributes.max_count_of_words;
                        var id = response['data'][k].id;
                        var price = response['data'][k].attributes.price;
                        var end_of_pocket = response['data'][k].attributes.end_of_pocket;
                        var descrpitions = response['data'][k].attributes.descrpitions;
                        var count_of_websites = response['data'][k].attributes.count_of_websites;
                        var packet_names = response['data'][k].attributes.packet_names;
                        var rank_follow_max = response['data'][k].attributes.rank_follow_max;
                        var rank_follow = response['data'][k].attributes.rank_follow;
                        var max_count_of_websites = response['data'][k].attributes.max_count_of_websites;
                        var paymentId = response['data'][k].attributes.paymentId;
                        var user_id = response['data'][k].attributes.user_id;
                        for (i = 0; i < includelenghtab; i++) {
                            var uid = response['included'][i].id;
                            var uid2 = parseInt(uid)

                            if (user_id === uid2) {
                                console.log(uid2, user_id)
                                var name = response['included'][i].attributes.first_name;
                                var surname = response['included'][i].attributes.last_name;
                            }
                        }
                        var st = "<tr><td class='hide'>" + uid + "</td><td class='hide'>" + id + "</td><td class='hide'>" + user_id + "</td><td>"
                            + name + "</td><td>" + surname + "</td><td>" + packet_names + "</td><td>" + count_of_words +
                            "</td><td>" + max_count_of_words + "</td><td>" + count_of_websites +
                            "</td><td>" + max_count_of_websites + "</td><td>" + end_of_pocket +
                            "</td><td>" + rank_follow + "</td><td>" + rank_follow_max + "</td><td>"
                            + paymentId + "</td><td>" + descrpitions + "</td><td>" + price + "</td></tr>"
                        $("#userBodyTable").append(st)
                    }
                }
            },
            error: function (err) {
            }

        });
    }
    changePage(1);
});
