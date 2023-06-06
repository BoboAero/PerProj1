<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/univ.css">
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
<div class="logindiv">
    <h1>RandomDB Login Page</h1>
    <form method="post" action="index.php" class=".form1">
        <p>username</p>
        <input type="text" name="User">
        <p>password</p>
        <input type="password" name="Pass">
        <p></p>
        <input type="submit">
    </form>
    <a href="createaccount.php">Create Account</a>
    <?php
        if (isset($_POST['User']) && isset($_POST['Pass'])) {
            $user = $_POST['User'];
            $pass = $_POST['Pass'];

            $connection = new PDO('mysql:host=localhost;dbname=randomdb', 'root', '');
            $query = "SELECT * FROM users WHERE username = :user AND password = :pass";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result == null){
                echo "<p style='color: red'>USERNAME OR PASSWORD INCORRECT</p>";
            }
            else{
                session_start();
                $_SESSION['user'] = $user;
                header('Location: dashboard.php');
            }
        }
        ?>
</div>
</body>
</html>