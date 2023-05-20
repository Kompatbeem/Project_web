<!DOCTYPE html>
<html lang="en">
<?php $menu = "bm"; ?>
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

      <?php
      include("condb.php"); // เชื่อมต่อฐานข้อมูล
      
      $result = $con->query("SELECT * FROM di_data");
      // $query_case = "SELECT * FROM di_data"
      //  INNER JOIN tbl_login as u ON c.user_id = u.user_id
      
      // order by case_id asc" or die ("Error:" . mysqli_error());
      // $result = mysqli_query($con, $query_case);
      if (!$result) {
        die('Error: ' . mysqli_error($con));
      }
      //   echo $query_case;
//   exit();
      ?>
      <table id="example1" class="table table-bordered table-striped dataTable">
        <thead>
          <tr role="row" class="info">
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อครุภัณฑ์</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รหัสครุภัณฑ์</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานที่ปัจจุบัน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานที่ใหม่</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานะ</th>
            <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th> -->

          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) {
            $i += 1 ?>
            <tr>
              <td>
                <?php echo $row['DI_NAME']; ?>
              </td>
              <td>
                <?php echo $row['DI_ID']; ?>
              </td>
              <td>
                <?php echo $row['DI_LOCATION']; ?>
              </td>
              <td>
                <?php echo $row['DI_NLOCATION']; ?>
              </td>
              <td>         
                <?php echo $row['DI_DATE']; ?>
              </td>
              <td>
              <div class="container">
              <?php echo $row['DI_STATUS']; ?>  &nbsp;                         
           
  <!-- Trigger the modal with a button -->
  <button type="button" style="width:50px; height:50; font-size:10px;" class="btn btn-danger">delete</button>
  <button type="button" style="width:50px; height:50; font-size:10px;" class="btn btn-warning" data-toggle="modal" data-target="#myModal">edit</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">แก้ไขสถานะ</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="form-group">
                                <label></label>
                                <select class="form-control" name="user_level">
                                    <option>รออนุมัติ</option>
                                    <option>อนุมัติ</option>
                                    <option>ไม่อนุมัติ</option>
                                </select>
                            </div>
                            <div align="right">
                            <button type="submit" style="width:50px; height:50; font-size:10px;" method="post" class="btn btn-success" 
                                onclick="return confirm('ยืนยันการไขข้อมูล !!');">บันทึก</button>
                        </div>

        </div>
      </div>
      
    </div>
  </div>
  
</div>
              </td>

            <?php } ?>
          </tr>
        </tbody>
      </table>

      <!-- Main content -->

    </div><!--content-wrapper  -->
  </div><!--rapper  -->




  <?php include("footer.php"); ?>

  </div>
  <!-- ./wrapper -->
  <?php include("script.php"); ?>
</body>

</html>