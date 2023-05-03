<?php
session_start();
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-warning elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text  text-white">ระบบตรวจรับ RMUTT</span>
  </a>

  <!-- Sidebar -->
 

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-header"><?php echo $_SESSION['u_name'] ." ", $_SESSION['user_lastname']; ?> <br> สถานะ &nbsp; <?php  echo $_SESSION['user_level']; ?></li>
        <li class="nav-item">
          <a href="index.php" data-toggle="dropdown" class="nav-link  <?php if ($menu == "index") {
            echo "active";
          } ?> ">
            <i class="nav-icon fas fa-th-list"></i>
            <p>รายการวัสดุและครุภัณฑ์</p>
          </a>
          <div class="dropdown-menu">
            <a href="index.php?params=durableArticles" class="dropdown-item">ครุภัณฑ์</a>
            <a href="index.php?params=material" class="dropdown-item ">วัสดุ</a>

          </div>
        </li>
        <li class="nav-item">
          <a href="report.php" class="nav-link <?php if ($menu == "report") {
            echo "active";
          } ?> ">
            <i class="nav-icon fas fa-edit"></i>
            <p>ตรวจสอบรายงาน</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="officer_location_status.php" class="nav-link <?php if ($menu == "officer_location_status") {
            echo "active";
          } ?> ">
            <i class="nav-icon fas fa-edit"></i>
            <p>เปลี่ยนสถานที่ครุภัณฑ์</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="officer_profile.php" class="nav-link <?php if ($menu == "officer_profile") {
            echo "active";
          } ?> ">
            <i class="nav-icon fa fa-address-book"></i>
            <p>จัดการข้อมูลส่วนตัว</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../logout.php" class="nav-link " onclick="return confirm('ยืนยันออกจากระบบ !!');">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p class="text-white">ออกจากระบบ</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>