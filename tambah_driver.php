<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idDriver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $noSIM = $_POST['no_sim'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO driver VALUES ('$idDriver','$nama','$noSIM','$alamat')";
        echo $query;
        $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'yes';
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
    <title>TAMBAH DATA DRIVER</title>
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
              if ($status=='yes') {
                echo '<br><br><div>]Id Driver berhasil ditambahkan/div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">Id Driver gagal ditambahkan</div>';
              }

            }
           ?>
                <h1 style="margin: 30px 0 30px;">Tambah Data Driver</h1>
                <form action="tambah_driver.php" method="POST">
                    <div>
                        <label>ID Driver</label>
                        <input type="text" placeholder="ID" name="id_driver" required="required">
                    </div>
                    <div>
                        <label>Nama</label>
                        <input type="text" placeholder="Nama" name="nama" required="required">
                    </div>
                    <div>
                        <label>NO SIM</label>
                        <input type="text" placeholder="NO SIM" name="no_sim" required="required">
                    </div>
                    <div>
                        <label>Alamat</label>
                        <input type="text" placeholder="Alamat" name="alamat" required="required">
                    </div>
                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>