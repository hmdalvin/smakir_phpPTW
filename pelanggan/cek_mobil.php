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

    //mencari lokasi mobil
    $query_mysql = mysqli_query($koneksi, "SELECT * FROM parkir WHERE plat_mobil = '$plat'");
    $data = mysqli_fetch_array($query_mysql);
    $ruangan = $data['nomer_ruangan'];

    // cek apakah plat mobil ada pada database
    if($cek > 0){
        $_SESSION['plat'] = $plat;
        $_SESSION['ruangan'] = $ruangan;
        header("location:/smakir/pelanggan/temuMobil.php");

    }
    else {
        // alihkan ke halaman login kembali
		header("location:/smakir/pelanggan/cariMobil.php?pesan=gagal");
    }

?>