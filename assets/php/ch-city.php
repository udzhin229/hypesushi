<?php
session_start();
if(isset($_POST['selected_city'])) {
    $_SESSION['city'] = $_POST['selected_city'];
}
header('Location: /index.php');
exit();
?>