$(document).ready(function () {
    grafik();

})
let dps1 = [];
let dps2 = [];
let dpsid = [];
let dpsslice = [];
let cleandate = [];
let from;
let to;

function grafik() {
    var keywordid = parseInt(document.querySelector("#keywordid").innerHTML);


    $.ajax({
        type: 'get',
        url: "/api/v1/keywordsRequests",
        success: function (response) {

            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }

            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var requestkeywordid = response['data'][i].attributes.keyword_id
                    if (keywordid == requestkeywordid) {
                        var counterid = "count" + i;
                        var rank = response['data'][i].attributes.rank
                        var id = response['data'][i].id
                        var createdAt = response['data'][i].attributes.createdAt
                        var createdAtsliced = createdAt.slice(0, 10)
                        var str = "<div id='" + counterid + "' class=''> " + rank + " <br> " + createdAtsliced + " </div>";
                        dps1.push({x: new Date(createdAtsliced), y: rank});
                        cleandate.push(new Date(createdAtsliced));
                        dpsid.push({id, createdAtsliced});
                        $('#ranks').append(str);
                    }
                }


                $("#myButton").on("click", function () {
                    var dpsvar =0
                    var from = new Date($("#from").val());
                    var to = new Date($("#to").val());
                    var firstcount
                    var lastcount
                    var test
                    for (var arraycounter = 0; arraycounter < cleandate.length; arraycounter++) {
                        test = cleandate[arraycounter].toString();
                        if (from == test) {
                            console.log(arraycounter)
                            firstcount = arraycounter
                        }
                    }
                    for (var arraycounter = 0; arraycounter < cleandate.length; arraycounter++) {
                        var test = cleandate[arraycounter].toString()
                        if (to == test) {
                            console.log(arraycounter)
                            lastcount = arraycounter
                        }
                    }
                    firstcount=firstcount+1;
                    dpsvar = dps1.slice(lastcount,firstcount)

                    chart(dpsvar);

                });

                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();
                today = mm + '/' + dd + ',' + yyyy;
                    last(dps1,7)
                var last =  function(array, n) {
                    if (array == null)
                        return void 0;
                    if (n == null)
                        return array[array.length - 1];
                    return array.slice(Math.max(array.length - n, 0));
                };

                chart(dpsweek);
                function chart(dps1){
                    var dpslast=dps1
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
                            dataPoints: dps1
                        },]
                    });
                    chart.render();

                    console.log(dps1)
                    function toggleDataSeries(e) {
                        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                            e.dataSeries.visible = false;
                        } else {
                            e.dataSeries.visible = true;
                        }
                        chart.render();
                    }
                }



            }
        }
    })

}





