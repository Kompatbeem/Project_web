<?php
echo '<meta charset="utf-8">';
include('condb.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

if (!empty($_POST["user_id"]) && !empty($_POST["id_file"])) {


    $user_id = mysqli_real_escape_string($con, $_POST["user_id"]);
    $id_file = mysqli_real_escape_string($con, $_POST["id_file"]);



    $sql = "INSERT INTO tbl_login (user_id, id_file)
VALUES ('$user_id', '$id_file')";


    $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
    mysqli_close($con);

    if ($result) {
        echo '<script>';
        echo "window.location='admin_file.php?do=success';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "window.location='admin_file.php?do=f';";
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
        <meta http-equiv="refresh" content="1;url=admin_addfile.php" />
    </body>

    </html>
    <?php
}