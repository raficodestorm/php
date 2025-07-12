<?php
session_start();
require_once 'form-class.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $name = $_POST['name'];
   $batch = $_POST['batch'];
    if(isset($_POST['submit'])) {
        $student = new Student($id, $name, $batch);
        $student->saveToFile("data.txt");
        $message = "Student data saved successfully.";
    }else{
        $message = "Student data saved successfully.";
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
