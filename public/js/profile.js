$(document).ready(function () {
    profile();
    wordlen();
    websitelen();
})
function profile() {
    $.ajax({
        type: 'get',
        url: "/api/v1/Packets",
        success: function (response) {
            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }
            for (var i = 0; i < 1; i++) {
                var endofpacket = response['data'][0].attributes.end_of_pocket;
                var createdAt = response['data'][0].attributes.createdAt;
                var packet_names = response['data'][0].attributes.packet_names;
                var createdAt = createdAt.slice(0, 10);
                //todays DD/MM/YYYY
                var today1 = new Date();
                var dd = String(today1.getDate()).padStart(2, '0');
                var mm = String(today1.getMonth() + 1).padStart(2, '0');
                var yyyy = today1.getFullYear();
                today1 = mm + '/' + dd + '/' + yyyy;
                //today YYYY-MM-DD
                var today2 = new Date();
                var dd2 = String(today2.getDate()).padStart(2, '0');
                var mm2 = String(today2.getMonth() + 1).padStart(2, '0');
                var yyyy2 = today2.getFullYear();
                today2 = yyyy2 + '-' + mm2 + '-' + dd2;
                var today1format = new Date(today1);
                var lastday = new Date(endofpacket);
                //calc diffrance
                var oneDay = 24 * 60 * 60 * 1000;
                var diffDays = Math.round(Math.abs((today1format - lastday) / oneDay));
                diffDays2 = (diffDays);
                if (today2==endofpacket|| today2>endofpacket){
                    diffDays2='Aktif bir paketiniz yok.';
                }
                $('#daysleft').append(diffDays2);
            }
        }
    });
}

function wordlen() {
    $.ajax({
        url: "/api/v1/Keywords",
        type: "GET",
        headers: {
            "Content-Type": "application/vnd.api+json",
            Accept: "application/vnd.api+json",
        },
        success: function (response) {
            var lenkeyword = 0;
            if (response['data'] != null) {
                lenkeyword = response['data'].length;
            }
            $('#keywordused').append(lenkeyword);
            var maxword = parseInt(document.querySelector("#maxcountword").innerHTML);
            perc1 = ((lenkeyword / maxword) * 100);
            var keywordprogress =  document.getElementById("wordprogress");
            perc1a = (perc1) + '%'
            keywordprogress.style.width = perc1a;
        }
    });
}

function websitelen() {
    $.ajax({
        url: "/api/v1/Websites",
        type: "GET",
        headers: {
            "Content-Type": "application/vnd.api+json",
            Accept: "application/vnd.api+json",
        },
        success: function (response) {
            var lenwebsite = 0;
            if (response['data'] != null) {
                lenwebsite = response['data'].length;
            }
            $('#websiteused').append(lenwebsite);
            var maxwebsite = parseInt(document.querySelector("#maxwebsite").innerHTML);
            perc2 = ((lenwebsite / maxwebsite) * 100);
            var websiteprogress = document.getElementById("websiteprogress");
            perc2a = (perc2) + '%'
            websiteprogress.style.width = perc2a;
        }
    });
}
