$(document).ready(function() {
  post_packet_profile();
  function post_packet_profile(){
    $.ajax({
      url: "http://127.0.0.1:8000/api/v1/Packets?page[number]=1&page[size]=1",
      type: "GET",
      headers: { "Content-Type": "application/vnd.api+json",
        Accept: "application/vnd.api+json",
      },

      success: function (result) {
        console.log(result)
      }
    });
  }
});
