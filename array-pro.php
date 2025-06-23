<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .form{
            margin-bottom: 50px; 
            width: 400px;
            height: 200px;
            background-color: rgb(6, 11, 82);
            text-align: center;
            color: white;
            border-radius: 10px;
            border: 3px solid transparent;
            animation: lightning 1s infinite;
        }
         @keyframes lightning {
      0% {
        border-color: red;
      }

      25% {
        border-color: yellow;
      }

      50% {
        border-color: lime;
      }

      75% {
        border-color: cyan;
      }

      100% {
        border-color: magenta;
      }
    }
        legend{
            text-align: center;
        }
        
    </style>
</head>
<body>
    <div class="form">
    <h2>Search Students Result</h2>
    <form action="#" method="POST">
        <fieldset>
        <legend>Check Your Result</legend>
        <p>Enter your roll</p>
        <input type="number" name="roll" required>
        <input type="submit" value="Search">
        </fieldset>
    </form>
    </div>

    <br><br>
    <div class="second">
    <?php
    $students = array(
        array("name"=>"Md. Rasel Hossain", "ID"=>"1287933", "grade"=>"A+"),
        array("name"=>"Hares Islam", "ID"=>"1287983", "grade"=>"A"),
        array("name"=>"Mst. Farhana Akter", "ID"=>"1287997", "grade"=>"A+"),
        array("name"=>"Md. Aminul Islam", "ID"=>"1288015", "grade"=>"A"),
        array("name"=>"Sharmin Akter", "ID"=>"1288188", "grade"=>"c"),
        array("name"=>"Mahidul Kabir", "ID"=>"1288235", "grade"=>"A+"),
        array("name"=>"Md. Mahmudul Hasan Sifat", "ID"=>"1288265", "grade"=>"A"),
        array("name"=>"Assaduzzaman Shaon", "ID"=>"1288328", "grade"=>"F+"),
        array("name"=>"Azmira Khatun", "ID"=>"1288399", "grade"=>"D"),
        array("name"=>"Mohammad Alamgir Rejvi", "ID"=>"1288420", "grade"=>"C+"),
        array("name"=>"Md. Safiul Alam Rafi", "ID"=>"1288480", "grade"=>"A+"),
        array("name"=>"Ashikuzzaman Biswas", "ID"=>"1288603", "grade"=>"A+"),
        array("name"=>"Rafia Akter", "ID"=>"1288607", "grade"=>"B"),
        array("name"=>"Md. Osman Goni", "ID"=>"1288825", "grade"=>"A+"),
        array("name"=>"Nisat Hassan", "ID"=>"1288841", "grade"=>"A")
        
    );

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $searchRoll = $_POST["roll"];
        $found = false;

        foreach($students as $student) {
            if($student["ID"] == $searchRoll){
                echo "<h2>Result of " . $student["name"]."</h2><br>";
                echo "Name : " . $student["name"]. "<br><br>";
                echo "ID : " . $student["ID"]. "<br><br>";
                echo "Grade : " . $student["grade"]. "<br>";
                $found = true;
                break;
            }
            
        }
        if (!$found) {
            echo '<p style="color: red;">No student found</p>';
        }
    }
    ?>
    </div>
</body>
</html>