<?php
session_start();
$title = 'Управление страницами';

if (count($_SESSION) <= 0 || $_SESSION['role'] != 'admin') {
    header('Location: ../Popular.php');
    exit;
}

require '../Head.php';
require '../DB.php';
require '../LoggedInHeader.php';
require '../Menu.php';

$pages = $pdo->query('SELECT * FROM pages')->fetchAll();
?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3>Управление страницами</h3>
    </div>
    <div class="content-body" style="padding-bottom: 1px;">
        <a style="display: inline-block; margin-bottom: 10px;" href="./AddPage.php">Добавить страницу</a>
        <div>
            <table class="entity-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Заголовок</td>
                        <td>Содержимое</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages as $page): ?>
                        <tr>
                            <td id="row-id"><?php echo htmlspecialchars($page['id']) ?></td>
                            <td id="row-title"><?php echo htmlspecialchars($page['title']) ?></td>
                            <td id="row-content">
                                <?php
                                echo htmlspecialchars(substr($page['content'], 0, 20));
                                ?>
                            </td>
                            <td id="row-actions">
                                <a href="./EditPage.php?id=<?php echo $page['id']; ?>">Редактировать</a>
                                <a href="./DeletePage.php?id=<?php echo $page['id']; ?>">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require '../Footer.php'; ?>