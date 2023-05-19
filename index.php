<?php
session_start();
require_once ('assets/php/lang.php');
if(empty($_SESSION['city'])){
    $class_name = "show";
}
else {
    $class_name = '';
}
if (isset($_POST['lang'])) {
    $_SESSION['lang'] = $_POST['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ua';
$translation = $translations[$lang];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Sushi</title>
</head>
<body>
    <div class="page">
        <div class="cart" id="cart-menu">
            <div class="title"><?php echo $translation['i33']?></div>
            <hr>
            <div class="elements-order" id="elements-order"></div>
            <div class="order">
                <hr>
                <div class="total_price"><?php echo $translation['i34']?> <span id="totalprice"></span></div>
                <form id="reqform" action="assets/php/send.php" method="post">
                    <input type="hidden" name="hid" id="hid">
                    <input type="hidden" name="price" id="price">
                    <input type="submit" value="<?php echo $translation['i35']?>">
                </form>
                <!-- <button onclick="send()">Оформить заказ</button> -->
                <button class="continue" id="continue"><?php echo $translation['i36']?></button>
            </div>
        </div>
        <div class="overflow" id="overflow"></div>
        <div class="modal <?php echo $class_name?>" id="modal">
            <div class="title"><?php echo $translation['i37']?></div>
            <form method="post" action="assets/php/ch-city.php">
                <button type="submit" name="selected_city" value="Покровск"><?php echo $translation['i31']?></button>
                <button type="submit" name="selected_city" value="Мирноград"><?php echo $translation['i32']?></button>
                <!-- <button type="submit" name="selected_city" value="Днепр"><?php echo $translation['i30']?></button> -->
            </form>
        </div>
        <header id="header">
            <div class="container">
                <div class="header__inner">
                    <div class="logo"><img src="assets/images/favicon.png" alt=""><div class="ch-city" id="ch-city" onclick="chcity()"><?php if($_SESSION['city'] == 'Днепр') {echo $translation['i30'];} elseif($_SESSION['city'] == 'Покровск') {echo $translation['i31'];} elseif($_SESSION['city'] == 'Мирноград') {echo $translation['i32'];}?></div></div>
                    <nav id="nav">
                        <a data-scroll="#intro" href="#" class="nav__link"><?php echo $translation['i1']?></a>
                        <a data-scroll="#menu" href="#" class="nav__link"><?php echo $translation['i2']?></a>
                        <a data-scroll="#information" href="#" class="nav__link"><?php echo $translation['i3']?></a>
                    </nav>
                    <div class="cart-lang">
                        <form method="post">
                            <select class="lang" name="lang" onchange="this.form.submit()">
                                <option value="ru" <?php if ($lang == 'ru') echo 'selected' ?>>RU</option>
                                <option value="ua" <?php if ($lang == 'ua') echo 'selected' ?>>UA</option>
                            </select>
                        </form>
                        <img src="assets/images/cart.svg" alt="" id="icon-cart">
                        <div class="burger" id="burger">
                            <div class="burger__menu"></div>
                            <div class="burger__menu"></div>
                            <div class="burger__menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section class="intro" id="intro">
                    <div class="carousel_slides">
                        <div class="carousel-slide" style="background-image: url('/assets/images/7X5A2800.jpg');"></div>
                        <div class="carousel-slide" style="background-image: url('/assets/images/7X5A2861.jpg');"></div>
                        <div class="carousel-slide" style="background-image: url('/assets/images/7X5A2760.jpg');"></div>
                        <div class="carousel-slide" style="background-image: url('/assets/images/7X5A2806.jpg');"></div>
                    </div>
                <div class="container">
                    <div class="intro__inner">
                        <div class="title"><?php echo $translation['i4']?></div>
                        <div class="text"><?php echo $translation['i5']?></div>
                        <button data-scroll="#menu"><?php echo $translation['i6']?></button>
                        <div class="info">
                            <a href="tel:<?php if($_SESSION['city'] == 'Днепр') {echo '+380663303060';} elseif($_SESSION['city'] == 'Покровск') {echo '+380660430424';} elseif($_SESSION['city'] == 'Мирноград') {echo '+380666760555';}?>" class="num"><img src="assets/images/phone-ico.svg" alt=""><?php if($_SESSION['city'] == 'Днепр') {echo '+38 (066) 330-30-60';} elseif($_SESSION['city'] == 'Покровск') {echo '+38 (066) 04-304-24';} elseif($_SESSION['city'] == 'Мирноград') {echo '+38 (066) 676-05-55';}?></a>
                            <a target="_blank" href="<?php if($_SESSION['city'] == 'Днепр') {echo 'https://goo.gl/maps/RRLvdUzfrhC3F2Ze7';} elseif($_SESSION['city'] == 'Покровск') {echo 'https://goo.gl/maps/Zj6aAzDApPgQBX3VA';} elseif($_SESSION['city'] == 'Мирноград') {echo 'https://goo.gl/maps/k4LiC64jAKJ81vir8';}?>" class="address"><img src="assets/images/map-ico.svg" alt=""><?php if($_SESSION['city'] == 'Днепр') {echo $translation['i7'];} elseif($_SESSION['city'] == 'Покровск') {echo $translation['i7-1'];} elseif($_SESSION['city'] == 'Мирноград') {echo $translation['i7-2'];}?></a>
                        </div>
                        <div class="name"><img src="assets/images/line-name-1.svg" alt=""> Hype Sushi<img src="assets/images/line-name-2.svg" alt=""> </div>
                    </div>
                </div>
                <div class="dots">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </section>
            <section class="menu" id="menu">
                <div class="container">
                    <div class="section__inner">
                        <div class="choose" id="choose_all">
                            <button class="chose" id="choose" data-category="roll"><img src="assets/images/icon-menu/sushi.svg" alt=""><?php echo $translation['i8']?></button>
                            <button class="chose" id="choose" data-category="maki"><img src="assets/images/icon-menu/roll.svg" alt=""><?php echo $translation['i9']?></button>
                            <button class="chose" id="choose" data-category="set"><img src="assets/images/icon-menu/set.svg" alt=""><?php echo $translation['i10']?></button>
                            <button class="chose" id="choose" data-category="send"><img src="assets/images/icon-menu/send.svg" alt=""><?php echo $translation['i11']?></button>
                            <button class="chose" id="choose" data-category="salat"><img src="assets/images/icon-menu/salat.svg" alt=""><?php echo $translation['i12']?></button>
                            <button class="chose" id="choose" data-category="sous"><img src="assets/images/icon-menu/salat.svg" alt=""><?php echo $translation['i60']?></button>
                            <button class="chose" id="choose" data-category="hot-roll"><img src="assets/images/icon-menu/sushi.svg" alt=""><?php echo $translation['i59']?></button>
                            <button class="chose" id="choose" data-category="spring-roll"><img src="assets/images/icon-menu/sushi.svg" alt=""><?php echo $translation['i61']?></button>
                            <button class="chose" id="choose" data-category="gunk"><img src="assets/images/icon-menu/roll.svg" alt=""><?php echo $translation['i62']?></button>
                            <button class="chose" id="choose" data-category="sushi"><img src="assets/images/icon-menu/sushi.svg" alt=""><?php echo $translation['i63']?></button>

                            <button class="chose" id="choose" data-category="poka"><img src="assets/images/icon-menu/salat.svg" alt=""><?php echo $translation['i65']?></button>
                            <button class="chose" id="choose" data-category="soup"><img src="assets/images/icon-menu/salat.svg" alt=""><?php echo $translation['i66']?></button>
                            <button class="chose" id="choose" data-category="lapsha"><img src="assets/images/icon-menu/salat.svg" alt=""><?php echo $translation['i67']?></button>
                            <button class="chose" id="choose" data-category="potato"><img src="assets/images/icon-menu/salat.svg" alt=""><?php echo $translation['i68']?></button>
                            <button class="chose" id="choose" data-category="desert"><img src="assets/images/icon-menu/salat.svg" alt=""><?php echo $translation['i69']?></button>
                        </div>
                        <div class="grid-container" id="grid-container">

                        </div>
                        <!-- <button class="show" id="show"><?php echo $translation['i13']?> <img src="assets/images/bird.svg" alt=""></button> -->
                    </div>
                </div>
            </section>
            <section class="information" id="information">
                <div class="container">
                    <div class="info__inner">
                        <div class="info__block">
                            <div class="title"><?php echo $translation['i14']?></div>
                            <div class="min-block">
                                <img src="assets/images/icon-info/site.svg" alt="">
                                <div class="texts">
                                    <div class="t-title"><?php echo $translation['i15']?></div>
                                    <div class="t-text t-text-w"><?php echo $translation['i16']?></div>
                                </div>
                            </div>
                            <div class="min-block">
                                <img src="assets/images/icon-info/phone.svg" alt="">
                                <div class="texts">
                                    <div class="t-title"><?php echo $translation['i17']?></div>
                                    <div class="t-text"><a href="tel:<?php if($_SESSION['city'] == 'Днепр') {echo '+380663303060';} elseif($_SESSION['city'] == 'Покровск') {echo '+380660430424';} elseif($_SESSION['city'] == 'Мирноград') {echo '+380666760555';}?>"><?php if($_SESSION['city'] == 'Днепр') {echo '+38 (066) 330-30-60';} elseif($_SESSION['city'] == 'Покровск') {echo '+38 (066) 04-304-24';} elseif($_SESSION['city'] == 'Мирноград') {echo '+38 (066) 676-05-55';}?></a><?php echo $translation['i18']?></div>
                                </div>
                            </div>
                        </div>
                        <div class="info__block">
                            <div class="title"><?php echo $translation['i19']?></div>
                            <div class="min-block">
                                <img src="assets/images/icon-info/diliv.svg" alt="">
                                <div class="texts">
                                    <div class="t-title"><?php echo $translation['i20']?></div>
                                    <div class="t-text"><?php echo $translation['i21']?></div>
                                </div>
                            </div>
                            <div class="min-block">
                                <img src="assets/images/icon-info/time.svg" alt="">
                                <div class="texts">
                                    <div class="t-title"><?php echo $translation['i22']?></div>
                                    <div class="t-text"><?php echo $translation['i23']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="container">
                <div class="footer__inner">
                    <div class="footer__block">
                        <div class="title"><?php echo $translation['i24']?></div>
                        <div class="text"><?php echo $translation['i25']?></div>
                        <div class="text"><?php echo $translation['i26']?></div>
                    </div>
                    <div class="footer__block">
                        <nav>
                            <a data-scroll="#intro" href="#"><?php echo $translation['i1']?></a>
                            <a data-scroll="#menu" href="#"><?php echo $translation['i2']?></a>
                            <a data-scroll="#information" href="#"><?php echo $translation['i3']?></a>
                        </nav>
                        <div class="buttons">
                            <form id="reqform1" action="assets/php/send.php" method="post">
                                <input type="hidden" name="hid1" id="hid1">
                                <input type="hidden" name="price1" id="price1">
                                <input type="submit" value="<?php echo $translation['i35']?>">
                            </form>
                            <button id="show-cart"><?php echo $translation['i28']?></button>
                        </div>
                    </div>
                    <div class="footer__block">
                        <a target="_blank" href="https://instagram.com/hype.sushi" class="insta"><img src="assets/images/icon-footer/insta.svg" alt="">@hype.sushi</a>
                        <a href="tel:<?php if($_SESSION['city'] == 'Днепр') {echo '+380663303060';} elseif($_SESSION['city'] == 'Покровск') {echo '+380660430424';} elseif($_SESSION['city'] == 'Мирноград') {echo '+380666760555';}?>" class="tel"><img src="assets/images/icon-footer/phone.svg" alt=""> <?php if($_SESSION['city'] == 'Днепр') {echo '+38 (066) 330-30-60';} elseif($_SESSION['city'] == 'Покровск') {echo '+38 (066) 04-304-24';} elseif($_SESSION['city'] == 'Мирноград') {echo '+38 (066) 676-05-55';}?> </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="rule"><?php echo $translation['i29']?></div>
            <a target="_blanc" href="https://nexon-studio.com/" class="rule rule-mt"><?php echo $translation['i64']?></a>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="assets/js/header.js"></script>
    <script src="assets/js/upload.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/send.js"></script>
    <script src="assets/js/slider.js"></script>
    <script>
        function chcity() {
            document.getElementById("modal").classList.add('show');
        }
    </script>
</body>
</html>