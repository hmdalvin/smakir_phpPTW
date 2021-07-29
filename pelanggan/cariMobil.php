<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Selamat Datang User</title>
        <link rel=stylesheet type="text/css" href="stylesheet.css">
    </head>
    <body>
        <div class="center">
            <div class="container">
                <div class="contain">
                        <!--peringatan username dan password yang dimasukan salah-->
                        <?php 
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="gagal"){
                                    echo "<div class='alert'>Mobil Yang anda cari tidak ditemukan !</div>";
                                }
                            }
                        ?>
                    <div class="text">Cari Mobil</div>
                    <form action="cek_mobil.php" method="post">
                        <div class="data">
                            <label class="username">Plat Mobil atau Kendaraan</label>
                            <input type="text" name="plat" placeholder="Masukan Plat Mobil" required="required">
                        </div>
                        <div class="btn">
                            <div class="inner"></div>
                            <button type="submit">Cari Mobil</button>
                        </div>
                        <center>
				            <a class="link" href="/smakir/index.php">kembali</a>
			            </center>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>