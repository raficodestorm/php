<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: felx;
            justify-content: center;
            align-items: center;
            background-color: blue;
            
            height: 100vh;
        }
   

    </style>
</head>
<body>
    <div>
    <form action="" method="POST">
        username: <input class="field" type="text" name="username">
        <br>
        password: <input class="field" type="password" name="pass">
        <br><br>
        <input class="btnlogin" type="submit" value="Login" name="submit">
    </form>
    

    <?php
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        $file = file("data.txt");

        foreach($file as $tile){
            list($userName, $passWord) = explode("|", $tile);
            if($userName == $username && $passWord == $pass){
                header("location: jaw.php");
            }else{
                echo "Username or Password is incorrect!";
            }
        }
    }
    ?>
    </div>
</body>
</html>