<?php
session_start();
$title = 'Вход в DTF';
require './Head.php';
require './UnauthHeader.php';
require './DB.php';

if (count($_SESSION) > 0 && !is_null($_SESSION['user_id'])) {
    header('Location: ./Popular.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Поиск пользователя в БД
    $query = $pdo->prepare('SELECT * FROM users where email = ?');
    $query->execute([$email]);
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        header('Location: ./Popular.php');
        exit;
    } else {
        $error = 'Неправильный email или пароль';
    }
}
?>

<main>
    <div class="main-layout">
        <div class="aside main-left"></div>
        <div class="main-center">
            <form class="login-container" method="post">
                <h3>Вход в аккаунт</h3>
                <br>
                <div>
                    <label id="login-label">Логин</label>
                    <input id="login" type="email" name="email" class="field" placeholder="example@email.com" />
                </div>
                <div>
                    <label id="password-label">Пароль</label>
                    <input id="password" type="password" name="password" class="field" placeholder="Пароль" />
                </div>
                <br>
                <button class="button-size-m login-button">Войти</button>
                <span>Впервые у нас?</span>
                <a href="/Register.php">Зарегистрируйтесь</a>
            </form>
        </div>
        <div class="aside main-right"></div>
    </div>
</main>

<?php
require './Footer.php' ?>