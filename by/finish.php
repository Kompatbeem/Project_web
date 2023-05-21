<!DOCTYPE html>
<html lang="en">
<?php $menu = "finish"; ?>
<?php include("head.php"); ?>

<?php
include("condb.php");

$result = $con->query("SELECT * FROM tbl_login");
$_SESSION['login'] = $result;

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$result_file = $con->query("SELECT *
FROM file_data
JOIN user_file ON file_data.id_file = user_file.id_file
WHERE user_file.user_id = ".$_SESSION['user_id']." AND user_file.file_status = 'สำเร็จ' ");

if (!$result_file) {
    die('Error: ' . mysqli_error($con));
}

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



            <table id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row" class="info">
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ไฟล์</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">สถานะ</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 0;
                    foreach ($result_file as $file_row) {
                        $i++;
                        $row = $result->fetch_assoc();
                        ?>
                        <tr>
                            <td>
                                <?php echo $file_row['n_file']; ?>
                            </td>
                            <td>
                                <?php echo $file_row['file_status']; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div><!--content-wrapper  -->
    </div><!--rapper  -->

    <?php include("footer.php"); ?>

    </div>
    <!-- ./wrapper -->
    <?php include("script.php"); ?>
</body>

</html>