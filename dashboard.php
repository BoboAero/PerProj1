<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD</title>
</head>
<body>
    <h1>DASHBOARD</h1>
    <?php
        session_start();
        $username = $_SESSION['user'];
        echo "<h3>Welcome, $username</h3>"
    ?>
<a href="index.php">LOGOUT</a>
</body>
</html>
