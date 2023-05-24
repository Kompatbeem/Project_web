<?php
include('condb.php');
$value = $_POST['selected_files'];
$user_id = $_POST['get_user_id'];
if (!empty($value)) {
    foreach ($value as $el) {
        $sql = "INSERT INTO user_file (id_file, user_id, file_status)
                VALUES ('$el', '$user_id', 'รอตรวจรับ')";
        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
    }
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
            swal("", "กรุณาเพิ่มไฟล์", "error")
        </script>
        <meta http-equiv="refresh" content="1;url=admin_file.php" />
    </body>

    </html>
    <?php
}
?>