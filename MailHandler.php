<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    $errors = [];

    // Проверка имени
    if (empty($name)) {
        $errors[] = "Имя обязательно для заполнения.";
    }

    // Проверка email
    if (empty($email)) {
        $errors[] = "Email обязателен для заполнения.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Некорректный формат email.";
    }

    // Проверка сообщения
    if (empty($message)) {
        $errors[] = "Сообщение обязательно для заполнения.";
    }

    if (count($errors) > 0) {
        // Если есть ошибки, возвращаемся на форму и отображаем ошибки
        $query = http_build_query(["status" => "error", "errors" => $errors, "name" => $name, "email" => $email, "message" => $message]);
        header("Location: Feedback.php?" . $query);
        exit;
    } else {
        // Отправка письма
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
            // Если отправка успешна, перенаправляем на страницу с сообщением об успехе
            header("Location: Feedback.php?status=success");
            exit;
        } else {
            // Если произошла ошибка при отправке, перенаправляем с ошибкой
            header("Location: Feedback.php?status=error");
            exit;
        }
    }
} else {
    // Если запрос не POST, перенаправляем на форму
    header("Location: Feedback.php");
    exit;
}
?>
