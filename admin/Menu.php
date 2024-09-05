<?php
session_start();
$title = 'Меню администратора';

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
        <h3>Администрирование</h3>
    </div>
    <div class="content-body">
        
        <ul class="settings">
            <a href="./Pages.php">
                <li class="setting">
                    <div class="image setting-icon">
                        <img class="icon" src="../icons/admin/page.svg" />
                    </div>
                    <h4 class="setting-name">Страницы</h4>
                    <span class="setting-description">Управление страницами</span>
                </li>
            </a>
            <a href="./Users.php">
                <li class="setting">
                    <div class="image setting-icon">
                        <img class="icon" src="../icons/admin/user.svg" />
                    </div>
                    <h4 class="setting-name">Пользователи</h4>
                    <span class="setting-description">Управление пользователями</span>
                </li>
            </a>
            <a>
                <li class="setting">
                    <div class="image setting-icon">
                        <img class="icon" src="../icons/admin/mail.svg" />
                    </div>
                    <h4 class="setting-name">Письма</h4>
                    <span class="setting-description">Управление отправленными письмами</span>
                </li>
            </a>
        </ul>
    </div>
</div>
<?php require '../Footer.php'; ?>