<?php
session_start();

// Восстанавливаем сессию из куки, если пользователь выбрал "Запомнить меня"
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['nickname'] = $_COOKIE['nickname'];
    $_SESSION['email'] = $_COOKIE['email'];
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Свердловскавтодор</title>
    <link rel="shortcut icon" href="media/img/icon.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="items-wrap">
                <div class="lside">
                    <a class="logo" href="index.php"></a>
                </div>
                <div class="rside">
                    <div class="burger">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path d="M96 160C96 142.3 110.3 128 128 128L512 128C529.7 128 544 142.3 544 160C544 177.7 529.7 192 512 192L128 192C110.3 192 96 177.7 96 160zM96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320zM544 480C544 497.7 529.7 512 512 512L128 512C110.3 512 96 497.7 96 480C96 462.3 110.3 448 128 448L512 448C529.7 448 544 462.3 544 480z" />
                        </svg>
                    </div>
                    <div class="nav">
                        <a href="index.php">Главная</a>
                        <a href="about.php">О нас</a>
                        <a href="services.php">Услуги</a>
                        <a href="contacts.php" class="active">Контакты</a>

                        <!-- Если пользователь авторизован — показываем ссылку на профиль -->
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="profile.php">Личный кабинет</a>
                        <?php endif; ?>
                    </div>
                    <div class="log">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a class="btn" href="logout.php">Выйти</a>
                        <?php else: ?>
                            <a class="btn" href="login.php">Войти</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav id="nav">
        <div class="items-wrap">
            <a href="index.php">Главная</a>
            <a href="about.php">О нас</a>
            <a href="services.php">Услуги</a>
            <a href="contacts.php" class="active">Контакты</a>
            <!-- Если пользователь авторизован — показываем ссылку на профиль -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="profile.php">Личный кабинет</a>
            <?php endif; ?>
        </div>
    </nav>
    <main>
        <div class="slider">
            <div class="slider-items">
                <img src="media/img/avtodor.jpg" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor2.png" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor3.jpg" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor4.jpg" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor5.jpg" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor6.jpg" alt="slider-img" class="slider-item">
            </div>
        </div>
        <div class="container">
            <div class="about">
                <div class="title element-animation">
                    <h1>Филиалы</h1>
                </div>
                <p class="element-animation delay">АО «Свердловскавтодор» — единое юридическое лицо, состоящее из 10 филиалов (дорожных
                    ремонтно-строительных управлений), размещенных по всей территории Свердловской области, проектного
                    института и аппарата управления общества расположенного в г. Екатеринбурге. Среднесписочная
                    численность 1,8 тысячи человек.</p>
            </div>
        </div>
        <div class="container">
            <div class="filials filials-items">
                <div class="item">
                    <div class="title element-animation">
                        <h3>Ирбитское ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe
                                src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3Af8e55a23aca2ca935d15c58df657445d04cb797b7d2033ae38cde034e00daf6b"
                                frameborder="0" allowfullscreen="true" width="320px" height="240px"
                                style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Ермак Д. В.</h4>
                            <h5>Адрес: 623850, Свердловская область, г. Ирбит, ул. Советская, 133<br>Телефон : (343-55)
                                6-26-84<br>Факс: (343-55) 6-44-98</h5>
                            <h5>Ответственный за производственный участок:<br>Режевское ДРСУ: Адрес: 624690,
                                Свердловская область, Алапаевский район, пос. Верхняя Синячиха, ул. Плишкина, 54 кор. 1
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title element-animation">
                        <h3>Красноуфимское ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3Aa4dd719b786d1de7c49cb5f05285f3cf2780fb8f452c79f3bfcf258c6d6c1020" frameborder="0" allowfullscreen="true" width="320px" height="240px" style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Новиков Р. В.</h4>
                            <h5>Адрес: 623300, Свердловская область, г.Красноуфимск, ул. Терешковой, 2<br>Телефон :
                                (343-94)
                                2-11-05<br>Факс: (343-94) 2-11-05</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title element-animation">
                        <h3>Невьянское ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A6f361fe50c8e57430c8bbe40471b8a94a675daa219db757920d063237b5002c4" frameborder="0" allowfullscreen="true" width="320px" height="240px" style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Копанов В. В.</h4>
                            <h5>Адрес: 624192, Свердловская область, г.Невьянск, ул. Шевченко, 98<br>Телефон : (343-56)
                                2-31-35<br>Факс: (343-56) 2-38-28</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title element-animation">
                        <h3>Серовское ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A4e5c12bbccef458ea93339ae4b32f59db95b803e3b9f622b3ce04284d6471dec" frameborder="0" allowfullscreen="true" width="320px" height="240px" style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Золотухин А. В.</h4>
                            <h5>Адрес: 624997, г. Серов, Свердловская область, Хасановцев, 79<br>Телефон : (343-56) 2-31-35<br>Факс: (343-56) 2-38-28</h5>
                            <h5>Ответственный за производственный участок:<br>Верхотурское ДРСУ: Адрес: 623380, Свердловская область, г.Верхотурье ул. 8-Марта, 50</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title element-animation">
                        <h3>Среднеуральское ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A7dc6031d8702273875069e63b4f738cad4be88c21af94acacf66a980f932ffc9" frameborder="0" allowfullscreen="true" width="320px" height="240px" style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Фомина О. Н.</h4>
                            <h5>Адрес: 624030, Свердловская область, Белоярский район, р.п. Белоярский, ул. Свердлова, 1Б<br>Телефон : (343) 252-02-73<br>Факс: (343) 252-04-98</h5>
                            <h5>Ответственная за производственные участки:<br>Березовское ДРСУ: Адрес: 623703, Свердловская область, г.Березовский, западная промзона, № 17<br>Сысертское ДРСУ: Адрес: 624000, Свердловская область, г. Арамиль, ул. Мира, 6А</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title element-animation">
                        <h3>Сухоложское ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A98c53f80fba6b5c6f61b15b11848879b2c46f70179c9747940298c5d81cbd82a" frameborder="0" allowfullscreen="true" width="320px" height="240px" style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Черемисов А. В.</h4>
                            <h5>Адрес: 624852 Свердловская область, Камышловский район с. Обуховское, ул. Мира, 308<br>Телефон : (343 75) 2-49-11<br>Факс: (343 75) 2-49-11</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title element-animation">
                        <h3>Тавдинское ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A4c73df222bd40c33b7df094020e640a1cc95f6648cc1412c4ce7b304d2e327c8" frameborder="0" allowfullscreen="true" width="320px" height="240px" style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Смирнов В. И.</h4>
                            <h5>Адрес: 623950, Свердловская область, г.Тавда, ул. Устье-Азанки, 2А<br>Телефон : (343-60) 5-30-52<br>Факс: (343-60) 5-30-52</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title element-animation">
                        <h3>Талицкое ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A2600c1a38308252d277c86c0a9df94fc963a19195843d425102a5325ad55389e" frameborder="0" allowfullscreen="true" width="320px" height="240px" style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Черемисов А. В.</h4>
                            <h5>Адрес: 623643, Свердловская область, г.Талица, ул. Лермонтова, 2<br>Телефон : (343-71) 2-19-53<br>Факс: (343-71) 2-15-84</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title element-animation">
                        <h3>Туринское ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A336d00a2fae962bcc24fb91d670750131c2c4140b1980e98369cad512d5a5c5b" frameborder="0" allowfullscreen="true" width="320px" height="240px" style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Шаров Р. Л.</h4>
                            <h5>Адрес: 623900, Свердловская область, г.Туринск, ул. Слободо — Туринская 13А<br>Телефон : (343-49) 2-42-67</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title element-animation">
                        <h3>Туринское ДРСУ</h3>
                    </div>
                    <div class="items-wrap element-animation delay">
                        <div class="lside">
                            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A287f7724f2e617d93d15e54fe5f191552df600dbd967694a840d31fccd7736c8" frameborder="0" allowfullscreen="true" width="320px" height="240px" style="display: block;"></iframe>
                        </div>
                        <div class="rside">
                            <h4>Директор: Качарин В. М.</h4>
                            <h5>Адрес: 620014, г.Екатеринбург, ул. Московская, 11<br>Телефон : (343) 311-00-80 доб. 1299</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="items-wrap">
                <div class="fabout item">
                    <h4>О КОМПАНИИ</h4>
                    <h5>АО «Свердловскавтодор» — крупное предприятие в Уральском регионе, обладающее уникальным набором
                        оборудования и технологий для строительства качественных дорог международного
                        уровня.</h5>
                </div>
                <div class="fservices item">
                    <h4>УСЛУГИ</h4>
                    <ul>
                        <li><a href="#">Дорожные работы →</a></li>
                        <li><a href="#">Проектные работы →</a></li>
                        <li><a href="#">Услуги ЖКХ →</a></li>
                        <li><a href="#">Учебный центр →</a></li>
                    </ul>
                </div>
                <div class="fcontacts item">
                    <h4>КОНТАКТЫ</h4>
                    <h5>Адрес: 620000, г.Екатеринбург,
                        ул.Московская 11</h5>
                    <h5>Телефон приёмной: (343) 311-00-80 доб.1155<br>E-mail: sad@sv-avtodor.ru<br>Телефон доверия:
                        (343)
                        311-00-80 доб.711<br>E-mail службы доверия: doverie@sv-avtodor.ru</h5>

                </div>
            </div>
        </div>
        <h5 class="wpn">© 2022 АО “Свердловскавтодор”</h5>
    </footer>
</body>
<script src="js/burgerMenu.js"></script>
<script src="js/nav.js"></script>
<script src="js/show.js"></script>
<script src="js/slider.js"></script>

</html>