<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            font-size: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #ffb3c1;
        }
        .main{
            width: auto;
            height: auto;
            padding: 25px;
            background-color: #38040e;
           border-radius: 10px;
           box-shadow: 0 0 10px #aaaaaa75;
            
        }
        .head{
            width: auto;
            height: auto;
            padding: 15px;
            background-color: #250902;
            box-shadow: inset 0 0 10px #aaaaaa70;
        }
        
        .field{
            width: 300px;
            height: 30px;
            background-color: #ffb3c1;
            border-radius: 10px;
        }
        .btnlogin{
            background-color: #ff4d6d;
            color: #250902;
            width: 310px;
            height: 35px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
        }
        .btn{
            background-color: #ff4d6d;
            color: #250902;
            width: 100px;
            height: 35px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            margin-left: 100px;
        }
        
    </style>
</head>
<body>
    <div class="main">
        <div class="head">
           
    <form action="" method="POST">
        <label>Username:</label> <br>
        <input class="field" type="text" name="username">
        <br><br>
        <label>Password:</label><br>
        <input class="field" type="password" name="pass">
        <br><br>
        <input class="btnlogin" type="submit" value="Login" name="submit">
        <br><br>
        <a href="registration.php"><input class="btn" type="button" name="" value="SIGN IN"></a>
    </form>

    </div>
    </div>

    <?php
    session_start();

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        $file = file("data.txt");

        foreach($file as $tile){
            $parts = explode(" | ", trim($tile));
            if(count($parts) === 4){
            list($fullName, $userName, $passWord, $confirmPass) = $parts;

            if($userName == $username && $passWord == $pass){
                
                $_SESSION['username'] = $username;
                header("location: jaw.php");
                exit;
            }
        }
    }

        echo "Username or Password is incorrect!";
        
        
    }
    ?>
    
</body>
</html>