<?php
include("dashboard.php");

$con = new connec();

if(isset($_POST["btn_submit"]))
{
    $contact_date=$_POST["contact_date"];  

    $sql = "SELECT * FROM contact WHERE msg_date='$contact_date'";
    $result = $con->select_by_query($sql);
}else{
    
    $sql = "SELECT * from contact";
    $result = $con->select_by_query($sql);
}
?>


<section class="table-section mt-5">

    <form class="form-inline" method="post">
        <div class="form-group">
            <label for="" class="form-label">Date : </label>
            <input type="date" class="form-control" name="contact_date" style="width: 250px;">
        </div>
        <button type="submit" name="btn_submit" class="btn mr-2">Search</button>
    </form>

    <table class="table table-sm table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Massage</th>
                <th>Massage Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["num"] ?></td>
                        <td><?php echo $row["msg"] ?></td>
                        <td><?php echo $row["msg_date"] ?></td>

                        <td>
                            <a href="deletecontact.php?id=<?php echo $row["id"] ?>" class="btn btn-delete">
                                <i class="fa-solid fa-trash mr-2"></i>Delete
                            </a>
                        </td>
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