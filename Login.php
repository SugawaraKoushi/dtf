<?php
require 'Head.php';
require 'UnauthHeader.php'; ?>

<main>
    <div class="main-layout">
        <div class="aside main-left"></div>
        <div class="main-center">
            <form class="login-container" action="" method="post">
                <h3>Вход в аккаунт</h3>
                <br>
                <input id="login" type="email" name="login" class="field" placeholder="Почта" />
                <input id="password" type="password" name="password" class="field" placeholder="Пароль" />
                <button class="button-size-m login-button">Войти</button>
            </form>
        </div>
        <div class="aside main-right"></div>
    </div>
</main>

<?php
require 'Footer.php' ?>