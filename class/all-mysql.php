


<?php
// $host = "localhost";
// $user = "root";
// $pass = "";
// $dbname = "trainee_table";
// $connect = new mysqli($host,$user,$pass,$dbname);

// if($connect->connect_error){
//     die("connection failed");
// }
// echo "connection successfully";

?>


<?php
$connect = mysqli_connect("localhost","root","","trainee_table");

if(!$connect){
    die("connection failed");
}
echo "connecton successfully <br><br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            width: 300px;
            height: auto;
        }
        th, td {
                border: 1px solid #999;
                padding: 8px 12px;
                text-align: center;
            }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>Email</th>
        </tr>
    


<?php
$table = $connect->query("select * from trainee_details");
while(list($id, $username,$email) =$table->fetch_row()){
    echo "
    <tr>
        <td>$id</td>
        <td>$username</td>
        <td>$email</td>
    </tr>";
}

?>

</table>
</body>
</html>


