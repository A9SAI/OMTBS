<?php
session_start();
include("conn.php");
 $con = new connec();

if (isset($_GET['value'])) {
  $selectedValue = $_GET['value'];
  
  $result = $con->select_ticketPrice($selectedValue);
 
  $row = mysqli_fetch_assoc($result);
  $valueFromDatabase = $row['ticket_price'];

  echo $valueFromDatabase . ' Ks';
}
