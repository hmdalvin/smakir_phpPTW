<?php
    // mengaktifkan session pada php
    session_start();

    // menghubungkan php dengan koneksi database
    include ("../connection.php");

    // menangkap data yang dikirim dari form
    $plat = $_POST['plat'];

    // menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($koneksi,"select * from parkir where plat_mobil='$plat'");
    
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);

    // cek apakah plat mobil ada pada database
    if($cek > 0){
        $_SESSION['plat'] = $plat;
        header("location:/smakir/pelanggan/lantai1.php");

    }
    else {
        // alihkan ke halaman login kembali
		header("location:/smakir/pelanggan/pelangganLogin.php?pesan=gagal");
    }

?>