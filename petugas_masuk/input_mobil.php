<?php
    // mengaktifkan session pada php
    session_start();

    // menghubungkan php dengan koneksi database
    include ("../connection.php");

    // menangkap data yang dikirim dari form login
    $platmobil = $_POST['platmobil'];

    //mengambil data waktu dari sistem web
    date_default_timezone_set("Asia/Jakarta");
    $tgl_masuk = date("Y/m/d H:i:s");

    // menyeleksi data plat mobil yang sama
    $login = mysqli_query($koneksi,"select * from parkir where plat_mobil='$platmobil'");
    
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);
    if($cek>0){
        header("location:halaman_petugasmasuk.php?pesan=platSama");
    }else{
        mysqli_query($koneksi, "INSERT INTO parkir VALUES('','$platmobil','','$tgl_masuk')");
        header("location:halaman_petugasmasuk.php?pesan=input");
    }
?>