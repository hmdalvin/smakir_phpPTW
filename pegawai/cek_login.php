<?php 
    // mengaktifkan session pada php
    session_start();

    // menghubungkan php dengan koneksi database
    include ("../connection.php");

    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($koneksi,"select * from user_level where username='$username' and password='$password'");

    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);

    // cek apakah username dan password di temukan pada database
    if($cek > 0){

	    $data = mysqli_fetch_assoc($login);

	    // cek jika user login sebagai admin
	    if($data['level']=="admin"){

		    // buat session login dan username
		    $_SESSION['username'] = $username;
		    $_SESSION['level'] = "admin";
		    // alihkan ke halaman dashboard admin
		    header("location:/smakir/admin/index.php");

	    // cek jika user login sebagai petugas pintu masuk
	    }else if($data['level']=="petugas pintu masuk"){
		    // buat session login dan username
		    $_SESSION['username'] = $username;
		    $_SESSION['level'] = "petugas pintu masuk";
		    // alihkan ke halaman dashboard petugas pintu masuk
		    header("location:/smakir/petugas_masuk/halaman_petugasmasuk.php");
        
        // cek jika user login sebagai petugas ruangan
	    }else if($data['level']=="petugas ruangan"){
		    // buat session login dan username
		    $_SESSION['username'] = $username;
		    $_SESSION['level'] = "petugas ruangan";
		    // alihkan ke halaman dashboard petugas ruangan
		    header("location:/smakir/petugas_ruangan/halaman_petugasruangan.php");

	    // cek jika user login sebagai petugas pintu keluar
	    }else if($data['level']=="petugas pintu keluar"){
		    // buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "petugas pintu keluar";
		    // alihkan ke halaman dashboard petugas pintu keluar
		header("location:/smakir/petugas_keluar/halaman_petugaskeluar.php");

		}
	}
	else{
		// alihkan ke halaman login kembali
		header("location:/smakir/pegawai/login.php?pesan=gagal");
	}

?>