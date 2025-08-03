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
            if(!is_numeric($input) || $input < 0 || $input != floor($input)) {
                echo "<h3>Please enter a valid number</h3>";
                exit();
            }
            $input = (int)$input;
            if($input == 0 || $input == 1) {
                echo "<h3>$input is neither prime nor composite</h3>";
            } else{
                $prime = true;
                for($i = 2; $i < $input; $i++) {
                    if($input % $i == 0) {
                        $prime = false;
                        break;
                    }
                }
                if($prime) {
                    echo "<h3>$input is a prime number</h3>";
                }else{
                    echo "<h3>$input is a composite number</h3>";
                }
            }

        }
        ?>
    </div>
</body>
</html>