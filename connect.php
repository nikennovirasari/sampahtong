<?php // nama file connect.php
$host = "localhost"; //diisi sesuai server yang di gunakan
$usermysql="root"; //diisi sesuai username pada server
$passmysql="";  //diisi sesuai password pada server
mysql_connect($host,$usermysql,$passmysql) or die ("Tidak dapat konek ke server MySQL");
mysql_select_db("kepegawaian") or die ("Database tidak ada");
?>