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
            background-color: #250902;
            color: #ffb3c1;
        }
        p{
            display: inline-block;
            color:rgb(249, 54, 90);
            text-shadow: 2px 3px 1px white;
            font-size: 70px;
            font-weight: bold;
            
        }
        img{
            width: 55px;
            height:55px;
            margin-right: 20px;
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
        .pop{
            display: none;
            transition: opacity 0.5s ease, display 0.5s ease;
        }
        .main:hover .pop{
            display: block;
            
        }
        .name{
            width: auto;
            height: 160px;
        }
    </style>
</head>
<body>
    <div class="name">
            <p>N</p>
            <img src="image/no-star-round.png" alt="No">
            <p>STAR</p>
        </div>
    <div class="main">
        <div class="head">
           
    <form action="" method="POST">
        <div class="pop">
        <label>Username:</label> <br>
        <input class="field" type="text" name="username">
        <br><br>
        <label>Password:</label><br>
        <input class="field" type="password" name="pass">
        <br><br>
        </div>
        <input class="btnlogin" type="submit" value="Login" name="submit">
        <div class="pop">
             <br><br><br>
        <a href="registration.php"><input class="btn" type="button" name="" value="SIGN IN"></a>
        </div>
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
            list($userName, $passWord) = explode(" | ", $tile);

            if($userName == $username && $passWord == $pass){
                $_SESSION['username'] = $username;
                header("location: jaw.php");
                exit;
            }else{
                echo "Username or Password is incorrect!";
            }
        }
        
        
    }
    ?>
    
</body>
</html>