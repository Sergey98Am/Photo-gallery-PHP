<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="folders">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <form action="upload-image.php" method="post" enctype="multipart/form-data" class="upload-form">
                    <input type="file" name="file">
                    <button name="upload-image">Upload Image</button>
                </form>
                <form action="upload-folder.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="folder_name">
                    <button name="upload-folder">Upload Folder</button>
                </form>
            </div>
            <div class="col-12 text-center" style="margin: 10px 0">
                <div class="row">
                    <?php
                    const PATH = 'uploads/';
                    $images = array_filter(glob(PATH . '*'), 'is_file');
                    foreach ($images as $image): ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
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
                                <form action="delete-image.php" method="post">
                                    <input type="hidden" value="<?= $image ?>" name="delete_file">
                                    <button class="delete-button" name="delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-12">
                <?php
                $dirs = array_filter(glob(PATH . '*'), 'is_dir');
                foreach ($dirs as $folder):?>
                    <div class="folder text-center">
                        <h3 class="folder-name"><?= basename($folder) ?></h3>
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                $folder_images = array_filter(glob("$folder/*"), 'is_file');
                                foreach ($folder_images as $image): ?>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="image nested-image">
                                            <img class="nested" src="<?= $image ?>" alt="">
                                            <form action="move-image.php" method="post">
                                                <input type="hidden" value="<?= $image ?>" name="file_path">
                                                <select name="destination_file_path" id="">
                                                    <option value="">Choose folder</option>
                                                    <option value="<?= "uploads/" . basename($image) ?>">uploads
                                                    </option>
                                                    <?php
                                                    $dirs = array_filter(glob(PATH . '*'), 'is_dir');
                                                    foreach ($dirs as $folder):?>
                                                        <option value="<?= "$folder" . "/" . basename($image) ?>"><?= basename($folder) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <button name="move">Move</button>
                                            </form>
                                            <form action="delete-image.php" method="post">
                                                <input type="hidden" value="<?= $image ?>" name="delete_file">
                                                <button class="delete-button" name="delete">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.6.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
