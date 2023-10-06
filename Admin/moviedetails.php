<?php
if (isset($_POST["btn_insert"])) {
    include_once("../conn.php");
    $con = new connec();

    $id = $_GET["id"];

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

    $oldImage = $_POST["old_image"];

    $target_dir = "images/movie/";
    $target_file = $target_dir . $_FILES["fileToUpload"]["name"];

    $target_dir_01 = "../images/movie/";
    $target_file_01 = $target_dir_01 . $_FILES["fileToUpload"]["name"];

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_01)) {

        $sql = "Update movie set name=\"$m_name\", movie_banner='$target_file', rel_date='$rel_date',industry_name='$industry',
                    genre_name='$genre',lang_name='$language',director='$director',cast=\"$cast\",duration='$duration',
                    trailer='$trailer',detail=\"$review\" Where id=$id;";
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

        header("Location:viewmovie.php");
    } else {
        $sql = "Update movie set name=\"$m_name\", movie_banner='$oldImage', rel_date='$rel_date',industry_name='$industry',
                    genre_name='$genre',lang_name='$language',director='$director',cast=\"$cast\",duration='$duration',
                    trailer='$trailer',detail=\"$review\" Where id=$id;";
        $con->update($sql, "Record Inserted");

        header("Location:viewmovie.php");
    }
}


if (isset($_GET["id"])) {
    include_once("../conn.php");
    $con = new connec();

    $id = $_GET["id"];
    $tbl = "movie";
    $result = $con->select($tbl, $id);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $movie_name = $row["name"];
            $movie_banner = $row["movie_banner"];
            $release_date = $row["rel_date"];
            $industry = $row["industry_name"];
            $language = $row["lang_name"];
            $genre = $row["genre_name"];
            $director = $row["director"];
            $cast = $row["cast"];
            $duration = $row["duration"];
            $trailer = $row["trailer"];
            $detail = $row["detail"];

            $date = strtotime($release_date);
            $formatDate = date('Y-m-d', $date);
        }
    }
}

if (isset($_POST["btn_add_show"])) {
    $id = $_GET["id"];
    $show_date = $_POST["show_date"];
    $show_time = $_POST["show_time"];
    $cinema_id = $_POST["cinema"];
    $ticet_price = $_POST["ticet_price"];

    $sql = "Insert into `show` values(0,$id,'$show_date','$show_time',$cinema_id,$ticet_price)";
    $con->insert($sql, "Record Inserted");
    header("Location:viewmovie.php");
} 


include("dashboard.php");
?>

<section class="table-section mt-5">
    <h5 class="text-center my-2">Movie Details</h5>
    <div class="container">
        <div class="d-flex mb-2">
            <div class="mr-3">
                <img src="../<?php echo $movie_banner ?>" alt="">
            </div>
            <div>
                <p style="font-size:20px;"><b><?php echo $movie_name?></b></p>
                <p>Director : <?php echo $director?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-3">
                <form method="post" enctype="multipart/form-data">
                    <input type="text" name="old_image" value="<?php echo $movie_banner ?>" style="display:none">
                    <div class="form-group details-form">
                        <label>Movie Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Movie Name" name="movie_name" value="<?php echo $movie_name ?>" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Movie Image :</label>
                        <input type="file" name="fileToUpload">
                    </div>
                    <div class="form-group details-form">
                        <label>Release Date :</label>
                        <input type="date" class="form-control" placeholder="Enter Release Date" name="rel_date" value="<?php echo $formatDate ?>" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Industry :</label>
                        <input type="text" class="form-control" placeholder="Enter Industry" name="industry" value="<?php echo $industry ?>" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Genre :</label>
                        <input type="text" class="form-control" placeholder="Enter Genre" name="genre" value="<?php echo $genre ?>" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Language :</label>
                        <input type="text" class="form-control" placeholder="Enter Language" name="language" value="<?php echo $language ?>" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Director :</label>
                        <input type="text" class="form-control" placeholder="Enter Director" name="director" value="<?php echo $director ?>" Required>
                    </div>
                    <div class="form-group details-form d-flex">
                        <label>Cast :</label>
                        <textarea name="cast" id="" cols="30" rows="3"><?php echo $cast ?></textarea>
                    </div>
                    <div class="form-group details-form">
                        <label>Duration :</label>
                        <input type="text" class="form-control" placeholder="Enter Duration" name="duration" value="<?php echo $duration ?>" Required>
                    </div>
                    <div class="form-group details-form">
                        <label>Trailer :</label>
                        <input type="text" class="form-control" placeholder="Enter Trailer Link" name="trailer" value="<?php echo $trailer ?>" Required>
                    </div>

                    <div class="form-group details-form d-flex">
                        <label class="mt-1">Review :</label>
                        <textarea name="review" id="" cols="30" rows="10"><?php echo $detail ?></textarea>
                    </div>
                    <div class="button-align">
                        <button type="submit" name="btn_insert" class="btn btn-edit mr-2"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</button>
                        <a href="deletemovie.php?id=<?php echo $id ?>&path=../<?php echo $movie_banner ?>" class="btn btn-delete">
                            <i class="fa-solid fa-trash mr-2"></i>Delete
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <?php include_once("addshow.php"); ?>
            </div>
        </div>
    </div>
</section>

<?php
include("admin_footer.php");

?>