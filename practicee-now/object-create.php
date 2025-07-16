<?php
require_once 'class-create.php';
$message = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];

    $students = new student($name,$id,$email);
    $students->toSave('data.txt');
    $message = "data saved successfully";
}else{
    $message = "data not found";
}

?>