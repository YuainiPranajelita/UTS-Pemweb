<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA BUS</title>
    <style>
        .status_aktif {
            background-color: green;
            color: white;
        }
        .status_warning {
            background-color: yellow;
        }
        .status_rusak {
            background-color: red;
        }
    </style>
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
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='yes') {
                echo '<br><div>Id Bus berhasil dihapus</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">Id Bus gagal dihapus</div>';
              }

            }
           ?>
          <h2 style="margin: 20px 0 20px 0;">DATA BUS</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>Id Bus</th>
                  <th>Plat</th>
                  <th>Status</th>
                  <th colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM bus";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td class="status_<?php if ($data['status'] == 1){ echo 'aktif';} elseif ($data['status'] == 2) { echo 'warning';} elseif ($data['status'] == 0){ echo 'rusak';} ?>">
                    <?php echo $data['status'];  ?></td>
                    <td>
                      <a href="<?php echo "update_bus.php?id=".$data['id_bus']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete_bus.php?id=".$data['id_bus']; ?>"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>

  </body>
</html>