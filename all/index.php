<html>
<head>
	<?php 
  session_start();
  include '../proses/dbinfo.php';
  include '../proses/checker.php';
   ?>
	<title>tong sampah</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="../assets/css/w3.css">
	<script src="../assets/js/custom.js"></script>
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap-alert.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script async src="https://www.google-analytics.com/analytics.js"></script>

	<!-- load googlemaps api dulu -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHrBADDsdwGDYgyU_TzoNucvpmCatglXs&callback=initMap"></script>

</head>

<body onload="load()" class="w3-light-grey">

	<div class="w3-padding-8 w3-green w3-margin-bottom">
		<div class="w3-container w3-align-left">
			<h1><b>Tong Sampah SMD</b></h1>
		</div>
		
	</div>

	<div class="container w3-align-left">

		<div class="control-group">
		</div>
		
		<a href="../admin">Kembali</a>
		
		
		
		<label class="control-label" for="input01">Daftar Tong Sampah :</label>
		<div class="controls">
			<div id="daftar">
				
				<?php

      // mengambil data dari database
				$lokasi = mysqli_query($con,"select * from `cabang`");
				if($lokasi === FALSE) { 
          die(mysqli_error()); // TODO: better error handling
      }
      ?>
      
      <table class="w3-table w3-striped w3-bordered ">
      	<thead>
      		<tr class="w3-dark-grey">
      			<td><strong>Nama</strong></td>
      			<td><strong>Latitude</strong></td>
      			<td><strong>Longitude</strong></td>
      			<td><strong>Foto</strong></td>
      			<td><strong>Kelurahan</strong></td>
      			<td><strong>Hapus</strong></td>
      		</tr>
      	</thead>
      	<?php
      	while($l=mysqli_fetch_array($lokasi)){
        // membuat fungsi javascript untuk nantinya diolah dan ditampilkan dalam peta
      		?>
      		<br>    
      		<tr>

      			<td><?php echo "<a href=\"javascript:setpeta(".$l['lat'].",".$l['long'].",".$l['id'].")\">".$l['nama_cabang']."</a>"?></td>
      			<td><?php echo "<a href=\"javascript:setpeta(".$l['lat'].",".$l['long'].",".$l['id'].")\">".$l['lat']."</a>"?></td>
      			<td><?php echo "<a href=\"javascript:setpeta(".$l['lat'].",".$l['long'].",".$l['id'].")\">".$l['long']."</a>"?></td>
      			<td><?php echo "<a href=\"javascript:setpeta(".$l['lat'].",".$l['long'].",".$l['id'].")\">".$l['gambar']."</a>"?></td>
      			<td><?php echo "<a href=\"javascript:setpeta(".$l['lat'].",".$l['long'].",".$l['id'].")\">".$l['id_kel']."</a>"?></td>
      			<td><?php
      				echo "<a href='../all/' onclick=del(".$l['id'].")>Hapus</a>";
      			}
      			?></td>
      		</tr>
      	</table>

      	
      </div>

  </div>
</div>


<!-- <form action="proses-login.php" method="post">
    <div class="form-group">
      <label for="inputdefault">Username</label>
      <input class="form-control" id="inputdefault" type="text" name="username">
    </div>
    <div class="form-group">
      <label for="inputdefault">Password</label>
      <input class="form-control" id="inputdefault" type="password" name="password">
    </div>
    <div class="form-group">
      <br>
      <input class="form-control" id="inputdefault" type="submit" name="login" value="Login">
    </div>


</form> -->

</div>

<div class="w3-padding-8 w3-green w3-margin-top">
	<div class="w3-container w3-align-left">
		<p align="center">&copy; SMD Tong Sampah</p> 
	</div>
</div>
</body>
</html>
