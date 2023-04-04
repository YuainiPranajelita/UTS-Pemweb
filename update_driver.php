<?php
    include('conn.php');

    $status = '';
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $idDriver = $_GET['id'];
            $query = "SELECT * FROM driver WHERE id_driver = $idDriver";

            $result = mysqli_query(connection(),$query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idDriver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $noSIM = $_POST['no_sim'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE driver SET id_driver='$idDriver', nama='$nama', no_sim='$noSIM', alamat='$alamat' WHERE idDriver=$idDriver";

        $result = mysqli_query(connection(),$sql);
        if ($result) {
            $status = 'yes';
        } else {
            $status = 'error';
        }

        header('Location: driver.php?status='.$status);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE DATA DRIVE</title>
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
                    if ($status == 'yes') {
                        echo '<br><br><div role="alert">Id Driver berhasil disimpan</div>';
                    } elseif ($status == 'error') {
                        echo '<br><br><div role="alert">Id Driver gagal disimpan</div>';
                    }
                ?>
                <h2 style="margin: 30px 0 30px;">Update Data Driver</h2>
                <form action="updateDriver.php" method="POST">
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <div>
                        <label>Id Driver</label>
                        <input type="text" placeholder="Angka random" value="<?= $data['id_driver'] ?>" name="id_driver" required="required">
                    </div>
                    <div>
                        <label>Nama</label>
                        <input type="text" placeholder="Acak bebas" value="<?= $data['nama'] ?>" name="nama" required="required">
                    </div>
                    <div>
                        <label>No SIM</label>
                        <input type="text" placeholder="Angka SIM" value="<?= $data['no_sim'] ?>" name="no_sim" required="required">
                    </div>
                    <div>
                        <label>Alamat</label>
                        <input type="text" placeholder="2022-11-16" value="<?= $data['alamat'] ?>" name="alamat" required="required">
                    </div>
                    <?php endwhile ?>
                    <button type="submit">Simpan</button>
                </form>
            </main>
</body>
</html>