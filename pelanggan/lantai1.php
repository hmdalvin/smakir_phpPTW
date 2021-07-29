<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Selamat Datang User</title>
        <link rel=stylesheet type="text/css" href="stylesheet1.css">
    </head>
    <body>
        <div class="center">
            <div class="container">
                <div class="contain">
                    <a href="/smakir/index.php" class="btn logout">Kembali Ke Halaman Dasboard</a>
                    <a href="cariMobil.php" class="btn logout">Cari Mobil</a>
                    </br>
                    </br>
                    <div class="navbar">
                        <h5>Pilih Lantai</h5>
                        <a href="/smakir/pelanggan/lantai2.php" class="btn lantai"><span>Lantai 2</span></a>
                        <a href="/smakir/pelanggan/lantai3.php" class="btn lantai"><span>Lantai 3</span></a>
                        <a href="/smakir/pelanggan/lantai4.php" class="btn lantai"><span>Lantai 4</span></a>
                        <a href="/smakir/pelanggan/lantai5.php" class="btn lantai"><span>Lantai 5</span></a>                       
                    </div>
                    </br>
                    <h4>Selamat datang di Lantai 1</h4>
                    </br>
                    
                </div>
                <div class="content">
                    <div class="left-content">
                        <!--Table parkir sisi kiri-->
                        <div class="sisi">
                            <h5>Sisi Kiri</h5>
                            <a href="/smakir/pelanggan/lantai1.php" class="btn refresh"><span>refresh</span></a> 
                        </div>
                        
                        <table class="daftar-mobil">
                            <thead>
                                <tr>
                                    <th>Nomer Ruangan</th>
                                    <th>Plat Mobil</th>
                                </tr>
                            </thead>
                            <?php
                                include ("../connection.php");
                                $query_mysql = mysqli_query($koneksi, "SELECT ruangan.nomer_ruangan, ruangan.lantai, ruangan.sisi_ruangan, parkir.plat_mobil FROM `ruangan`LEFT JOIN parkir ON ruangan.nomer_ruangan = parkir.nomer_ruangan ORDER BY ruangan.nomer_ruangan ASC");
                                $nomor = 1;
                                $mobil = " ";
                                $warna = "#fff";
                                while($data = mysqli_fetch_array($query_mysql)){
                                    if($data['lantai']=="1"){
                                        if($data['sisi_ruangan']=="Kiri"){
                                            if($data['plat_mobil']==NULL){
                                                $mobil = " ";
                                                $warna = "#56d8e4";
                                            }else{
                                                $mobil = $data['plat_mobil'];
                                                $warna = "#9f01ea";
                                            }
                                            echo "<tr bgcolor=".$warna.">";
                                                echo "<th>".$data['nomer_ruangan']."</th>";
                                                echo "<th>".$mobil."</th>";
                                            echo "</tr>";
                                        }
                                    }
                                }
                            ?>
                        </table>
                    </div>
                    <div class="right-content">
                        <!--Table parkir sisi kanan-->
                        <div class="sisi">
                            <h5>Sisi Kanan</h5>
                            <a href="/smakir/pelanggan/lantai1.php" class="btn refresh"><span>refresh</span></a> 
                        </div>
                        
                        <table class="daftar-mobil">
                            <thead>
                                <tr>
                                    <th>Plat Mobil</th>
                                    <th>Nomer Ruangan</th>
                                </tr>
                            </thead>
                            <?php
                                include ("../connection.php");
                                $query_mysql = mysqli_query($koneksi, "SELECT ruangan.nomer_ruangan, ruangan.lantai, ruangan.sisi_ruangan, parkir.plat_mobil FROM `ruangan`LEFT JOIN parkir ON ruangan.nomer_ruangan = parkir.nomer_ruangan ORDER BY ruangan.nomer_ruangan ASC");
                                $nomor = 1;
                                $mobil = " ";
                                $warna = "#fff";
                                while($data = mysqli_fetch_array($query_mysql)){
                                    if($data['lantai']=="1"){
                                        if($data['sisi_ruangan']=="Kanan"){
                                            if($data['plat_mobil']==NULL){
                                                $mobil = " ";
                                                $warna = "#56d8e4";
                                            }else{
                                                $mobil = $data['plat_mobil'];
                                                $warna = "#9f01ea";
                                            }
                                            echo "<tr bgcolor=".$warna.">";
                                                echo "<th>".$mobil."</th>";    
                                                echo "<th>".$data['nomer_ruangan']."</th>";
                                            echo "</tr>";
                                        }
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>