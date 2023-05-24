<?php
include('condb.php');

// ตรวจสอบว่ามีการส่งค่า fileToDelete ผ่าน POST หรือไม่
if (isset($_POST['fileToDelete'])) {
    $id = $_POST['fileToDelete'];

    // ลบไฟล์จากฐานข้อมูล
    $sql = "DELETE FROM file_data WHERE id_file = $id";
    $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

    // ตรวจสอบผลลัพธ์
    if ($result) {
        echo '<script>';
        echo "window.location='admin_addfile.php?do=success';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "window.location='admin_addfile.php?do=f';";
        echo '</script>';
    }
}

mysqli_close($con);
?>