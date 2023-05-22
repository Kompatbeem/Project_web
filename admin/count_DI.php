<!DOCTYPE html>
<html lang="en">
<?php $menu = "count_DI"; ?>
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
      
      $result = $con->query("SELECT * FROM tbl_login");
      $_SESSION['login'] = $result;
      if (!$result) {
        die('Error: ' . mysqli_error($con));
      }

      $result_file = $con->query("SELECT *
FROM file_data
JOIN user_file ON file_data.id_file = user_file.id_file
WHERE user_file.user_id = " . $_SESSION['user_id']);

      if (!$result_file) {
        die('Error: ' . mysqli_error($con));
      }
      //   echo $query_case;
//   exit();
      ?>
      <table id="example1" class="table table-bordered table-striped dataTable">
        <thead>
          <tr role="row" class="info">
<<<<<<< HEAD
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">เลขผู้ใช้</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ไอดี</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รหัสผ่าน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อ-นามสกุล</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">เบอร์มือถือ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">อีเมล</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 40%;">วัน-เวลา</th>
            
=======


            <th tabindex="0" rowspan="1" colspan="1" style="width: 25%;">รายชื่อผู้ตรวจ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">สถานะ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">เบอร์มือถือ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">งานที่มอบหมาย</th>

>>>>>>> 56b18dd2e38c530c92cb8cbf4052381601f314b9
            <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th> -->

          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) {
            if ($row['user_level'] != 'admin') {
              ?>
              <tr>
                <td>
                  <?php echo $row['u_name'] . ' ' . $row['u_lastname']; ?>
                </td>
                <td>
                  <?php echo $row['user_level']; ?>
                </td>
                <td>
                  <?php echo $row['u_tel']; ?>
                </td>
                <td>
                  <?php
                  $user_id = $row['user_id'];
                  $file_query = "SELECT file_data.n_file 
            FROM file_data 
            JOIN user_file ON file_data.id_file = user_file.id_file 
            WHERE user_file.user_id = $user_id";
                  $result_file = $con->query($file_query);
                  if ($result_file) {
                    foreach ($result_file as $file_row) {
                      echo $file_row['n_file'] . '<br>';
                    }
                  }
                  ?>
                </td>
              </tr>
              <?php
            }
          }
          ?>
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