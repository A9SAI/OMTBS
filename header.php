<?php
include("conn.php");
$con = new connec();
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "logout") {
        $_SESSION["username"] = null;
        $_SESSION["cust_id"] = null;
    }
}

if (empty($_SESSION["username"])) {
    $_SESSION["ul"] = '<li class="nav-item" id="registerNavItem">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#modelId">Register</a>
                        </li>              
                        <li class="nav-item" id="loginNavItem">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#modelId1">Login</a>
                        </li>';
}

if (isset($_POST["btn_login"])) {
    $email_id = $_POST["log_email"];
    $paswrd_log = $_POST["log_paswrd"];
    $result = $con->select_login("customer", $email_id);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["email"] == $email_id && $row["password"] == $paswrd_log) {
            $_SESSION["username"] = $row["fullname"];
            $_SESSION["cust_id"] = $row["id"];
            $_SESSION["ul"] = '<li class="nav-item d-none d-md-block"><a class="nav-link"> Hello ' . $_SESSION["username"] . '</a></li><li class="nav-item"><a class="nav-link" href="index.php?action=logout">Logout</a></li>';
        } else {
            echo '<script> alert("Invalid Password");</script>';
        }
    } else {
        echo '<script> alert("Invalid Email Id");</script>';
    }
}
if (isset($_POST["btn_reg"])) {
    $name = $_POST["reg_full_name"];
    $email = $_POST["reg_email"];
    $cellno = $_POST["regnumber_txt"];
    $paswrd = $_POST["reg_psw"];
    $cnfrm_paswrd = $_POST["psw_repeat"];
    if ($paswrd == $cnfrm_paswrd) {
        $sql = "insert into customer values(0,'$name','$email','$cellno','$cnfrm_paswrd')";
        $con->insert($sql, "Customer Registered, Now you can login");
    } else {
?>
        <script>
            alert("comfirm password does not match");
        </script>
<?php
        //echo "comfirm password does not match";
    }
}


?>



<!doctype html>
<html lang="en">

<head>
    <title>Online Movie Ticket Booking System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <link rel="icon" href="images/slider/movie.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assests/css/style.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="assests/css/owl.carousel.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
        <a class="navbar-brand" href="index.php"><img src="images/slider/movie.png" style="width:40px;"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item" id="homeNavItem">
                    <a class="nav-link" href="index.php">Movies</a>
                </li>
                <li class="nav-item" id="aboutNavItem">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item" id="contactNavItem">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php echo $_SESSION["ul"]; ?>
            </ul>
        </div>
    </nav>

    <!-- register Modal -->
    <div class="modal fade bd-example-modal-sm" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#117DAC; color:white;">
                    <h6 class="modal-title">User Register</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="container" style="color:#117DAC;">

                            <center>
                                <p>Please fill in the form to create an account.</p>
                            </center>

                            <hr>

                            <label for="username"><b>Full Name</b></label>
                            <input type="text" style="border-radius:30px" placeholder="Enter Your Name" name="reg_full_name" id="username" Required>

                            <label for="email"><b>Email</b></label>
                            <input type="text" style="border-radius:30px" placeholder="Enter Email" name="reg_email" id="email" Required>

                            <label for="number"><b>Phone Number</b></label>
                            <input type="text" style="border-radius:30px" placeholder="Enter number" name="regnumber_txt" id="number_txt" Required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" style="border-radius:30px" placeholder="Enter Password" name="reg_psw" id="password" Required>

                            <label for="psw-repeat"><b>Repeat Password</b></label>
                            <input type="password" style="border-radius:30px" placeholder="Enter repeat password" name="psw_repeat" id="psw-repeat" Required>

                            <button type="submit" class="btn" name="btn_reg">Register</button>
                            <hr>

                            <div>
                                <p>Already have an account? <a href="#" style="color:#117DAC" data-toggle="modal" data-target="#modelId1" data-dismiss="modal"><b>Sign in</b></a>.</p>
                            </div>
                    </form>
                </div>

            </div>
            <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
                </div> -->
        </div>
    </div>
    </div>

    <!-- login Modal -->
    <div class="modal fade bd-example-modal-sm" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#117DAC; color:white;">
                    <h6 class="modal-title">User Login</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="container" style="color:#117DAC;">

                            <label for="email"><b>Email</b></label>
                            <input type="text" style="border-radius:30px" placeholder="Enter Email" name="log_email" id="email" Required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" style="border-radius:30px" placeholder="Enter Password" name="log_paswrd" id="psw" Required>

                            <button type="submit" name="btn_login" class="btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>