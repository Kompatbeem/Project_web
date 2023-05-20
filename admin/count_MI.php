<!DOCTYPE html>
<html lang="en">
<?php $menu = "count_MI"; ?>
<?php include("head.php"); ?>
<?php
include('condb.php');
$ID = $_SESSION['user_id'];
$sql = "SELECT * FROM tbl_login WHERE user_id = $ID";
$result = mysqli_query($con, $sql) or die("Error in query: $sql" . mysqli_error());
$row = mysqli_fetch_array($result);
// echo $sql;
// exit();


?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <!-- /.navbar -->
        <?php include("menu.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- sweet aleart -->
            <?php
            if (@$_GET['do'] == 'success') {
                echo '<script type="text/javascript">
              swal("", "ทำรายการสำเร็จ !!", "success");
              </script>';
                // echo '<meta http-equiv="refresh" content="1;url=worker.php" />';
            } else if (@$_GET['do'] == 'finish') {
                echo '<script type="text/javascript">
              swal("", "แก้ไขสำเร็จ !!", "success");
              </script>';
                // echo '<meta http-equiv="refresh" content="1;url=worker.php" />'; 
            } else if (@$_GET['do'] == 'f') {
                echo '<script type="text/javascript">
              swal("", "ผิดพลาด !!", "error");
              </script>';
                // echo '<meta http-equiv="refresh" content="1;url=worker.php" />';
            } ?>

            <br>
            <br>

            <div class="col-12 container">
                <form action="admin_add_profile.php" method="post" accept-charset="utf-8">
                    <div class="container">
                        <div class="form-group col-sm-6">
                            <h4>แต่งตั้งคณะกรรมการตรวจรับ</h4>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="u_lastname">ชื่อผู้ใช้</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="u_name">ชื่อ</label>
                                <input type="text" class="form-control" name="u_name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="u_lastname">นามสกุล</label>
                                <input type="text" class="form-control" name="u_lastname">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ตำแหน่งที่มอบหมาย</label>
                                <select class="form-control" name="user_level">
                                    <option values"bm">คณะกรรมการตรวจรับวัสดุ</option>
                                    <option values"bd">คณะกรรมการตรวจรับครุภัณฑ์</option>
                                    <option values"by">คณะกรรมการตรวจนับครุภัณฑ์ประจำปี</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>แต่งตั้ง ณ วันที่</label>
                                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>"
                                    name="u_date">
                            </div>
                        </div>
                        <div>
                            <button type="submit" method="post" class="btn btn-success"
                                onclick="return confirm('ยืนยันการไขข้อมูล !!');">บันทึก</button>
                        </div>



                    </div>
                </form>
            </div>
            <!-- Main content -->

        </div><!--content-wrapper  -->
    </div><!--rapper  -->




    <?php include("footer.php"); ?>

    </div>
    <!-- ./wrapper -->
    <?php include("script.php"); ?>
</body>

</html>