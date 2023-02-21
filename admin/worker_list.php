<?php
session_start();
include("condb.php"); // เชื่อมต่อฐานข้อมูล
$query_worker = "SELECT * FROM tbl_login WHERE user_level = 'worker'
				order by user_id asc" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query_worker);

include("crop.php");

//   echo $query_worker;
//   exit();
?>
<table id="example1" class="table table-bordered table-striped dataTable">
  <thead>
    <tr role="row" class="info">
      <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">username</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อ-สกุล</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">อีเมล์</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">บอร์โทร</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">สถานะ</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) {   ?>
      <tr>
        <td>
          <?php echo $row['user_id']; ?>
        </td>
        <td>
          <?php echo $row['username']; ?>
        </td>
        <td>
          <?php echo $row['u_name'] . ' ' . $row['u_lastname'] ?>
        </td>
        <td>
          <?php echo $row['u_email']; ?>
        </td>
        <td>
          <?php echo $row['u_tel']; ?>
        </td>
        <td>
          <?php echo $row['user_level']; ?>
        </td>
        <td align='center'>
          <a class="btn btn-warning  btn-sm" href="worker.php?act=edit&user_id=<?php echo $row['user_id']; ?>">
            แก้ไข
          </a>
        </td>
        <td align='center'>
            <a class="btn btn-danger  btn-sm"  href="worker_del.php?user_id=<?= $row['user_id']; ?>"  onclick="return confirm('ยืนยันการลบข้อมูล !!');">
              ลบ
            </a>
          
        </td>
      <?php } ?>
      </tr>
  </tbody>
</table>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="img-container">
          <div class="row">
            <div class="col-md-8">
              <img src="" id="sample_image" />
            </div>
            <div class="col-md-4">
              <div class="preview"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="text" name="user_id" id="user_id">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="crop">Crop</button>
      </div>
    </div>
  </div>
</div>