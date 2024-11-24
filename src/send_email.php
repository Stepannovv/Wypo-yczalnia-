<?php
// Обработчик формы
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получение данных из формы с фильтрацией
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $date = htmlspecialchars(trim($_POST['date'] ?? ''));
    $boat_type = htmlspecialchars(trim($_POST['boat-type'] ?? ''));
    $duration = htmlspecialchars(trim($_POST['duration'] ?? ''));
    $services = isset($_POST['additional-services']) 
        ? htmlspecialchars(implode(", ", $_POST['additional-services'])) 
        : 'None';
    $requests = htmlspecialchars(trim($_POST['requests'] ?? ''));

    // Проверка обязательных полей
    if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($boat_type) || empty($duration)) {
        echo "Error: All required fields must be filled.";
        exit;
    }

    // Проверка email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email address.";
        exit;
    }

    // Формирование письма
    $to = "stepannovv@gmail.com"; // Замените на ваш email
    $subject = "New Boat Rental Booking";
    $message = "
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    Preferred Date: $date\n
    Boat Type: $boat_type\n
    Duration: $duration\n
    Additional Services: $services\n
    Special Requests or Notes: $requests
    ";
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Отправка письма
    if (mail($to, $subject, $message, $headers)) {
        // Перенаправление на страницу благодарности
        header("Location: thank-you.html");
        exit;
    } else {
        echo "Error: Unable to send your request at the moment. Please try again later.";
    }
}
?>