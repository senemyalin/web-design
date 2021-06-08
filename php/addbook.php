<?php
$name = $_POST['name'];
$information = $_POST['information'];
$price = $_POST['price'];
$category = $_POST['category'];

$connection = new PDO("mysql:host=localhost;dbname=bookstorage", "root", "");

$picture = $_FILES['picture']['tmp_name'];

// CHECK IF EXISTS
$items = $connection->query("SELECT 1 FROM items WHERE item_name='$name' LIMIT 1");
if ($items->rowCount() > 0)
    echo "<script>alert('NAME ALREADY EXISTS'); window.location='/addabook.php'</script>";
else if (!is_uploaded_file($picture)) {
    echo "<script>alert('UPLOAD THE FILE PLEASE'); window.location='/addabook.php'</script>";
} else {
    move_uploaded_file($picture, "../img/" . $name . ".png");
    $connection->query("INSERT INTO items (item_name, item_price, description, item_category) VALUES ('$name', '$price', '$information', '$category')");
    header('Location: /index.php');
}
