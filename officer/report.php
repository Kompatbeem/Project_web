<!DOCTYPE html>
<html lang="en">
<?php $menu = "report"; ?>
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
      
      $result = $con->query("SELECT * FROM report_data,tbl_login");
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
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ลำดับที่</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">หัวข้อรายงาน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ผู้จัดทำรายงาน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ตำแหน่ง</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ตรวจสอบ</th>
            <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th> -->

          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) {
            $i += 1 ?>
            <tr>
              <td>
                <?php echo $row['report_id']; ?>
              </td>
              <td>
                <?php echo $row['report_name']; ?>
              </td>
              <td>
                <?php echo $row['u_name']; ?>
              </td>
              <td>
                <?php echo $row['user_level']; ?>
              </td>
              <td>         
                <?php echo $row['report_time']; ?>
              </td>
              <td>
              <div class="container">
              <?php echo $row['DI_STATUS']; ?>  &nbsp;                         
           
  <!-- Trigger the modal with a button -->
  <!-- <a href= "officer_profile.php" target="newtab"> -->
    <button type="button" style="width:100px; height:100; font-size:10px;" class="btn btn-warning" data-toggle="modal" data-target="#myModal">ตรวจสอบ</button>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">รายงาน6</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
       <h3> รายงานการตรวจรับวัสดุสั่งซื้อ ประจำวันที่1 มกราคม 2566 </h3> <br> <P> &nbsp;ข้าพเจ้านายคมภัทร เต็มดวง ตำแหน่งคณะกรรมการตรวจรับวัสดุสั่งซื้อ </p> <p>ได้ตรวจเช็ครายการวัสดุสั่งซื้อครบถ้วนตามใบสั่งซื้อ</p>
       <br><br><br><br> 
       <p style="text-align:right;">ลงวันที่</p>
       <p style="text-align:right;">3 มกราคม 2566</p>
                            <div align="right">
                            <button type="submit" style="width:60px; height:60; font-size:10px;" method="post" class="btn btn-success" 
                                onclick="return confirm('ยืนยันการไขข้อมูล !!');">เรียบร้อย</button>
                        </div>

        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  
  
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