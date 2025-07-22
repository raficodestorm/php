<?php
$connect = mysqli_connect("localhost","root","","trainee_table");

if(isset($_GET['delid'])){
    $deletid = $_GET['delid'];

    $del = "DELETE FROM trainee_details WHERE id = $deletid";

    if(mysqli_query($connect, $del)){
        header('Location: mysql-1.php');
    }
}

?>