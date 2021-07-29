<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$nomer_ruangan		= $_POST['nomer_ruangan'];
			$lantai				= $_POST['lantai'];
			$sisi_ruangan		= $_POST['sisi_ruangan'];

			$cek = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE nomer_ruangan='$nomer_ruangan'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO ruangan(nomer_ruangan, lantai, sisi_ruangan) VALUES('$nomer_ruangan', '$lantai', '$sisi_ruangan')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_mhs";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_ruangan" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomer Ruangan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nomer_ruangan" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Lantai</label>
				<div class="col-md-6 col-sm-6">
					<select name="lantai" class="form-control" required>
						<option value="">Pilih Lantai</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sisi Ruangan</label>
				<div class="col-md-6 col-sm-6">
					<select name="sisi_ruangan" class="form-control" required>
						<option value="">Pilih Sisi Ruangan</option>
						<option value="Kanan">Kanan</option>
						<option value="Kiri">Kiri</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
