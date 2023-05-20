<?php
include("condb.php"); // เชื่อมต่อฐานข้อมูล

$result = $con->query("SELECT * FROM di_data");
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
<table id="example1" class="table table-bordered table-striped dataTable">
  <thead>
    <tr role="row" class="info">
      <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">รหัสครุภัณฑ์</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ชื่อครุภัณฑ์</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 8%;">ประเภท</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 7%;">จำนวน</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">หน่วยนับ</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ราคา</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th>
      <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เปลี่ยนสถานที่</th>
      <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th> -->

    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) {
      $i += 1 ?>
      <tr>
        <td>
          <?php echo $row['DI_CODE']; ?>
        </td>
        <td>
          <?php echo $row['DI_NAME']; ?>
        </td>
        <td>
          <?php echo $row['DI_TYPE'] . ' ' . $row['u_lastname'] ?>
        </td>
        <td>
          <?php echo $row['DI_QUANTITY']; ?>
        </td>
        <td>
          <?php echo $row['DI_UNIT']; ?>
        </td>
        <td>
          <?php echo $row['DI_PRICE']; ?>
        </td>
        <td>
          <?php echo $row['DI_DATE']; ?>
        </td>
        <td>
          <div align="center" method="post" action="location_DI_list.php">
            <a href="location_DI.php"><button type="button" style="width:50px; height:50; font-size:10px;"
                class="btn btn-warning">แก้ไข </button>
          </div>
        </td>
      <?php } ?>
    </tr>
  </tbody>
</table>