


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
$connect = mysqli_connect("localhost","root","","trainee_fans");


if(isset($_GET['delid'])){
    $deletid = $_GET['delid'];

    $del = "DELETE FROM trainee_details WHERE id = '$deletid'";

    $get = mysqli_query($connect, $del);
    if($get){
        header('Location: mysql-1.php');
    }
}

?>

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
    <a class="home" href="mysql-2.php">Home</a><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    


<?php
$table = $connect->query("select * from trainee_fans");
while(list($id, $username,$email) =$table->fetch_row()){
    echo "
    <tr>
        <td>$id</td>
        <td>$username</td>
        <td>$email</td>
        <td>
        <a class='edit' href='edit.php?eid=$id'>edit</a>
        <a class='delete' href='mysql-1.php?delid=$id' onclick='return confirm(\"Are you sure?\")'>delete</a>
        </td>
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
<?php
// if($_post['sub']){
//     $id = $_POST['ids'];

//     $sql = "DELETE FROM trainee_details WHERE id = $id";

//     $delete = mysqli_query($connect, $sql);

//     if($delete){
//         echo "data successfully deleted";
//     }else{
//         echo "Error: " . mysqli_error($connect);
//     }
//     mysqli_close($connect);
// }
?>


