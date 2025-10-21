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
    <title>О нас — Свердловскавтодор</title>
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
                        <a href="about.php" class="active">О нас</a>
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
            <a href="index.php">Главная</a>
            <a href="about.php" class="active">О нас</a>
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
                    <h1>О компании</h1>
                </div>
                <p class="element-animation delay">АО «Свердловскавтодор» — крупное предприятие в Уральском регионе, обладающее уникальным
                    набором оборудования и технологий для строительства качественных дорог международного
                    уровня.</p>
            </div>
        </div>
        <div class="container">
            <div class="advantages">
                <div class="items-wrap">
                    <div class="item">
                        <div class="img element-animation">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M287.9 96L211.7 96C182.3 96 156.6 116.1 149.6 144.6L65.4 484.5C57.9 514.7 80.8 544 112 544L287.9 544L287.9 480C287.9 462.3 302.2 448 319.9 448C337.6 448 351.9 462.3 351.9 480L351.9 544L528 544C559.2 544 582.1 514.7 574.6 484.5L490.5 144.6C483.4 116.1 457.8 96 428.3 96L351.9 96L351.9 160C351.9 177.7 337.6 192 319.9 192C302.2 192 287.9 177.7 287.9 160L287.9 96zM351.9 288L351.9 352C351.9 369.7 337.6 384 319.9 384C302.2 384 287.9 369.7 287.9 352L287.9 288C287.9 270.3 302.2 256 319.9 256C337.6 256 351.9 270.3 351.9 288z" />
                            </svg>
                        </div>
                        <div class="count element-animation delay">
                            <h2>6000+</h2>
                        </div>
                        <div class="info element-animation delay2">
                            <p>построено километров дорог</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img element-animation">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M32 96C14.3 96 0 110.3 0 128L0 512C0 529.7 14.3 544 32 544C49.7 544 64 529.7 64 512L64 330.3L149.2 160L64 160L64 128C64 110.3 49.7 96 32 96zM405.2 160L330.9 160L325.5 170.7L234.9 352L309.2 352L314.6 341.3L405.2 160zM362.8 352L437.1 352L442.5 341.3L533.1 160L458.8 160L453.4 170.7L362.8 352zM202.8 160L197.4 170.7L106.8 352L181.1 352L186.5 341.3L277.1 160L202.8 160zM490.8 352L576 352L576 512C576 529.7 590.3 544 608 544C625.7 544 640 529.7 640 512L640 128C640 110.3 625.7 96 608 96C590.3 96 576 110.3 576 128L576 181.7L490.8 352z" />
                            </svg>
                        </div>
                        <div class="count element-animation delay">
                            <h2>4000+</h2>
                        </div>
                        <div class="info element-animation delay2">
                            <p>построено искусственных сооружений</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img element-animation">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z" />
                            </svg>
                        </div>
                        <div class="count element-animation delay">
                            <h2>1921</h2>
                        </div>
                        <div class="info element-animation delay2">
                            <p>год начала работы предприятия</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img element-animation">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M256 144C256 117.5 277.5 96 304 96L336 96C362.5 96 384 117.5 384 144L384 496C384 522.5 362.5 544 336 544L304 544C277.5 544 256 522.5 256 496L256 144zM64 336C64 309.5 85.5 288 112 288L144 288C170.5 288 192 309.5 192 336L192 496C192 522.5 170.5 544 144 544L112 544C85.5 544 64 522.5 64 496L64 336zM496 160L528 160C554.5 160 576 181.5 576 208L576 496C576 522.5 554.5 544 528 544L496 544C469.5 544 448 522.5 448 496L448 208C448 181.5 469.5 160 496 160z" />
                            </svg>
                        </div>
                        <div class="count element-animation delay">
                            <h2>500</h2>
                        </div>
                        <div class="info element-animation delay2">
                            <p>тысяч тонн асфальта за сезон</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img element-animation">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M199.2 181.4L173.1 256L466.9 256L440.8 181.4C436.3 168.6 424.2 160 410.6 160L229.4 160C215.8 160 203.7 168.6 199.2 181.4zM103.6 260.8L138.8 160.3C152.3 121.8 188.6 96 229.4 96L410.6 96C451.4 96 487.7 121.8 501.2 160.3L536.4 260.8C559.6 270.4 576 293.3 576 320L576 512C576 529.7 561.7 544 544 544L512 544C494.3 544 480 529.7 480 512L480 480L160 480L160 512C160 529.7 145.7 544 128 544L96 544C78.3 544 64 529.7 64 512L64 320C64 293.3 80.4 270.4 103.6 260.8zM192 368C192 350.3 177.7 336 160 336C142.3 336 128 350.3 128 368C128 385.7 142.3 400 160 400C177.7 400 192 385.7 192 368zM480 400C497.7 400 512 385.7 512 368C512 350.3 497.7 336 480 336C462.3 336 448 350.3 448 368C448 385.7 462.3 400 480 400z" />
                            </svg>
                        </div>
                        <div class="count element-animation delay">
                            <h2>1500</h2>
                        </div>
                        <div class="info element-animation delay2">
                            <p>единиц техники на содержании</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="license">
            <div class="items-wrap">
                <div class="license-items marquee">
                    <img src="media/img/license.jpg" alt="license" class="license-item">
                    <img src="media/img/license2.jpg" alt="license" class="license-item">
                    <img src="media/img/license3.jpg" alt="license" class="license-item">
                    <img src="media/img/license4.jpg" alt="license" class="license-item">
                    <img src="media/img/license5.jpg" alt="license" class="license-item">
                    <img src="media/img/license6.jpg" alt="license" class="license-item">
                    <img src="media/img/license7.jpg" alt="license" class="license-item">
                    <img src="media/img/license8.jpg" alt="license" class="license-item">
                    <img src="media/img/license9.jpg" alt="license" class="license-item">
                    <img src="media/img/license10.jpg" alt="license" class="license-item">
                    <img src="media/img/license11.jpg" alt="license" class="license-item">
                    <img src="media/img/license12.jpg" alt="license" class="license-item">
                    <img src="media/img/license13.jpg" alt="license" class="license-item">
                </div>
                <div aria-hidden="true" class="license-items marquee">
                    <img src="media/img/license.jpg" alt="license" class="license-item">
                    <img src="media/img/license2.jpg" alt="license" class="license-item">
                    <img src="media/img/license3.jpg" alt="license" class="license-item">
                    <img src="media/img/license4.jpg" alt="license" class="license-item">
                    <img src="media/img/license5.jpg" alt="license" class="license-item">
                    <img src="media/img/license6.jpg" alt="license" class="license-item">
                    <img src="media/img/license7.jpg" alt="license" class="license-item">
                    <img src="media/img/license8.jpg" alt="license" class="license-item">
                    <img src="media/img/license9.jpg" alt="license" class="license-item">
                    <img src="media/img/license10.jpg" alt="license" class="license-item">
                    <img src="media/img/license11.jpg" alt="license" class="license-item">
                    <img src="media/img/license12.jpg" alt="license" class="license-item">
                    <img src="media/img/license13.jpg" alt="license" class="license-item">
                </div>
            </div>
        </div>
        <div class="container">
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
            <div class="ecology">
                <div class="title element-animation">
                    <h2>Экология</h2>
                </div>
                <div class="text element-animation delay">
                    <p>Одной из приоритетных целей деятельности АО «Свердловскавтодор» является сохранение благоприятной
                        окружающей среды при строительстве, реконструкции, содержании автомобильных дорог и дорожных
                        сооружений, при осуществлении деятельности на вспомогательных производствах.</p>
                    <p>Основными задачами для достижения этой цели являются соблюдение экологических и
                        санитарно-эпидемиологических норм и правил на всех этапах производства, строительства,
                        реконструкции
                        и содержания автомобильных дорог и дорожных сооружений, энерго и ресурсосбережение, снижение
                        количества образования отходов производства и потребления, снижения количества выбросов
                        загрязняющих
                        веществ в атмосферный воздух.</p>
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