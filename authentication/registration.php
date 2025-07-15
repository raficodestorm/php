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
            background-color:rgb(224, 222, 221);
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
        <h2>Registration Form</h2>
        <label>Fullname:</label><br> 
        <input class="field" type="text" name="fullname" required>
        <br><br>
        <label>Username:</label><br> 
        <input class="field" type="text" name="username" required>
        <br><br>
        <label>Password:</label><br>
        <input class="field" type="password" name="password" required>
        <br><br>
        <label>Repeat Password:</label><br>
        <input class="field" type="password" name="password2" required>
        <br><br>
        <input class="btnlogin" type="submit" name="submit">
        <br><br><br>
        <a href="login.php"><input class="btn" type="button" name="" value="LOGIN"></a>
        
    </form>
    </div>
</div>
        
    

    <?php

class UserReg {
    public $fullname;
    public $username;
    public $password;
    public $password2;
    public $file;

    public function __construct($fullname, $username, $pass, $pass2, $file="data.txt"){
        $this->fullname = $fullname;
        $this->username = $username;
        $this->password = $pass;
        $this->password2 = $pass2;
        $this->file = $file;
    }

    public function formData(){
        return "$this->fullname | $this->username | $this->password | $this->password2".PHP_EOL;
    }

    public function formSave(){
        $userData = $this->formData();
        file_put_contents($this->file, $userData, FILE_APPEND);
        echo "<h3 style='color:green'>Registration successful</h3>";
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['fullname'], $_POST["username"], $_POST["password"], $_POST['password2'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if($password == $password2) {
    $userInfo = new UserReg($fullname, $username, $password, $password2);
    $userInfo->formSave();
    }else{
        echo "<p style='color:red;'>Password does not match</p>";
    }
} else {
    echo "Invalid data";
}
}
    ?>
    
        
</body>
</html>