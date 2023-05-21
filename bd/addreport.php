<?php
session_start();
echo '<meta charset="utf-8">';
include('condb.php');
$id_file = $_POST['id'];
$text = $_POST['text'];
$select = $_POST['select'];
$upstatus = $_POST['upstatus'];

$sql = "UPDATE user_file SET file_report='$text', file_select='$select' , file_status='$upstatus' WHERE id='$id_file'";



if (mysqli_query($con, $sql)) {
    header('location: progress.php');
    echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . mysqli_error($con);
}

mysqli_close($con);

echo $sql;

?>