<?php
    include('conn.php');

    $status = '';
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $idDriver = $_GET['id'];
            $query = "DELETE FROM driver WHERE id_driver = $idDriver";

            $result = mysqli_query(connection(),$query);

            if ($result) {
                $status = 'yes';
            } else {
                $status = 'error';
            }

            header('Location: driver.php?status='.$status);
        }
    }
?>