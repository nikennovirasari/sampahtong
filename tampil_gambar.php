
<?php
session_start();
include '../proses/checker.php';
include '../proses/dbinfo.php';
$query="SELECT*FROM cabang ORDER BY id";
$eksekusi = mysqli_query($con, $query) or
die ("Permintaan gagal dilakukan");
while($hasil=mysql_fetch_array($eksekusi))
{
	
	echo"<img src=$hasil[gambar] width=100 height=100>";
	
}
?>

