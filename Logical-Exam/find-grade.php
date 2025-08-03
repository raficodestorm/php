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
        <form method="POST">
            <h3>Enter your mark</h3>
            <input type="number" name="num">
            <input type="submit" value="Check grade">
        </form>
    
    <?php
    if($_POST) {
        $numb = $_POST['num'];
        $grade = '';
        if($numb >= 80) {
            $grade = "A+";
        } else if($numb >= 70) {
            $grade = "A";
        } else if($numb >= 60) {
            $grade = "B";
        } else{
            $grade = "F";
        }

        echo "<h2>Mark : $numb</h2>";
        echo "<h2>grade : $grade</h2>";
    }
    
    ?>
    </div>
</body>
</html>
