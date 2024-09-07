<?php
session_start();
$title = 'Настройка пользователя';

if (count($_SESSION) <= 0 || $_SESSION['role'] != 'admin') {
    header('Location: ../Popular.php');
    exit;
}

require '../DB.php';

$query = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$query->execute([$_GET['id']]);
$user = $query->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $user['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (is_null($password)) {
        $password = $user['password'];
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    $role = trim($_POST['role']);
    $query = $pdo->prepare('UPDATE users SET name=?, email=?, password=?, role=? WHERE id=?');
    $query->execute([$name, $email, $password, $role, $id]);
    header('Location: ./Users.php');
    exit;
}

require '../Head.php';
require '../LoggedInHeader.php';
require '../Menu.php';
?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3><?php echo $user['name'] ?></h3>
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
                        value=<?php echo $user['id'] ?>
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
                        value=<?php echo $user['name'] ?>
                        required />
                </li>
                <li class="form-section">
                    <h4 class="setting-name">Почта</h4>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="field"
                        value=<?php echo $user['email'] ?>
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
                            <input type="radio" id="admin" name="role" value="admin" <?php if($user['role'] == 'admin') echo 'checked'; ?>>
                            <label for="admin">admin</label>
                        </div>
                        <div>
                            <input type="radio" id="user" name="role" value="user" <?php if($user['role'] == 'user') echo 'checked'; ?>>
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