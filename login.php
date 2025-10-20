<?php
// Запускаем сессию для хранения данных пользователя
session_start();

// Восстанавливаем сессию из куки, если пользователь выбрал "Запомнить меня"
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['nickname'] = $_COOKIE['nickname'];
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['phone'] = $_COOKIE['phone'];
    $_SESSION['role'] = $_COOKIE['role'];
}

// Если пользователь авторизован перенаправляем пользователя на главную страницу
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Подключаем файл с настройками базы данных
include 'db.php';

// Переменная для хранения ошибок при авторизации
$error = '';
// Переменная для хранения данных формы в сессии
$formData = ['email' => ''];

// Проверяем, была ли отправлена форма методом POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем email и пароль из формы и убираем лишние пробелы
    $email = trim($_POST["email"]);
    $pass = trim($_POST["pass"]);

    // Сохраняем данные формы для повторного отображения при ошибке
    $formData = ['email' => $email];

    // Проверяем, заполнены ли все поля
    if (!$email || !$pass) {
        $error = "Заполните все поля!";
    } else {
        // Проверяем, существует ли пользователь с таким email
        $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

        // Если пользователь найден
        if (mysqli_num_rows($checkEmail) > 0) {
            // Получаем данные пользователя из базы
            $user = mysqli_fetch_assoc($checkEmail);

            // Проверяем, совпадает ли введенный пароль с хешированным паролем в базе
            if ($pass === $user['password']) {
                // Если пароль верный — сохраняем данные пользователя в сессии
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nickname'] = $user['nickname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['role'] = $user['role'];

                // Если пользователь отметил чекбокс "Запомнить меня" — сохраняем данные в куки на 30 дней
                if (isset($_POST['remember'])) {
                    setcookie('user_id', $user['id'], time() + 86400 * 30, "/");
                    setcookie('nickname', $user['nickname'], time() + 86400 * 30, "/");
                    setcookie('email', $user['email'], time() + 86400 * 30, "/");
                    setcookie('phone', $user['phone'], time() + 86400 * 30, "/");
                    setcookie('role', $user['role'], time() + 86400 * 30, "/");
                }

                // Перенаправляем пользователя на главную страницу
                header("Location: index.php");
                exit();
            } else {
                // Если пароль неверный — выводим ошибку
                $error = "Неверный пароль!";
            }
        } else {
            // Если пользователь с таким email не найден — выводим ошибку
            $error = "Пользователь с таким email не найден!";
        }
    }

    // Сохраняем данные формы в сессию, чтобы они не очищались при ошибке
    $_SESSION['form_data'] = $formData;
} else {
    // Если пользователь зашел на страницу первый раз — очищаем данные формы
    $_SESSION['form_data'] = ['email' => ''];
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Свердловскавтодор — Вход</title>
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

    <main>
        <div class="slider slider-bg">
            <div class="slider-items">
                <img src="media/img/avtodor.jpg" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor2.png" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor3.jpg" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor4.jpg" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor5.jpg" alt="slider-img" class="slider-item">
                <img src="media/img/avtodor6.jpg" alt="slider-img" class="slider-item">
            </div>
        </div>
        <div class="auth">
            <h2>Авторизация</h2>
            <form class="form" action="" method="POST">
                <?php if (!empty($error)): ?>
                    <h5 class="error" style="color: var(--color-red);"><?= htmlspecialchars($error) ?></h5>
                <?php endif; ?>
                <div>
                    <label class="text">Почта</label>
                    <div class="input">
                        <input id="email" type="email" name="email" placeholder="yourEmail@email.com" value="<?= $_SESSION['form_data']['email'] ?>">
                    </div>
                </div>
                <div>
                    <label class="text">Пароль</label>
                    <div class="input password-field">
                        <input id="pass" type="password" name="pass" placeholder="password123">
                        <span class="toggle-pass" onclick="togglePassword('pass', this)">
                            <svg class="eye open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z" />
                            </svg>
                            <svg class="eye closed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path d="M73 39.1C63.6 29.7 48.4 29.7 39.1 39.1C29.8 48.5 29.7 63.7 39 73.1L567 601.1C576.4 610.5 591.6 610.5 600.9 601.1C610.2 591.7 610.3 576.5 600.9 567.2L504.5 470.8C507.2 468.4 509.9 466 512.5 463.6C559.3 420.1 590.6 368.2 605.5 332.5C608.8 324.6 608.8 315.8 605.5 307.9C590.6 272.2 559.3 220.2 512.5 176.8C465.4 133.1 400.7 96.2 319.9 96.2C263.1 96.2 214.3 114.4 173.9 140.4L73 39.1zM236.5 202.7C260 185.9 288.9 176 320 176C399.5 176 464 240.5 464 320C464 351.1 454.1 379.9 437.3 403.5L402.6 368.8C415.3 347.4 419.6 321.1 412.7 295.1C399 243.9 346.3 213.5 295.1 227.2C286.5 229.5 278.4 232.9 271.1 237.2L236.4 202.5zM357.3 459.1C345.4 462.3 332.9 464 320 464C240.5 464 176 399.5 176 320C176 307.1 177.7 294.6 180.9 282.7L101.4 203.2C68.8 240 46.4 279 34.5 307.7C31.2 315.6 31.2 324.4 34.5 332.3C49.4 368 80.7 420 127.5 463.4C174.6 507.1 239.3 544 320.1 544C357.4 544 391.3 536.1 421.6 523.4L357.4 459.2z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="remember">
                    <input type="checkbox" id="remember" name="remember" class="checkbox">
                    <label class="text" for="remember">Запомнить меня</label>
                </div>
                <button type="submit" class="btn">Вход</button>
                <h5 class="go-reg">
                    Нет аккаунта? <a href="registration.php">Зарегистрироваться</a>
                </h5>
            </form>
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
    <script src="js/burgerMenu.js"></script>
    <script src="js/togglePass.js"></script>
    <script src="js/nav.js"></script>
    <script src="js/show.js"></script>
    <script src="js/slider.js"></script>
</body>

</html>