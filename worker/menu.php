<?php
session_start();
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Repair system</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $_SESSION['u_name']; ?> สถานะ <?php echo $_SESSION['user_level']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-header">Repair system</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
            <i class="fa fa-calendar-o"></i>
              <p>ดูงานแจ้งซ่อม</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="case_sent.php" class="nav-link <?php if($menu=="case_sent"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>งานซ่อมของฉัน</p>
            </a>
          </li>     
          <li class="nav-item">
            <a href="case_success.php" class="nav-link <?php if($menu=="case_success"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>แจ้งซ่อมสำเร็จ</p>
            </a>
          </li>        
          <li class="nav-item">
            <a href="worker_profile.php" class="nav-link <?php if($menu=="worker_profile"){echo "active";} ?> ">
            <i class="nav-icon fa fa-address-book"></i>
              <p>จัดการข้อมูลส่วนตัว</p>
            </a>
          </li>     
          <li class="nav-header">ออกจากระบบ</li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link"  onclick="return confirm('ยืนยันออกจากระบบ !!');">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="text">ออกจากระบบ</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>