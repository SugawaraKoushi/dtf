<?php
$title = 'Обратная связь';
require 'head.php';
require 'LoggedInHeader.php'; ?>

<?php
require 'Menu.php';
require 'FeedbackContent.php'; ?>
<?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo '<p>Ваше сообщение было отправлено успешно!</p>';
} elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
    echo '<p>Ошибка при отправке сообщения.</p>';
}
?>
<?php
require 'Footer.php'; ?>