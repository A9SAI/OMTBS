<?php
include_once("../conn.php");
$con = new connec();

$sql = "SELECT * from cinema";
$result = $con->select_by_query($sql);
?>

<form method="post">
    <div class="form-group details-form">
        <label>Show Date :</label>
        <input type="date" class="form-control" placeholder="Enter Show Date" name="show_date" required>
    </div>
    <div class="form-group details-form">
        <label>Show Time :</label>
        <input type="text" class="form-control" placeholder="Enter Show Time (1:00 PM)" name="show_time" required>
    </div>
    <div class="form-group details-form">
        <label>Cinema :</label>
        <select name="cinema" id="cinemaId" class="form-control">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
            <?php
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group details-form">
        <label>Ticket Price :</label>
        <input type="text" class="form-control" placeholder="Enter Ticket Price" name="ticet_price" required>
    </div>
    <div class="button-align">
        <button type="submit" name="btn_add_show" class="btn add-btn">Add Movie Show</button>
    </div>
</form>