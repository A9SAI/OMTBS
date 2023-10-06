<?php
if (isset($_GET["id"])) {
    include_once("../conn.php");
    $con = new connec();

    $id = $_GET["id"];
    $sql = "SELECT booking.id as id,customer.fullname as customer_name,movie.name as movie_name,cinema.name as cinema_name,booking_date,show_time,seat_number,no_ticket,ticket_price,total_amount 
            FROM booking JOIN customer ON booking.cust_id = customer.id
            JOIN `show` ON booking.show_id = `show`.id
            JOIN movie ON `show`.movie_id = movie.id
            JOIN cinema ON `show`.cinema_id = cinema.id WHERE booking.id = $id";

    $result = $con->select_by_query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $c_name = $row["customer_name"];
        $m_name = $row["movie_name"];
        $cinema = $row["cinema_name"];
        $show_date = $row["booking_date"];
        $show_time = $row["show_time"];
        $seat_number = $row["seat_number"];
        $no_ticket = $row["no_ticket"];
        $ticket_price = $row["ticket_price"];
        $total_amount = $row["total_amount"];
    }
}

include("dashboard.php");

?>

<section class="table-section mt-5">
    <h5 class="text-center mt-2 mb-4">Booking Details</h5>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form method="post" enctype="multipart/form-data">

                    <div class="form-group details-form">
                        <label>Customer Name :</label>
                        <input type="text" class="form-control" value="<?php echo $c_name ?>" disabled>
                    </div>
                    <div class="form-group details-form">
                        <label>Movie Name :</label>
                        <input type="text" class="form-control" value="<?php echo $m_name ?>" disabled>
                    </div>
                    <div class="form-group details-form">
                        <label>Cinema :</label>
                        <input type="text" class="form-control" value="<?php echo $cinema ?>" disabled>
                    </div>
                    <div class="form-group details-form">
                        <label>Show Date :</label>
                        <input type="text" class="form-control" value="<?php echo $show_date ?>" disabled>
                    </div>
                    <div class="form-group details-form">
                        <label>Show Time :</label>
                        <input type="text" class="form-control" value="<?php echo $show_time ?>" disabled>
                    </div>
                    <div class="form-group details-form">
                        <label>Seat Number :</label>
                        <input type="text" class="form-control" value="<?php echo $seat_number ?>" disabled>
                    </div>
                    <div class="form-group details-form">
                        <label>No of Tickets :</label>
                        <input type="text" class="form-control" value="<?php echo $no_ticket ?>" disabled>
                    </div>
                    <div class="form-group details-form">
                        <label>Ticket Price :</label>
                        <input type="text" class="form-control" value="<?php echo $ticket_price ?>" disabled>
                    </div>
                    <div class="form-group details-form">
                        <label>Total Amount :</label>
                        <input type="text" class="form-control" value="<?php echo $total_amount ?>" disabled>
                    </div>
                    <div class="button-align">
                        <a href="deletebooking.php?id=<?php echo $row["id"] ?>" class="btn btn-delete">
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