<?php require_once "object-create.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            height: 100h;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="container1">
        <h2>Registration form</h2>
        <div class="mass">
            <?php echo $message; ?>
        </div>
        <form action="" method='POST'>
            <p>Name:</p>
            <input type="text" name="name" required><br>
            <p>ID:</p>
            <input type="text" name="id" required><br>
            <p>Email:</p>
            <input type="text" name="email" required><br><br>
            <input type="submit" name="submit">
        </form>
    </div>

    <div class="table">
        <?php  $student::display("data.txt") ?>;
    </div>
</body>
</html>