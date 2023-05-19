<?php
session_start();
require_once ('assets/php/lang.php');
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ua';
$translation = $translations[$lang];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/succ.css">
    <title>Successful</title>
</head>
<body>
    <div class="page">
        <div class="container">
            <div class="succ">
                <img src="assets/images/succ.png" alt="">
                <div class="title"><?php echo $translation['i54']?></div>
                <a href="index.php"><?php echo $translation['i55']?></a>
            </div>
        </div>
    </div>
</body>
</html>