<div class="content-item">
    <div class="content-header settings-header">
        <h3>Обратная связь</h3>
    </div>
    <div class="content-body">
        <ul class="settings">
            <form action="MailHandler.php" method="post">
                <li class="form-section">
                    <h4 class="setting-name">Имя</h4>
                    <input class="field" id="name" name="name" placeholder="Иван Иванов" />
                    <h4 class="setting-name">Почта</h4>
                    <input class="field" id="email" name="email" placeholder="example@email.com" required />
                    <h4 class="setting-name">Сообщение</h4>
                    <input class="field" id="msg" name="message" placeholder="Ваше обращение" required />
                    <button type="submit" class="button-size-m">Отправить</button>
                </li>
            </form>
        </ul>
    </div>
</div>