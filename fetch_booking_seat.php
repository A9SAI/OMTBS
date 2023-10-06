<?php
session_start();
include("conn.php");
$con = new connec();

if (isset($_GET['show_id'])) {
    $show_id = $_GET['show_id'];
    $booking_date = $_GET['booking_date'];

    $result = $con->select_booking($show_id, $booking_date);

    $seat_numberArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $seat_number = $row['seat_number'];
        $array = explode(',',$seat_number);
        $seat_numberArray = array_merge($seat_numberArray,$array);
    }

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($seat_numberArray);
}
