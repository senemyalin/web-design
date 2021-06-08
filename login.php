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
                $username = $_COOKIE['username'];
                echo "<li><a href='#'>Welcome, $username</a></li>";
                echo "<li><a href=\"/php/logout.php\">Logout</a></li>";
            } else
                echo "<li><a href=\"login.php\">Login</a></li>";
            ?>
        </ul>
    </nav>
</div>

<form method="POST" style="display: flex; justify-content: center; flex-direction: column; align-items: center; height:80%;">
    <p style="width: 200px;margin-bottom: 10px;margin-top: 10px">Id:</p>
    <input name="username" class="form-control" style="text-align: center;width: 200px;" id="user_id">
    <p style="width: 200px;margin-bottom: 10px;margin-top: 10px">Password:</p>
    <input name="password" type="password" class="form-control" style="text-align: center;width: 200px;" id="user_password">
    <button type="submit" formaction="php/login.php" class="btn btn-danger" style="text-align: center;width: 200px; margin: 5px;" onclick="">LOGIN</button>
    <button type="submit" formaction="php/signup.php" class="btn btn-danger" style="text-align: center;width: 200px; margin: 5px;" onclick="">SIGNUP</button>
    <br>
</form>


</body>
</html>
