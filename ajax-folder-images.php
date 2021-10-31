<?php

const PATH = 'uploads/';
$folder = $_POST['folder'];
$folder_images = array_filter(glob("$folder/*"), 'is_file');
foreach ($folder_images as $image): ?>
    <div class="image">
        <img class="nested" src="<?= $image ?>" alt="">
        <form action="move-image.php" method="post">
            <input type="hidden" value="<?= $image ?>" name="file_path">
            <select name="destination_file_path" id="">
                <option value="">Choose folder</option>
                <?php
                $dirs = array_filter(glob(PATH . '*'), 'is_dir');
                foreach ($dirs as $folder):?>
                    <option value="<?= "$folder" . "/" . basename($image) ?>"><?= basename($folder) ?></option>
                <?php endforeach; ?>
            </select>
            <button name="move">Move</button>
        </form>
        <form action="delete.php" method="post">
            <input type="hidden" value="<?= $image ?>" name="delete_file">
            <button class="delete-button" name="delete">Delete</button>
        </form>
    </div>
<?php endforeach; ?>
