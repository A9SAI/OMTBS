<?php
if (isset($_POST["btn_insert"])) {
    include_once("../conn.php");
    $con = new connec();

    $id = $_GET["id"];
    $name = $_POST["cinema_name"];
    $city = $_POST["cinema_city"];

    $oldImage = $_POST["old_image"];

    $target_dir = "images/cinema/";
    $target_file = $target_dir . $_FILES["fileToUpload"]["name"];

    $target_dir_01 = "../images/cinema/";
    $target_file_01 = $target_dir_01 . $_FILES["fileToUpload"]["name"];

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_01)) {

        $sql = "Update cinema set name='$name', cinema_photo='$target_file', city='$city' Where id=$id;";
        $con->update($sql, "Record Inserted");

        // Remove Old Image from Previous Folder
        $imagePathToDelete = "../" . $oldImage;
        if (file_exists($imagePathToDelete)) {
            if (unlink($imagePathToDelete)) {
                echo "File deleted successfully.";
            } else {
                echo "Error deleting the file.";
            }
        } else {
            echo "File not found.";
        }

        header("Location:viewcinema.php");
    } else {
        $sql = "Update cinema set name='$name', cinema_photo='$oldImage', city='$city' Where id=$id;";
        $con->update($sql, "Record Inserted");

        header("Location:viewcinema.php");
    }
}


if (isset($_GET["id"])) {
    include_once("../conn.php");
    $con = new connec();

    $id = $_GET["id"];
    $tbl = "cinema";

    $result = $con->select($tbl, $id);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $n = $row["name"];
        $p = $row["cinema_photo"];
        $c = $row["city"];
    }
}

include("dashboard.php");

?>

<section class="table-section mt-5">
    <h5 class="text-center my-2">Cinema Details</h5>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form method="post" enctype="multipart/form-data">

                    <div class="d-flex">
                        <div class="mr-3">
                            <img src="../<?php echo $p ?>" alt="">
                        </div>
                        <div>
                            <p style="font-size :20px;"><b><?php echo $n ?></b></p>
                        </div>
                    </div>
                    <input type="text" name="old_image" value="<?php echo $p ?>" style="display:none">

                    <div class="form-group details-form">
                        <label>Cinema Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Cinema Name" name="cinema_name" value="<?php echo $n ?>" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Cinema Image :</label>
                        <input type="file" name="fileToUpload">
                    </div>
                    <div class="form-group details-form">
                        <label>City :</label>
                        <input type="text" class="form-control" placeholder="Enter City" name="cinema_city" value="<?php echo $c ?>" Required>
                    </div>
                    <div class="button-align">
                        <button type="submit" name="btn_insert" class="btn btn-edit mr-2"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</button>
                        <a href="deletecinema.php?id=<?php echo $row["id"] ?>&path=../<?php echo $p ?>" class="btn btn-delete">
                            <i class="fa-solid fa-trash mr-2"></i>Delete
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    </div>

</section>

<?php
include("admin_footer.php");

?>