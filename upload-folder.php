<?php

if (isset($_POST['upload-folder'])) {
    if ($_POST['folder_name'] == '') {
        echo "You didn't write the name of the folder";
    } else {
        $folder_name = $_POST['folder_name'];

        if (!is_dir($folder_name)) {
            mkdir("uploads/$folder_name");
            header("Location: index.php");
        }
    }
}