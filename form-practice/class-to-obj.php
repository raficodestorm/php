<?php
session_start();
require_once 'form-class.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
    if(isset($_POST['submit'])) {
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $idcheck = "/^[a-zA-Z0-9._%+-]{5}$/";

        if(preg_match($pattern, $email) && preg_match($idcheck, $id)){
            $student = new Student($id, $name, $email);
        $student->saveToFile("data.txt");
        $message = "Student data saved successfully.";
        }elseif(!preg_match($pattern, $email)){
            $message = "invalid email";
        }elseif(!preg_match($idcheck, $id)){
            $message = "invalid id";
        }

        // if(!preg_match($pattern, $email)){
        //     $message = "invalid email";
        // }elseif(!preg_match($idcheck, $id)){
        //     $message = "invalid id";
        // }else{
        // $student = new Student($id, $name, $email);
        // $student->saveToFile("data.txt");
        // $message = "Student data saved successfully.";
        // }
    }else{
        $message = "Student data not found.";
    }
   
   
    // try {
    //     $student = new Student(
    //         $_POST['id'],
    //         $_POST['name'],
    //         $_POST['batch']
    //     );
    //     $student->saveToFile("data.txt");
    //     $message = "Student data saved successfully.";
    // } catch (Exception $e) {
    //     $message = "Error: " . $e->getMessage();
    // }
}
?>
