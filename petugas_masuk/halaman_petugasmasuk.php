<!DOCTYPE html>
<html>
<head>
	<title>Halaman Petugas Pintu Masuk</title>
	<link rel="stylesheet" type="text/css" href="stylePintuMasuk.css">
</head>
<body>

	<h1>Halaman Petugas Pintu Masuk</h1>
	<a href="/smakir/logout.php">LOGOUT</a>
	</br>
	<a href="tampilkanFile.php">Tampilkan Data Mobil Masuk</a>
	</br>

	<!--peringatan input mobil-->
	<?php 
		if(isset($_GET['pesan'])){
			//jika mobil belum masuk / mobil sudah keluar
			if($_GET['pesan']=="input"){
				echo "<div class='show'>Mobil berhasil didaftarkan !</div>";
			}//jika mobil sudah masuk
			else if($_GET['pesan']=="platSama"){
				echo "<div class='alert'>Mobil yang didaftarkan sudah masuk !</div>";
			}
		}
	?>
	<!--Form Input-->
	<div class="box_login">
		<?php
			date_default_timezone_set("Asia/Jakarta");
			echo"<div class='jam'>Waktu Sekarang adalah </div>".date("Y/m/d H:i:s");
		?>
		<p class="text_login">Masukan Data Mobil Baru</p>

		<form action="input_mobil.php" method="post">
			<label>Masukan Nomor Plat Mobil</label>
			<input type="text" name="platmobil" class="input_form" placeholder="Plat Nomer .." required="required">

			<input type="submit" class="save_button" value="Simpan Data">
		</form>
    </div>
</body>
</html>