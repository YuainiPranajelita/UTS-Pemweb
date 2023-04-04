<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA TRANS UPN</title>
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
                echo '<br><br><div>Id Trans UPN berhasil dihapus</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">Id Trans UPN gagal dihapus</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tabel Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>Id Trans UPN</th>
                  <th>Id Kondektur</th>
                  <th>Id Bus</th>
                  <th>Id Driver</th>
                  <th>Jumlah KM</th>
                  <th>Tanggal</th>
                  <th colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM trans_upn";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_trans_upn'];  ?></td>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td>
                      <a href="<?php echo "update_trans_upn.php?id=".$data['id_trans_upn']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete_trans_upn.php?id=".$data['id_trans_upn']; ?>"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>

  </body>
</html>
