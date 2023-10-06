<?php
if (isset($_POST["btn_insert"])) {
    include("../conn.php");
    $con = new connec();

    $m_name = $_POST["movie_name"];
    $rel_date = $_POST["rel_date"];
    $industry = $_POST["industry"];
    $genre = $_POST["genre"];
    $language = $_POST["language"];
    $director = $_POST["director"];
    $cast = $_POST["cast"];
    $duration = $_POST["duration"];
    $trailer = $_POST["trailer"];
    $review = $_POST["review"];

    $target_dir = "images/movie/";
    $target_file = $target_dir . $_FILES["fileToUpload"]["name"];

    $target_dir_01 = "../images/movie/";
    $target_file_01 = $target_dir_01 . $_FILES["fileToUpload"]["name"];

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_01)) {

        $sql = "Insert into movie values(0,'$m_name','$target_file','$rel_date','$industry','$genre','$language','$director','$cast','$duration','$trailer','$review')";
        $con->insert($sql, "Record Inserted");

        header("Location:viewmovie.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

include("dashboard.php");

?>

<section class="table-section mt-5">
    <h5 class="text-center mt-2">Add Movie</h5>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group details-form">
                        <label>Movie Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Movie Name" name="movie_name" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Movie Image :</label>
                        <input type="file" name="fileToUpload" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Release Date :</label>
                        <input type="date" class="form-control" placeholder="Enter Release Date" name="rel_date" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Industry :</label>
                        <input type="text" class="form-control" placeholder="Enter Industry" name="industry" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Genre :</label>
                        <input type="text" class="form-control" placeholder="Enter Genre" name="genre" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Language :</label>
                        <input type="text" class="form-control" placeholder="Enter Language" name="language" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Director :</label>
                        <input type="text" class="form-control" placeholder="Enter Director" name="director" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Cast :</label>
                        <textarea name="cast" id="" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group details-form">
                        <label>Duration :</label>
                        <input type="text" class="form-control" placeholder="Enter Duration" name="duration" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Trailer :</label>
                        <input type="text" class="form-control" placeholder="Enter Trailer Link" name="trailer" Required>
                    </div>

                    <div class="form-group details-form d-flex">
                        <label class="mt-1">Review :</label>
                        <textarea name="review" id="" cols="30" rows="10" placeholder="Enter Review"></textarea>
                    </div>
                    <div class="button-align">
                        <button type="submit" name="btn_insert" class="btn add-btn">Add Movie</button>
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