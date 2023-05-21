<?php
echo '<meta charset="utf-8">';
include('condb.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

if (!empty($_POST["DI_NAME"]) && !empty($_POST["DI_CODE"]) && !empty($_POST["DI_LOCATION"])  && !empty($_POST["DI_DATE"])) {

    $DI_NAME = mysqli_real_escape_string($con, $_POST["DI_NAME"]);
    $DI_ID = mysqli_real_escape_string($con, $_POST["DI_CODE"]);
    $DI_LOCATION = mysqli_real_escape_string($con, $_POST["DI_LOCATION"]);
    $DI_NLOCATION = mysqli_real_escape_string($con, $_POST["DI_NLOCATION"]);
    $DI_DATE = mysqli_real_escape_string($con, $_POST["DI_DATE"]);



    $sql = "UPDATE di_data SET 
    DI_NAME ='$DI_NAME',
	DI_CODE ='$DI_CODE',
	DI_LOCATION ='$DI_LOCATION',
	DI_NLOCATION ='$DI_NLOCATION',
	DI_DATE ='$DI_DATE'
    WHERE DI_CODE = $DI_CODE";
//     (DI_NAME, DI_ID, DI_LOCATION, DI_NLOCATION, DI_DATE)
// VALUES ('$DI_NAME', '$DI_ID', '$DI_LOCATION', '$DI_NLOCATION', '$DI_DATE')";


    $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
    mysqli_close($con);

    if ($result) {
        echo '<script>';
        echo "window.location='location_status.php?do=success';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "window.location='location_status.php?do=f';";
        echo '</script>';
    }
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <body>
        <script type="text/javascript">
            swal("", "ผิดพลาด !!", "error")
        </script>
        <meta http-equiv="refresh" content="1;url=location_DI.php" />
    </body>

    </html>
    <?php
}