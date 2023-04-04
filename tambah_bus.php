<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idBus = $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];

        $query = "INSERT INTO bus VALUES ('$idBus','$plat','$status')";
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
    <title>TAMBAH DATA BUS</title>
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
                echo '<br><br><div>]Id Bus Trans UPN berhasil ditambahkan</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">Id Bus Trans UPN gagal ditambahkan</div>';
              }

            }
           ?>
                <h2 style="margin: 30px 0 30px;">Tambah Data Bus</h2>
                <form action="tambah_bus.php" method="POST">
                    <div>
                        <label>Id Bus</label>
                        <input type="text" placeholder="Id" name="id_bus" required="required">
                    </div>
                    <div>
                        <label>Plat</label>
                        <input type="text" placeholder="plat" name="plat" required="required">
                    </div>
                    <div>
                        <label>Status</label>
                        <input type="text" placeholder="Status" name="status" required="required">
                    </div>
                    <button type="submit">Simpan</button>
                </form>
            </main>
</body>
</html>