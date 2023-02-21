<!DOCTYPE html>
<html lang="en">
<?php $menu = "student_profile"; ?>
<?php include("head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- /.navbar -->
    <?php include("menu.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
        </div>
      </div>
      <!-- /.content-header -->
      <?php
      if (@$_GET['do'] == 'success') {
        echo '<script type="text/javascript">
              swal("", "ทำรายการสำเร็จ !!", "success");
              </script>';
        echo '<meta http-equiv="refresh" content="1;url=student_profile.php" />';
      } else if (@$_GET['do'] == 'finish') {
        echo '<script type="text/javascript">
              swal("", "แก้ไขสำเร็จ !!", "success");
              </script>';
        echo '<meta http-equiv="refresh" content="1;url=student_profile.php" />';
      } else if (@$_GET['do'] == 'f') {
        echo '<script type="text/javascript">
              swal("", "ผิดพลาด !!", "error");
              </script>';
        echo '<meta http-equiv="refresh" content="1;url=student_profile.php" />';
      } ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card col-md-12">
            <?php include('student_profile_list.php'); ?>
          </div>
        </div>
    </div>
    </section>

  </div>

  <?php include("footer.php"); ?>

  </div>

  <?php include("script.php"); ?>
</body>

</html>