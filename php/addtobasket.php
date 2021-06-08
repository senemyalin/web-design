<?php
$id = $_POST['id'];

$connection = new PDO("mysql:host=localhost;dbname=bookstorage", "root", "");

$item=$connection->query("SELECT item_id, item_name, item_price FROM items WHERE item_id=$id")->fetchAll()[0];

// IF user is logged in, add item to both database and localStorage, otherwise just localStorage
$amount = 1;
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $items = $connection->query("SELECT amount FROM basket WHERE item_id=$id AND user_id=(select user_id from users where username='$username') LIMIT 1");
    if ($items->rowCount() > 0) {
         $connection->query("UPDATE basket SET amount=amount+1 WHERE item_id='$id' AND user_id=(select user_id from users where username='$username')");
        $amount = $amount + $items->fetchAll()[0][0];
    } else
        $connection->query("INSERT INTO basket (user_id, item_id) SELECT user_id, $id item_id FROM users WHERE username='$username'");
}
echo "<script>
    let items=JSON.parse(localStorage.getItem('basket') || '{}');
    if(items[$id])
      items[$id].amount=$amount;
    else
        items[$id]={id: $id, name: '$item[1]', amount: $amount, price: $item[2]};
    localStorage.setItem('basket', JSON.stringify(items));
    window.location='/index.php';
</script>";