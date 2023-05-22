<!DOCTYPE html>
<html lang="en">
<?php $menu = "report"; ?>
<?php include("head.php"); ?>

<?php
include("condb.php");

$result = $con->query("SELECT *
FROM file_data
JOIN user_file ON file_data.id_file = user_file.id_file
WHERE user_file.user_id = " . $_SESSION['user_id'] . " AND user_file.file_status = 'รอตรวจรับ' ");


if (!$result) {
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
            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ตรวจรับ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">สถานะ</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $i = 0;
          foreach ($result as $row) {
            $i++;
            ?>
            <tr>
              <td>
                <a href="../admin/uploads/<?php echo $row['n_file']; ?>"><?php echo $row['n_file']; ?></a>
              </td>
              <td>
                <div class="container">
                  <button type="button" style="width:100px; height:50; font-size:10px;"
                    class="btn <?php echo ($row['f_select'] === 'ครบ') ? 'btn-success' : (($row['f_select'] === 'ไม่ครบ') ? 'btn-danger' : 'btn-warning'); ?> check-btn"
                    data-toggle="modal" data-target="#myModal<?php echo $i; ?>">ตรวจรับ</button>
                  <div class="modal fade" id="myModal<?php echo $i; ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">รายงาน</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form action="addreport.php" method="post">
                            <textarea name="text" class="form-control" rows="5" placeholder="ใส่ข้อมูล"></textarea>
                            <br />
                            <div class="container">
                              <div class="row">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <input type="hidden" name="upstatus" value="รออนุมัติ" />
                                <input type="hidden" name="index" value="<?php echo $i; ?>" />
                                <select name="select" class="form-select form-select-sm"
                                  aria-label=".form-select-sm example">
                                  <option selected>เลือกสถานะข้อมูล</option>
                                  <option value="ครบ">ครบ</option>
                                  <option value="ส่งซ่อมหรือจำหน่าย">ส่งซ่อมหรือจำหน่าย</option>
                                </select>
                                <div class="col">
                                  <div class="col" align="right">
                                    <button type="submit" style="width:100px; height:90; font-size:15px;"
                                      class="btn btn-success"
                                      onclick="return confirm('ยืนยันการส่งข้อมูล')">ส่งรายงาน</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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