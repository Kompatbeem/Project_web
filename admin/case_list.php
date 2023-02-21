<?php 
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
  $query_case = "SELECT c.*,u.u_name,u.u_lastname,s.status_name,u.u_tel,u.u_email,s.status_id
                FROM tbl_case as c
                INNER JOIN tbl_login as u ON c.user_id = u.user_id
                INNER JOIN tbl_status as s ON c.status_id = s.status_id
				order by case_id asc" or die ("Error:" . mysqli_error());
  $result = mysqli_query($con, $query_case);
//   echo $query_case;
//   exit();
  ?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">รหัสครุภัณฑ์</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ชื่อครุภัณฑ์</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ประเภท</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จำนวน</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">หน่วย</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ราคา</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th>
        <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วัน-เวลา</th> -->
        
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result as $row) { $i += 1   ?> 
      <tr>
        <td>
         <?php echo $row['case_id']; ?>
        </td>
         <td>
         <?php echo $row['case_name']; ?>
        </td>
         <td>
         <?php echo $row['u_name'].' '.$row['u_lastname'] ?>
        </td>
         <td>
         <?php echo $row['detail_case']; ?>
        </td>
         <td>
         <?php echo $row['place_case']; ?>
        </td>
         <td>
         <?php echo date("d-m-Y , H:i:s", strtotime( $row['date_case'])); ?>
        </td>
         <td>
          <?php if ($row['status_id'] == 1) {?>
            <a href="index.php?act=add&case_id=<?php echo $row['case_id']; ?>" class="btn btn-danger btn-sm">เลือกช่าง</a>
          <?php } elseif($row['status_id'] == 2) {?>
            <a  class="btn btn-danger btn-sm">มอบแล้ว</a>
          <?php } ?>
       
        </td>
         <?php } ?>  
      </tr>
    </tbody>
  </table>