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
            //last day
            var endofpacket = response['data'][0].attributes.end_of_pocket;
            //todays date
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = mm + '/' + dd + '/' + yyyy;
            var todayformat = new Date(today);
            var lastday = new Date(endofpacket);
            //calc diffrance
            var oneDay = 24 * 60 * 60 * 1000;
            var diffDays = Math.round(Math.abs((todayformat - lastday) / oneDay));
            diffDays2 = (diffDays) - 2;
            $('#daysleft').append(diffDays2);

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
            var keywordprogress = document.querySelector("#main > div > div > div > div.page-body > div > div > div:nth-child(2) > div > div > div > div:nth-child(2)")
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
            var websiteprogress = document.querySelector("#main > div > div > div.page-wrapper.col-md-12 > div > div > div > div:nth-child(2) > div > div > div > div:nth-child(6)")
            perc2a = (perc2) + '%'
            websiteprogress.style.width = perc2a;
        }
    });
}
