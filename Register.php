<?php
session_start();
$title = 'Регистрация';
require './DB.php';
require './Head.php';
require './UnauthHeader.php';

if (count($_SESSION) > 0 || !is_null($_SESSION['user_id'])) {
    header('Location: Popular.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // Добавление нового пользователя в БД
    $query = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');

    if ($query->execute([$name, $email, $password])) {
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['username'] = $username;
        header('Location: /Popular.php');
        exit;
    } else {
        $error = 'Ошибка при регистрации';
    }
}

?>

<main>
    <div class="main-layout">
        <div class="aside main-left"></div>
        <div class="main-center">
            <form class="login-container" method="post">
                <h3>Зарегистрироваться</h3>
                <br>
                <div>
                    <label id="name-label">Имя</label>
                    <input id="login" type="text" name="name" class="field" placeholder="Как к вам обращаться?" />
                </div>
                <div>
                    <label id="login-label">Почта</label>
                    <input id="login" type="email" name="email" class="field" placeholder="example@email.com" />
                </div>
                <div>
                    <label id="password-label">Пароль</label>
                    <input id="password" type="password" name="password" class="field" placeholder="Пароль" />
                </div>
                <br>
                <button class="button-size-m register-button">Зарегистрироваться</button>
                <span>Уже были у нас?</span>
                <a href="/Login.php">Войти</a>
            </form>
        </div>
        <div class="aside main-right"></div>
    </div>
</main>

<?php
require './Footer.php' ?>