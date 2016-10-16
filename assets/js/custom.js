$(window).load(function () {
	$("#hapus").on("click","#hapus", function(){
		delete($(this).attr("value"));
	});
	$("#screen").on("click","#btAddL", function(){
		addL();
	});
});

function tambah(id){
  alert("tambah");

  // $.ajax({
  //   url: "layanan/save.php",
  //   method: "POST",
  //   data: {
  //     nama1 : $("#nama1").val(),
  //     nilai1 : $("#nilai1").val()
  //   }
  // })
  // .done(function(hasil){
  //   if ( $( '.alert-success', $('<div/>').html(hasil) ).length > 0 ) {
  //     menuLayanan();
  //     console.log(hasil);
  //   }
  //   else {
  //     $(".msg").html(hasil);
  //     console.log(hasil);
  //   }
  // });
}

function del(id) {
  if (confirm("Hapus tong?") == true) {
  alert("I am an alert box!" +id);
    // $.ajax({
    //   // url: "proses_hapus.php?id="+id,
    //   // method : "GET"
    // }).done(function(hasil){
    //   if ( $( '.alert-success', $('<div/>').html(hasil) ).length > 0 ) {
    //     menuLayanan();
    //   }
    //   else{
    //     $(".msg").html(hasil);
    //   }
    // });

  }  
}

