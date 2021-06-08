<?php

$username = $_POST['username'];
$password = $_POST['password'];

$connection = new PDO("mysql:host=localhost;dbname=bookstorage", "root", "");

$items = $connection->query("SELECT 1 FROM users WHERE username= '$username'");


echo "<script>";
if ($items->rowCount() > 0)
    echo "alert('IT EXISTS');";
else {
    $connection->query("INSERT INTO users (username, password, user_type) VALUES ('$username', '$password', 'user')");
    setcookie('username', $username, time() + 31536000, '/');
}
echo "window.location='/login.php';";
echo "</script>";