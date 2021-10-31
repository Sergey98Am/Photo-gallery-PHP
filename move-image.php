<?php

if (isset($_POST['move'])) {
//    $file = $_FILES['file'];
//    $file_tmp_name = $_FILES['file']['tmp_name'];
//    $file_destination = $_POST['move_image'];
//    move_uploaded_file($file_tmp_name, $file_destination);
//    var_dump($file_tmp_name);
//    header("Location: index.php");
    $file_path = $_POST['file_path'];
    $destination_file_path = $_POST['destination_file_path'];
    if (!rename($file_path, $destination_file_path)) {
        echo "File can't be moved!";
    } else {
        header("Location: index.php");
    }
//    var_dump($_FILES);
}