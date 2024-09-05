<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_destroy();
    header('Location: ./Login.php');
    exit;
}
?>

<header>
    <div class="header-layout">
        <div class="header-left">
            <img src="/icons/logo.svg" />
        </div>
        <div class="header-center">
            <input class="field" placeholder="Поиск" />
        </div>
        <div class="header-right">
            <button class="button-size-m write-button" type="button">
                Написать
            </button>
            <div class="account">
                <button onclick="showProfileMenu()" class="button-size-m account-menu-button">
                    <div class="image author-icon">
                        <img class="icon" src="/icons/profile/avatar.jpg" />
                    </div>
                    <div class="image author-icon">
                        <img class="icon" src="/icons/side-menu/topics/more-icon.svg" />
                    </div>
                </button>
                <div class="account-menu">
                    <h5 class="account-menu-title">Мой профиль</h5>
                    <a href="Profile.php" class="user-card">
                        <div class="image account-icon">
                            <img class="icon" src="/icons/profile/avatar.jpg" />
                        </div>
                        <div>
                            <div class="user-card-title">
                                <h3 class="user-card-name">
                                    <?php echo $_SESSION['name'] ?>
                                </h3>
                            </div>
                            <span class="user-card-subtitle">Личный блог</span>
                        </div>
                    </a>
                    <ul class="account-menu-content">
                        <a href="">
                            <li class="account-menu-item">
                                <div class="image">
                                    <img class="icon" src="/icons/side-menu/menu/my-list-icon.svg" />
                                </div>
                                <span class="account-menu-item-text">Черновики</span>
                            </li>
                        </a>
                        <a href="">
                            <li class="account-menu-item">
                                <div class="image">
                                    <img class="icon" src="/icons/content/favourite-icon.svg" />
                                </div>
                                <span class="account-menu-item-text">Закладки</span>
                            </li>
                        </a>
                        <a href="Settings.php">
                            <li class="account-menu-item">
                                <div class="image">
                                    <img class="icon" src="/icons/settings/settings.svg" />
                                </div>
                                <span class="account-menu-item-text">Настройки</span>
                            </li>
                        </a>
                        <form method="post">
                            <li class="account-menu-item">
                                <button type="submit" class="button-size-s">Выйти</button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>