<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find </title>
</head>
<body>
    <div>
        <form action="#" method="POST">
            <input type="number" name="num1" placeholder="Enter 1st number" required/><br>
            <input type="number" name="num2" placeholder="Enter 2nd number" required/><br>
            <input type="number" name="num3" placeholder="Enter 3rd number" required/><br><br>
            <input type="submit" value="find largest number"><br><br><br>
        </form>
    </div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['num1'];
        $b = $_POST['num2'];
        $c = $_POST['num3'];

        if($a >= $b && $a >= $c) {
            echo "the largest number is $a <br>";
        } else if($b >= $a && $b >= $c) {
            echo "the largest number is $b <br>";
        } else{
            echo "the largest number is $c <br>";
        }
    };
    ?>
</body>
</html>