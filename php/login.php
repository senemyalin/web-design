<?php

$username = $_POST['username'];
$password = $_POST['password'];
$connection = new PDO("mysql:host=localhost;dbname=bookstorage", "root", "");

$items = $connection->query("SELECT user_id, user_type FROM users WHERE username= '$username' AND password='$password'");

echo "<script>";
echo "let basket= JSON.parse(localStorage.getItem('basket') || '{}');";
if ($items->rowCount() == 0) {
    echo "alert('Wrong username or password');";
    echo "window.location='/login.php';";
} else {
    setcookie('username', $username, time() + 31536000, '/');
    $arr = $items->fetchAll();
    $id = $arr[0][0];
    $basketItems = $connection->query("SELECT items.item_id, item_name, amount, item_price FROM basket LEFT JOIN items ON items.item_id=basket.item_id WHERE user_id=$id");
    if($basketItems->rowCount() >0)
        foreach ($basketItems->fetchAll() as $item)
            echo "basket[$item[0]]={id: $item[0], name: '$item[1]', amount: $item[2], price: $item[3]};";
    if ($arr[0][1] == 'admin')
        setcookie('admin', 'admin', time() + 31536000, '/');
    echo "localStorage.setItem('basket', JSON.stringify(basket));";
    echo "window.location='/index.php';";
}
echo "</script>";