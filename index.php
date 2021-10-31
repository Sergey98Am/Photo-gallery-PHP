<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="folders">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <form action="upload-image.php" method="post" enctype="multipart/form-data" class="upload-form">
            <input type="file" name="file">
            <button name="upload-image">Upload Image</button>
        </form>
        <form action="upload-folder.php" method="post" enctype="multipart/form-data">
            <input type="text" name="folder_name">
            <button name="upload-folder">Upload Folder</button>
        </form>

        <?php
        const PATH = 'uploads/';
        ?>
        <?php
        $dirs = array_filter(glob(PATH . '*'), 'is_dir');
        foreach ($dirs as $folder):?>
            <div class="folder">
                <button type="button" class="open-folder btn btn-primary" data-folder_name="<?= basename($folder) ?>"
                        data-folder="<?= $folder ?>">
                    <?= basename($folder) ?>
                </button>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
    $images = array_filter(glob(PATH . '*'), 'is_file');
    foreach ($images as $image): ?>
        <div class="image">
            <img class="image-in-upload" src="<?= $image ?>" alt="">
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
</div>

<script src="js/jquery-3.6.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>

<style>
    .image {
        display: inline-block;
        margin: 10px;
    }

    .image-in-upload {
        display: block;
        width: 250px;
        height: 250px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .nested {
        display: block;
        width: 100%;
        height: 100px;
        object-fit: cover;
        margin-bottom: 5px;
    }

    .delete-button {
        background: red;
        border: none;
        padding: 5px;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .upload-form {
        margin-bottom: 10px;
    }

    .modal-body {
        max-height: 410px;
    }
</style>