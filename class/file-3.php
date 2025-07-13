<?php
if(isset($_FILES['img'])){
    $filename = $_FILES['img']['name'];
    $filetype = $_FILES['img']['type'];
    $filesize = $_FILES['img']['size'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $filesize = $filesize/1024;
    if($filesize>500){
        echo "file is too larg";
    }else{
    move_uploaded_file($tmp_name, "image/".$filename);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .main{
            padding: 33px;
            border: 2px solid gray;
        }
        .img{
            border: 2px solid gray;
            padding: 0px 11px;
            margin-left: 10px;
            width: 150px auto;
            height: 153px;
        }
        input{
            border-radius: 5px;
            
        }
        .details{
            width: 150px auto;
            height: 153px;
            border: 2px solid gray;
            padding: 0px 10px;
            margin-left: 10px;
            
        }
        
    </style>
</head>
<body>
    <div class="main">
        <h2>Upload your file</h2>
        <form action="" method='POST' enctype="multipart/form-data">
            <input type="file" name="img"/>
            <input type="submit" name="submit">
        </form>
    </div>
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
    echo "<p>File name: $filename</p>";
    echo "<p>File type: $filetype</p>";
    echo "<p>File size: $filesize kb</p>";
    } 
    ?>
</div>
</body>
</html>

