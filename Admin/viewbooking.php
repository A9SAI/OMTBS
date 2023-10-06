<?php
include("dashboard.php");
$con = new connec();

if (isset($_POST["btn_submit"])) {
    $booking_date = $_POST["booking_date"];

    $sql = "SELECT booking.id as id,customer.fullname as customer_name,movie.name as movie_name,booking_date,no_ticket,total_amount 
            FROM booking JOIN customer ON booking.cust_id = customer.id
            JOIN `show` ON booking.show_id = `show`.id
            JOIN movie ON `show`.movie_id = movie.id WHERE booking_date='$booking_date'";
    $result = $con->select_by_query($sql);
} else {
    $currentDate = date("Y-m-d");
    $sql = "SELECT booking.id as id,customer.fullname as customer_name,movie.name as movie_name,booking_date,no_ticket,total_amount 
            FROM booking JOIN customer ON booking.cust_id = customer.id
            JOIN `show` ON booking.show_id = `show`.id
            JOIN movie ON `show`.movie_id = movie.id WHERE booking_date='$currentDate'";
    $result = $con->select_by_query($sql);
}
?>


<section class="table-section mt-5">

    <form class="form-inline" method="post">
        <div class="form-group">
            <label for="" class="form-label">Booking Date : </label>
            <input type="date" class="form-control" name="booking_date" id="" placeholder="Enter Movie Name" style="width: 250px;">
        </div>
        <button type="submit" name="btn_submit" class="btn mr-2">Search</button>
    </form>

    <table class="table table-sm table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Customer Name</th>
                <th>Movie</th>
                <th>Booking Date</th>
                <th>No of Tickets</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td class="details-link">
                            <a href="bookingdetails.php?id=<?php echo $row["id"] ?>">
                                <?php echo $row["customer_name"] ?>
                            </a>
                        </td>
                        <td><?php echo $row["movie_name"] ?></td>
                        <td><?php echo $row["booking_date"] ?></td>
                        <td><?php echo $row["no_ticket"] ?></td>
                        <td><?php echo $row["total_amount"] ?></td>
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