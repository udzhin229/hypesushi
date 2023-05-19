<?php
session_start();
require_once ('assets/php/lang.php');
echo $_SESSION['item'];
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
    <link rel="stylesheet" href="assets/css/form.css">
    <title>Form</title>
</head>
<body>
        <div class="form">
            <div class="container">
            <form action="assets/php/sendviber.php" method="post" id="sendform">
                <div class="title"><?php echo $translation['i38']?></div>
                <div class="form-block">
                    <div class="block">
                        <label for="name"><?php echo $translation['i39']?></label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="block">
                        <label for="phone"><?php echo $translation['i41']?></label>
                        <input type="text" name="phone" placeholder="+380500000000" required minlength="13" maxlength="13" id="phone">
                    </div>
                </div>
                <div class="form-block">
                    <div class="block">
                        <label for="city"><?php echo $translation['i40']?></label>
                        <select name="city" id="city">
                            <!-- <option value="Днепр" <?php if($_SESSION['city'] == 'Днепр') { echo 'selected';} ?>><?php echo $translation['i30']?></option> -->
                            <option value="Покровск" <?php if($_SESSION['city'] == 'Покровск') { echo 'selected';} ?>><?php echo $translation['i31']?></option>
                            <option value="Мирноград" <?php if($_SESSION['city'] == 'Мирноград') { echo 'selected';} ?>><?php echo $translation['i32']?></option>
                        </select>
                    </div>
                    <div class="block">
                        <label for="count" class="c1"><?php echo $translation['i42']?></label>
                        <label for="count" class="c2"><?php echo $translation['i43']?></label>
                        <input type="number" step="1" min="0" max="100" name="count" id="count" required>
                    </div>
                </div>
                <label id="address-l" for="address"><?php echo $translation['i44']?></label>
                <input type="text" name="address" id="address" required>
                <label for="deliv">
                    <input type="radio" name="deliv1" id="deliv" onchange="toggleAddress()" value="<?php echo $translation['i45']?>" checked><?php echo $translation['i45']?></label>
                <label for="deliv">
                    <input type="radio" name="deliv1" id="deliv" onchange="toggleAddress()" value="<?php echo $translation['i46']?>"><?php echo $translation['i46']?></label>
                <label id="deliv-time-l" for="deliv-time"><?php echo $translation['i47']?></label>
                <input type="time" min="11:00" max="19:00" name="deliv-time" id="deliv-time" required>
                <label for="deliv">
                    <input type="radio" name="time1" id="time" onchange="toggleDeliv()" value="<?php echo $translation['i48']?>" checked><?php echo $translation['i48']?></label>
                <label for="deliv">
                    <input type="radio" name="time1" id="time" onchange="toggleDeliv()" value="<?php echo $translation['i49']?>"><?php echo $translation['i49']?></label>
                <label><?php echo $translation['i56']?></label>
                <label for="deliv">
                    <input type="radio" name="type" id="type" value="<?php echo $translation['i57']?>" checked><?php echo $translation['i57']?></label>
                <label for="deliv">
                    <input type="radio" name="type" id="type" value="<?php echo $translation['i58']?>"><?php echo $translation['i58']?></label>
                <label for="note"><?php echo $translation['i50']?></label>
                <textarea name="note" id="note" cols="30" rows="10"></textarea>
                <input type="submit" value="<?php echo $translation['i51']?>">
                <div class="under-submit">
                    <label for="deliv">
                        <input type="radio" name="pay1" id="pay" value="<?php echo $translation['i52']?>" checked><?php echo $translation['i52']?></label>
                    <label for="deliv">
                        <input type="radio" name="pay1" id="pay" value="<?php echo $translation['i53']?>"><?php echo $translation['i53']?></label>
                </div>
            </form>
            </div>
        </div>
        <script>
            let inp = document.getElementById('phone');
            // Проверяем фокус
            inp.addEventListener('focus', _ => {
            // Если там ничего нет или есть, но левое
            if(!/^\+\d*$/.test(inp.value))
                // То вставляем знак плюса как значение
                inp.value = '+380';
            });
            inp.addEventListener('input', e => {
                if (!/^\+\d*$/.test(inp.value)) {
                    inp.value = '+380';
                }
            });
            inp.addEventListener('keypress', e => {
            if(!/\d/.test(e.key))
                e.preventDefault();
            });

            let jin = document.getElementById("name");
            jin.addEventListener('keydown', function(e){
            if( e.key.match(/[0-9]/) ) return e.preventDefault();
            });
            jin.addEventListener('input', function(e){
            jin.value = jin.value.replace(/[0-9]/g, "");
            });

            if (!localStorage.getItem('cart')) {
                window.location.href = "index.php";
            }
            function toggleDeliv() {
                let timeRadios = document.getElementsByName("time1");
                let inputDeliv = document.getElementById("deliv-time");

                for (let i = 0; i < timeRadios.length; i++) {
                    if (timeRadios[1].checked) {
                        inputDeliv.style.display = "none";
                        inputDeliv.value = "";
                        inputDeliv.removeAttribute('required');
                    return;
                    }
                    else {
                        inputDeliv.style.display = "block";
                        inputDeliv.setAttribute('required', '');
                    return;
                    }
                }
            }
            function toggleAddress() {
                let delivRadios = document.getElementsByName("deliv1");
                let inputAddress = document.getElementById("address");

                for (let i = 0; i < delivRadios.length; i++) {
                    if (delivRadios[1].checked) {
                        inputAddress.style.display = "none";
                        inputAddress.value = "";
                        inputAddress.removeAttribute('required');
                    return;
                    }
                    else {
                        inputAddress.style.display = "block";
                        inputAddress.setAttribute('required', '');
                    return;
                    }
                }
            }
            const form = document.getElementById('sendform');
            form.addEventListener('submit', (event) => {
            if (form.checkValidity()) {
                localStorage.clear();
            } else {
                event.preventDefault();
            }
            });
        </script>
</body>
</html>