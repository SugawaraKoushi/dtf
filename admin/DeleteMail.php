<?php
require '../DB.php';

$id = $_GET['id'];
$query = $pdo->prepare('DELETE FROM emails WHERE id=?');
$query->execute([$id]);
header('Location: ./Mails.php');

?>