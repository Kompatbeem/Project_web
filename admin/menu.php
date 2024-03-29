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
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      </div>
      <div class="info">
        <a href="index.php" class="d-block">
          <?php echo $_SESSION['u_name'] . " ", $_SESSION['u_lastname']; ?> <br>
          สถานะ <label class="h4 ml-1">
            <?php echo $_SESSION['user_level']; ?>
          </label>
        </a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">ระบบ</li>


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
          <a href="count_MI.php" class="nav-link <?php if ($menu == "count_MI") {
            echo "active";
          } ?> ">
            <i class="nav-icon fas fa-edit"></i>
            <p>แต่งตั้งคณะกรรมการตรวจรับ</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="admin_addfile.php" class="nav-link <?php if ($menu == "admin_addfile") {
            echo "active";
          } ?> ">
            <i class="nav-icon fas fa-edit"></i>
            <p>แนบไฟล์</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="admin_file.php" class="nav-link <?php if ($menu == "admin_file") {
            echo "active";
          } ?> ">
            <i class="nav-icon fas fa-edit"></i>
            <p>ไฟล์ที่แนบ</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="count_DI.php" class="nav-link <?php if ($menu == "count_DI") {
            echo "active";
          } ?> ">
            <i class="nav-icon fas fa-edit"></i>
            <p>รายชื่อคณะกรรมการ</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="location_status.php" class="nav-link <?php if ($menu == "location_status") {
            echo "active";
          } ?> ">
            <i class="nav-icon fas fa-edit"></i>
            <p>สถานะเปลี่ยนสถานที่ครุภัณฑ์</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="admin_profile.php" class="nav-link <?php if ($menu == "admin_profile") {
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