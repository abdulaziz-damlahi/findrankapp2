$(document).ready(function () {
    grafik();
})

function grafik() {
    var keywordid = parseInt(document.querySelector("#keywordid").innerHTML);
    $("#myButton").on("click", function () {
        var from = new Date();
        var from = $("#from").val();
        var to = $("#to").val();

    });

    $.ajax({
        type: 'get',
        url: "/api/v1/keywordsRequests",
        success: function (response) {
            console.log(response)
            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }

            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var requestkeywordid = response['data'][i].attributes.keyword_id
                    if (keywordid == requestkeywordid) {
                        var counterid="count"+i;
                        console.log(counterid)
                        var rank = response['data'][i].attributes.rank
                        var createdAt = response['data'][i].attributes.createdAt
                        var str = "<div id=\"'+ counterid +'\" class='hidden'>'+rank+'</div>";
                        $('#ranks').append(str);
                    }
                }
            }
        }
    })

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = mm + '/' + dd + ',' + yyyy;

    chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "SIRA ANALİZİ"
        },
        axisX: {
            valueFormatString: "DD MMM,YYYY"
        },
        axisY: {},
        legend: {
            cursor: "pointer",
            fontSize: 16,
            itemclick: toggleDataSeries
        },
        toolTip: {
            shared: true
        },
        data: [{
            name: "daily rank",
            type: "area",
            yValueFormatString: "#0.## ",
            showInLegend: true,
            dataPoints: [
                {x: new Date(parseInt(yyyy), parseInt(mm), parseInt(dd) - 1), y: parseInt(2)},

            ]
        },
        ]
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




