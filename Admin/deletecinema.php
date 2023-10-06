<?php
if (isset($_GET['id'])) {
    include_once("../conn.php");

    $con = new connec();
    $id = $_GET["id"];
    $table = "cinema";
    $error_msg = " Movie is now showing on this cinema.Please delete this cinema's show first.";

    $imagePathToDelete = $_GET["path"];

    if ($con->delete_with_file($table, $id, $imagePathToDelete, $error_msg)) {
        echo '<script> window.location = "viewcinema.php"; </script>';
    } else {
        echo '<script> window.location = "cinemadetails.php?id=' . $id . '"; </script>';
    }
}
