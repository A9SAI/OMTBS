<?php
include("dashboard.php");
$con = new connec();

if (isset($_POST["btn_submit"])) {
    $m_name = $_POST["movie_name"];
    $m_name_lower = strtolower($m_name);

    $sql = "SELECT `show`.id,movie.name as m_name,show_date,show_time,cinema.name as c_name,ticket_price FROM `show`
            JOIN movie ON `show`.movie_id = movie.id
            JOIN cinema ON `show`.cinema_id = cinema.id WHERE LOWER(movie.name) LIKE '%$m_name_lower%'";
    $result = $con->select_by_query($sql);
} else {

    $sql = "SELECT `show`.id,movie.name as m_name,show_date,show_time,cinema.name as c_name,ticket_price FROM `show`
            JOIN movie ON `show`.movie_id = movie.id
            JOIN cinema ON `show`.cinema_id = cinema.id";
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
    </form>

    <table class="table table-sm table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Movie Name</th>
                <th>Show Date</th>
                <th>Show Time</th>
                <th>Cinema</th>
                <th>Ticket Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row["m_name"] ?></td>
                        <td><?php echo $row["show_date"] ?></td>
                        <td><?php echo $row["show_time"] ?></td>
                        <td><?php echo $row["c_name"] ?></td>
                        <td><?php echo $row["ticket_price"] ?></td>
                        <td>
                            <a href="deleteshow.php?id=<?php echo $row["id"] ?>" class="btn btn-delete">
                                <i class="fa-solid fa-trash mr-2"></i>Delete
                            </a>
                        </td>
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