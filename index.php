<?php  
 session_start();
    include("header.php");
    //include("conn.php");

    $con = new connec();
    $tbl="slider";
    $result=$con->select_all($tbl);
    $result1=$con->select_all($tbl);

    // Now Showing
    $sql_1 = "SELECT DISTINCT movie.id,name,movie_banner,genre_name,duration FROM movie
                JOIN `show` ON movie.id = `show`.movie_id;";
    $result2=$con->select_by_query($sql_1);

    // Coming Soon
    $sql_2 = "SELECT movie.id,name,movie_banner,genre_name,duration FROM movie
                LEFT JOIN `show` ON movie.id = `show`.movie_id
                WHERE `show`.movie_id IS NULL;";
    $result3=$con->select_by_query($sql_2);

    if(empty($_SESSION["username"]))
    {
         ?>
            <script>
                $(document).ready(function(){
                $("#modelId1").modal("show");
                });
            </script>
         <?php
    }
?>


<section style="width: 100%;">
    <div id="carouselId" class="carousel slide" data-ride="carousel" style="width: 100%;">
        <?php
        if ($result->num_rows > 0) {
            $i = 0;
            echo '<ol class="carousel-indicators">';
            while ($row = $result->fetch_assoc()) {
                if ($i == 0) {
                    echo '<li data-target="#carouselId" data-slide-to="' . $i . '" class="active"></li>';
                } else {
                    echo '<li data-target="#carouselId" data-slide-to="' . $i . '"></li>';
                }
                $i++;
            }
            echo '</ol>';
        }
        ?>
        <div class="carousel-inner" role="listbox">
            <?php
            if ($result1->num_rows > 0) {
                $j = 0;
                while ($row1 = $result1->fetch_assoc()) {
                    $activeClass = ($j == 0) ? 'active' : ''; // Set active class for the first item
                    ?>
                    <div class="carousel-item <?php echo $activeClass; ?>">
                        <img src="<?php echo $row1["img_path"] ?>" alt="<?php echo $row1["alt"]; ?>"
                             class="d-block w-100">
                    </div>
                    <?php
                    $j++;
                }
            }
            ?>
        </div>
    </div>
</section>


    <!-- <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a> -->
<?php 
    include("nowshowing1.php");
    include("comingsoon.php");
    include("footer.php");
?>

