<?php
include('condb.php');
$ID = $_SESSION['user_id'];
$sql = "SELECT * FROM tbl_login WHERE user_id = $ID";
$result = mysqli_query($con, $sql) or die("Error in query: $sql" . mysqli_error());
$row = mysqli_fetch_array($result);
// echo $sql;
// exit();
?>
    <form action="student_profile_db.php" method="post" accept-charset="utf-8">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="u_lastname"></label>
                    <input type="text" class="form-control" value="<?php echo $row['username']; ?>" name="username">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password"></label>
                    <input type="text" class="form-control" value="<?php echo $row['password']; ?>" name="password">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="u_name"></label>
                    <input type="text" class="form-control" value="<?php echo $row['u_name']; ?>" name="u_name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="u_lastname"></label>
                    <input type="text" class="form-control" value="<?php echo $row['u_lastname']; ?>" name="u_lastname">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="u_tel"></label>
                    <input type="text" class="form-control" value="<?php echo $row['u_tel']; ?>" name="u_tel">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="u_email"></label>
                    <input type="text" class="form-control" value="<?php echo $row['u_email']; ?>" name="u_email">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="user_id"></label>
                    <input type="text" class="form-control" value="<?php echo $row['user_id']; ?>" name="user_id">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" method="post" class="btn btn-success" onclick="return confirm('ยืนยันการไขข้อมูล !!');">แก้ไขข้อมูล</button>
        </div>
    </form>