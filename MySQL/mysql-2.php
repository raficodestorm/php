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
            width: 400px;
            height: 40px;
            border-radius: 6px;
            border: 1px solid gray;
        }
        input:focus{
            border: 2px solid green;
        }
        .btn{
            background-color: rgb(73, 216, 7);
            border-radius: 6px;
            width: 410px;
            color: white;
        }
        .btn:hover{
            background-color:rgb(47, 136, 5);
        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration form</h2>
        <form action="" method='POST'>
            <p>ID:</p>
            <input type="text" name="id" max-length="5" required><br>
            <p>Name:</p>
            <input type="text" name="name" required><br>
            <p>Email:</p>
            <input type="text" name="email" required><br><br>
            <input class="btn" type="submit" name="submit">
        </form>
    </div>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $connect = mysqli_connect("localhost", "root", "", "trainee_table");

    $sql = "insert into trainee_details (id, name, email) values ('$id', '$name', '$email')";

    $result = mysqli_query($connect, $sql);

    if($result){
        echo "data successfully submited";
        header('Location: mysql-1.php');
    }else{
        echo "Error: " . mysqli_error($connect);
    }
    mysqli_close($connect);
}
?>