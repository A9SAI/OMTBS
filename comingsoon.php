<section class="my-2">
    <div class="container-fluid">
        <h5 class="mb-2 title-text">Coming Soon >></h5>
        <div class="owl-carousel">
            <?php
            if ($result3->num_rows > 0) {
                while ($row = $result3->fetch_assoc()) {
            ?>
                <div class="custom-card">
                    <a href="trailer.php?id=<?php echo $row["id"] ?>">
                        <img src="<?php echo $row["movie_banner"]; ?>"/>
                        <div class="custom-card-body">
                            <p class="genre text-muted"><?php echo $row["genre_name"]; ?> . <?php echo $row["duration"]; ?></p>
                            <p class="custom-card-title"><?php echo $row["name"]; ?></p>
                        </div>
                    </a>
                </div>
                    
            <?php
                }
            }
            ?>

        </div>
    </div>

</section>