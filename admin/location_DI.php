<!DOCTYPE html>
<html lang="en">
<?php $menu = "location_DI"; ?>
<?php include("head.php"); ?>
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
                <form action="location_add.php" method="post" accept-charset="utf-8">
                    <div class="container">
                        <div class="form-group col-sm-6">
                            <h4>เปลี่ยนสถานที่ครุภัณฑ์</h4>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="DI_NAME">ชื่อครุภัณฑ์</label>
                                <input type="text" class="form-control" name="DI_NAME">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="DI_ID">รหัสครุภัณฑ์</label>
                                <input type="text" class="form-control" name="DI_ID">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="DI_LOCATION">สถานที่ปัจจุบัน</label>
                                <input type="text" class="form-control" name="DI_LOCATION">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="DI_NLOCATION">สถานที่ใหม่</label>
                                <input type="text" class="form-control" name="DI_NLOCATION">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> ณ วันที่</label>
                                <input type="date" class="form-control" value="<?php echo date('YYYY-MM-DD'); ?>"
                                    name="DI_DATE">
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