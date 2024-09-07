<?php
session_start();
$title = 'Управление письмами';

if (count($_SESSION) <= 0 || $_SESSION['role'] != 'admin') {
    header('Location: ../Popular.php');
    exit;
}

require '../Head.php';
require '../DB.php';
require '../LoggedInHeader.php';
require '../Menu.php';

$mails = $pdo->query('SELECT * FROM emails')->fetchAll();
?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3>Управление письмами</h3>
    </div>
    <div class="content-body" style="padding-bottom: 1px;">
        <div>
            <table class="entity-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>User_ID</td>
                        <td>Почта</td>
                        <td>Обращение</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mails as $mail): ?>
                        <tr>
                            <td id="row-id"><?php echo $mail['id'] ?></td>
                            <td id="row-title"><?php echo $mail['user_id'] ?></td>
                            <td id="row-content"><?php echo $mail['email'] ?></td>
                            <td id="row-content"><?php echo $mail['message'] ?></td>
                            <td id="row-actions">
                                <a href="./SendMail.php?id=<?php echo $mail['id']; ?>">Отправить</a>
                                <a href="./DeleteMail.php?id=<?php echo $mail['id']; ?>">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require '../Footer.php'; ?>