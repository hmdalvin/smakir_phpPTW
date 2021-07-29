<?php
// koneksi database
include ("../connection.php");

//menagkap data id dari tampilkan file
$id = $_GET['id'];
//menghapus data dari database
mysqli_query($koneksi, "DELETE from parkir where id_parkir='$id'");

//kembali ke tampilkan data
header("location:tampilkanFile.php");

?>