<?php
echo '<meta charset="utf-8">';
include('condb.php');
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// exit();


$DI_ID = $_GET["DI_ID"];

$sql = "DELETE FROM di_data WHERE DI_ID=$DI_ID";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " .
 mysqli_error($sql));

mysqli_close($con);

if ($result) {
    echo '<script>';
    echo "window.location='location_DI.php?do=success';";
    echo '</script>';
} else {
    echo '<script>';
    echo "window.location='location_status.php?do=f';";
    echo '</script>';
}

?>