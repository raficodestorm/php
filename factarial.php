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
    </style>
</head>
<body>
    <div>
        <form action="#" method="POST">
            <input type="number" name="num"><br><br>
            <input type="submit"><br><br><br>
        </form>
    

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $n = $_POST['num'];
        $s = 1;
        for($i = 1; $i <= $n; $i++) {
            $s *= $i;
        }
        echo "the factarial number of $n is : $s";
    };
    ?>
    </div>
</body>
</html>