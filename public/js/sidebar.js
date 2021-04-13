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

