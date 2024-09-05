<?php
$title = 'Настройка страницы';

if (count($_SESSION) <= 0 || $_SESSION['role'] != 'admin') {
    header('Location: ../Popular.php');
    exit;
}

require '../Head.php';
require '../DB.php';
require '../LoggedInHeader.php';
require '../Menu.php';
?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3>Пользователь</h3>
    </div>
    <div class="content-body">
        <ul class="settings">
            <form action="MailHandler.php" method="POST">
                <li class="form-section">
                    <h4 class="setting-name">Почта</h4>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="field email"
                        placeholder="example@email.com"
                        required />
                    <button type="submit" class="button-size-m">Сохранить</button>
                </li>
            </form>
        </ul>
    </div>
</div>
<?php require './Footer.php'; ?>