<?php
include("dashboard.php");

$con = new connec();

if(isset($_POST["btn_submit"]))
{
    $city=$_POST["city"];  

    $sql = "SELECT * FROM cinema WHERE city LIKE '%$city%'";
    $result = $con->select_by_query($sql);

}else{
    
    $sql = "SELECT * from cinema";
    $result = $con->select_by_query($sql);
}
?>

<section class="table-section mt-5">

    <form class="form-inline" method="post">
        <div class="form-group">
            <label for="" class="form-label">Cinema Location : </label>
            <input type="text" class="form-control" name="city" id="" placeholder="Enter City" style="width: 250px;">
        </div>
        <button type="submit" name="btn_submit" class="btn mr-2">Search</button>
        <a href="addcinema.php" class="add-new"><i class="fa-solid fa-plus"></i> Add Cinema</a>
    </form>

    <table class="table table-sm table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Cinema Image</th>
                <th>Cinema Name</th>
                <th>Location City</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td>
                            <img src="../<?php echo $row["cinema_photo"] ?>" style="height:100px;width:100px;">
                        </td>
                        <td class="details-link">
                            <a href="cinemadetails.php?id=<?php echo $row["id"] ?>">
                                <?php echo $row["name"] ?>
                            </a>
                        </td>
                        <td><?php echo $row["city"] ?></td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
    </div>
    </div>
    </div>
</section>

<?php
include("admin_footer.php");
?>