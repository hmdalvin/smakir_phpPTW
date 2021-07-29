<!DOCTYPE html>
<html>
<head>
	<title>Halaman Petugas Pintu Keluar</title>
	<link rel="stylesheet" type="text/css" href="stylePintuKeluar.css">
</head>
<body>
	<?php 
		session_start();
		// cek apakah yang mengakses halaman ini sudah login
		if($_SESSION['level']==""){
			header("location:index.php?pesan=gagal");
		}
	?>
	<h1>Halaman Petugas Pintu Keluar</h1>
	<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	<a href="/smakir/logout.php">LOGOUT</a>
	<div class="box_login">
		<!--peringatan keluarkan mobil-->
		<?php
			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="keluar"){
					echo "<div class='alert'>Mobil telah keluar!</div>";
					echo "mobil dengan plat ".$_SESSION['plat_mobil']." sudah keluar";
					echo "</br>";
					echo "Biaya parkirnya adalah Rp ".number_format($_SESSION['biaya'], 2, ",", ",");
				}
			}
		?>
		<table border="1" class="table">
			<tr>
				<th>No</th>
				<th>Plat Mobil</th>
				<th>Jam Masuk</th>
			</tr>
			<?php
			include ("../connection.php");
			$query_mysql = mysqli_query($koneksi, "SELECT * FROM parkir");
			$nomor = 1;
			while($data = mysqli_fetch_array($query_mysql)){
			?>
			<tr>
				<td><?php echo $nomor++;?></td>
				<td><?php echo $data['plat_mobil'];?></td>
				<td><?php echo $data['jam_masuk'];?></td>
				<td>
                	<a class"hapus" href="attention.php?id=<?php echo $data['id_parkir'];?>">Keluar</a>
            	</td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
	<br/>
	<br/>
</body>
</html>