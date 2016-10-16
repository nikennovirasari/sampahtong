<?php
//aktifkan session
session_start();

include ("../proses/dbinfo.php");


//ambil data dari form
$username=$_POST['username'];
$password=$_POST['password'];

if (preg_match('/\s/', $username)) {
	echo "Username contains whitespace";
	header ("Refresh:2; url=login.php");
	
}
else{

	$q=("SELECT * FROM user where username=? AND password=?");
	$param1=$username; 
	$param2=$password; 
// $login=mysql_query("SELECT * FROM user where username='$username' AND password='$password'");  
	$stmt = mysqli_prepare($con, $q); 

	/* bind parameters for markers */
	mysqli_stmt_bind_param($stmt, "ss", $param1, $param2);

	/* execute query */
	mysqli_stmt_execute($stmt);

	/* bind result variables */
	mysqli_stmt_bind_result($stmt, $h1,$h2);

	/* fetch value */
	$a=mysqli_stmt_fetch($stmt);
	
	if(!empty($a)){
		$_SESSION['username']=$h1;
		header ("Refresh :1; url=../admin/");
	}
	else{
		echo "<font color='red' >Invalid Username and Password</font> <br>";
		header ("Refresh:2; url=login.php");
	}


}
?>