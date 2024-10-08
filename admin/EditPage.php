<?php
session_start();
$title = 'Настройка страницы';

if (count($_SESSION) <= 0 || $_SESSION['role'] != 'admin') {
    header('Location: ../Popular.php');
    exit;
}

require '../DB.php';

$query = $pdo->prepare('SELECT * FROM pages WHERE id = ?');
$query->execute([$_GET['id']]);
$page = $query->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $page['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $query = $pdo->prepare('UPDATE pages SET title=?, content=? WHERE id=?');
    $query->execute([$title, $content, $id]);
    header('Location: ./Pages.php');
    exit;
}

require '../Head.php';
require '../LoggedInHeader.php';
require '../Menu.php';
?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3><?php echo $page['title'] ?></h3>
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
                        value=<?php echo $page['id'] ?>
                        disabled
                        required />
                </li>
                <li class="form-section">
                    <h4 class="setting-name">Заголовок</h4>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="field"
                        value=<?php echo $page['title'] ?>
                        required />
                </li>
                <li class="form-section">
                    <h4 class="setting-name">Содержимое</h4>
                    <textarea
                        type="text"
                        id="content"
                        name="content"
                        class="field">
                        <?php echo htmlspecialchars($page['content']) ?>
                    </textarea>
                </li>
                <button type="submit" class="button-size-m submit-btn">Сохранить</button>
            </form>
        </ul>
    </div>
</div>
<?php require '../Footer.php'; ?>