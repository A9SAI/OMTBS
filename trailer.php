<?php
session_start();

if(empty($_SESSION["username"]))
{
    header("Location:index.php");
}
else
{
    include("header.php");
    $id=$_GET["id"];

    $con = new connec();
    $tbl="movie";
    $result=$con->select($tbl,$id);

    $result1=$con->select_cinema($id);
}

?>


<section class="mt-md-5 mt-2">
   <div class="container">
       <div class="row">
            
       <?php
            if($result->num_rows>0)
            {
                while($row=$result->fetch_assoc())
                {               
                    $movie_name=$row["name"];
                    $release_date=$row["rel_date"];
                    $trailer=$row["trailer"];
                    $detail=$row["detail"];
                    $industry=$row["industry_name"];
                    $language=$row["lang_name"];
                    $genre=$row["genre_name"];
                    $movie_banner=$row["movie_banner"];
                    $director=$row["director"];
                    $cast=$row["cast"];

                    $date = strtotime($release_date);
                    $formatDate = date('d D M', $date);
                }
            }
           ?>
           <div class="col-lg-8 mb-4"> 
                <div class="row">
                    <div class="col-sm-6 image-container">
                        <img src="<?php echo $movie_banner;?>" style="width:100%;height:350px;" class="img-thumbnail"/> 
                        <a class="view-trailer-button" href="<?php echo $trailer;?>" target="_blank">
                            <i class="fa-solid fa-circle-play fa-lg mr-2"></i>View Trailer
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="my-3 title-text"><?php echo $movie_name;?></h4>
                        <p class="small">Release Date - <?php echo $formatDate;?></p>
                        <p class="small">Industry - <?php echo $industry; ?></p>
                        <p class="small">Language - <?php echo $language; ?></p>
                        <p class="small">Genre - <?php echo $genre;?></p>
                        <p class="small">Director - <?php echo $director;?></p>
                        <p class="small">Cast - <?php echo $cast;?></p>
                    </div>
                    <div class="col-md-12 mt-3">
                         <p style="text-align:justify;"><?php echo $detail;?></p>
                    </div>   
                </div> 
           </div>
           <div class="col-lg-4">
                <?php              
                if($result1->num_rows>0)
                {?>
                    <h4 class="text-center mb-3 title-text">Cinema List</h4>
                    <hr>
                    <?php while($row=$result1->fetch_assoc())
                    { 
                ?>
                    <div class="cinema-card d-flex align-items-center mb-3 bg-white">                   
                        <div class="mr-md-4 mr-3">                           
                            <img src="<?php echo $row["cinema_photo"];?>" alt="" style="width: 80px;height:80px;border-radius:5px;" class="img-fluid">                       
                        </div> 
                        <div>
                            <p class="small text-muted"><?php echo $row["city"];?></p>
                            <p class="custom-card-title mb-2"><?php echo $row["cinema_name"];?></p>
                            <a href="booking_ticket.php?id=<?php echo $id ?>&c_id=<?php echo $row["cinema_id"]?>&c_name=<?php echo $row["cinema_name"]?>" class="btn">Book Ticket</a>
                        </div>                                 
                    </div>
                <?php
                    }
                }else{?>
                    <div class="alert alert-danger" role="alert">
                        Booking isn't Available!
                    </div>
                <?php }?>                              
            </div>               
       </div>
   </div>
   
</section>


<?php
include("footer.php");
?>