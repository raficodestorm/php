<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <h2>Registration Form</h2>
        Username: <input type="text" name="username" required>
        <br><br>
        Password: <input type="password" name="password" required>
        <br><br><br>
        <input type="submit" name="submit">
    </form>

    <?php
    if(isset($_POST["submit"])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        


    }
    ?>
</body>
</html>