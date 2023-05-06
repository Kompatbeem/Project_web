<?php
echo '<meta charset="utf-8">';
include('condb.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

$DI_NAME = mysqli_real_escape_string($con, $_POST["DI_NAME"]);
$DI_ID = mysqli_real_escape_string($con, $_POST["DI_ID"]);
$DI_LOCATION = mysqli_real_escape_string($con, $_POST["DI_LOCATION"]);
$DI_NLOCATION = mysqli_real_escape_string($con, $_POST["DI_NLOCATION"]);
$DI_DATE = mysqli_real_escape_string($con, $_POST["DI_DATE"]);

$sql = "UPDATE di_data SET 
DI_ID ='$DI_ID',
DI_NAME ='$DI_NAME',
DI_LOCATION ='$DI_LOCATION',
DI_NLOCATION ='$DI_NLOCATION',
DI_DATE ='$DI_DATE'
WHERE DI_ID = $DI_ID";


$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
mysqli_close($con);

if ($result) {
    echo '<script>';
    echo "window.location='location_DI.php?do=success';";
    echo '</script>';
} else {
    echo '<script>';
    echo "window.location='location_DI.php?do=f';";
    echo '</script>';
}
