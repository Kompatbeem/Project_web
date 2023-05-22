<!DOCTYPE html>
<html lang="en">
<?php $menu = "location_DI"; ?>
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
      $ID=$_GET["id"];
      $sql = "SELECT * FROM di_data WHERE DI_ID = $ID";
      $result = mysqli_query($con, $sql) or die("Error in query: $sql" . mysqli_error());
      $row = mysqli_fetch_array($result);
      $getDI_CODE = $con->query("SELECT * FROM DI_CODE");
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
       <div class="col-12 container">
        
            <tr>
              <td>
              <form action="location_add.php?id=<?php echo $row['DI_ID']; ?>" method="post" accept-charset="utf-8">
                    <div class="container">
                        <div class="form-group col-sm-6">
                            <h4>เปลี่ยนสถานที่ครุภัณฑ์</h4>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="DI_CODE">รหัสครุภัณฑ์</label>
                                <input type="text" class="form-control" value="<?php echo $row['DI_CODE']; ?>" name="DI_CODE">
                            </div>
                        <div class="col-sm-6">
                            <div class="form-group"> 
                                <label for="DI_NAME">ชื่อครุภัณฑ์</label>
                                <input type="text" class="form-control" value="<?php echo $row['DI_NAME']; ?>" name="DI_NAME">
                            </div>
                        </div>
                       
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="DI_LOCATION">สถานที่ปัจจุบัน</label>
                                <input type="text" class="form-control" value="<?php echo $row['DI_LOCATION']; ?>" name="DI_LOCATION">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="DI_NLOCATION">สถานที่ใหม่</label>
                                <input type="text" class="form-control" value="<?php echo $row['DI_NLOCATION']; ?>" name="DI_NLOCATION">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> ณ วันที่</label>
                                <input type="date" class="form-control" value="<?php echo date('YYYY-MM-DD'); ?>" name="DI_DATE">                                   
                            </div>
                        </div>
                       
        <div text-align="left">
        <button type="submit" method="post" class="btn btn-success"
                onclick="return confirm('ยืนยันการไขข้อมูล !!');">บันทึกข้อมูล</button>
        </div>
    </form>
              </td>
            </tr>
         

          </div>

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