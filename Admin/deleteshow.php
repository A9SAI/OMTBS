<?php 
if(isset($_GET['id']))
{
    include("../conn.php");
    
    $con=new connec();
    $id=$_GET["id"];
    $table="`show`";
   

    $con->delete($table,$id);
    header("Location:viewshow.php");

}
?>