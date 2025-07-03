<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime number</title>
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
            <h3>Enter your number</h3>
            <input type="number" name="input" required>
            <input type="submit" value=" Check">
        </form>

        <?php
        if($_POST) {
            $input = $_POST["input"];
            $prime = true;
            $input = (int)$input;
            if($input <= 1) {
                $prime = false;
            } else{
                
                for($i = 2; $i < $input; $i++) {
                    if($input % $i == 0) {
                        $prime = false;
                        break;
                    }
                }
                if($prime) {
                    echo "<h3>$input is a prime number</h3>";
                }else{
                    echo "<h3>$input is not a prime number</h3>";
                }
            }

        }
        ?>
    </div>
</body>
</html>