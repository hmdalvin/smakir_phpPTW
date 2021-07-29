<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" type="text/css" href="stylePegawai.css">
    </head>
    <body>
        <h1 class="title_h1">Selamat Datang Di Sistem SMAKIR</h1>

        <!--peringatan username dan password yang dimasukan salah-->
        <?php 
	        if(isset($_GET['pesan'])){
		        if($_GET['pesan']=="gagal"){
			        echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		        }
	        }
	    ?>

        <!--Form Login-->
        <div class="box_login">
            <p class="text_login">Silahkan Login</p>

            <form action="cek_login.php" method="post">
			    <label>Username</label>
			    <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

                <label>Password</label>
			    <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

                <input type="submit" class="login_button" value="LOGIN">

                <br/>
			    <br/>
                <center>
				    <a class="link" href="/smakir/index.php">kembali</a>
			    </center>
            </form>
        </div>
    </body>
</html>