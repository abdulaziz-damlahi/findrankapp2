$(document).ready(function () {
    grafik();
    hideonlast();
})
let dps1 = [];
let dps2 = [];
let dpsid = [];
let dpsslice = [];
let cleandate = [];
let last7 = [];
let tarih = [];
let from;
let to;

function hideonlast() {
    $("#lastForm").change(function () {

        var val = document.getElementById("lastForm").value;
        //1hatfa 1ay 3ay 6ay 12ay
        if (val === "custom") {
            $('#fromto').show();
        }
        if (val === "1hatfa") {
            prev1 = new Date();
            prev1.setDate(prev1.getDate() - 7);
            var totoday = new Date(prev1);
            var dd2 = String(totoday.getDate()).padStart(2, '0');
            var mm2 = String(totoday.getMonth() + 1).padStart(2, '0');
            var yyyy2 = totoday.getFullYear();
            totoday = yyyy2 + '-' + mm2 + '-' + dd2;

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            console.log(totoday)
            console.log(today)
              $("#to").val(today);
              $("#from").val(totoday);
            $('#fromto').hide();
        }
        if (val === "1ay") {
            prev1 = new Date();
            prev1.setDate(prev1.getDate() - 30);
            var totoday = new Date(prev1);
            var dd2 = String(totoday.getDate()).padStart(2, '0');
            var mm2 = String(totoday.getMonth() + 1).padStart(2, '0');
            var yyyy2 = totoday.getFullYear();
            totoday = yyyy2 + '-' + mm2 + '-' + dd2;

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            console.log(totoday)
            console.log(today)
            $("#to").val(today);
            $("#from").val(totoday);
            $('#fromto').hide();
        }
        if (val === "3ay") {
            prev1 = new Date();
            prev1.setDate(prev1.getDate() - 90);
            var totoday = new Date(prev1);
            var dd2 = String(totoday.getDate()).padStart(2, '0');
            var mm2 = String(totoday.getMonth() + 1).padStart(2, '0');
            var yyyy2 = totoday.getFullYear();
            totoday = yyyy2 + '-' + mm2 + '-' + dd2;

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            console.log(totoday)
            console.log(today)
            $("#to").val(today);
            $("#from").val(totoday);
            $('#fromto').hide();
        }
        if (val === "6ay") {
            prev1 = new Date();
            prev1.setDate(prev1.getDate() - 180);
            var totoday = new Date(prev1);
            var dd2 = String(totoday.getDate()).padStart(2, '0');
            var mm2 = String(totoday.getMonth() + 1).padStart(2, '0');
            var yyyy2 = totoday.getFullYear();
            totoday = yyyy2 + '-' + mm2 + '-' + dd2;

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            console.log(totoday)
            console.log(today)
            $("#to").val(today);
            $("#from").val(totoday);
            $('#fromto').hide();
        }
        if (val === "12ay") {
            prev1 = new Date();
            prev1.setDate(prev1.getDate() - 365);
            var totoday = new Date(prev1);
            var dd2 = String(totoday.getDate()).padStart(2, '0');
            var mm2 = String(totoday.getMonth() + 1).padStart(2, '0');
            var yyyy2 = totoday.getFullYear();
            totoday = yyyy2 + '-' + mm2 + '-' + dd2;

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            console.log(totoday)
            console.log(today)
            $("#to").val(today);
            $("#from").val(totoday);
            $('#fromto').hide();
        }
    });
}

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
                        tarih.push(createdAtsliced);
                        $('#ranks').append(str);
                    }
                }

                var seven = 5
                for (var last = dps1.length; last > seven; last--) {
                    last7.push(dps1[dps1.length - last])
                }
                chart2(dps1)
                $("#myButton").on("click", function () {

                    var dpsvar = 0
                     from = new Date($("#from").val());
                     to = new Date($("#to").val());
                    console.log(from)
                    console.log(to)

                    var firstcount
                    var lastcount

                    for (var arraycounter = 0; arraycounter < cleandate.length; arraycounter++) {
                        test = cleandate[arraycounter].toString();
                        if (from == test) {
                            firstcount = arraycounter
                            console.log(firstcount)
                        }
                    }
                    for (var arraycounter = 0; arraycounter < cleandate.length; arraycounter++) {
                        var test = cleandate[arraycounter].toString()
                        if (to == test) {
                            lastcount = arraycounter
                            console.log(lastcount)
                        }
                    }
                    // var val = document.getElementById("lastForm").value;
                    // //1hatfa 1ay 3ay 6ay 12ay
                    // if (val === "1hatfa") {
                    //
                    //     lastcount = len
                    //     firstcount = len - 7;
                    // }
                    // if (val === "1ay") {
                    //     lastcount = len
                    //     firstcount = len - 30;
                    // }
                    // if (val === "3ay") {
                    //     lastcount = len
                    //     firstcount = len - 90;
                    // }
                    // if (val === "6ay") {
                    //     lastcount = len
                    //     firstcount = len - 180;
                    // }
                    // if (val === "12ay") {
                    //     lastcount = len
                    //     firstcount = len - 365;
                    // }

                    lastcount = lastcount + 1;
                    dpsvar = dps1.slice(firstcount, lastcount)
                    chart(dpsvar);

                    function chart(dps1) {
                        var dpslast = dps1
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
                                dataPoints: dpslast
                            },]
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

                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0');
                    var yyyy = today.getFullYear();
                    today = mm + '/' + dd + ',' + yyyy;

                    var last = function (array, n) {
                        if (array == null)
                            return void 0;
                        if (n == null)
                            return array[array.length - 1];
                        return array.slice(Math.max(array.length - n, 0));
                    };
                });
            }
        }
    })

    function chart2(dps1) {
        var dpslast = dps1
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
                dataPoints: dpslast
            },]
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

}





