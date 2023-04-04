<?php
    include('conn.php');

    $status = '';
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            id_bus$idBus = $_GET['id'];
            $query = "SELECT * FROM bus WHERE id_bus = $idBus";

            $result = mysqli_query(connection(),$query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idBus = $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];

        $sql = "UPDATE bus SET id_bus='$idBus', plat='$plat', 'status'='$status' WHERE id_bus=$idBus";

        $result = mysqli_query(connection(),$sql);
        if ($result) {
            $status = 'yes';
        } else {
            $status = 'error';
        }

        header('Location: bus.php?status='.$status);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percontohan</title>
</head>
<body>
        <nav>
          <div>
            <ul style="margin-top:100px;">
              <li>
                <a href="trans_upn.php">Data Trans UPN</a>
              </li>
              <li>
                <a href="driver.php">Data Driver</a>
              </li>
              <li>
                  <a href="bus.php">Data Bus</a>
              </li>
              <li>
                  <a href="kondektur.php">Data Kondektur</a>
              </li>
            </ul>
          </div>
        </nav>
            <main role="main">
                <?php
                    if ($status == 'yes') {
                        echo '<br><br><div role="alert">Id Bus berhasil disimpan</div>';
                    } elseif ($status == 'error') {
                        echo '<br><br><div role="alert">Id BUS gagal disimpan</div>';
                    }
                ?>
                <h2 style="margin: 30px 0 30px;">Update Data Bus</h2>
                <form action="update_bus.php" method="POST">
                    <?php while($data = mysqli_fetch_array($result)): ?>
                    <div>
                        <label>Id Bus</label>
                        <input type="text" placeholder="Angka Acak" value="<?= $data['id_bus'] ?>" name="id_bus" required="required">
                    </div>
                    <div>
                        <label>Plat</label>
                        <input type="text" placeholder="Acak Random" value="<?= $data['plat'] ?>" name="plat" required="required">
                    </div>
                    <div>
                        <label>Status</label>
                        <input type="text" placeholder="Angka KM" value="<?= $data['status'] ?>" name="status" required="required">
                    </div>
                    <?php endwhile ?>
                    <button type="submit">Simpan</button>
                </form>
            </main>
</body>
</html>