<?php
session_start();
$name = $_POST['name'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$_SESSION['city'] = $city;
$count = $_POST['count'];
$address = $_POST['address'];
$deliv = $_POST['deliv1'];
$delivtime = $_POST['deliv-time'];
$type = $_POST['type'];
$time = $_POST['time1'];
$note = $_POST['note'];
$pay = $_POST['pay1'];
if($city == 'Днепр') {
    define("TG_TOKEN", "5726957319:AAHNbxlyO_8JoOycx2oM92JerQl45rdvHqw");
    define("TG_USER_ID", "-1001804820966");
    $getQuery = array(
        "chat_id" => TG_USER_ID,
        "text" => "<b>Имя: ".$name."</b>"."\n"."<b>Номер: ".$phone."</b>"."\n"."<b>Город: ".$city."</b>"."\n"."<b>Кол-во приборов: ".$count."</b>"."\n"."<b>Адрес: ".$address."</b>"."\n"."<b>Способ доставки: ".$deliv."</b>"."\n"."<b>Время доставки: ".$delivtime."</b>"."\n"."<b>Выбор времени: ".$time."</b>"."\n"."<b>Тип палочек: ".$type."</b>"."\n"."<b>Примечание: ".$note."</b>"."\n"."<b>Способ оплаты: ".$pay."</b>"."\n"."<b>Что заказали - кол-во:\n".$_SESSION['item']."</b>"."\n"."<b>Итоговая цена: ".$_SESSION['price']."</b>",
        "parse_mode" => "html",
    );
    $ch = curl_init("https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage?" . http_build_query($getQuery));
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultQuery = curl_exec($ch);
    curl_close();
    header("Location: /succ.php");
}
else if($city == 'Мирноград') {
    define("TG_TOKEN", "5726957319:AAHNbxlyO_8JoOycx2oM92JerQl45rdvHqw");
    define("TG_USER_ID", "-1001970041521");
    $getQuery = array(
        "chat_id" => TG_USER_ID,
        "text" => "<b>Имя: ".$name."</b>"."\n"."<b>Номер: ".$phone."</b>"."\n"."<b>Город: ".$city."</b>"."\n"."<b>Кол-во приборов: ".$count."</b>"."\n"."<b>Адрес: ".$address."</b>"."\n"."<b>Способ доставки: ".$deliv."</b>"."\n"."<b>Время доставки: ".$delivtime."</b>"."\n"."<b>Выбор времени: ".$time."</b>"."\n"."<b>Тип палочек: ".$type."</b>"."\n"."<b>Примечание: ".$note."</b>"."\n"."<b>Способ оплаты: ".$pay."</b>"."\n"."<b>Что заказали - кол-во:\n".$_SESSION['item']."</b>"."\n"."<b>Итоговая цена: ".$_SESSION['price']."</b>",
        "parse_mode" => "html",
    );
    $ch = curl_init("https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage?" . http_build_query($getQuery));
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultQuery = curl_exec($ch);
    curl_close();
    header("Location: /succ.php");
}
else if($city == 'Покровск') {
    define("TG_TOKEN", "5726957319:AAHNbxlyO_8JoOycx2oM92JerQl45rdvHqw");
    define("TG_USER_ID", "-1001811609528");
    $getQuery = array(
        "chat_id" => TG_USER_ID,
        "text" => "<b>Имя: ".$name."</b>"."\n"."<b>Номер: ".$phone."</b>"."\n"."<b>Город: ".$city."</b>"."\n"."<b>Кол-во приборов: ".$count."</b>"."\n"."<b>Адрес: ".$address."</b>"."\n"."<b>Способ доставки: ".$deliv."</b>"."\n"."<b>Время доставки: ".$delivtime."</b>"."\n"."<b>Выбор времени: ".$time."</b>"."\n"."<b>Тип палочек: ".$type."</b>"."\n"."<b>Примечание: ".$note."</b>"."\n"."<b>Способ оплаты: ".$pay."</b>"."\n"."<b>Что заказали - кол-во:\n".$_SESSION['item']."</b>"."\n"."<b>Итоговая цена: ".$_SESSION['price']."</b>",
        "parse_mode" => "html",
    );
    $ch = curl_init("https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage?" . http_build_query($getQuery));
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultQuery = curl_exec($ch);
    curl_close();
    header("Location: /succ.php");
}
?>