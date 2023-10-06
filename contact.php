<?php
include("header.php");
//include("conn.php");

if(isset($_POST["btn_submit"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $no=$_POST["number"];
    $messg=$_POST["message"];

    $sql="insert into contact values(0,'$name','$email','$no','$messg',now())";
    $con = new connec();
    $con->insert($sql,"We will contact you soon on your email address.");
}
?>

<section class="mt-3">
    <div class="container about my-md-3" style="color:#117DAC;">
        <div class="col-md-12">
            <center>
                <h1 class="title-text">Contact Us</h1>
                <p>Send us a message below and we'll respond as soon as possible.
                </p>
            </center>
        </div>
        <div class="row" style="color: white;">           
            <div class="col-md-6 contact-card">
                <div class="my-md-5">
                    <h2 style="color: white;" class="title-text">Contact Information</h2>
                    <p>Our team will get back to you with in 24hours.</p>
                </div>
                <div class="my-md-5">
                    <p><i class="fa fa-phone mt-3"></i>&nbsp; +959 966 969 336</p>
                    <p><i class="fa fa-envelope mt-3"></i>&nbsp; saipyaesonethu@gmail.com</p>
                    <p><i class="fa fa-map-marker mt-3"></i>&nbsp; Technological University Of Mawlamyine</p>
                </div>
                <div class="mt-md-5">
                    <h5 style="color: white;" class="mt-4 mb-3">Join Us</h5>
                    <div class="social-media mb-4">
                        <a href="#"><i class="fa-brands fa-facebook fa-xl"></i></a>
                        <a href="#"><i class="fa-brands fa-x-twitter fa-xl"></i></i></a>
                        <a href="#"><i class="fa-brands fa-instagram fa-xl"></i></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-md-5">
                <form method="post">
                    <div class="container" style="color:#117DAC;">

                        <label for="username"><b>Your Name</b></label>
                        <input type="text" style="border-radius:30px" placeholder="Enter Name" name="name" id="username" Required>

                        <label for="email"><b>Email</b></label>
                        <input type="text" style="border-radius:30px" placeholder="Enter Email" name="email" id="email" Required>

                        <label for="number"><b>Phone No</b></label>
                        <input type="text" style="border-radius:30px" placeholder="Enter Phone Number" name="number" id="number" Required>

                        <label for="message"><b>Message</b></label>
                        <textarea name="message" id="message" rows="4" style="resize: none;border-radius:30px;"></textarea>

                        <button type="submit" name="btn_submit" class="btn">Send Message</button>

                </form>
            </div>
        </div>
    </div>
</section>
<?php
include("footer.php");
?>