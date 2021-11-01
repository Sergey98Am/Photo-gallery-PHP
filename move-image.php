<?php

if (isset($_POST['move'])) {
    $file_path = $_POST['file_path'];
    $destination_file_path = $_POST['destination_file_path'];
    if ($file_path || $destination_file_path) {
        echo "file_path or destination_file_path are empty";
    } else {
        if (!rename($file_path, $destination_file_path)) {
            echo "File can't be moved!";
        } else {
            header("Location: index.php");
        }
    }
}