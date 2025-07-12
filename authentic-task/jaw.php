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
            position: relative;
        }
        .container::before {
      content: "";
      position: absolute;
      top: -5px;
      left: -5px;
      right: -5px;
      bottom: -5px;
      background: linear-gradient(45deg, #ff0000, #00ff00, #0000ff, #ff0000);
      background-size: 400% 400%;
      z-index: -1;
      animation: rotateBorder 5s linear infinite;
    }

    .container::after {
      content: "";
      position: absolute;
      top: 5px;
      left: 5px;
      right: 5px;
      bottom: 5px;
      background: #111;
      z-index: -1;
    }

    @keyframes rotateBorder {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 400% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
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
        
        <p class="greet">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <p class="well">Welcome to New Horizon!</p>
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


