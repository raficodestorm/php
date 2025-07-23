<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container{
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }
        input{
            width: 500px;
            height: 40px;
            border-radius: 6px;
            border: 1px solid gray;
            transition: border 0.3s ease;
        }
        input:focus {
            border: 2px solid blue;
            outline: none; 
            box-shadow: 0 0 10px #00CAFF;
        }

        .btn{
            background-color: #003092;
            border-radius: 6px;
            width: 510px;
            color: white;
        }
        .btn:hover{
            /* background-color:#000957; */
            box-shadow: 0 0 10px #00CAFF;
        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit your information</h2>
        <form action="" method='POST'>
            <p>ID:</p>
            <input type="text" name="ids" maxlength="5" required><br>
            <p>Name:</p>
            <input type="text" name="names" required><br>
            <p>Email:</p>
            <input type="text" name="emails" required><br><br>
            <input class="btn" type="submit" name="submit" value="Update">
        </form>
    </div>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ids = $_POST['ids'];
    $names = $_POST['names'];
    $emails = $_POST['emails'];
    $connect = mysqli_connect("localhost", "root", "", "trainee_fans");
    if(isset($_GET['eid'])){
        $eid = $_GET['eid'];
    
        $edit = "UPDATE trainee_fans SET id='$ids', Name='$names', email='$emails' WHERE id='$eid'";
    
        $get = mysqli_query($connect, $edit);
        if($get){
            header('Location: mysql-1.php');
        }
    }else{
        echo "Error: " . mysqli_error($connect);
    }
    mysqli_close($connect);
}
?>