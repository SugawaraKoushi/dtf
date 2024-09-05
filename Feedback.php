<?php
$title = 'Обратная связь';
require './Head.php';
require './LoggedInHeader.php';
require './Menu.php'; ?>

<div class="content-item">
    <div class="content-header settings-header">
        <h3>Обратная связь</h3>
    </div>
    <div class="content-body">
        <ul class="settings">
            <form action="MailHandler.php" method="post">
                <li class="form-section">
                    <h4 class="setting-name">Имя</h4>
                    <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'error') {
                        echo '<input class="field" id="name" name="name" placeholder="Иван Иванов" value="';
                        echo $_GET['name'];
                        echo '"/>';
                        if (in_array('Имя обязательно для заполнения.', $_GET['errors'])) {
                            echo '<style type="text/css"> #name { border: 1px solid red; }</style>';
                        }
                    } else {
                        echo '<input class="field" id="name" name="name" placeholder="Иван Иванов" />';
                    }
                    ?>
                    <h4 class="setting-name">Почта</h4>
                    <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'error') {
                        echo '<input class="field" id="email" name="email" placeholder="example@email.com" value="';
                        echo $_GET['email'];
                        echo '"/>';
                        if (in_array('Email обязателен для заполнения.', $_GET['errors']) || in_array('Некорректный формат email.', $_GET['errors'])) {
                            echo '<style type="text/css"> #email { border: 1px solid red; }</style>';
                        }
                    } else {
                        echo '<input class="field" id="email" name="email" placeholder="example@email.com" />';
                    }
                    ?>
                    <h4 class="setting-name">Сообщение</h4>
                    <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'error') {
                        echo '<input class="field" id="msg" name="message" placeholder="Ваше обращение" value="';
                        echo $_GET['message'];
                        echo '"/>';
                        if (in_array('Сообщение обязательно для заполнения.', $_GET['errors'])) {
                            echo '<style type="text/css"> #msg { border: 1px solid red; }</style>';
                        }
                    } else {
                        echo '<input class="field" id="msg" name="message" placeholder="Ваше обращение" />';
                    }
                    ?>
                    <button type="submit" class="button-size-m">Отправить</button>
                </li>
            </form>
        </ul>
    </div>
</div>
<?php require './Footer.php'; ?>