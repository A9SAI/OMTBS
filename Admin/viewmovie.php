<?php
include("dashboard.php");
$con = new connec();

if(isset($_POST["btn_submit"]))
{
    $m_name=$_POST["movie_name"];  
    $m_name_lower = strtolower($m_name);

    $sql = "SELECT * FROM movie WHERE LOWER(name) LIKE '%$m_name_lower%'";
    $result = $con->select_by_query($sql);
}else{
    
    $sql = "SELECT * from movie";
    $result = $con->select_by_query($sql);
}

?>


<section class="table-section mt-5">

    <form class="form-inline" method="post">
        <div class="form-group">
            <label for="" class="form-label">Movie Name : </label>
            <input type="text" class="form-control" name="movie_name" id="" placeholder="Enter Movie Name" style="width: 250px;">
        </div>
        <button type="submit" name="btn_submit" class="btn mr-2">Search</button>
        <a href="addmovie.php" class="add-new"><i class="fa-solid fa-plus"></i> Add New </a>
    </form>

    <table class="table table-sm table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>Name</th>
                <th>Industry</th>
                <th>Genre</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td class="details-link">
                            <a href="moviedetails.php?id=<?php echo $row["id"] ?>">
                                <?php echo $row["name"] ?>
                            </a>
                        </td>
                        <td><?php echo $row["industry_name"] ?></td>
                        <td><?php echo $row["genre_name"] ?></td>
                        <td><?php echo $row["duration"] ?></td>
                    </tr>

            <?php
                }
            }
            ?>

        </tbody>
    </table>
</section>

<?php
include("admin_footer.php");
?>