// function tambah(id){
//   // $.ajax({
//   //   url: "layanan/save.php",
//   //   method: "POST",
//   //   data: {
//   //     nama1 : $("#nama1").val(),
//   //     nilai1 : $("#nilai1").val()
//   //   }
//   // })
//   // .done(function(hasil){
//   //   if ( $( '.alert-success', $('<div/>').html(hasil) ).length > 0 ) {
//   //     menuLayanan();
//   //     console.log(hasil);
//   //   }
//   //   else {
//   //     $(".msg").html(hasil);
//   //     console.log(hasil);
//   //   }
//   // });
// }

function del(id) {
  if (confirm("Hapus tong?") == true) {
  alert("I am an alert box!" +id);
    $.ajax({
      url: "../all/remove.php?id="+id,
      method : "GET"
    }).done(function(hasil){
      console.log(hasil);
    });

  }  
}

