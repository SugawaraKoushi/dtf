<?php
session_start();
$title = 'Профиль';
require './Head.php';
require './LoggedInHeader.php';
require './Menu.php'; 
require './DB.php';

if (count($_SESSION) <= 0 || is_null($_SESSION['user_id'])) {
    header('Location: ./Login.php');
    exit;
}

$query = $pdo->prepare('SELECT created_at from users where email = ?');
$query->execute([$_SESSION['email']]);
$result = $query->fetch();
$created = $result['created_at'];

?>
<div class="profile content-item">
    <div class="content-header">
        <div class="profile-cover">
            <img
                id="profile-cover-image"
                src="/icons/profile/cover.jpg"
                onmouseover="onCoverImageMouseOver()"
                onmouseout="onConverImageMouseOut()"
                ondragenter="onDragEnter(event)"
                ondragover="onDragOver(event)"
                ondrop="onDrop(event)" />
        </div>
    </div>
    <div class="profile-body">
        <div class="profile-header">
            <div class="image avatar">
                <img
                    class="icon"
                    src="/icons/profile/avatar.jpg" />
            </div>
            <button class="button-size-s">
                <a href="Settings.php">Настройки</a>
            </button>
        </div>
        <h3 class="profile-name">
            <?php echo $_SESSION['name'] ?>
        </h3>
        <span class="profile-creation-date">с <?php echo date('d.m.Y',strtotime($created)); ?></span>
        <div class="followers">
            <span>5 подписчиков</span>
            <span>99 подписок</span>
        </div>
        <div class="profile-footer">
            <div class="profile-tabs">
                <a class="profile-tab" href="">Посты</a>
                <a class="profile-tab" href="">Комментарии</a>
            </div>
        </div>
    </div>
</div>
<?php require './Footer.php'; ?>