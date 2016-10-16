<?php
session_start();
if(isset($_SESSION['username'])){
	$tes=$_SESSION['username'];
	include "../proses/dbinfo.php";
}
else{
	header ("Refresh:0; url=../login");
	exit();
} 
?>

<html>
<head>
	<title>tong sampah</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/bootstrap.css" rel="stylesheet">
	<style>
		body {
			
			/*padding-top: 60px;*/ /* 60px to make the container go all the way to the bottom of the topbar */
		}
	</style>
	<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

	<!-- <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"> -->
	<link rel="stylesheet" href="../assets/css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<script src="../assets/js/custom.js"></script>
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap-alert.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script async src="https://www.google-analytics.com/analytics.js"></script>

	<!-- load googlemaps api dulu -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHrBADDsdwGDYgyU_TzoNucvpmCatglXs&callback=initMap"></script>

	<script type="text/javascript">
		var peta;
		var gambar_tanda;
		gambar_tanda = '../assets/img/tunjuk.png';

		function peta_awal(){
		// posisi default peta saat diload
		var lokasibaru = new google.maps.LatLng(-0.494823, 117.143615);
		var petaoption = {
			zoom: 13,
			center: lokasibaru,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);

	    // ngasih fungsi marker buat generate koordinat latitude & longitude
	    tanda = new google.maps.Marker({
	    	position: lokasibaru,
	    	map: peta, 
	    	icon: gambar_tanda,
	    	draggable : true
	    });
	    
	    // ketika markernya didrag, koordinatnya langsung di selipin di textfield
	    google.maps.event.addListener(tanda, 'dragend', function(event){
	    	document.getElementById('latitude').value = this.getPosition().lat();
	    	document.getElementById('longitude').value = this.getPosition().lng();
	    });
	}

	function setpeta(x,y,id){
		// mengambil koordinat dari database
		var lokasibaru = new google.maps.LatLng(x, y);
		var petaoption = {
			zoom: 14,
			center: lokasibaru,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);

		 // ngasih fungsi marker buat generate koordinat latitude & longitude
		 tanda = new google.maps.Marker({
		 	position: lokasibaru,
		 	icon: gambar_tanda,
		 	draggable : true,
		 	map: peta
		 });

		// ketika markernya didrag, koordinatnya langsung di selipin di textfield
		google.maps.event.addListener(tanda, 'dragend', function(event){
			document.getElementById('latitude').value = this.getPosition().lat();
			document.getElementById('longitude').value = this.getPosition().lng();
		});
	}
</script> 
</head>
<body onload="peta_awal()" class="w3-light-grey">
	<?php include '../header.php'; ?>
	<div class="w3-container">
		<div class="row">
			<div class="span8">
				<div class="control-group">
					<div id="map_canvas" style="width:100%; height:500px"></div>
				</div>
			</div>
			<div class="span4">
				<div class="control-group">
					<form method="get" action="../index.php">
						<button type="submit" class="w3-btn w3-padding-large w3-green w3-border w3-hover-border-black">Lihat Persebaran Tong Sampah>></button>
					</form>
				</div>
			</div>

			<form action="submit.php" method="post" enctype="multipart/form-data" name="form1"> 
				<div class="span4">
					<div class="control-group">
						<label for="input01" class="w3-label">Nama Tong Sampah :</label>
						<div class="controls">
							<input type="text" class="w3-input" id="nama_cabang" name="nama_cabang" rel="popover" data-content="Masukkan nama cabang." data-original-title="Cabang">
						</div>
					</div>

					<div class="control-group">
						<label for="input01" class="w3-label">Longitude :</label>
						<div class="controls">
							<input type="text" class="w3-input" id="longitude" name="longitude" >
						</div>
					</div>

					<div class="control-group">
						<label for="input01" class="w3-label">Latitude :</label>
						<div class="controls">
							<input type="text" class="w3-input" id="latitude" name="latitude">
						</div>
					</div>

					<div class="control-group">
						<label for="input01" class="w3-label">Kelurahan :</label>
						<div class="controls">
							<?php 
							include "config.php";
							echo "<select name='id_kel' id='id_kel'>";
							$tampil=mysqli_query("SELECT * FROM kelurahan ORDER BY id_kel");
							echo "<option value='belum memilih' selected>--Pilih Kelurahan--</option>";

							while ($w=mysql_fetch_array($tampil)) 
							{
								echo "<option value=$w[id_kel] selected>$w[nm_kel]</option>";
							}
							echo "</selected>";
							?>						
						</div>
					</div>


					<div class="control-group">
						<label for="input01" class="w3-label">Latitude :</label>
						<div class="controls">
							<input type="text" class="w3-input" id="latitude" name="latitude">
						</div>
					</div>
					<div class="control-group">

						<label for="input01" class="w3-label">Foto Tong Sampah :</label>
						<div class="controls">
							<input type="file" class="w3-input" id="image" name="image">
						</div>
					</div>

					

					<div class="control-group w3-margin-bottom">
						<label class="control-label" for="input01"></label>
						<div class="controls">
							<button type="submit" class="w3-btn w3-padding-large w3-green w3-border w3-hover-border-black" onclick="tambah()">Tambahkan!</button>

						</div>
					</div>

				</form>
			</div>
			<div class="span4">
				<div class="control-group">
					<a href="../all">Semua Data>></a>
					
				</div>
			</div>


		</div>
		<div class="span4">
			<div class="control-group">
				<a href="logout.php">Logout?</a>

			</div>
		</div>

	</div>
	<div class="w3-padding-8 w3-green w3-margin-top">
		<div class="w3-container w3-align-left">
			<p align="center">&copy; SMD Tong Sampah</p> 
		</div>
	</div>
</body>
</html>


<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if($_GET['action'] == "remove") {
	$id = htmlentities(mysqli_real_escape_string($_GET['id']));
	// hapus data dari database
	$hapus_cabang = mysqli_query("DELETE FROM `cabang` WHERE `id` = '".$id."'");


}