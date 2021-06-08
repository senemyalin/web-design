<!DOCTYPE html>
<html lang="en" xmlns:display="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>E-BOOK</title>
    <link rel="stylesheet" href="eshopping.css" type="text/css">

</head>
<body onload="getTotalPrice()">
<div class="container" style="max-width: 100%; width: 100%">
    <h1 class="logo"></h1>

    <nav>
        <ul>
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
                $username=$_COOKIE['username'];
                echo "<li><a href='#'>Welcome, $username</a></li>";
                echo "<li><a href=\"/php/logout.php\">Logout</a></li>";
            }
            else
                echo "<li><a href=\"login.php\">Login</a></li>";
            ?>
        </ul>
    </nav>
</div>

<div>
    <p id="shoppingBagList"></p>
    <p id="totalPrice"></p>
</div>

<button class="btn btn-outline-light" style="margin-top:10px; margin-left:75px;" type="button" onclick="document.getElementById('address').style.display='flex'">BUY</button>

<div id="address" style="display:none">
    <div>
        <p style="width: 200px;margin-left: 20px;margin-bottom: 10px;margin-top: 10px">Address:</p>
        <input class="form-control" style="width: 200px; margin-left:10px" id="fulladdress">
        <button type="button" class="btn btn-danger" style="margin-left:35px;margin-top:15px" onclick="document.getElementById('creditorwire').style.display='flex'">Save the
            address
        </button>
        <br>
    </div>
    <div id="creditorwire" style="display:none">
        <button class="btn btn-outline-light" style="margin-top:10px; margin-left:40px;" type="button" onclick="document.getElementById('creditcard').style.display='unset'">Use
            Credit Card
        </button>
        <div id="creditcard" style="display:none">
            <p style="width: 200px;margin-left: 20px;margin-bottom: 10px;margin-top: 20px">Name:</p>
            <input class="form-control" style="width: 200px; margin-left:20px" id="name">
            <p style="width: 200px;margin-left: 20px;margin-bottom: 10px;margin-top: 10px">Surname:</p>
            <input class="form-control" style="width: 200px; margin-left:20px" id="surname">
            <p style="width: 200px;margin-left: 20px;margin-bottom: 10px;margin-top: 10px">Card No:</p>
            <input class="form-control" style="width: 200px; margin-left:20px" id="card no">
            <form method="POST" action="php/buy.php">
                <button class="btn btn-outline-light" type="submit">Purchase</button>
            </form>
        </div>
        <button class="btn btn-outline-light" style="margin-top:10px; margin-left:40px;" type="button" onclick="document.getElementById('wiretransfer').style.display='unset'">Use
            Wire Transfer
        </button>
        <div id="wiretransfer" style="display:none">
            <p style="width: 200px;margin-left: 20px;margin-bottom: 10px;margin-top: 20px">IBAN:</p>
            <input class="form-control" style="width: 200px; margin-left:20px" id="IBAN">
            <form method="POST" action="php/buy.php">
                <button class="btn btn-outline-light" type="submit">Purchase</button>
            </form>
        </div>
    </div>
</div>


<script src="eshopping.js"></script>

</body>
</html>
