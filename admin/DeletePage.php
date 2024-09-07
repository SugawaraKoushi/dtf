<?php
require '../DB.php';

$id = $_GET['id'];
$query = $pdo->prepare('DELETE FROM pages WHERE id=?');
$query->execute([$id]);
header('Location: ./Pages.php');

?>