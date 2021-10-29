<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photo Gallery</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button name="submit">Upload</button>
</form>

<?php
const PATH = 'uploads/';
foreach (glob(PATH . '*') as $filename): ?>
<div class="image">
    <img src="<?= $filename ?>" alt="">
    <form action="delete.php" method="post">
        <input type="hidden" value="<?= $filename ?>" name="delete_file">
        <button name="delete">Delete</button>
    </form>
</div>
<?php endforeach; ?>

</body>
</html>

<style>
    .image {
        display: inline-block;
        margin: 10px;
    }
    img {
        display: block;
        width: 250px;
        height: 250px;
        object-fit: cover;
        margin-bottom: 10px;
    }
</style>