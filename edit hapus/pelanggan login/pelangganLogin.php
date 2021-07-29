<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Terlebih Dahulu - User Login</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>

        <!--peringatan username dan password yang dimasukan salah-->
        <?php 
	        if(isset($_GET['pesan'])){
		        if($_GET['pesan']=="gagal"){
			        echo "<div class='alert'>mobil anda tidak terdeteksi !</div>";
		        }
	        }
	    ?>
        
        <div class="center">
            <div class="container">
                <div class="text">Login User</div>
                <form action="cek_mobil.php" method="post">
                    <div class="data">
                        <label class="username">Plat Mobil atau Kendaraan</label>
                        <input type="text" name="plat" placeholder="Masukan Plat Mobil" required="required">
                    </div>
                    <div class="btn">
                        <div class="inner"></div>
                        <button type="submit">Login</button>
                    </div>
                </form>
                <center>
                    <a class="link" href="/smakir/index.php">kembali</a>
                </center>
            </div>
        </div>
    </body>
</html>