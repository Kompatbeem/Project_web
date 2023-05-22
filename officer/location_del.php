<?php
echo '<meta charset="utf-8">';
include('condb.php');
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// exit();


$ID=$_GET["id"];
$sql = "UPDATE  di_data
SET DI_NLOCATION = ' ',DI_STATUS = ''
WHERE DI_ID = $ID";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
mysqli_close($con);



if ($result) {
    echo '<script>';
    echo "window.location='officer_location_status.php?do=success';";
    echo '</script>';
} else {
    echo '<script>';
    echo "window.location='officer_location_status.php?do=f';";
    echo '</script>';
}

?>