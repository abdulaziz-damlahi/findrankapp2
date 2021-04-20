$(document).ready(function () {
    IfPacketExist();
    wordlensidebar();
    websitelensidebar();
    profile2();
    username();
});

function profile2() {
    var userid = parseInt(document.getElementById("userid").innerHTML);

    $.ajax({
        type: 'get',
        url: "/api/v1/Packets",
        success: function (response) {
            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var userid_packet = response['data'][0].attributes.user_id;
                    if (userid_packet = userid) {
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
                        if (today2 == endofpacket || today2 > endofpacket) {
                            diffDays2 = 'Aktif bir paketiniz yok.';
                        }
                        $('#daysleft1').append(diffDays2);
                        $('#endofpacket1').append(endofpacket);
                        $('#createdAt1').append(createdAt);
                        $('#packet_names1').append(packet_names);
                    }
                }
            }

        }
    });
}

function username() {
    var username = document.getElementById("username").innerHTML;
    $("#SideBarName").append(username)
}

function wordlensidebar() {
    $.ajax({
        url: "/api/v1/Packets",
        type: "GET",
        success: function (response) {
            var maxword = response['data'][0].attributes.max_count_of_words;
            $.ajax({
                url: "/api/v1/Keywords",
                type: "GET",
                success: function (response) {
                    var lenkeyword = 0;
                    if (response['data'] != null) {
                        lenkeyword = response['data'].length;
                    }
                    $('#keywordusedSidebar').append(lenkeyword);
                    $('#maxcountwordSidebar').append(maxword);
                    perc1 = ((lenkeyword / maxword) * 100);
                    var keywordprogress = document.getElementById("wordprogressSidebar");
                    perc1a = (perc1) + '%'
                    keywordprogress.style.width = perc1a;
                }
            });
        }
    });
}

function websitelensidebar() {
    $.ajax({
        url: "/api/v1/Packets",
        type: "GET",
        success: function (response) {
            var maxwebsites = response['data'][0].attributes.max_count_of_websites;
            $.ajax({
                url: "/api/v1/Websites",
                type: "GET",
                success: function (response) {
                    var lenwebsites = 0;
                    if (response['data'] != null) {
                        lenwebsites = response['data'].length;
                    }
                    $('#websiteusedSidebar').append(lenwebsites);
                    $('#maxwebsiteSidebar').append(maxwebsites);
                    perc1 = ((lenwebsites / maxwebsites) * 100);
                    var keywordprogress = document.getElementById("websiteprogressSidebar");
                    perc1a = (perc1) + '%'
                    keywordprogress.style.width = perc1a;
                }
            });
        }
    });
}

function IfPacketExist() {
    $.ajax({
        url: "/api/v1/Packets",
        type: "GET",
        success: function (response) {
            var len=response['data'].length
            if (response['data'] != null) {
                len = response['data'].length;
            }
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var userid_packet = response['data'][0].attributes.user_id;
                    if (userid_packet = userid) {
                        var endofpacket = response['data'][0].attributes.end_of_pocket;
                        //todays DD/MM/YYYY
                        var today1 = new Date();
                        var dd = String(today1.getDate()).padStart(2, '0');
                        var mm = String(today1.getMonth() + 1).padStart(2, '0');
                        var yyyy = today1.getFullYear();
                        today1 = mm + '/' + dd + '/' + yyyy;
                        var today1format = new Date(today1);
                        var lastday = new Date(endofpacket);
                        //calc diffrance
                        var oneDay = 24 * 60 * 60 * 1000;
                        var diffDays = Math.round(Math.abs((today1format - lastday) / oneDay));
                        if (today1format>lastday){
                            diffDays="-"+diffDays
                        }
                        diffDays2 = (diffDays);
                        $('#daysleft').append(diffDays);
                    }
                }
            }
            var remainingDays = document.getElementById('daysleft').innerHTML
            remainingDaysINTEGER = parseInt(remainingDays)
            if (remainingDaysINTEGER === 0 || remainingDaysINTEGER === null || remainingDaysINTEGER < 0|| len === 0) {
                document.getElementById("buypacketbtn").style.display = "block";
            } else {
                document.getElementById("buypacketbtn").style.display = "none";
            }
        }
    })
}
