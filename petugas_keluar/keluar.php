<?php
    // mengaktifkan session pada php
    session_start();

    // koneksi database
    include ("../connection.php");

    // menagkap data yang dikirim dari form
    $idNumb = $_POST['idNumber'];

    // ambil data dari tabel parkir
    $query_mysql = mysqli_query($koneksi, "SELECT * FROM parkir WHERE id_parkir = '$idNumb'");
    $data = mysqli_fetch_array($query_mysql);
    $plat_mobil = $data['plat_mobil'];
    $ruangan = $data['nomer_ruangan'];
    $tgl_masuk = $data['jam_masuk'];

    //mengambil data waktu dari sistem web
    date_default_timezone_set("Asia/Jakarta");
    $tgl_keluar = date("Y/m/d H:i:s");

    $biaya = 5000;

    //menghitung selisih waktu dan menghitung biaya parkir
    $awal = strtotime($tgl_masuk);
    $akhir = strtotime($tgl_keluar);

    $diff = $akhir - $awal;
    $jam = floor($diff/(60*60));
    
    if ($jam>=24){
        $biaya = 100000;
    }else if($jam>12){
        $biaya = 50000;
    }else if($jam>6){
        $biaya = 30000;
    }else if($jam>3){
        $biaya = 15000;
    }else if($jam>1){
        $biaya = 10000;
    }
    else if($jam<1){
        $biaya = 5000;
    }

    // tambahkan data parkir ke tabel laporan
    mysqli_query($koneksi, "INSERT INTO laporan VALUES('','$idNumb','$plat_mobil','$ruangan','$tgl_masuk','$tgl_keluar','$biaya')"); 
    
    // buat session login dan username
    $_SESSION['plat_mobil'] = $plat_mobil;
    $_SESSION['biaya'] = $biaya;
    
    // hapus data dari tabel parkir
    mysqli_query($koneksi, "DELETE FROM parkir WHERE id_parkir = '$idNumb'");

    // kembali ke tampilkan biaya pembayaran
    header("location:halaman_petugaskeluar.php?pesan=keluar");
?>