<?php
include("header.php");

$con = new connec();
// $tbl="movie";
// $result=$con->select_movie($tbl,"comingsoon");

?>
<section class=" my-md-5">
    <div class="container about">
        <div class="row">
            <div class="col-md-6">
                <img src="images/slider/about.jpg" alt="aboutpage" style="width:100%;   max-height:400px;border-radius: 10px;">
            </div>
            <div class="col-md-6 mt-3">
                <h3 class=" text-center mb-3 title-text" style="color: #117DAC;">About Our Project</h3>
                <p style="text-align:justify;">An online movie ticket booking system on cloud technology is a digital platform that allows customers to access the services of reserve seats and buy tickets.
                    Additionally, the system can provide customers with information about the movie and its showtime.
                    The system makes it easy to book tickets quickly and securely, allowing customers to save time and money.
                    Movie Ticket Booking System on Cloud Technology represents a significant step forward in modernizing the movie ticket booking process.
                    Its cloud-based architecture ensures scalability, security, and reliability, while the user-friendly interface and
                    personalized recommendations enhance customer satisfaction.
                </p>
                <a class="btn mt-3" style="width:100%;" href="contact.php">Contact Us</a>
            </div>
        </div>
    </div>


</section>
<?php
include("footer.php");
?>