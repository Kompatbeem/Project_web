<?php
session_start();
echo '<meta charset="utf-8">';
include('condb.php');
$id_file = $_POST['id_file'];
$text = $_POST['text'];
$select = $_POST['select'];
$upstatus = $_POST['upstatus'];

$sql = "UPDATE file_data SET report='$text', f_select='$select' , file_status='$upstatus' WHERE id_file='$id_file'";



if (mysqli_query($con, $sql)) {
    echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . mysqli_error($con);
}

mysqli_close($con);

echo $sql;

?>