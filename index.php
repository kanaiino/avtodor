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
    <title>Главная — Свердловскавтодор</title>
    <link rel="shortcut icon" href="media/img/icon.svg" />
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
                        <a href="index.php" class="active">Главная</a>
                        <a href="about.php">О нас</a>
                        <a href="services.php">Услуги</a>
                        <a href="contacts.php">Контакты</a>

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
            <a href="index.php" class="active">Главная</a>
            <a href="about.php">О нас</a>
            <a href="services.php">Услуги</a>
            <a href="contacts.php">Контакты</a>
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
                    <h1>Добро пожаловать!</h1>
                </div>
                <p class="element-animation delay">Акционерное общество (АО) «Свердловскавтодор» — одно из крупных дорожных предприятий в Свердловской
                    области. Документом, давшим ему путевку в жизнь, является правительственная телеграмма наркома путей
                    сообщения Феликса Эдмундовича Дзержинского от 21 июля 1921 года о назначении окружным уполномоченным
                    местного транспорта на Урале и создании Окружного Управления местного транспорта (Уралокрумт).</p>
            </div>
        </div>
        <div class="container element-animation">
            <div class="activity">
                <div class="title element-animation">
                    <h2>Основные виды деятельности</h2>
                </div>
                <ul class="text element-animation delay">
                    <li>
                        <p>Выполнение подрядных работ по строительству, ремонту и содержанию автомобильных дорог и
                            искусственных сооружений.</p>
                    </li>
                    <li>
                        <p>Проектно-изыскательские работы (выполнение работ по подготовке проектно-сметной документации
                            и
                            производство инженерных изысканий).</p>
                    </li>
                    <li>
                        <p>Производство и реализация асфальтобетонных смесей.</p>
                    </li>
                    <li>
                        <p>Оказание услуг по перевозке грузов.</p>
                    </li>
                    <li>
                        <p>Складские услуги.</p>
                    </li>
                    <li>
                        <p>Повышение квалификации работников основных специальностей для дорожных организаций (на базе
                            собственного Учебного центра).</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="services">
                <div class="items-wrap">
                    <div class="item element-animation">
                        <div class="img">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M32 160C32 124.7 60.7 96 96 96L384 96C419.3 96 448 124.7 448 160L448 192L498.7 192C515.7 192 532 198.7 544 210.7L589.3 256C601.3 268 608 284.3 608 301.3L608 448C608 483.3 579.3 512 544 512L540.7 512C530.3 548.9 496.3 576 456 576C415.7 576 381.8 548.9 371.3 512L268.7 512C258.3 548.9 224.3 576 184 576C143.7 576 109.8 548.9 99.3 512L96 512C60.7 512 32 483.3 32 448L32 160zM544 352L544 301.3L498.7 256L448 256L448 352L544 352zM224 488C224 465.9 206.1 448 184 448C161.9 448 144 465.9 144 488C144 510.1 161.9 528 184 528C206.1 528 224 510.1 224 488zM456 528C478.1 528 496 510.1 496 488C496 465.9 478.1 448 456 448C433.9 448 416 465.9 416 488C416 510.1 433.9 528 456 528z" />
                            </svg>
                        </div>
                        <div class="text">
                            <div class="title">
                                <h4>Подрядные дорожные работы</h4>
                            </div>
                            <div class="info">
                                <p>Содержание, ремонт, строительство и реконструкция автомобильных дорог и сооружений на
                                    них.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item element-animation">
                        <div class="img">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M287.9 96L211.7 96C182.3 96 156.6 116.1 149.6 144.6L65.4 484.5C57.9 514.7 80.8 544 112 544L287.9 544L287.9 480C287.9 462.3 302.2 448 319.9 448C337.6 448 351.9 462.3 351.9 480L351.9 544L528 544C559.2 544 582.1 514.7 574.6 484.5L490.5 144.6C483.4 116.1 457.8 96 428.3 96L351.9 96L351.9 160C351.9 177.7 337.6 192 319.9 192C302.2 192 287.9 177.7 287.9 160L287.9 96zM351.9 288L351.9 352C351.9 369.7 337.6 384 319.9 384C302.2 384 287.9 369.7 287.9 352L287.9 288C287.9 270.3 302.2 256 319.9 256C337.6 256 351.9 270.3 351.9 288z" />
                            </svg>
                        </div>
                        <div class="text">
                            <div class="title">
                                <h4>Проектные работы</h4>
                            </div>
                            <div class="info">
                                <p>Полный комплекс проектно-изыскательских работ для строительства.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item element-animation">
                        <div class="img">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M288 96C270.3 96 256 110.3 256 128L160 128C142.3 128 128 142.3 128 160C128 177.7 142.3 192 160 192L256 192L256 256L237.3 256C228.8 256 220.7 259.4 214.7 265.4L192 288L96 288C78.3 288 64 302.3 64 320L64 384C64 401.7 78.3 416 96 416L196.1 416C216.3 445 250 464 288 464C326 464 359.7 445 379.9 416L416 416C433.7 416 448 430.3 448 448C448 465.7 462.3 480 480 480L544 480C561.7 480 576 465.7 576 448C576 359.6 504.4 288 416 288L384 288L361.4 265.4C355.4 259.4 347.3 256 338.8 256L320.1 256L320.1 192L416.1 192C433.8 192 448.1 177.7 448.1 160C448.1 142.3 433.8 128 416.1 128L320.1 128C320.1 110.3 305.8 96 288.1 96zM500.8 519.4L482.6 561.8C480.8 565.9 479.9 570.4 479.9 574.9L479.9 576.1C479.9 593.8 494.2 608.1 511.9 608.1C529.6 608.1 543.9 593.8 543.9 576.1L543.9 574.9C543.9 570.4 543 566 541.2 561.8L523 519.4C521.1 514.9 516.7 512 511.8 512C506.9 512 502.6 514.9 500.6 519.4z" />
                            </svg>
                        </div>
                        <div class="text">
                            <div class="title">
                                <h4>Услуги ЖКХ</h4>
                            </div>
                            <div class="info">
                                <p>Подключение к системе теплоснабжения.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item element-animation">
                        <div class="img">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M128 96C92.7 96 64 124.7 64 160L64 416C64 451.3 92.7 480 128 480L272 480L256 528L184 528C170.7 528 160 538.7 160 552C160 565.3 170.7 576 184 576L456 576C469.3 576 480 565.3 480 552C480 538.7 469.3 528 456 528L384 528L368 480L512 480C547.3 480 576 451.3 576 416L576 160C576 124.7 547.3 96 512 96L128 96zM160 160L480 160C497.7 160 512 174.3 512 192L512 352C512 369.7 497.7 384 480 384L160 384C142.3 384 128 369.7 128 352L128 192C128 174.3 142.3 160 160 160z" />
                            </svg>
                        </div>
                        <div class="text">
                            <div class="title">
                                <h4>Учебный центр</h4>
                            </div>
                            <div class="info">
                                <p>Профессиональное обучение рабочих и повышение квалификации.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="more">
                    <a class="btn" href="services.php">Подробнее</a>
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