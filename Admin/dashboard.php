<?php
session_start();

if (empty($_SESSION["admin_username"])) {
    header("Location:index.php");
} else {
    include("admin_header.php");
?>

    <section>
        <div class="sidebar" style="left: 0px;">
            <div class="sidebar-header">
                <p  class="logo">OMTBS</p>
            </div>
            <div class="sidebar-admin">
                <img src="../images/cinema/admin.jpg" alt="Admin">
                <div>
                    <p>Administrator</p>
                    <span class="small"><i class="fa-solid fa-globe fa-2xs" style="color: #00ff00;"></i> Online</span>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li><a href="viewbooking.php" id="bookingId"><i class="fa-solid fa-ticket fa-sm"></i> Booking</a></li>
                <li><a href="viewmovie.php" id="movieId"><i class="fa-solid fa-film fa-sm"></i> Movies</a></li>
                <li><a href="viewcinema.php" id="cinemaId"><i class="fa-solid fa-video fa-sm"></i> Cinema</a></li>
                <li><a href="viewshow.php" id="showId"><i class="fa-solid fa-clapperboard fa-sm"></i> Show</a></li>                
                <li><a href="viewslider.php" id="slideId"><i class="fa-solid fa-photo-film fa-sm"></i> Image Slide</a></li>
                <li><a href="viewcontact.php" id="contactId"><i class="fa-regular fa-address-book fa-sm"></i> Contact</a></li>
            </ul>
        </div>

        <div class="content" style="margin-left: 250px;">
            <div class="menubar">
                <div onclick="toggleSidebar()" class="toogler">
                    <i class="fa-solid fa-bars fa-lg"></i>
                </div>
                <div class="logout-menu">
                    <a href="../Admin/index.php">Logout</a>
                </div>
            </div>

<?php
}
?>