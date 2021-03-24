$(document).ready(function () {
    grafik();
})

function grafik() {
    var rank1 = document.querySelector("#wrap > div:nth-child(3)").innerHTML;
    var rank2 = document.querySelector("#wrap > div:nth-child(4)").innerHTML;
    var rank3 = document.querySelector("#wrap > div:nth-child(5)").innerHTML;
    var rank4 = document.querySelector("#wrap > div:nth-child(6)").innerHTML;
    var rank5 = document.querySelector("#wrap > div:nth-child(7)").innerHTML;
    var rank6 = document.querySelector("#wrap > div:nth-child(8)").innerHTML;
    var rank7 = document.querySelector("#wrap > div:nth-child(9)").innerHTML;
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    console.log()
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
                {x: new Date(parseInt(yyyy),parseInt(mm), parseInt(dd)), y: parseInt(rank7)},
                {x: new Date(parseInt(yyyy),parseInt(mm), parseInt(dd)-1), y: parseInt(rank6)},
                {x: new Date(parseInt(yyyy),parseInt(mm), parseInt(dd)-2), y: parseInt(rank5)},
                {x: new Date(parseInt(yyyy),parseInt(mm), parseInt(dd)-3), y: parseInt(rank4)},
                {x: new Date(parseInt(yyyy),parseInt(mm), parseInt(dd)-4), y: parseInt(rank3)},
                {x: new Date(parseInt(yyyy),parseInt(mm), parseInt(dd)-5), y: parseInt(rank2)},
                {x: new Date(parseInt(yyyy),parseInt(mm), parseInt(dd)-6), y: parseInt(rank1)},
                {x: new Date(parseInt(yyyy),parseInt(mm), parseInt(dd)-7), y: parseInt(rank1)},


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

