<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        table{
            border-collapse: collapse;
            border: 2px solid black;
            width: 1000px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }
        th{
            background-color: #393E46;
            color: white;
        }
        th, td {
                border: 1px solid gray;
                padding: 8px 12px;
                text-align: center;
            }
        tr:nth-child(even){
            background-color: #FDF7F4;
        }
        a{
            padding: 5px;
            background-color: blue;
            color: white;
        }
        .edit{
            background-color: #003092;
            color: white;
            border-radius: 5px;
            padding: 4px 10px;
            margin-right: 6px;
            text-decoration: none;
        }
        .delete{
            background-color: red;
            color: black;
            border-radius: 5px;
            padding: 4px 10px;
            text-decoration: none;
        }
        .home{
            padding: 8px 15px;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <a class="home" href="procedure12.php">Home</a><br>
    <table>
        <tr>
            <th>V.Name</th>
            <th>Contact</th>
        </tr>
    


<?php
$connect = mysqli_connect("localhost", "root", "", "trainee_table");
$table = $connect->query("select * from vendor");
while(list($ven, $con) =$table->fetch_row()){
    echo "
    <tr>
        <td>$ven</td>
        <td>$con</td>
    </tr>";
}

?>

</table>
<br>
<br>
<!-- <form action="" method="POST">
    <h2>Delete your data</h2>
    <input type="text" name="ids"><br>
    <input type="submit" name="sub" value="delete">
</form> -->
</body>
</html>