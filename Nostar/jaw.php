<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
            background-color: #250902;
        }
        .container {
            background-color: #38040e;
            padding: 30px;
            margin: auto;
            width: 700px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaaaaa75;
            color: #ffb3c1;
        }
        .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ff4d6d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background: #c9302c;
        }
        .well{
            color:rgb(249, 54, 90);
            font-size: 45px;
            font-weight: bolder;

        }
        .greet{
            font-size: 30px;
            font-weight: bold;
        }
        .info{
            font-size: 25px;
        }
    </style>
</head>
<body>

    <div class="container">
        <p>You have successfully logged in.</p>
        <p class="well">Welcome to No-Star!</p>
        <p class="greet">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <p class="info">নিশ্চই তুমি No-Star এর একজন সদস্য। <br>
            এখন খেকে তোমার জীবনে দুঃখ বলে কোনো শব্দ থাকবেনা,<br>
            পড়াশুনার কোনো প্যারা থাকবেনা, <br>
            শুধু খাওয়া-দাওয়া আর পার্টি চলবে...😎🤪
        </p>

        <form method="POST">
            <button class="logout-btn" type="submit" name="logout">Logout</button>
        </form>
    </div>

    <?php

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy(); // Destroy all session data
    header("Location: login.php");
    exit();
}
?>

</body>
</html>


