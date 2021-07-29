<!DOCTYPE html>
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
                
                $query_mysql = mysqli_query($koneksi, "SELECT CAST(jam_keluar AS DATE) as 'tanggal_keluar', COUNT(plat_mobil) as 'jumlah_mobil', SUM(biaya) as pendapatan FROM laporan GROUP BY CAST(jam_keluar AS DATE)");
                $nomer = 1;
                while($data = mysqli_fetch_array($query_mysql)){
                    $banyakMenginap = 0;
            ?>

                <tr>
                    <td><?php echo $nomer++;?></td>
                    <td><?php echo $data['tanggal_keluar'];?></td>
                    <td><?php echo $data['jumlah_mobil'];?></td>
                    <?php
                        
                        $query_mysql1 = mysqli_query($koneksi, "SELECT CAST(jam_keluar AS DATE) as 'tanggal_keluar', biaya FROM `laporan`");
                        while($data1 = mysqli_fetch_array($query_mysql1)){
                            if($data['tanggal_keluar']==$data1['tanggal_keluar']){
                                if($data1['biaya']=='100000'){
                                    $banyakMenginap++;
                    ?>           
                    <?php
                                }
                            }
                        }
                    ?>
                    <td><?php echo $banyakMenginap;?></td>
                    <td><?php echo $data['pendapatan'];?></td>
                </tr>
                
            <?php
                }
            ?>
        </table>
    </body>
</html>