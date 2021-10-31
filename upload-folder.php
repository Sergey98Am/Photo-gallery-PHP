<?php

if (isset($_POST['upload-folder'])) {
    if ($_POST['folder_name'] != '') {
        $folder_name = $_POST['folder_name'];

        if (!is_dir($folder_name)) {
            mkdir("uploads/$folder_name");
            header("Location: index.php");
        }
    }
}