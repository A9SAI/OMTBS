<?php
if (isset($_GET['id'])) {
    include("../conn.php");

    $con = new connec();
    $id = $_GET["id"];
    $table = "slider";

    $imagePathToDelete = $_GET["path"];

    if (file_exists($imagePathToDelete)) {
        if (unlink($imagePathToDelete)) {
            echo "File deleted successfully.";
        } else {
            echo "Error deleting the file.";
        }
    } else {
        echo "File not found.";
    }


    $con->delete($table, $id);
    header("Location:viewslider.php");
}
