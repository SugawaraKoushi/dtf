<?php
require "../DB.php";

$query = $pdo->prepare('SELECT * FROM emails WHERE id = ?');
$query->execute([$_GET['id']]);
$mail = $query->fetch();

$query = $pdo->prepare('SELECT name FROM users WHERE id = ?');
$query->execute([$mail['user_id']]);
$user = $query->fetch();
$name = $user['name'];

$query = $pdo->prepare('UPDATE emails SET sent_at = ?');
$query->execute([date('Y-m-d H:i:s',time())]);

$email = $mail['email'];
$message = $mail['message'];

$to = "v_fokin930@mail.ru"; // Замените на ваш email
$subject = "Новое сообщение с контактной формы";
$body = "Имя: $name\nEmail: $email\n\nСообщение:\n$message";
$headers = [
    'From' => $email,
    'Reply-To' => $email,
    'X-Mailer' => 'PHP/' . phpversion(),
    'Content-Type' => 'text/plain; charset=utf-8'
];

if (mail($to, $subject, $body, $headers)) {
    header("Location: ./Mails.php");
} else {
    header("Location: ./Mails.php");
}

?>