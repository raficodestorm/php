<?php
session_start();
?>
<?php

if(isset($_FILES['img'])) {
     $filename = $_FILES['img']['name'];
    $filetype = $_FILES['img']['type'];
    $filesize = $_FILES['img']['size'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $filesize = $filesize/1024;

    if($filesize<500 && $filetype== 'image/png'){
          move_uploaded_file($tmp_name, "image/".$filename);
    }
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


if (isset($_POST['logout'])) {
    session_destroy(); 
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
            
        }
        .container {
            background-color: #38040e;
            padding: 30px;
            margin: auto;
            width: 700px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaaaaa75;
            color: #ffb3c1;
            position: relative;
        
        .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ff4d6d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background: #c9302c;
        }
        .well{
            color:rgb(249, 54, 90);
            font-size: 45px;
            font-weight: bolder;

        }
        .greet{
            font-size: 30px;
            font-weight: bold;
        }
        .info{
            font-size: 25px;
        }
        .img{
            float: left;
        }
    </style>
</head>
<body>
        
    <div class="container">
        <p>You have successfully logged in.</p>
        
        <p class="greet">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <p class="well">Welcome to IsDB-BISEW!</p>
        <form method="POST" enctype="multipart/form-data">
            <p>Upload your file:</p>
            <input type="file" name="img">
            <input type="submit" name="submit">
            <br><br>
            <div class="img">
        <h4 style="color: gray;">Your uploaded file</h4>
    <?php
if (!empty($filename)) {
    echo "<img style='width:120px; height:100px;' src='image/$filename'>";
}
?>
</div>
<div class="details">
    <h4 style="color: gray;">Details</h4>
    <?php
    if(isset($_POST['submit'])){
        if(!($filesize<500 && $filetype== 'image/png')){
         echo "invalid file";
    }else{
    echo "<p>File name: $filename</p>";
    echo "<p>File type: $filetype</p>";
    echo "<p>File size: $filesize kb</p>";
    } 
}
    ?>
</div>
            <button class="logout-btn" type="submit" name="logout">Logout</button>
        </form>
    </div>

    
</body>
</html>


