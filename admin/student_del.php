<?php
echo '<meta charset="utf-8">';
include('condb.php');
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// exit();


$user_id = $_GET["user_id"];

$sql = "DELETE FROM tbl_login WHERE user_id=$user_id";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " .
 mysqli_error($sql));

mysqli_close($con);

if ($result) {
    echo '<script>';
    echo "window.location='student.php?do=success';";
    echo '</script>';
} else {
    echo '<script>';
    echo "window.location='student_list.php?do=f';";
    echo '</script>';
}

?>