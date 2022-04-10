<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= BRAND_NAME; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?= CSS_DIR; ?>font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="<?= CSS_DIR; ?>lightbox.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="<?= CSS_DIR; ?>style.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<div class="wrapper">
<?php
    // SPECIFY WHAT PAGE IS REQUESTED
    include("header.php");
    //CHECK IF FILE EXISTS, ELSE LOAD 404 PAGE
    if(file_exists(WEBSITE_DIR."templates/$page.php")):
        include("templates/$page.php");
    else:
        include("templates/404.php");
    endif;

    include("footer.php");
?>
</div>
</body>
</html>


