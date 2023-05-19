<?php
session_start();
if (isset($_POST['hid'])) {
    $items = $_POST['hid'];
    $price = $_POST['price'];
}
elseif (isset($_POST['hid1'])) {
    $items = $_POST['hid1'];
    $price = $_POST['price'];
}
$_SESSION['item'] = $items;
$_SESSION['price'] = $price;
header('Location: /form.php')
?>