<?php 
if(isset($_GET['id']))
{
    include("../conn.php");
    
    $con=new connec();
    $id=$_GET["id"];
    $table="contact";
   

    $con->delete($table,$id);
    header("Location:viewcontact.php");

}
?>