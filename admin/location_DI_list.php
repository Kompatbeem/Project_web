<?php
include('condb.php'); // เชื่อมต่อฐานข้อมูล
$ID = $_SESSION['DI_ID'];

$sql = "SELECT * FROM di_data WHERE DI_ID = $ID";
$result = mysqli_query($con, $sql) or die("Error in query: $sql" . mysqli_error());
$row = mysqli_fetch_array($result);


// echo $sql;
// exit();


?>
<div class="col-12 container">
    <form action="location_db.php" method="post" accept-charset="utf-8">
        <div class="container">
            <div class="form-group col-sm-6">
                <h4>เปลี่ยนสถานที่ครุภัณฑ์</h4>
                <br>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="DI_ID">รหัสครุภัณฑ์</label>
                    <input type="้hidden" class="form-control" value="<?php echo $row['DI_ID']; ?>" name="DI_ID">
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="DI_NAME">ชื่อครุภัณฑ์</label>
                        <input type="text" class="form-control" value="<?php echo $row['DI_NAME']; ?>" name="DI_NAME">
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="DI_LOCATION">สถานที่ปัจจุบัน</label>
                    <input type="text" class="form-control" value="<?php echo $row['DI_LOCATION']; ?>"
                        name="DI_LOCATION">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="DI_NLOCATION">สถานที่ใหม่</label>
                    <input type="text" class="form-control" value="<?php echo $row['DI_NLOCATION']; ?>"
                        name="DI_NLOCATION">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label> ณ วันที่</label>
                    <input type="date" class="form-control" value="<?php echo date('YYYY-MM-DD'); ?>" name="DI_DATE">
                </div>
            </div>
            <div text-align="left">
                <button type="submit" method="post" class="btn btn-success"
                    onclick="return confirm('ยืนยันการไขข้อมูล !!');">บันทึก</button>
            </div>
    </form>
</div>