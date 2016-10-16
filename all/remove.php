<?php  
session_start();
include '../proses/checker.php';
include '../proses/dbinfo.php';
$id = htmlentities(mysqli_real_escape_string($con,$_GET['id']));
	// hapus data dari database
$hapus_cabang = mysqli_query($con,"DELETE FROM `cabang` WHERE `id` = '".$id."'");
	

?>