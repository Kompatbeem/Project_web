<!DOCTYPE html>
<html lang="en">
<?php $menu = "admin_file"; ?>
<?php include("head.php"); ?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

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
      $getNameFile = $con->query("SELECT * FROM file_data");

      if (!$result) {
        die('Error: ' . mysqli_error($con));
      }
      //   echo $query_case;
      //   exit();
      ?>
      <table id="example1" class="table table-bordered table-striped dataTable">
        <thead>
          <tr role="row" class="info">
            <th tabindex="0" rowspan="1" colspan="1" style="width: 13%;">ชื่อ ผู้ตรวจ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานะคณะกรรมการ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">เลือกไฟล์</th>
          </tr>
        </thead>
        <tbody class="test">
          <?php foreach ($result as $row) {
            if ($row['user_level'] != 'admin' && $row['user_level'] != 'officer') { ?>
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
                  <form action="insert_user_file.php" method="POST">
                    <input type="hidden" name="get_user_id" value="<?php echo $row['user_id']; ?>" />
                    <select class="postName form-control js-example-basic-multiple" style="width:400px"
                      name="selected_files[]" multiple>
                      <?php foreach ($getNameFile as $file) { ?>
                        <option value="<?php echo $file['id_file']; ?>"><?php echo $file['n_file']; ?></option>

                      <?php } ?>
                    </select>
                    <button type="submit" style="width:150px; height:60; font-size:15px;"
                      class="btn btn-primary btn-floating mx-1 button_update" onclick="return confirm('มอบหมายงาน');">
                      มอบหมาย
                    </button>
                  </form>
                </td>
              </tr>
            <?php }
          } ?>
        </tbody>
      </table>


      <!-- Main content -->

    </div><!--content-wrapper  -->
  </div><!--rapper  -->




  <?php include("footer.php"); ?>

  </div>
  <!-- ./wrapper -->
  <?php include("script.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
  </script>

  <script type="text/javascript">
    $('.postName').select2({
      multiple: true
    });
  </script>
</body>

</html>