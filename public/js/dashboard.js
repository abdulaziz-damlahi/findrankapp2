$(document).ready(function () {
    var x = screen.width
    $("#rightMenu").css('display', 'block');
    $("#piechart").css('display', 'block');
    if (x > 500) {
        $("#rightMenu").css('overflow-x', 'auto');

    } else {
    }
    $("#buttondash").click(function () {
        console.log('girer')
        $("#rightMenu").toggle('slide');
        if ($("#rightMenu").css('display') == 'block') {
            console.log($("#rightMenu").css('display'), "block")
            console.log('none oldu')

            $("#piechart").css('display', 'block');
            $("#piechart").show();
            $("#piechart").css('width', '200px');

            $("#arrowleft").css('display', 'block');
            $("#arrowicon").css('display', 'none');

        } else if ($("#rightMenu").css('display') == 'none') {
            $("#piechart").css('display', 'none');
            console.log('girer2')
            $("#piechart").hide();
            console.log($("#rightMenu").css('display'), "block2")

            $("#under_menu").css('margin-bottom', '550px')
            $("#arrowleft").css('display', 'none');
            $("#arrowicon").css('display', 'block');
            var x = screen.width
            if (x < 500) {
                console.log('geeliyor');
                $("#under_menu").css('position', 'relative')
                $("#under_menu").css('width', '100%')
                $("#under_menu").css('margin-bottom', '550px')
                $("#Buttondashboard").css('margin-top', '90%')
            } else {
                console.log('gidiyor');

            }

        }
    });
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        let countries = [];
        getCountryDate()
    }

    $(document).ready(function () {

        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            let countries = [];

            $.ajax({
                url: "/api/v1/packets-of-users",
                type: "GET",
                success: function (result) {
                    $.each(result.data, function (key, value) {
                        countries.push(value.attributes.country);
                    });
                    var count = {};
                    countries.forEach(function (i) {
                        count[i] = (count[i] || 0) + 1;
                    });
                    let array2 = Object.values(count)
                    let array3 = Object.keys(count);
                    // Create and populate the data table.
                    var years = ['2001', '2002', '2003', '2004', '2005'];
                    var sales = [1, 2, 3, 4, 5];
                    /*  var data = google.visualization.arrayToDataTable([
                     ['Task', 'Hours per Day'],
                     ["array3"   ,  array2],
                     ]);
                     */
                    var data = new google.visualization.DataTable();
                    // assumes "word" is a string and "count" is a number
                    data.addColumn('string', 'word');
                    data.addColumn('number', 'count');

                    for (var i = 0; i < array3.length; i++) {
                        data.addRow([array3[i], array2[i]]);
                    }
                    var options = {
                        title: 'Ülkelere Göre Kullanıcı verileri',
                        pieHole: 0.4,
                    };

                    // Create and draw the visualization.
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }
            });
            console.log('gireadasdsasad')
        }

        $.ajax({
            url: "/api/v1/all-google-search-datas",
            type: "GET",
            success: function (result) {
                var searching = [];
                $.each(result.data, function (key, value) {
                    if (value.attributes.processtime == "Currency") {
                        var today = new Date();
                        var today2 = new Date(value.attributes.updated_at);

                        function formatDate(date) {
                            var d = new Date(today),
                                month = '' + (d.getMonth() + 1),
                                day = '' + d.getDate(),
                                year = d.getFullYear();

                            if (month.length < 2)
                                month = '0' + month;
                            if (day.length < 2)
                                day = '0' + day;

                            return [year, month, day].join('-');
                        }

                        function formatDaate(date) {
                            var d = new Date(today2),
                                month = '' + (d.getMonth() + 1),
                                day = '' + d.getDate(),
                                year = d.getFullYear();

                            if (month.length < 2)
                                month = '0' + month;
                            if (day.length < 2)
                                day = '0' + day;

                            return [year, month, day].join('-');
                        }

                        let FormatedSDate = formatDate(today);
                        let FormatedSDate2 = formatDaate(today2);
                        searching.push(value)
                        const match = FormatedSDate.match(FormatedSDate2)
                        if (match != null) {
                        }

                    }
                })

            }
        });
        $.ajax({
            url: "/api/v1/packets-reels",
            type: "GET",
            success: function (result) {
                var lenght = 0;
                if (result['data'] != null) {
                    lenght = result['data'].length;
                }
                for (i = 0; i < lenght; i++) {
                    var price = result['data'][i].attributes.price;
                    var names_packets = result['data'][i].attributes.names_packets;
                    var id = result['data'][i].attributes.id;
                    var word_count = result['data'][i].attributes.word_count;
                    var websites_count = result['data'][i].attributes.websites_count;
                    var description = result['data'][i].attributes.description;
                    var rank_fosllow = result['data'][i].attributes.rank_fosllow;
                    var str = "<tr><td>" + names_packets + "</td><td>" + word_count + "</td><td>" + websites_count + "</td><td class='hidden-xs'>" + rank_fosllow + "</td><td  class='hidden-xs'>" + description + "</td><td>" + price + "</td>" +
                        "<td> <a type=\"button\" class=\"  \" data-toggle=\"modal\"\n" +
                        "                    data-target=\"#upModal\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 16.094l-4.157-4.104 4.1-4.141-1.849-1.849-4.105 4.159-4.156-4.102-1.833 1.834 4.161 4.12-4.104 4.157 1.834 1.832 4.118-4.159 4.143 4.102 1.848-1.849z\"/></svg>" +
                        "            </a></td> <td><a href='#' type='button' id='deletebtn' onclick=''   class='' ><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 16.094l-4.157-4.104 4.1-4.141-1.849-1.849-4.105 4.159-4.156-4.102-1.833 1.834 4.161 4.12-4.104 4.157 1.834 1.832 4.118-4.159 4.143 4.102 1.848-1.849z\"/></svg></a></td></tr>"
                    $("#bodyTable").append(str)
                }

            }

        });
        window.addEventListener('load', (event) => {

// Get the modal
            var modal = document.getElementById("upModal");
// Get the button that opens the modal
            var btn = document.getElementById("addcreate");
            btn.onclick = function () {
                modal.style.display = "block";
            }
        });

        $('#modalForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/api/v1/packets-reels",
                data: $('#modalForm').serialize(),
                success: function (response) {
                    $('#addModal').modal('hide');
                    alert("Packet Saved");
                    location.reload();
                },
                error: function (error) {
                }
            });
        });

        $('.editbtn').on('click', function () {
            $('#upModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            $('#names_packet').val(data[0]);
            $('#word_count').val(data[1]);
            $('#websites_count').val(data[2]);
            $('#rank_fosllow').val(data[3]);
            $('#description').val(data[4]);
            $('#price').val(data[5]);

        });

        $('#editmodalForm').on('submit', function (e) {
            // e.preventDefault();
            $.ajax({
                type: "PATCH",
                url: "/api/v1/packets-reels" + id,
                data: $('#editmodalForm').serialize(),
                success: function (response) {
                    $('#upModal').modal('hide');
                    alert("Packet Saved");
                    location.reload();
                },
                error: function (error) {
                }
            });
        });
        $('#deletebtn').on('click', function () {
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();

            }).get();

        });

        var id = $('.deletebtn').val();

    });
    let dps1 = [];

    function getCountryDate() {

        $.ajax({
            url: "/api/v1/all-google-search-datas",
            type: "GET",
            success: function (response) {
                var len = 0;
                if (response['data'] != null) {
                    len = response['data'].length;
                }
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        var y = 0;
                        var createdAt = response['data'][i].attributes.updated_at;
                        var createdAtsliced = createdAt.slice(0, 10)
                        for (var i2 = 0; i2 < len; i2++) {
                            var createdAt2 = response['data'][i2].attributes.updated_at;
                            var createdAtsliced2 = createdAt2.slice(0, 10)
                            if (createdAtsliced === createdAtsliced2) {
                                y = y + 1
                            }
                        }
                        dps1.push({ x: new Date(createdAtsliced), y: y });
                    }
                }
                console.log(dps1)
                if (i === len) {CountryChart(dps1)}
            }
        });

    }

    function CountryChart(dps1) {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Daily Search"
            },
            axisX: {
                valueFormatString: "DD MMM,YYYY"
            },
            axisY: [{
                title: "Visits",
                includeZero: true,
            }],
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "line",
                color: "#369EAD",
                axisYIndex: 1,
                dataPoints: dps1
            }]
        });
        chart.render();

        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }
    }

    function destroy(id) {
        $.ajax({
            type: "DELETE",
            url: "api/v1/packets-reels" + id,
            success: function (response) {
            }
        });
    }
    $(document).ready(function () {
        window.addEventListener('load', (event) => {

// Get the modal
            var modal = document.getElementById("upModal");
// Get the button that opens the modal
            var btn = document.getElementById("addcreate");
            btn.onclick = function () {
                modal.style.display = "block";
            }
        });


        $('#modalForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/api/v1/packets-reels",
                data: $('#modalForm').serialize(),
                success: function (response) {
                    console.log(response)
                    $('#addModal').modal('hide');
                    alert("Packet Saved");
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $('.editbtn').on('click', function () {
            $('#upModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();


            console.log(data);
            $('#names_packet').val(data[0]);
            $('#word_count').val(data[1]);
            $('#websites_count').val(data[2]);
            $('#rank_fosllow').val(data[3]);
            $('#description').val(data[4]);
            $('#price').val(data[5]);

        });

        $('#editmodalForm').on('submit', function (e) {
            // e.preventDefault();
            $.ajax({
                type: "PATCH",
                url: "/api/v1/packets-reels" + id,
                data: $('#editmodalForm').serialize(),
                success: function (response) {
                    console.log(response)
                    $('#upModal').modal('hide');
                    alert("Packet Saved");
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        $('#deletebtn').on('click', function () {
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();

            }).get();
            console.log(data);

        });

        var id = $('.deletebtn').val();


    });
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

//---------------------------------------------------------------------------------------------------------------------user table--------------------------------------------------------------------------------------------

    $(function () {
        var page = 1,
            pagelimit = 10,
            totalrecord = 0;
        fetchData();

        function fetchData() {
            $.ajax({
                url: "http://127.0.0.1:8000/api/v1/Users?include=packetsOfUsers&page[number]=" + page + "&page[size]=" + pagelimit + "",
                headers: {
                    "Content-Type": "application/vnd.api+json",
                    Accept: "application/vnd.api+json",
                },
                method: "GET",
                success: function (response) {
                    $("#userBodyTable").html("")
                    var lenghtab = 0;
                    if (response['data'] != null) {
                        lenghtab = response.included.length;
                        console.log("lenghtab", lenghtab)
                    }
                    totalrecord = response['meta'].page.total;

                    var pageCount = Math.ceil(totalrecord / pagelimit);
                    buttons = '';
                    for (var i = 1; i <= pageCount; i++) {
                        buttons += '<li><a href="#" id="' + i + '">' + i + '</a></li>';
                    }
                    $('#pagin').html(buttons);

                    showPage = function (newPage) {
                        page = newPage
                        fetchData()
                        $("#userBodyTable tr").hide();
                        $("#userBodyTable tr").each(function (n) {
                            if (n >= pagelimit * (newPage - 1) && n < pagelimit * newPage) {
                                $(this).show();
                            }
                        });
                    }
                    $("#pagin li").first().find("a").addClass("current")

                    $("#pagin li a").click(function () {
                        $("#pagin li a").removeClass("current");
                        $(this).addClass("current");
                        showPage(parseInt($(this).text()))
                    });




                    // var uid = response['data'][k].id;
                    // var name = response['data'][k].attributes.first_name;
                    // var surname = response['data'][k].attributes.last_name;
                    for (k = 0; k < lenghtab; k++) {
                        var count_of_words = response['included'][k].attributes.count_of_words;
                        var max_count_of_words = response['included'][k].attributes.max_count_of_words;
                        var id = response['included'][k].id;
                        var price = response['included'][k].attributes.price;
                        var end_of_pocket = response['included'][k].attributes.end_of_pocket;
                        var descrpitions = response['included'][k].attributes.descrpitions;
                        var count_of_websites = response['included'][k].attributes.count_of_websites;
                        var packet_names = response['included'][k].attributes.packet_names;
                        var rank_follow_max = response['included'][k].attributes.rank_follow_max;
                        var rank_follow = response['included'][k].attributes.rank_follow;
                        var max_count_of_websites = response['included'][k].attributes.max_count_of_websites;
                        var paymentId = response['included'][k].attributes.paymentId;
                        var user_id = response['included'][k].attributes.user_id;
                        var st = "<tr><td class='hide'>" + uid + "</td><td class='hide'>" + id + "</td><td class='hide'>" + user_id + "</td><td>"
                            + name + "</td><td>" + surname + "</td><td>" + packet_names + "</td><td>" + count_of_words +
                            "</td><td>" + max_count_of_words + "</td><td>" + count_of_websites +
                            "</td><td>" + max_count_of_websites + "</td><td>" + end_of_pocket +
                            "</td><td>" + rank_follow + "</td><td>" + rank_follow_max + "</td><td>"
                            + paymentId + "</td><td>" + descrpitions + "</td><td>" + price + "</td></tr>"
                        $("#userBodyTable").append(st)
                    }
                }
            });
        }
    });

// $(function (){
//     var numberOfItems ;
//     var limitPerPage = 2;
//     // Total pages rounded upwards
//
//     // Number of buttons at the top, not counting prev/next,
//     // but including the dotted buttons.
//     // Must be at least 5:
//     var paginationSize = 7;
//     var currentPage;
// getPageList();
//
// function getPageList(totalPages, page, maxLength) {
//
//
// // Below is an example use of the above function. // Number of items and limits the number of items per page
//
//     $.ajax({
//         url: "http://127.0.0.1:8000/api/v1/packets-of-users?include=Users&page[number]=" + page + "&page[size]=" + limitPerPage + "",
//         headers: {
//             "Content-Type": "application/vnd.api+json",
//             Accept: "application/vnd.api+json",
//         },
//         method: "GET",
//         success: function (response) {
//
//             var lenghtab = 0;
//             if (response['data'] != null) {
//                 lenghtab = response.data.length;
//                 console.log("lenghtab", lenghtab)
//             }
//             numberOfItems = response['meta'].page.total;
//             var totalPages = Math.ceil(numberOfItems / limitPerPage);
//             if (maxLength < 5) throw "maxLength must be at least 5";
// console.log('totalpages:',totalPages)
//             // function range(start, end) {
//             //     return Array.from(Array(end - start + 1), (_, i) => i + start);
//             // }
//             // var sideWidth = maxLength < 9 ? 1 : 2;
//             // var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
//             // var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
//             // if (totalPages <= maxLength) {
//             //     // no breaks in list
//             //     return range(1, totalPages);
//             // }
//             // if (page <= maxLength - sideWidth - 1 - rightWidth) {
//             //     // no break on left of page
//             //     return range(1, maxLength - sideWidth - 1)
//             //         .concat(0, range(totalPages - sideWidth + 1, totalPages));
//             // }
//             // if (page >= totalPages - sideWidth - 1 - rightWidth) {
//             //     // no break on right of page
//             //     return range(1, sideWidth)
//             //         .concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
//             // }
//             // // Breaks on both sides
//             // return range(1, sideWidth)
//             //     .concat(0, range(page - leftWidth, page + rightWidth),
//             //         0, range(totalPages - sideWidth + 1, totalPages));
//
//             // function showPage(whichPage) {
//             //     if (whichPage < 1 || whichPage > totalPages) return false;
//             //     currentPage = whichPage;
//             //     $("#userBodyTable tr").hide()
//             //         .slice((currentPage - 1) * limitPerPage,
//             //             currentPage * limitPerPage).show();
//             //     // Replace the navigation items (not prev/next):
//             //     $("#pagin li").slice(1, -1).remove();
//             //     getPageList(totalPages, currentPage, paginationSize).forEach(item => {
//             //         $("<li>").addClass("page-item")
//             //             .addClass(item ? "current-page" : "disabled")
//             //             .toggleClass("active", item === currentPage).append(
//             //             $("<a>").addClass("page-link").attr({
//             //                 href: "javascript:void(0)"
//             //             }).text(item || "...")
//             //         ).insertBefore("#next-page");
//             //     });
//             //     // Disable prev/next when at first/last page:
//             //     $("#previous-page").toggleClass("disabled", currentPage === 1);
//             //     $("#next-page").toggleClass("disabled", currentPage === totalPages);
//             //     return true;
//             // }
//             // // Include the prev/next buttons:
//             // $(".pagination").append(
//             //     $("<li>").addClass("page-item").attr({id: "previous-page"}).append(
//             //         $("<a>").addClass("page-link").attr({
//             //             href: "javascript:void(0)"
//             //         }).text("Prev")
//             //     ),
//             //     $("<li>").addClass("page-item").attr({id: "next-page"}).append(
//             //         $("<a>").addClass("page-link").attr({
//             //             href: "javascript:void(0)"
//             //         }).text("Next")
//             //     )
//             // );
//             // // Show the page links
//             // $("#userBodyTable tr").show();
//             // showPage(1);
//             //
//             // // Use event delegation, as these items are recreated later
//             // $(document).on("click", "#pagin li.current-page:not(.active)", function () {
//             //     return showPage(+$(this).text());
//             // });
//             // $("#next-page").on("click", function () {
//             //     return showPage(currentPage + 1);
//             // });
//             // $("#previous-page").on("click", function () {
//             //     return showPage(currentPage - 1);
//             // });
//             //
//
//
//             for (k = 0; k < lenghtab; k++) {
//         var uid = response['included'][k].id;
//         var name = response['included'][k].attributes.first_name;
//         var surname = response['included'][k].attributes.last_name;
//
//         var count_of_words = response['data'][k].attributes.count_of_words;
//         var max_count_of_words = response['data'][k].attributes.max_count_of_words;
//         var id = response['data'][k].id;
//         var price = response['data'][k].attributes.price;
//         var end_of_pocket = response['data'][k].attributes.end_of_pocket;
//         var descrpitions = response['data'][k].attributes.descrpitions;
//         var count_of_websites = response['data'][k].attributes.count_of_websites;
//         var packet_names = response['data'][k].attributes.packet_names;
//         var rank_follow_max = response['data'][k].attributes.rank_follow_max;
//         var rank_follow = response['data'][k].attributes.rank_follow;
//         var max_count_of_websites = response['data'][k].attributes.max_count_of_websites;
//         var paymentId = response['data'][k].attributes.paymentId;
//         var user_id = response['data'][k].attributes.user_id;
//         var st = "<tr><td>"
//             + name + "</td><td>" + surname + "</td><td>" + packet_names + "</td><td>" + count_of_words +
//             "</td><td>" + max_count_of_words + "</td><td>" + count_of_websites +
//             "</td><td>" + max_count_of_websites + "</td><td>" + end_of_pocket +
//             "</td><td>" + rank_follow + "</td><td>" + rank_follow_max + "</td><td>"
//             + paymentId + "</td><td>" + descrpitions + "</td><td>" + price + "</td></tr>"
//         $("#userBodyTable").append(st)
//     }
// }
// });
// }
// });



});




