<?php
// Подключаемся к базе данных
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем соединение
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Получаем данные из формы
$username = $_POST['username'];
$password = $_POST['password'];

// Проверяем, что пользователь существует и пароль верный
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "Вы успешно авторизованы";
} else {
  echo "Неверный логин или пароль";
}

mysqli_close($conn);
?>
