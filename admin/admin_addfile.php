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
            <br>
            <br>

            <div class="col-12 container">
                <form action="uploadfile.php" method="post" enctype="multipart/form-data">
                    <div class="container">
                        <div class="form-group col-sm-6">
                            <h4>อัพโหลดไฟล์ &#128194;</h4>

                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                เลือกไฟล์ที่ต้องการอัพโหลด:
                                <input type="file" name="fileToUpload" id="fileToUpload">

                            </div>
                        </div>


                        <div>
                            <button type="submit" method="post" class="btn btn-success"
                                onclick="if ($('#fileToUpload').val() === '') { alert('กรุณาเลือกไฟล์ก่อนเพิ่มไฟล์'); return false; } else { return confirm('ยืนยันการอัพโหลดไฟล์ !!'); }">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <br>
            <br>

            <div class="col-12 container">
                <form action="admin_deletefile.php" method="post">
                    <div class="container">
                        <div class="form-group col-sm-6">
                            <h4>ลบไฟล์ &#128465;</h4>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                เลือกไฟล์ที่ต้องการลบ:
                                <select name="fileToDelete" id="fileToDelete">
                                    <option value="">เลือกไฟล์</option>
                                    <?php
                                    // เชื่อมต่อฐานข้อมูล
                                    include("condb.php");

                                    // ดึงข้อมูล id และ n_file จากตาราง file_data
                                    $result = $con->query("SELECT id_file, n_file FROM file_data");

                                    // วนลูปแสดงตัวเลือกไฟล์
                                    foreach ($result as $row) {
                                        echo '<option value="' . $row['id_file'] . '">' . $row['n_file'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger"
                                onclick="if ($('#fileToDelete').val() === '') { alert('กรุณาเลือกไฟล์ก่อนทำการลบ'); return false; } else { return confirm('ยืนยันการลบไฟล์ !!'); }">ลบ</button>
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