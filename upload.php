<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $file_type = $_FILES['file']['type'];

    $file_ext = explode('.', $file_name); //  [ [0]=> string(15) "Screenshot (67)" [1]=> string(3) "png" ]
    $file_actual_ext = strtolower(end($file_ext)); // png

    $allowed = array('jpg', 'jpeg', 'png');
//    var_dump($file);

    if (in_array($file_actual_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size < 1000000) {
                $new_file_name = uniqid('', true) . "." . $file_actual_ext;
                $file_destination = "uploads/$new_file_name";
                move_uploaded_file($file_tmp_name, $file_destination);
                header("Location: index.php");
            } else {
                echo "Your file is too big";
            }
        } else {
           echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}
