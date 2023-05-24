<?php
echo '<meta charset="utf-8">';
include('condb.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["user_level"]) && !empty($_POST["u_name"]) && !empty($_POST["u_lastname"]) && !empty($_POST["u_date"])) {

    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $user_level = mysqli_real_escape_string($con, $_POST["user_level"]);
    $u_name = mysqli_real_escape_string($con, $_POST["u_name"]);
    $u_lastname = mysqli_real_escape_string($con, $_POST["u_lastname"]);
    $u_date = mysqli_real_escape_string($con, $_POST["u_date"]);


    $sql = "INSERT INTO tbl_login (username, password, u_name, u_lastname, user_level, u_date)
VALUES ('$username', '$password', '$u_name', '$u_lastname', '$user_level','$u_date')";


    $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
    mysqli_close($con);

    if ($result) {
        echo '<script>';
        echo "window.location='count_DI.php?do=success';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "window.location='count_DI.php?do=f';";
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
            swal("", "กรุณากรอกข้อมูลให้ครบ !!", "error")
        </script>
        <meta http-equiv="refresh" content="1;url=count_MI.php" />
    </body>

    </html>
    <?php
}