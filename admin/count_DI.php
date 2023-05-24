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
            <th tabindex="0" rowspan="1" colspan="1" style="width: 25%;">รายชื่อผู้ตรวจ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">สถานะคณะกรรมการ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">เบอร์มือถือ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">งานที่มอบหมาย</th>

            <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th> -->

          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) {
            if ($row['user_level'] != 'admin' && $row['user_level'] != 'officer') {
              ?>
              <tr>
                <td>
                  <?php echo $row['u_name'] . ' ' . $row['u_lastname']; ?>
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
                  <?php echo $row['u_tel']; ?>
                </td>
                <td align='center'>
                  <button style="width:100px" class="btn btn-primary" data-toggle="modal"
                    data-target="#myModal<?php echo $row['user_id']; ?>">ดูงาน
                  </button>
                </td>
              </tr>

              <!-- Modal -->
              <div class="modal fade" id="myModal<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">งานที่มอบหมายให้กับ
                        <?php echo $row['u_name'] . ' ' . $row['u_lastname']; ?>
                      </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
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
                    </div>
                  </div>
                </div>
              </div>
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