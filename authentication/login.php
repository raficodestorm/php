<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .main{
            width: auto;
            height: auto;
            padding: 15px;
            border: 2px solid rgb(2, 2, 55);
        }
        .head{
            width: 100%;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(220, 224, 224);
            border: 2px solid rgb(2, 2, 55);
        }
        
        p{
            display: inline-block;
            color: rgb(7, 135, 7);
            font-size: 45px;
            
        }
        img{
            width: 70px;
            height: 70px;
        }
        .field{
            width: 250px;
            height: 30px;
        }
        .btnlogin{
            background-color: rgb(220, 224, 224);
            width: 100%;
            border: none;
            font-size: 20px;
            border: 2px solid rgb(2, 2, 55);
        
        }

    </style>
</head>
<body>
    <div class="main">
        <div class="head">
            <img src="image/no-star.png" alt="RAfi">
            <p>~No-Star~</p>
        </div>
        <br>
    <form action="" method="POST">
        Username: <input class="field" type="text" name="username">
        <br><br>
        Password : <input class="field" type="password" name="pass">
        <br><br>
        <input class="btnlogin" type="submit" value="Login" name="submit">
    </form>
    </div>

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
    
</body>
</html>