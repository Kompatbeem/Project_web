<?php
session_start();
// print_r($_POST);
// echo"<pre>";
// exit();

if (isset($_POST['username'])) {
      //connection
      include("condb.php");
      //รับค่า 
      $username = mysqli_real_escape_string($con, $_POST['username']); //รับค่าจากตารางข้อมูล tbl_login
      $password = mysqli_real_escape_string($con, $_POST['password']); //รับค่าจากตารางข้อมูล tbl_login

      $sql_login = " SELECT * FROM tbl_login 
      WHERE username = '" . $username . "' AND password = '" . $password . "'
      ";
      $result = mysqli_query($con, $sql_login);
      // echo $sql_login;
      // exit();
      if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_level"] = $row["user_level"];
            $_SESSION["u_name"] = $row["u_name"];
            $_SESSION["u_lastname"] = $row["u_lastname"];

            if ($row["user_level"] == "admin") {
                  Header("location: admin");
            } elseif ($row["user_level"] == "officer") {
                  Header("location: officer");
            } elseif ($row["user_level"] == "bm") {
                  Header("location: bm");
            } elseif ($row["user_level"] == "bd") {
                  Header("location: bd");
            } elseif ($row["user_level"] == "by") {
                  Header("location: by");
            }
      } else {

            ?>
            <!DOCTYPE html>
            <html>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

            <body>
                  <script type="text/javascript">
                        swal("", "ชื่อผู้ใช้หรือรหัสไม่ถูกต้อง !!!", "error")
                  </script>
                  <meta http-equiv="refresh" content="1;url=index.php" />
            </body>

            </html>
            <?php


      }
}
?>