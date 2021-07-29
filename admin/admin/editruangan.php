<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['nomer_ruangan'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$nomer_ruangan = $_GET['nomer_ruangan'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE nomer_ruangan='$nomer_ruangan'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nomer_ruangan			= $_POST['nomer_ruangan'];
			$lantai					= $_POST['lantai'];
			$sisi_ruangan			= $_POST['sisi_ruangan'];

			$sql = mysqli_query($koneksi, "UPDATE ruangan SET nomer_ruangan='$nomer_ruangan', lantai='$lantai', sisi_ruangan='$sisi_ruangan' WHERE nomer_ruangan='$nomer_ruangan'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_ruangan";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_ruangan&nomer_ruangan=<?php echo $nomer_ruangan; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomer Ruangan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nomer_ruangan" class="form-control" size="4" value="<?php echo $data['nomer_ruangan']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Lantai</label>
				<div class="col-md-6 col-sm-6">
					<select name="lantai" class="form-control" required>
						<option value="">Pilih Lantai</option>
						<option value="1" <?php if($data['lantai'] == '1'){ echo 'selected'; } ?>>1</option>
						<option value="2" <?php if($data['lantai'] == '2'){ echo 'selected'; } ?>>2</option>
						<option value="3" <?php if($data['lantai'] == '3'){ echo 'selected'; } ?>>3</option>
						<option value="4" <?php if($data['lantai'] == '4'){ echo 'selected'; } ?>>4</option>
						<option value="5" <?php if($data['lantai'] == '5'){ echo 'selected'; } ?>>5</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sisi Ruangan</label>
				<div class="col-md-6 col-sm-6">
					<select name="sisi_ruangan" class="form-control" required>
						<option value="">Pilih Sisi Ruangan</option>
						<option value="Kanan" <?php if($data['sisi_ruangan'] == 'Kanan'){ echo 'selected'; } ?>>Kanan</option>
						<option value="Kiri" <?php if($data['sisi_ruangan'] == 'Kiri'){ echo 'selected'; } ?>>Kiri</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_ruangan" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
