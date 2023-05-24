<!DOCTYPE html>
<html lang="en">
<?php $menu = "finish"; ?>
<?php include("head.php"); ?>

<?php
include("condb.php");

$result = $con->query("SELECT tbl_login.u_name ,tbl_login.u_lastname, tbl_login.user_level, file_data.n_file, user_file.file_status
      FROM tbl_login
      JOIN user_file ON tbl_login.user_id = user_file.user_id
      JOIN file_data ON file_data.id_file = user_file.id_file
      WHERE user_file.file_status = 'สำเร็จ' ");

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
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ผู้จัดทำ</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ตำแหน่ง</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ไฟล์</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">สถานะ</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    foreach ($result as $row) {
                        $i++;

                        ?>
                        <tr>
                            <td>
                                <?php echo $row['u_name'] . " " . $row['u_lastname']; ?>
                            </td>
                            <td>
                                <?php $user_level = $row['user_level'];
                                if ($user_level === 'by') {
                                    echo 'ตรวจนับครุภัณฑ์ประจำปี';
                                } elseif ($user_level === 'bd') {
                                    echo 'ตรวจรับครุภัณฑ์';
                                } elseif ($user_level === 'bm') {
                                    echo 'ตรวจรับวัสดุ';
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $row['n_file']; ?>
                            </td>
                            <td>
                                <?php echo $row['file_status']; ?>
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