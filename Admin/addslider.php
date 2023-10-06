<?php
if (isset($_POST["btn_insert"])) {
    $alt = $_POST["slider_alt_txt"];

    $target_dir = "images/slider/";
    $target_file = $target_dir . $_FILES["fileToUpload"]["name"];

    $target_dir_01 = "../images/slider/";
    $target_file_01 = $target_dir_01 . $_FILES["fileToUpload"]["name"];

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_01)) {
        $sql = "Insert into slider values(0,'$target_file','$alt')";
        $con->insert($sql, "Record Inserted");
        header("Location:viewslider.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
<section class="mt-2">
    <form method="post" enctype="multipart/form-data">
        <div>
            <label class="mr-3">Select Image :</label>
            <input type="file" name="fileToUpload" id="fileToUpload" Required>
            <br><br>

            <label class="mr-3">Alternate Text :</label>
            <input type="text" placeholder="Enter Alternate Text" name="slider_alt_txt" style="width: 250px;" Required>
            <br>
            <button type="submit" name="btn_insert" class="btn add-btn">Add Slide</button>
        </div>
    </form>
</section>