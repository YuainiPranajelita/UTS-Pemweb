<?php
    include('conn.php');
    $query = "SELECT * FROM driver";
    $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'yes';
        } else {
            $status = 'error';
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAJI DRIVER</title>
</head>
<body>
<nav>
          <div>
            <ul style="margin-top:200px;">
              <li>
                <a href="bus.php">Data Bus</a>
              </li>
              <li>
                <a href="driver.php">Data Driver</a>
              </li>
              <li>
                  <a href="kondektur.php">Data Kondektur</a>
              </li>
              <li>
                  <a href="trans_upn.php">Data Trans UPN</a>
              </li>
              <li>
                  <a href="tambah_bus.php">Tambah Data Bus</a>
              </li>
              <li>
                  <a href="tambah_driver.php">Tambah Data Driver</a>
              </li>
              <li>
                  <a href="tambah_kondektur.php">Tambah Data Kondektur</a>
              </li>
              <li>
                  <a href="tambah_trans_upn.php">Tambah Trans UPN</a>
              </li>
              <li>
                  <a href="gaji_driver.php">Hitung Gaji Driver</a>
              </li>
              <li>
                  <a href="gaji_kondektur.php">Hitung Gaji Kondektur</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main">
        <?php  
                if (isset($_GET['bulan'])) {
                    $nama_bulan = $_GET['bulan'];
                } else {
                    $nama_bulan = 'Semua';
                }
            ?>
            <h5>Bulan = <?= $nama_bulan ?></h5>
            <p>Filter</p>
            <form action="" method="get">
                <select name="bulan" id="bulan" required>
                    <option value="">Choose One!</option>
                    <option value="Januari">January</option>
                    <option value="Februari">February</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">June</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
                <button type="submit">Show All</button>
                <a href="gaji_driver.php"><button type="button">Reset</button></a>
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <th>Id Driver</th>
                        <th>Nama</th>
                        <th>Total Km</th>
                        <th>Harga/km</th>
                        <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <tr>
                        <?php
                        $queryforKM = "SELECT SUM(jumlah_km) AS total_km FROM trans_upn WHERE id_driver = $data[id_driver] GROUP BY id_driver";
                        $result_jarak = mysqli_query(connection(), $queryforKM);
                        $data_driver = mysqli_fetch_assoc($result_jarak);
                        if($data_driver === NULL) {
                            $total_km = 0;
                        } else {
                            $total_km = $data_driver['total_km'];
                        }
                        $driver_gaji_perKM = 3000;
                        $driver_gaji = $total_km * $driver_gaji_perKM;
                        ?>
                        <td><?php echo $data['id_driver'] ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $total_km; ?></td>
                        <td><?php echo $driver_gaji_perKM; ?></td>
                        <td><?php echo "Rp. ", $driver_gaji; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
</body>
</html>