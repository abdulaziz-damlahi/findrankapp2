$(document).ready(function () {
  $.ajax({
    url: "http://127.0.0.1:8000/api/v1/packets-reels",
    type: "GET",
    success: function (result) {
      var lenght = 0;
      if (result['data'] != null) {
        lenght = result['data'].length;
      }
      console.log(lenght)
      console.log(result)
      for (i = 0; i < lenght; i++) {
        var price = result['data'][i].attributes.price;
        var names_packets = result['data'][i].attributes.names_packets;
        var id = result['data'][i].attributes.id;
        var word_count = result['data'][i].attributes.word_count;
        var websites_count = result['data'][i].attributes.websites_count;
        var description = result['data'][i].attributes.description;
        var rank_fosllow = result['data'][i].attributes.rank_fosllow;
        console.log(price)
        var str = "<tr><td>" + names_packets + "</td><td>" + word_count + "</td><td>" + websites_count + "</td><td>" + rank_fosllow + "</td><td>" + description + "</td><td>" + price + "</td>" +
            "<td> <button type=\"button\" class=\"btn btn-success editbtn \" data-toggle=\"modal\"\n" +
            "                    data-target=\"#upModal\">EDIT" +
            "            </button></td> <td><button type='button' id='deletebtn' onclick=''   class='btn btn-danger ' >DELETE</button></td></tr>"
        $("#bodyTable").append(str)
      }

      console.log('işlem başarılı')
    }

  });
  window.addEventListener('load', (event) => {

// Get the modal
    var modal = document.getElementById("upModal");
// Get the button that opens the modal
    var btn = document.getElementById("addcreate");
    btn.onclick = function () {
      modal.style.display = "block";
    }
  });


  $('#modalForm').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "http://127.0.0.1:8000/api/v1/packets-reels",
      data: $('#modalForm').serialize(),
      success: function (response) {
        console.log(response)
        $('#addModal').modal('hide');
        alert("Packet Saved");
        location.reload();
      },
      error: function (error) {
        console.log(error);
      }
    });
  });

  $('.editbtn').on('click', function () {
    $('#upModal').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function () {
      return $(this).text();
    }).get();


    console.log(data);
    $('#names_packet').val(data[0]);
    $('#word_count').val(data[1]);
    $('#websites_count').val(data[2]);
    $('#rank_fosllow').val(data[3]);
    $('#description').val(data[4]);
    $('#price').val(data[5]);

  });

  $('#editmodalForm').on('submit', function (e) {
    // e.preventDefault();
    $.ajax({
      type: "PATCH",
      url: "http://127.0.0.1:8000/api/v1/packets-reels" + id,
      data: $('#editmodalForm').serialize(),
      success: function (response) {
        console.log(response)
        $('#upModal').modal('hide');
        alert("Packet Saved");
        location.reload();
      },
      error: function (error) {
        console.log(error);
      }
    });
  });
  $('#deletebtn').on('click', function () {
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function () {
      return $(this).text();

    }).get();
    console.log(data);

  });

  var id = $('.deletebtn').val();


});

function destroy(id){
  $.ajax({
    type: "DELETE",
    url: "http://127.0.0.1:8000/api/v1/packets-reels"+id,
    success: function (response) {
      console.log(response);
    }
  });
}
