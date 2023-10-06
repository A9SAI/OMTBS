<?php
if (isset($_POST["btn_insert"])) {
    include("../conn.php");
    $con = new connec();

    $name = $_POST["cinema_name"];
    $city = $_POST["cinema_city"];

    $target_dir = "images/cinema/";
    $target_file = $target_dir . $_FILES["fileToUpload"]["name"];

    $target_dir_01 = "../images/cinema/";
    $target_file_01 = $target_dir_01 . $_FILES["fileToUpload"]["name"];

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_01)) {

        $sql = "Insert into cinema values(0,'$name','$target_file','$city')";
        $con->insert($sql, "Record Inserted");

        header("Location:viewcinema.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

include("dashboard.php");

?>

<section class="table-section mt-5">
    <h5 class="text-center my-2">Add Cinema</h5>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form method="post" enctype="multipart/form-data" class="mt-3">
                    <div class="form-group details-form">
                        <label>Cinema Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Cinema Name" name="cinema_name" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Cinema Image :</label>
                        <input type="file" name="fileToUpload" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>City :</label>
                        <input type="text" class="form-control" placeholder="Enter City" name="cinema_city" Required>
                    </div>
                    <div class="button-align">
                        <button type="submit" name="btn_insert" class="btn add-btn">Add Cinema</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

</section>

<?php
include("admin_footer.php");

?>