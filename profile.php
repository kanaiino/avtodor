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
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php'; // подключаем базу данных

$nickname = $_SESSION['nickname'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'] ?? 'Не указан';
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['service'])) {
    $service = $_POST['service'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    if ($service && $location && $description) {
        $q = "INSERT INTO requests (user_id, service, location, description, status, created_at) 
              VALUES ('$user_id','$service','$location','$description','Ожидание',NOW())";
        if (!mysqli_query($conn, $q)) $error = "Ошибка: " . mysqli_error($conn);
        else header("Location: profile.php");
    } else $error = "Заполните все поля!";
}

if ($role === 'admin' && isset($_POST['update_status'])) {
    $rid = intval($_POST['request_id']);
    $ns = $_POST['new_status'];
    mysqli_query($conn, "UPDATE requests SET status='$ns' WHERE id=$rid");
    header("Location: profile.php");
}

$result = $role === 'admin'
    ? mysqli_query($conn, "SELECT r.*,u.nickname FROM requests r JOIN users u ON r.user_id=u.id ORDER BY r.created_at DESC")
    : mysqli_query($conn, "SELECT * FROM requests WHERE user_id='$user_id' ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($nickname) ?> — Свердловскавтодор</title>
    <link rel="shortcut icon" href="media/img/icon.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
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
                            <a href="profile.php" class="active">Личный кабинет</a>
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
            <a href="contacts.php">Контакты</a>
            <!-- Если пользователь авторизован — показываем ссылку на профиль -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="profile.php" class="active">Личный кабинет</a>
            <?php endif; ?>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="user">
                <h2 class="element-animation">Информация о пользователе</h2>
                <div class="user-info element-animation delay">
                    <h4>Имя: <?= htmlspecialchars($nickname) ?></h4>
                    <h4>Email: <?= htmlspecialchars($email) ?></h4>
                    <h4>Телефон: <?= htmlspecialchars($phone) ?></h4>
                    <h4>Роль: <?= htmlspecialchars($role) ?></h4>
                </div>
            </div>
            <div class="request element-animation">
                <h2>Оставить заявку</h2>
                <form class="form" method="POST">
                    <div>
                        <label class="text">Выберите услугу:</label>
                        <div class="select">
                            <select name="service" required>
                                <option value="Ремонт дороги">Ремонт дороги</option>
                                <option value="Проектные работы">Проектные работы</option>
                                <option value="Подключение ЖКХ">Подключение ЖКХ</option>
                                <option value="Другое">Другое</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="text">Местоположение:</label>
                        <div class="input">
                            <input type="text" name="location" placeholder="Например: Екатеринбург, ул. Ленина 12" required>
                        </div>
                    </div>
                    <div>
                        <label class="text">Описание:</label>
                        <div class="textarea">
                            <textarea name="description" rows="1" placeholder="Кратко опишите суть заявки..."></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn">Отправить заявку</button>
                    <?php if (!empty($error)): ?>
                        <h5 class="error" style="color: var(--color-red);"><?= htmlspecialchars($error) ?></h5>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <div class="requests element-animation">
            <h2><?= $role === 'admin' ? "Все заявки" : "Ваши заявки" ?></h2>
            <table class="table">
                <thead>
                    <tr>
                        <?php if ($role === 'admin'): ?><th>Пользователь</th><?php endif; ?>
                        <th>Услуга</th>
                        <th>Местоположение</th>
                        <th>Описание</th>
                        <th>Статус</th>
                        <th>Дата создания</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <?php if ($role === 'admin'): ?>
                                    <td data-label="Пользователь"><?= htmlspecialchars($row['nickname']) ?></td>
                                <?php endif; ?>
                                <td data-label="Услуга"><?= htmlspecialchars($row['service']) ?></td>
                                <td data-label="Местоположение"><?= htmlspecialchars($row['location']) ?></td>
                                <td data-label="Описание"><?= htmlspecialchars($row['description']) ?></td>
                                <?php if ($role === 'admin'): ?>
                                    <td data-label="Статус" style="padding: 0 1rem 1rem;">
                                        <form method="POST" class="form">
                                            <input type="hidden" name="request_id" value="<?= $row['id'] ?>">
                                            <div class="select">
                                                <select name="new_status" required>
                                                    <option value="Ожидание" <?= $row['status'] == 'Ожидание' ? 'selected' : '' ?>>Ожидание</option>
                                                    <option value="Одобрено" <?= $row['status'] == 'Одобрено' ? 'selected' : '' ?>>Одобрено</option>
                                                    <option value="Отклонено" <?= $row['status'] == 'Отклонено' ? 'selected' : '' ?>>Отклонено</option>
                                                    <option value="Завершено" <?= $row['status'] == 'Завершено' ? 'selected' : '' ?>>Завершено</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="update_status">Сохранить</button>
                                        </form>
                                    </td>
                                <?php else: ?>
                                    <td data-label="Статус"><?= htmlspecialchars($row['status']) ?></td>
                                <?php endif; ?>
                                <td data-label="Дата создания"><?= date('d.m.Y H:i', strtotime($row['created_at'])) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?= $role === 'admin' ? 6 : 5 ?>">Заявок пока нет.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
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
<script>
    document.addEventListener("input", function(e) {
        if (e.target.tagName.toLowerCase() === "textarea") {
            e.target.style.height = "auto"; // сбрасываем высоту
            e.target.style.height = e.target.scrollHeight + "px"; // подгоняем под контент
        }
    });
</script>
<script src="js/burgerMenu.js"></script>
<script src="js/nav.js"></script>
<script src="js/show.js"></script>
<script src="js/slider.js"></script>

</html>