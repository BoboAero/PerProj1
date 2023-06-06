<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="createaccount.php">
        <p>email</p>
        <input type="email" name="Email">
        <p>username</p>
        <input type="text" name="User">
        <p>password</p>
        <input type="password" name="Pass">
        <p></p>
        <input type="submit">
    </form>
    <a href="index.php">Continue to login</a>

    <?php
        if (isset($_POST['Email']) && isset($_POST['User']) && isset($_POST['Pass'])) {
            $connection = new PDO('mysql:host=localhost;dbname=randomdb', 'root', '');

            $mail = $_POST['Email'];
            $user = $_POST['User'];
            $pass = $_POST['Pass'];

            $query = "SELECT username, email FROM users WHERE username = :user OR email = :mail";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':mail', $mail);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result != null){
                echo "<p style='color: red'>ERROR: USERNAME OR EMAIL IS ALREADY TAKEN</p>";
            }
            else {
                $query = "INSERT INTO users (username, password, email) VALUES (:user, :pass, :mail)";
                $prep = $connection->prepare($query);
                $prep->bindParam(':user', $user);
                $prep->bindParam(':pass', $pass);
                $prep->bindParam(':mail', $mail);
                $prep->execute();
                echo "<p style='color: green'>Acount creation success</p>";
            }
        }
    ?>
</body>
</html>