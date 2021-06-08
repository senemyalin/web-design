<?php
$connection = new PDO("mysql:host=localhost;dbname=bookstorage", "root", "");
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $connection->query("DELETE FROM basket WHERE user_id=(select user_id FROM users WHERE username='$username')");
}
echo "<script>
    localStorage.removeItem('basket');
    window.location='/index.php';
</script>";