<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
        <h2>Registration Form</h2>
        <div class="pop">
        <label>Username:</label><br> 
        <input class="field" type="text" name="username" required>
        <br><br>
        <label>Password:</label><br>
        <input class="field" type="password" name="password" required>
        <br><br>
        <input class="btnlogin" type="submit" name="submit">
        <br><br><br>
        <a href="login.php"><input class="btn" type="button" name="" value="LOGIN"></a>
        </div>
    </form>
    </div>
</div>

    <?php

class UserReg {
    public $name;
    public $password;
    public $file;

    public function __construct($name, $pass, $file="data.txt"){
        $this->name = $name;
        $this->password = $pass;
        $this->file = $file;
    }

    public function formData(){
        return "$this->name | $this->password".PHP_EOL;
    }

    public function formSave(){
        $userData = $this->formData();
        file_put_contents($this->file, $userData, FILE_APPEND);
        echo "<h3 style='color:green'>Registration successful</h3>";
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST["username"], $_POST["password"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userInfo = new UserReg($username, $password);
    $userInfo->formSave();
} else {
    echo "Invalid data";
}
}
    ?>
    </div>
</body>
</html>