<?php
session_start();
$title = 'Управление пользователями';

if (count($_SESSION) <= 0 || $_SESSION['role'] != 'admin') {
    header('Location: ../Popular.php');
    exit;
}

require '../Head.php';
require '../DB.php';
require '../LoggedInHeader.php';
require '../Menu.php';

$users = $pdo->query('SELECT * FROM users')->fetchAll();
?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3>Управление пользователями</h3>
    </div>
    <div class="content-body" style="padding-bottom: 1px;">
        <a style="display: inline-block; margin-bottom: 10px;" href="./AddUser.php">Добавить пользователя</a>
        <div>
            <table class="entity-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Имя</td>
                        <td>Почта</td>
                        <td>Роль</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td id="row-id"><?php echo htmlspecialchars($user['id']) ?></td>
                            <td id="row-title"><?php echo htmlspecialchars($user['name']) ?></td>
                            <td id="row-content"><?php echo htmlspecialchars($user['email']);?></td>
                            <td id="row-content"><?php echo htmlspecialchars($user['role']);?></td>
                            <td id="row-actions">
                                <a href="./EditUser.php?id=<?php echo $user['id']; ?>">Редактировать</a>
                                <a href="./DeleteUser.php?id=<?php echo $user['id']; ?>">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require '../Footer.php'; ?>