<?php
    // connection to database
    include ("../connection.php");
    
    // Catch data from form
    $plat_mobil = $_POST['plat_mobil'];
    $ruangan = $_POST['ruang'];

    // Update data to database
    mysqli_query($koneksi, "UPDATE parkir SET nomer_ruangan = '$ruangan' WHERE plat_mobil = '$plat_mobil'");
    
    // Back to the menu
    header("location:halaman_petugasruangan.php");
?>