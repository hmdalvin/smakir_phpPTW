<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Mobil Masuk</title>
	<link rel="stylesheet" type="text/css" href="stylePintuKeluar.css">
</head>
<body>
    <h1>Edit Data Mobil Masuk</h1>
    </br>
    <a href="halaman_petugasKeluar.php">Kembali</a>
    <div class=box_login>
        <?php
            // menghubungkan php dengan koneksi database
            include ("../connection.php");
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "select * from parkir where id_parkir='$id'");
            while($d = mysqli_fetch_array($data)){
                ?>
                <form method="post" action="keluar.php" action="biaya.php">
                    <table>
                        <tr>
                        <td>Apakah Anda ingin Mengeluarkan mobil ini</td>
                        </tr>
                        <tr>
                        <td>
                            <input type="hidden" name="idNumber" value="<?php echo $d['id_parkir'];?>">
                            <h3>Mobil dengan Plat : <?php echo $d['plat_mobil'];?><h3>
                        </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Keluar"></td>
                            <td><a href="halaman_petugaskeluar.php">Kembali</a></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
        ?>
    </div>
</body>