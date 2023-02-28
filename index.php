<?php
include 'proseslogin.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <center>
    <h1>Halaman Login</h1>
    <form action="proseslogin.php" method="post">
        Username : <br>
        <input type="text" name="username" id=""><br>
        Password : <br>
        <input type="password" name="password" id=""><br><br>
        <button type="submit" name="login">Login</button>
    </form>
        <a href="register.php"><button>Register</button></a>
    </center>
</body>
</html>
