<?php
session_start();
$title = 'Настройки';

if (count($_SESSION) <= 0 || is_null($_SESSION['user_id'])) {
    header('Location: ./Login.php');
    exit;
}

require './Head.php';
require './LoggedInHeader.php';
require './Menu.php'; ?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3>Настройки</h3>
    </div>
    <div class="content-body">
        <ul class="settings">
            <a>
                <li class="setting">
                    <div class="image setting-icon">
                        <img class="icon" src="/icons/settings/login.svg" />
                    </div>
                    <h4 class="setting-name">Блог</h4>
                    <span class="setting-description">Название, Описание</span>
                </li>
            </a>
            <a>
                <li class="setting">
                    <div class="image setting-icon">
                        <img class="icon" src="/icons/settings/feed.svg" />
                    </div>
                    <h4 class="setting-name">Ленты</h4>
                    <span class="setting-description">Настройки лент, Фильтрация,
                        Заблокированные</span>
                </li>
            </a>
            <a href="Common.php">
                <li class="setting">
                    <div class="image setting-icon">
                        <img class="icon" src="/icons/settings/settings.svg" />
                    </div>
                    <h4 class="setting-name">Основные</h4>
                    <span class="setting-description">Способы входа, Удаление аккаунта</span>
                </li>
            </a>
            <a>
                <li class="setting">
                    <div class="image setting-icon">
                        <img class="icon" src="/icons/settings/bell.svg" />
                    </div>
                    <h4 class="setting-name">Уведомления</h4>
                    <span class="setting-description">Уведомления, Письма</span>
                </li>
            </a>
            <?php
            if ($_SESSION['role'] == 'admin') {
                echo '<a href="admin/Menu.php">';
                echo '<li class="setting">';
                echo '<div class="image setting-icon">';
                echo '<img class="icon" src="/icons/settings/bell.svg" />';
                echo '</div>';
                echo '<h4 class="setting-name">Панель администратора</h4>';
                echo '<span class="setting-description">Администрирование системы</span>';
                echo '</li>';
                echo '</a>';
            }
            ?>
        </ul>
    </div>
</div>
<?php require './Footer.php'; ?>