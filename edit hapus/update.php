<?php

// koneksi database
include ("../connection.php");


// menagkap data yang dikirim dari form
$idNumb = $_POST['idNumber'];
$plat_mobil = $_POST['platMobil'];
// update data ke database
mysqli_query($koneksi, "UPDATE parkir SET plat_mobil = '$plat_mobil' WHERE id_parkir = '$idNumb'");

//kembali ke tampilkan data
header("location:tampilkanFile.php");

?>