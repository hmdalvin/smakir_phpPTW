<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Menu Laporan</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <div class="center">
            <div class="container">
                <a href="../admin/index.php" class="btn logout">Kembali ke halaman Admin</a>
                </br>
                </br>
                <form action="laporan.php" method="post">
                    <label>Pilih Bulan Laporan</label>
                    </br>
                    <input type="month" class="input_calender" name="bulanLaporan">
                    </br>
                    <input type="submit" class="look" value="Lihat Laporan">
                </form>
            </div>
        </div>
    </body>
</html>