<?php 
$koneksi = mysqli_connect("localhost","root","","smakir");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Koneksi ke database gagal karena : " . mysqli_connect_error();
	}
?>