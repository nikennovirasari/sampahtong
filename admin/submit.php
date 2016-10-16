<?php 
session_start();
include '../proses/checker.php';
include '../proses/dbinfo.php';
if($_POST){
	$nama_cabang	= isset($_POST['nama_cabang'])?$_POST['nama_cabang']:null;
	$longitude		= isset($_POST['longitude'])?$_POST['longitude']:null;
	$latitude		= isset($_POST['latitude'])?$_POST['latitude']:null;
	$file_upload	= isset($_FILES['image'])?$_FILES['image']:null;
	$id_kel			= isset($_POST['id_kel'])?$_POST['id_kel']:null;
	$pathfile ='gambar/';
	$accepted_file = ['image/jpg','image/png','image/jpeg'];
	if(!is_null($file_upload)){
		$file_tmp = $file_upload['tmp_name'];
		$file_name = $file_upload['name'];
		$file_error = $file_upload['error'];
		$file_type = $file_upload['type'];

		if($file_error == 0){
			$file_name = explode('.',$file_name);
			$ext = $file_name[count($file_name)-1];
			$namefile = md5(date('Y-m-dh:i:s')).'.'.$ext;
			$file = $pathfile.$namefile;
			if(in_array($file_type, $accepted_file)){
				if(!file_exists($file)){
				if(move_uploaded_file($file_tmp, $file)){
				$input_cabang = "INSERT INTO cabang (`nama_cabang`,`lat`,`long`,`gambar`,`id_kel`) VALUES ('$nama_cabang','$latitude','$longitude','$file','$id_kel')";
				if(mysql_query($input_cabang)){
				// echo "Gambar berhasil di upload ".$file;
				header ("Refresh:0; url=index-admin.php");
					}
					else{
		echo "Terdapat kesalahan pada penyimpanan gambar";
						echo mysql_error();
					if (file_exists($file)) unlink($file);
					}
				}else{
		echo "Terdapat kesalahan pada pemindahan gambar";
					}
				}else{
			echo "Terdapar gambar dengan nama yang sama";
				}
			}else{
				echo "file yg di upload bukan gambar";
			}
		}else{
			echo "Gambar terdapat data yg corupt";
		}
	}
	else{
		echo "Tidak ada file yg dikirim";
	}

	}
	



	?>
	
