<?php

if (isset($_POST['move'])) {
    $file_path = $_POST['file_path'];
    $destination_file_path = $_POST['destination_file_path'];
    if (empty($file_path) || empty($destination_file_path)) {
        echo "file_path or destination_file_path are empty";
    } else {
        rename($file_path, $destination_file_path);
        header("Location: index.php");
    }
}