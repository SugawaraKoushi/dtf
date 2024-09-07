<?php
session_start();
$title = 'Добавление страницы';

if (count($_SESSION) <= 0 || $_SESSION['role'] != 'admin') {
    header('Location: ../Popular.php');
    exit;
}

require '../DB.php';

$id = $pdo->query('SELECT max(id) FROM pages')->fetch();
$id = $id['max(id)'] + 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $query = $pdo->prepare('INSERT INTO pages (id, title, content) VALUES (?, ?, ?)');
    $query->execute([$id, $title, $content]);
    header('Location: ./Pages.php');
    exit;
}

require '../Head.php';
require '../LoggedInHeader.php';
require '../Menu.php';
?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3>Добавление страницы</h3>
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
                    <h4 class="setting-name">Заголовок</h4>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="field"
                        required />
                </li>
                <li class="form-section">
                    <h4 class="setting-name">Содержимое</h4>
                    <textarea
                        type="text"
                        id="content"
                        name="content"
                        class="field"></textarea>
                </li>
                <button type="submit" class="button-size-m submit-btn">Сохранить</button>
            </form>
        </ul>
    </div>
</div>
<?php require '../Footer.php'; ?>