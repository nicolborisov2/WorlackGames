<?php
// Подключение к базе данных
$servername = "localhost";
$username = "ch65988_bd";
$password = "bGytf9TS!VgPygw";
$dbname = "ch65988_bd";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Получение данных из формы
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];

// SQL-запрос на добавление комментария в базу данных
$sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";

if (mysqli_query($conn, $sql)) {
    // Комментарий успешно добавлен в базу данных
    echo "Комментарий успешно добавлен";
} else {
    // Произошла ошибка при добавлении комментария в базу данных
    echo "Ошибка: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
