<?php
session_start();

if (empty($_SESSION["username"])) {
    header("Location:index.php");
} else {
    include("header.php");
    $id = $_GET["id"];
    $cid = $_GET["c_id"];
    $cinema_name = $_GET["c_name"];

    $con = new connec();
    $tbl = "movie";

    $result1 = $con->select($tbl, $id);
    $result2 = $con->select_showdate($id, $cid);
    $result3 = $con->select_showtime($id, $cid);
}

if (isset($_POST["btn_booking"])) {
    $con = new connec();

    $cust_name = $_POST["cust_name"];
    $cust_id = $_SESSION["cust_id"];
    $show_id = $_POST["radio_showId"];
    $no_ticket = $_POST["no_ticket"];
    $seat_numbers = $_POST["seat_number_dt"];
    $show_time = $_POST["show_time"];

    $booking_date = $_POST["radio_showdate"];

    $ticket_price = $_POST["ticket_price"];

    if ($no_ticket == null || $no_ticket == NAN) {
        $message = "Please select the seat";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $total_amount = (str_replace(' Ks', '', $ticket_price) * $no_ticket);

        if ($no_ticket <= 10) {
            $sql = "insert into booking values(0,$cust_id,$show_id,$no_ticket,'$seat_numbers','$booking_date',$total_amount)";
            $con->insert($sql, "Your Ticket is Booked");
?>
            <script>
                $(document).ready(function() {
                    $("#alertModal").modal("show");
                });
            </script>

<?php } else {
            $message = "You can book maximum 10 seats at a time";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}

?>

<script src="assests/js/script.js"></script>

<section class="mt-2">
    <div class="container">
        <form method="post">
            <div class="row mt-2">

                <div class="col-md-7">
                    <div class="d-flex mb-3" style="height: 100%;">
                        <div class="mr-3">
                            <?php
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_assoc()) {
                                    $genre = $row["genre_name"];
                                    $genreArray = explode(",", $genre);
                                    $movie_name = $row["name"];
                            ?>
                                    <img src="<?php echo $row["movie_banner"] ?>" alt="" class="img-fluid img-thumbnail booking-image">
                            <?php }
                            }
                            ?>
                        </div>
                        <div class="mr-3">
                            <p class="font-weight-bold"><?php echo $movie_name ?></p>
                            <div>
                                <?php
                                foreach ($genreArray as $genre) { ?>
                                    <span class="badge badge-primary"><?php echo trim($genre); ?></span>
                                <?php }
                                ?>
                            </div>
                            <p class="custom-card-title"><?php echo $cinema_name ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <p class="text-center mb-2">Pick the date you want to book</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <?php
                        // Date Calculation
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                $showDate = strtotime($row["show_date"]);
                                $endDate = strtotime('+6 days', $showDate);
                                $currentDate = strtotime('today');

                                if ($showDate <= $currentDate) {
                                    for ($i = 0; $i < 4; $i++) {
                                        if ($currentDate <= $endDate) {
                                            $formattedDate = date('d D', $currentDate); // Formats as "18 Fri"
                                            list($day, $dayOfWeek) = explode(' ', $formattedDate);
                        ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio_showdate" id="<?php echo $currentDate ?>" value="<?php echo date('Y-m-d', $currentDate) ?>" Required>
                                                <label class="form-check-label" for="<?php echo $currentDate ?>">
                                                    <div class="date-card">
                                                        <p class="day-text"><?php echo $day ?></p>
                                                        <p><?php echo $dayOfWeek ?></p>
                                                    </div>
                                                </label>
                                            </div>
                        <?php $currentDate = strtotime('+1 days', $currentDate);
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="showtime mb-2">
                        <p class="text-center"><i class="fa-solid fa-sort-down"></i></p>
                        <p class="text-center mb-2 mt-2">Please select the showtime</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <?php
                            if ($result3->num_rows > 0) {
                                while ($row = $result3->fetch_assoc()) { ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radio_showId" id="<?php echo $row["show_time"] ?>" value="<?php echo $row["show_id"] ?>" Required>
                                        <label class="form-check-label" for="<?php echo $row["show_time"] ?>">
                                            <div class="showtime-card">
                                                <?php echo $row["show_time"] ?>
                                            </div>
                                        </label>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-7" id="cinema-screen">
                    <div id="seat-map" id="seatCharts">
                        <p class="text-center mb-2">Please select the seat</p>
                        <hr class="my-1">
                        <label for="ticket_priceInput">Ticket Price : </label>
                        <input type="text" name="ticket_price" id="ticket_priceInput" value="" readonly>
                        <input type="text" name="show_time" id="show_time">

                        <label class="text-center mt-1" style="width:100%;background-color:#000000;color:white;padding:2%">
                            SCREEN
                        </label>

                        <div class="seats-container" id="seat_chart" style="margin-left: 0px;">

                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="container" style="color:#117DAC;">
                        <hr>
                        <label for="username"><b>Customer Name</b></label>
                        <input type="text" style="border-radius:30px" name="cust_name" value="<?php echo $_SESSION["username"] ?>" Required readonly>

                        <label for="psw"><b>No. of tickets</b></label>
                        <input type="text" style="border-radius:30px" id="no_ticket" name="no_ticket" Required readonly>

                        <label for="psw-repeat"><b>Seat Details</b></label>
                        <input type="text" style="border-radius:30px" name="seat_number_dt" id="seat_number_dt" Required readonly>

                        <label><b>Total Ticket Price</b></label>
                        <input type="text" style="border-radius:30px" name="total_ticket_price" id="price_details" Required readonly>

                        <button type="submit" name="btn_booking" class="btn">Confirm Booking</button>

                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"><img src="images/slider/movie.png" alt="" style="width: 30px;height: 30px" class="mr-3">Cinema Ticket</h6>
                </div>
    
                <div class="modal-body pl-4 voucher" >
                    <p>Customer - <b><?php echo $cust_name ?></b></p>
                    <p>Movie  - <b><?php echo $movie_name ?></b></p>
                    <p>Cinema - <b><?php echo $cinema_name ?></b></p>
                    <p>Date and Time - <?php echo $booking_date . $show_time ?></p>
                    <p>Seat Number - <?php echo $seat_numbers ?></p>
                    <p>No of Ticket - <?php echo $no_ticket ?></p>
                    <p>Ticket Price - <?php echo $ticket_price ?></p>
                    <p>Total Price - <?php echo $total_amount . ' Ks'?></p>

                    <span class="small" style="color: red;">Please take screenshot voucher and pay price before 30 mins to start the movie.</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>