<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idTransUPN = $_POST['id_trans_upn'];
        $idKondektur = $_POST['id_kondektur'];
        $idBus = $_POST['id_bus'];
        $idDriver = $_POST['id_driver'];
        $jumlahKM = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];

        $query = "INSERT INTO trans_upn VALUES ('$idTransUPN','$idKondektur','$idBus','$idDriver','$jumlahKM','$tanggal')";
        echo $query;
        $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH DATA TRANS UPN </title>
</head>
<body>
<nav>
          <div>
            <ul style="margin-top:100px;">
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
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>]Id Trans UPN berhasil ditambahkan</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">Id Trans UPN gagal ditambahkan</div>';
              }

            }
           ?>
                <h2 style="margin: 30px 0 30px;">Tambah Data Trans UPN</h2>
                <form action="tambah_trans_upn.php" method="POST">
                    <div>
                        <label>ID Trans UPN</label>
                        <input type="text" placeholder="ID" name="id_trans_upn" required="required">
                    </div>
                    <div>
                        <label>ID Kondektur</label>
                        <input type="text" placeholder="Kondektur" name="id_kondektur" required="required">
                    </div>
                    <div>
                        <label>ID Bus</label>
                        <input type="text" placeholder="BUS" name="id_bus" required="required">
                    </div>
                    <div>
                        <label>ID Driver</label>
                        <input type="text" placeholder="Driver" name="id_driver" required="required">
                    </div>
                    <div>
                        <label>Jumlah KM</label>
                        <input type="text" placeholder="Total KM" name="jumlah_km" required="required">
                    </div>
                    <div>
                        <label>Tanggal</label>
                        <input type="date" placeholder="" name="tanggal" required="required">
                    </div>
                    <button type="submit">Simpan</button>
                </form>
            </main>
</body>
</html>