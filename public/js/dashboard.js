$(document).ready(function () {
    getCountryDate()
});
$(document).ready(function () {

    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        let countries = [];

        $.ajax({
            url: "http://127.0.0.1:8000/api/v1/packets-of-users",
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
    }

    $.ajax({
        url: "http://127.0.0.1:8000/api/v1/all-google-search-datas",
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
        url: "http://127.0.0.1:8000/api/v1/packets-reels",
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
                var str = "<tr><td>" + names_packets + "</td><td>" + word_count + "</td><td>" + websites_count + "</td><td>" + rank_fosllow + "</td><td>" + description + "</td><td>" + price + "</td>" +
                    "<td> <button type=\"button\" class=\"btn btn-success editbtn \" data-toggle=\"modal\"\n" +
                    "                    data-target=\"#upModal\">EDIT" +
                    "            </button></td> <td><button type='button' id='deletebtn' onclick=''   class='btn btn-danger ' >DELETE</button></td></tr>"
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
            url: "http://127.0.0.1:8000/api/v1/packets-reels",
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
            url: "http://127.0.0.1:8000/api/v1/packets-reels" + id,
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
                    dps1.push({x: new Date(createdAtsliced), y: y});
                }
            }
            console.log(dps1)
            if (i===len){CountryChart(dps1)}
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
        url: "http://127.0.0.1:8000/api/v1/packets-reels" + id,
        success: function (response) {
        }
    });
}




