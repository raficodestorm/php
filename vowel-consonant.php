<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display:flex;
            justify-content: center;
            align-items:center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div>
        <form action="#" name="form" method="POST">
            <p>Enter your letter</p>
            <input type="text" name="input" maxlength="1" required>
            <input type="submit" value="check">
        </form>

        <?php
        if($_POST) {
            $input = $_POST['input'];
            if(preg_match('/^[a-zA-Z]$/', $input)) {
                $letter = strtolower($input);
                $vowel = ["a", "e", "i", "o", "u"];

                if(in_array($letter, $vowel)) {
                    echo "<h3 style='color:blue'>$input - is a vowel</h3>";
                } else {
                    echo "<h3 style='color:green'>$input - is a consonant</h3>";
                }
            }else {
                echo "<h3 style='color:red'>please enter a letter only</h3>";
            }
            
        }
        ?>
    </div>

</body>
</html>