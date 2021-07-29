<!DOCTYPE html>
<html>
    <head>
        <title>Edit Data Parkir</title>
        <link rel="stylesheet" type="text/css" href="stylesheet3.css">
    </head>
    <body>
        <div class="center">
            <div class="container">
                <a href="/smakir/petugas_ruangan/halaman_petugasruangan.php" class="btn kembali">Kembali</a>
                </br>
                <h2>Edit Data</h2>
                </br>
                <?php
                    include ("../connection.php");
                    $id = $_GET['id'];
                    //echo $id;
                    $data = mysqli_query($koneksi, "SELECT * FROM parkir WHERE id_parkir='$id'");
                    while($d = mysqli_fetch_array($data)){
                ?>
                        <form action="update.php" method="post">
                            <label>Plat Mobil</label>
                            <input type="text" name="plat_mobil" value="<?php echo $id;?>" readonly required>
                            </br>
                            </br>
                            <label>Pilih Ruangan</label>
                            <select name="ruang" class="ruang" required>
                                <option value="">Pilih Ruangan</option>
                                <?php
                                    include ("../connection.php");
                                    $query_mysql = mysqli_query($koneksi, "SELECT ruangan.nomer_ruangan, ruangan.lantai, ruangan.sisi_ruangan, parkir.plat_mobil FROM `ruangan`LEFT JOIN parkir ON ruangan.nomer_ruangan = parkir.nomer_ruangan ORDER BY ruangan.nomer_ruangan ASC");
                                    while($data = mysqli_fetch_array($query_mysql)){
                                        if($data['plat_mobil']==NULL){
                                ?>
                                            <option><?php echo $data['nomer_ruangan'];?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            </br>
                            </br>
                            <input type="submit" class="save" value="Simpan Data">
                        </form>
                <?php
                    }
                ?>
            </div>
        </div>
    </body>
</html>