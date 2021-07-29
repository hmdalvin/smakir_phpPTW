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
                    <div class="text">Data Mobil</div>
                    <form action="cek_mobil.php" method="post">
                        <div class="data">
                            <label class="username">Plat Mobil</label>
                            <input type="text" name="plat" value="<?php session_start(); echo $_SESSION['plat'] ?>" readonly required>
                        </div>
                        <div class="data">
                            <label class="username">Nomer Ruangan Mobil</label>
                            <input type="text" name="location" value="<?php echo $_SESSION['ruangan'] ?>" readonly required>
                        </div>
                        <center>
				            <a class="link" href="/smakir/pelanggan/logOutMobil.php">kembali</a>
			            </center>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>