<?php 
include("condb.php");
$id = $_POST['get_id'];
$sql = "UPDATE  user_file SET
	file_status = 'สำเร็จ'
    WHERE id = '$id' ";

$result = mysqli_query($con, $sql);
if($result){
    Header("location: report.php");
}
?>