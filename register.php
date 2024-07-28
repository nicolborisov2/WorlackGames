<?php
session_start();
$host = 'localhost'; // адрес сервера MySQL
$dbname = 'ch65988_bd'; // имя базы данных
$username = 'ch65988_bd'; // имя пользователя базы данных
$password = 'bGytf9TS!VgPygw'; // пароль пользователя базы данных

// Подключение к базе данных
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Получение данных из формы регистрации
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Проверка пароля
if ($password != $confirm_password) {
    $_SESSION['error'] = 'Пароли не совпадают';
    header('Location: registration_form.php');
    exit;
}

// Проверка наличия пользователя с таким же именем или e-mail
$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username OR email = :email");
$stmt->execute(['username' => $username, 'email' => $email]);
$count = $stmt->fetchColumn();

if ($count > 0) {
    $_SESSION['error'] = 'Пользователь с таким именем или e-mail уже зарегистрирован';
    header('Location: registration_form.php');
    exit;
}

// Хеширование пароля
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Добавление нового пользователя в базу данных
$stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
$stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashed_password]);

$_SESSION['success'] = 'Вы успешно зарегистрированы';
header('Location: login_form.php');
exit;
?>
