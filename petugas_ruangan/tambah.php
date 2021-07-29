<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Mobil ke Area Parkir</title>
        <link rel="stylesheet" type="text/css" href="stylesheet2.css">
    </head>
    <body>
        <div class="center">
            <div class="container">
                <a href="/smakir/petugas_ruangan/halaman_petugasruangan.php" class="btn kembali">Kembali</a>
                </br>
                </br>
                <h2>Selamat Datang Di Menu Parkir Ruangan</h2>
                </br>
                <form action="inputRuang.php" method="post">
                    <label>Pilih Mobil yang Parkir</label>
                    <select name="mobil" class="mobil" required="required">
                        <option value="">Pilih Mobil</option>
                        <?php
                            include ("../connection.php");
                            $query_mysql = mysqli_query($koneksi, "SELECT * FROM `parkir` WHERE nomer_ruangan = 0");
                            while($data = mysqli_fetch_array($query_mysql)){
                        ?>
                                <option><?php echo $data['plat_mobil'];?></option>
                        <?php
                            }
                        ?>
                    </select>
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
            </div>
        </div>
    </body>
</html>