<?php
include('condb.php');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file is a valid XLSX file
if ($fileType != "xlsx") {
    $uploadOk = 0;
}

// Move the uploaded file to the target directory
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $uploadedFileName = $_FILES["fileToUpload"]["name"];
        $sql = "INSERT INTO file_data (n_file)
        VALUES ('$uploadedFileName')";
        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

        echo '<script>';
        echo "window.location='admin_addfile.php?do=success';";
        echo '</script>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>