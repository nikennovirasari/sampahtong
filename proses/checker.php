<?php 
     if(!(isset($_SESSION['username']) && $_SESSION['username'])){
        //perintah tidak berjalan ketika dia login
        //dan akan berjalan ketika user belum login
        header("Refresh:0;url=../login");
        die();
     }
 ?>