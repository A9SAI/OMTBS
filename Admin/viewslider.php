<?php

include("dashboard.php");

$con = new connec();
$tbl = "slider";
$result = $con->select_all($tbl);
?>

<section class="table-section mt-5">

   <?php include("addslider.php"); ?>

    <table class="table table-sm table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Image</th>
                <th>Alt. Text</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><img src="../<?php echo $row["img_path"] ?>" style="height:100px;width:100px;"></td>
                        <td><?php echo $row["alt"] ?></td>
                        <td>
                            <a href="deleteslider.php?id=<?php echo $row["id"] ?>&path=../<?php echo $row["img_path"] ?>" class="btn btn-delete">
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