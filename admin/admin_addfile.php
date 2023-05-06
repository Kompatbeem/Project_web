<!DOCTYPE html>
<html lang="en">
<?php $menu = "admin_addfile"; ?>
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
                <form action="addmin_file.php" method="post" accept-charset="utf-8">
                    <div class="container">
                        <div class="form-group col-sm-6">
                            <h4>แนบไฟล์</h4>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_id">เลขผู้ใช้</label>
                                <input type="text" class="form-control" name="user_id">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>อัพโหลดไฟล์</label><br>
                                <!-- <form action="/action_page.php"> -->     
                                <input type="file"  name="myfile"><br>
                                 <!-- <input type="submit"> -->
                                <!-- </form> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="id_file">Group</label>
                                <input type="text" class="form-control" name="id_file">
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