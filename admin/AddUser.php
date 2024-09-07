<?php
session_start();
$title = 'Добавление пользователя';

if (count($_SESSION) <= 0 || $_SESSION['role'] != 'admin') {
    header('Location: ../Popular.php');
    exit;
}

require '../DB.php';

$id = $pdo->query('SELECT max(id) FROM users')->fetch();
$id = $id['max(id)'] + 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = $pdo->prepare('INSERT INTO users (id, name, email, password) VALUES (?, ?, ?, ?)');
    $query->execute([$id, $name, $email, $password]);

    header('Location: ./Users.php');
    exit;
}
require '../Head.php';
require '../LoggedInHeader.php';
require '../Menu.php';
?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3>Добавление пользователя</h3>
    </div>
    <div class="content-body">
        <ul class="settings">
            <form method="POST">
                <li class="form-section">
                    <h4 class="setting-name">Id</h4>
                    <input
                        type="number"
                        id="id"
                        name="id"
                        class="field"
                        value=<?php echo $id ?>
                        disabled
                        required />
                </li>
                <li class="form-section">
                    <h4 class="setting-name">Имя</h4>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="field"
                        required />
                </li>
                <li class="form-section">
                    <h4 class="setting-name">Почта</h4>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="field"
                        required />
                </li>
                <li class="form-section">
                    <h4 class="setting-name">Пароль</h4>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="field"
                        required />
                </li>
                <li class="form-section">
                    <fieldset>
                        <div>
                            <input type="radio" id="admin" name="role" value="admin">
                            <label for="admin">admin</label>
                        </div>
                        <div>
                            <input type="radio" id="user" name="role" value="user">
                            <label for="user">user</label>
                        </div>
                    </fieldset>
                </li>
                <button type="submit" class="button-size-m submit-btn">Сохранить</button>
            </form>
        </ul>
    </div>
</div>
<?php require '../Footer.php'; ?>