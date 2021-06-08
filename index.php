<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>E-BOOK</title>
    <link rel="stylesheet" href="eshopping.css" type="text/css">

</head>
<body>

<div class="container" style="max-width: 100%; width: 100%">
    <h1 class="logo"></h1>

    <nav>
        <li><a href="index.php">Home</a></li>
        <li><a href="hardbooks.php">Hard Books</a></li>
        <?php
        if (isset($_COOKIE['admin']))
            echo "<li><a href='addabook.php'>Add a Book</a></li>";
        ?>
        <li><a id="shoppingBag" href="shoppingbag.php">Shopping Bag</a></li>
        <li><a href="about.php">About</a></li>

        <?php
        if (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
            echo "<li><a href='#'>Welcome, $username</a></li>";
            echo "<li><a href=\"/php/logout.php\">Logout</a></li>";
        } else
            echo "<li><a href=\"login.php\">Login</a></li>";
        ?>
        <form style="margin-left: 50px; display: inline;" method="GET" action="index.php">
            <input name="s" style="border-radius: 5px;" class="custom-control-input" placeholder="Find a book" formaction="php/logout.php">
            <button type="submit" style="display: none"></button>
        </form>
    </nav>
</div>

<div>
    <p id="p2">
        <?php
        $connection = new PDO("mysql:host=localhost;dbname=bookstorage", "root", "");
        $items=[];
        if(isset($_GET['s'])){
            $s=$_GET['s'];
            $items = $connection->query("SELECT item_id, item_name, item_price, description FROM items WHERE item_category='books' AND item_name LIKE '%$s%';");
        }
        else
            $items = $connection->query("SELECT item_id, item_name, item_price, description FROM items WHERE item_category='books';");
        if ($items->rowCount() == 0)
            echo "NO BOOKS";
        else {
            echo "<div class=\"container\" style=\"margin-top: 20mm\"> <div class=\"row\" s>";
            foreach ($items->fetchAll() as $item)
                echo " <div class=\"col-3\" style=\"display: flex;flex-direction: column;    padding: 10px;border-radius: 15px;box-shadow: white 0 0 4px 0;margin-left:15px; text-align: center;\"> 
            <div class=\"card\" style=\"text-align: center; background: gray; box-shadow: purple -1px 2px 5px 0;\"> 
                <h4>$item[1]</h4>
            </div>
            <div class=\"card-body\">
                <img src=\"img/$item[1].png\" style=\"width:70%\" />
                <p style=\"max-height: 150px; overflow-y:auto\" >$item[3]</p>
            </div>
            <div style='flex:1;'></div>
            <div class=\"card-footer\">
                <p>Price : $item[2]</p>
                <form method='POST' action='php/addtobasket.php'>
                <input style='display: none' name='id' value='$item[0]'>
                <input style='display: none' name='id' value='$item[0]'>
                <input style='display: none' name='name' value='$item[1]'>
                    <button class=\"btn-danger\" type=\"submit\">Add to basket</button>
                </form>
            </div>
        </div>";
            echo "</div></div>";
        }
        ?>


    </p>
</div>

<script src="eshopping.js"></script>

</body>
</html>
