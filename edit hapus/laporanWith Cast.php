<!DOCTYPE html>>
<html>
    <head>
        <title>laporan</title>
    </head>
    <body>
        <h2>Laporan Bulan Maret 2021</h2>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah Mobil</th>
                <th>Jumlah Yang Menginap</th>
                <th>Jumlah Pendapatan</th>
            </tr>
            <?php
                include ("../smakir/connection.php");

                $query_mysql = mysqli_query($koneksi, "SELECT CAST(jam_keluar AS DATE) as 'hari_keluar' FROM laporan");
                $nomer = 1;
                while($data = mysqli_fetch_array($query_mysql)){
            ?>
                <tr>
                    <td><?php echo $nomer++;?></td>
                    <td><?php echo $data['bulan'];?></td>
                </tr>
            <?php
                }
            ?>
        </table>
    </body>
</html>