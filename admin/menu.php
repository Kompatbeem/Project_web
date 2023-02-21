<?php
session_start();
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text  text-white">ระบบตรวจนับ RMUTT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $_SESSION['u_name']." ", $_SESSION['username_lastname']; ?> <br>
          สถานะ <label class="h4 ml-1"><?php echo $_SESSION['user_level']; ?></label></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-header">ระบบ</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fas fa-th-list"></i>
              <p>รายการวัสดุและครุภัณฑ์</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="worker.php" class="nav-link <?php if($menu=="worker"){echo "active";} ?> ">
            <i class="nav-icon fas fa-edit"></i>
              <p>จัดการข้อมูลคณะกรรมการตรวจนับ</p>
            </a>
          </li>     
          <li class="nav-item">
            <a href="student.php" class="nav-link <?php if($menu=="student"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดการข้อมูลเจ้าหน้าที่ดูแลคลัง</p>
            </a>
          </li>         
          <li class="nav-item">
            <a class="nav-link <?php if($menu=="student") ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดการข้อมูลผู้จัดการหอพัก</p>
            </a>
          </li>    
          <li class="nav-item">
            <a href="admin_profile.php" class="nav-link <?php if($menu=="admin_profile"){echo "active";} ?> ">
            <i class="nav-icon fa fa-address-book"></i>
              <p>จัดการข้อมูลส่วนตัว</p>
            </a>
          </li>     
          <li class="nav-header">ออกจากระบบ</li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link "  onclick="return confirm('ยืนยันออกจากระบบ !!');">
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