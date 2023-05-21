<?php
include('condb.php');
$value = $_POST['selected_files'];
$user_id  = $_POST['get_user_id'];
foreach ($value as $el ) {
    $sql = "INSERT INTO user_file (id_file ,user_id , file_status )
        VALUES ('$el' , '$user_id' ,'รอตรวจรับ')";
        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());  
        if($result){
            header('Location: admin_file.php');
        }
}
?>