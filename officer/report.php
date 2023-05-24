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
      
      $result = $con->query("SELECT *
      FROM tbl_login
      JOIN user_file ON tbl_login.user_id = user_file.user_id
      JOIN file_data ON file_data.id_file = user_file.id_file
      WHERE user_file.file_status = 'รออนุมัติ' ");
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
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อไฟล์</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ผู้จัดทำรายงาน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ตำแหน่ง</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ตรวจสอบ</th>
            <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th> -->

          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) {
            ++$i; ?>
            <tr>
              <td>
                <?php echo $i; ?>
              </td>
              <td>
                <?php echo $row['n_file']; ?>
              </td>
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
                <?php echo $row['file_select'];
                ; ?>
              </td>

              <td>
                <div class="container">
                  <!-- Trigger the modal with a button -->
                  <!-- <a href= "officer_profile.php" target="newtab"> -->
                  <button type="button" style="width:100px; height:100; font-size:10px;" class="btn btn-warning"
                    data-toggle="modal" data-target="#myModal<?php echo $i; ?>">ตรวจสอบ</button>
                  <div class="modal fade" id="myModal<?php echo $i; ?>" role="dialog">
                    <form action="updatestatus.php" method="POST">
                      <input type="hidden" name="get_id" value="<?php echo $row['id'] ?>" />
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">
                              <?php echo $row['n_file']; ?>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <labe>
                              <?php echo $row['file_report']; ?>
                            </labe>
                            <p style="text-align:right;">ลงวันที่</p>
                            <p style="text-align:right;">3 มกราคม 2566</p>
                            <div align="right">
                              <button type="submit" style="width:60px; height:60; font-size:10px;" method="post"
                                class="btn btn-success"
                                onclick="return confirm('ยืนยันการตรวจสอบรายงาน !!');">เรียบร้อย</button>
                            </div>
                          </div>
                        </div>

                      </div>
                    </form>
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