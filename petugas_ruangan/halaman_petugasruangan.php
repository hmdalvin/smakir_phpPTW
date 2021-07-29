<!DOCTYPE html>
<html>
<head>
	<title>Halaman Petugas Ruangan</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<div class="center">
		<div class="container">
			<div class="menu">
				<a href="/smakir/logout.php" class="btn daftar">LOGOUT</a>
				<a href="/smakir/petugas_ruangan/tambah.php" class="btn daftar"><span>Tambah Parkir</span></a>
				<a href="/smakir/petugas_ruangan/lantai1.php" class="btn daftar"><span>Lihat Area Parkir</span></a>
			</div>
			<div class="list">
				</br>
				</br>
				<h2>Data Mobil Di Ruang Parkir</h2>
				<table border="1" class="table">
					<tr>
						<th>No</th>
						<th>Plat Mobil</th>
						<th>Ruang Parkir</th>
					</tr>
					<?php
						include ("../connection.php");
						$query_mysql = mysqli_query($koneksi, "SELECT ruangan.nomer_ruangan, ruangan.lantai, ruangan.sisi_ruangan, parkir.plat_mobil FROM `ruangan`INNER JOIN parkir ON ruangan.nomer_ruangan = parkir.nomer_ruangan ORDER BY ruangan.nomer_ruangan ASC");
						$nomer = 1;
						while($data = mysqli_fetch_array($query_mysql)){
					?>
							<tr>
								<td><?php echo $nomer++;?></td>
								<td><?php echo $data['plat_mobil'];?></td>
								<td><?php echo $data['nomer_ruangan'];?></td>
								<td>
									<a class"edit" href="edit.php?id=<?php echo $data['plat_mobil'];?>">Edit</a>
								</td>
							</tr>
					<?php
						}
					?>
				</table>
				
			</div>
		</div>
	</div>
</body>
</html>