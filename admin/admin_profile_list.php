<?php
include('condb.php');
$ID = $_SESSION['user_id'];
$sql = "SELECT * FROM tbl_login WHERE user_id = $ID";
$result = mysqli_query($con, $sql) or die("Error in query: $sql" . mysqli_error());
$row = mysqli_fetch_array($result);
// echo $sql;
// exit();


?>
<div class="col-12 container">
    <form action="admin_profile_db.php" method="post" accept-charset="utf-8">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="user_id">ไอดีผู้ใช้</label>
                    <input type="้hidden" class="form-control" value="<?php echo $row['user_id']; ?>" name="user_id">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="u_lastname">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" value="<?php echo $row['username']; ?>" name="username">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password">รหัสผ่าน</label>
                    <input type="text" class="form-control" value="<?php echo $row['password']; ?>" name="password">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="u_name">ชื่อ</label>
                    <input type="text" class="form-control" value="<?php echo $row['u_name']; ?>" name="u_name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="u_lastname">นามสกุล</label>
                    <input type="text" class="form-control" value="<?php echo $row['u_lastname']; ?>" name="u_lastname">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="u_tel">เบอร์มือถือ</label>
                    <input type="text" class="form-control" value="<?php echo $row['u_tel']; ?>" name="u_tel">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="u_email">อีเมล</label>
                    <input type="text" class="form-control" value="<?php echo $row['u_email']; ?>" name="u_email">
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" method="post" class="btn btn-success"
                onclick="return confirm('ยืนยันการไขข้อมูล !!');">แก้ไขข้อมูล</button>
        </div>
    </form>
</div>