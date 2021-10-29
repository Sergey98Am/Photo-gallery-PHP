<?php

if (isset($_POST['delete'])) {
    $filename = $_POST['delete_file'];
    if (file_exists($filename)) {
        unlink($filename);
        header("Location: index.php");
    } else {
        echo 'Could not delete '.$filename.', file does not exist';
    }
}