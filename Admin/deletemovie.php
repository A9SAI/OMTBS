<?php

use PgSql\Lob;

if (isset($_GET['id'])) {
    include_once("../conn.php");

    $con = new connec();
    $id = $_GET["id"];
    $table = "movie";
    $error_msg = " This movie is available on show.Please delete this movie show first.";

    $imagePathToDelete = $_GET["path"];

    if ($con->delete_with_file($table, $id, $imagePathToDelete, $error_msg)) {
        echo '<script> window.location = "viewmovie.php"; </script>';
    } else {
        echo '<script> window.location = "moviedetails.php?id=' . $id . '"; </script>';
    }
     
}
