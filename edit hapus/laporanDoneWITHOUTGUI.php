<!DOCTYPE html>
<html>
    <head>
        <title>laporan</title>
    </head>
    <body>
        <?php
            session_start();
            include ("../connection.php");    
            $kalender = $_POST['bulanLaporan'];
        ?>
        <h2>Laporan Bulan 
        <?php
            echo date('F, Y', strtotime($kalender));
        ?>
        </h2>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah Mobil</th>
                <th>Jumlah Yang Menginap</th>
                <th>Jumlah Pendapatan</th>
            </tr>
            <?php
                $query_mysql = mysqli_query($koneksi, "SELECT CAST(jam_keluar AS DATE) as 'tanggal_keluar', COUNT(plat_mobil) as 'jumlah_mobil', SUM(biaya) as pendapatan, DATE_FORMAT(jam_keluar, '%Y-%m') as 'bulan_tahun' FROM laporan GROUP BY CAST(jam_keluar AS DATE)");
                $nomer = 1;
                $pendapatan_total = 0;
                while($data = mysqli_fetch_array($query_mysql)){
                    if($data['bulan_tahun']==$kalender){
                        $banyakMenginap = 0;
                        $pendapatan_total += $data['pendapatan'];
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
                }
            ?>
            <tr>
                <th colspan="4">Total Pendapatan = </th>
                <th><?php echo $pendapatan_total; ?></th>
            </tr>
        </table>
    </body>
</html>