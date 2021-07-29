<?php
    // mengaktifkan session pada php
    session_start();

    // menghubungkan php dengan koneksi database
    include ("../connection.php");

    // menangkap data yang dikirim dari form login
    $platmobil = $_POST['mobil'];
    $ruang = $_POST['ruang'];

    echo $platmobil;
    echo $ruang;

    // menyeleksi data plat mobil yang sama
    $login = mysqli_query($koneksi,"select * from parkir WHERE plat_mobil='$platmobil'");

    mysqli_query($koneksi, "UPDATE parkir SET nomer_ruangan = '$ruang' WHERE plat_mobil='$platmobil'");
    header("location:halaman_petugasruangan.php");
?> 