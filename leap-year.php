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
        <form method = "POST">
            <h4>Enter year</h4>
            <input type="number" name="year">
            <input type="submit" value="Check">
        </form>
    <br>

    <?php
    if($_POST) {
        $year = $_POST['year'];
        if(($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)){
            echo "<h3 style='color:green;'> $year is a leap year </h3>";
        } else {
            echo "<h3 style='color:red;'> $year is not a leap year </h3>";
        }
    }
    ?>
    </div>
</body>
</html>