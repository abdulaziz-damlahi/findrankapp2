$(document).ready(function () {
    profile2();
    username();
});


function profile2() {
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
                    var endofpacket = response['data'][0].attributes.end_of_pocket;
                    var createdAt = response['data'][0].attributes.createdAt;
                    var packet_names = response['data'][0].attributes.packet_names;
                    var createdAt = createdAt.slice(0, 10);
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
                    $('#daysleft1').append(diffDays2);
                    $('#endofpacket1').append(endofpacket);
                    $('#createdAt1').append(createdAt);
                    $('#packet_names1').append(packet_names);
                }
            }

        }
    });
}
function username() {

  var username= document.getElementById("username").innerHTML;
    $("#SideBarName").append(username)
}

