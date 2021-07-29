<!DOCTYPE html>
<html>
<head>
	<title>Data Mobil Masuk</title>
	<link rel="stylesheet" type="text/css" href="stylePintuMasuk.css">
</head>
<body>
    <h1>Daftar Mobil Masuk</h1>
    </br>
    <a href="halaman_petugasmasuk.php">Kembali</a>
    
    <!--peringatan edit data-->
    <?php
    if(isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if($pesan == "update"){
            echo "Data berhasil diganti";
        }else if($pesan == "hapus"){
            echo "data berhasil dihapus";
        }
    }
    ?>

    <h2>Data Mobil Masuk</h2>
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
                <a class"edit" href="edit.php?id=<?php echo $data['id_parkir'];?>">Edit</a>
                <a class"hapus" href="hapus.php?id=<?php echo $data['id_parkir'];?>">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

</body>
</html>
