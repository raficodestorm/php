<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
            font-size: 20px;
            border: none;
            border: 2px solid rgb(2, 2, 55);
        
        }

    </style>
</head>
<body>
    <div>
<div class="main">
        <div class="head">
            <img src="image/no-star.png" alt="RAfi">
            <p>~No-Star~</p>
        </div>
        <br>
    <form action="" method="POST">
        <h2>Registration Form</h2>
        Username: <input class="field" type="text" name="username" required>
        <br><br>
        Password: <input class="field" type="password" name="password" required>
        <br><br><br>
        <input class="btnlogin" type="submit" name="submit">
    </form>
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
        return "$this->name|$this->password".PHP_EOL;
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