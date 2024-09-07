<?php
require '../DB.php';

$id = $_GET['id'];
$query = $pdo->prepare('DELETE FROM users WHERE id=?');
$query->execute([$id]);
header('Location: ./Users.php');

?>