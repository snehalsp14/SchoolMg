<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'studentmanagement');
// initialize subject form variables
$Studentname = "";
$rollno = "";
$class = "";
$id = 0;
$update = false;
//Save Class Form Data
if (isset($_POST['save'])) {
    $Studentname = $_POST['name'];
    $rollno = $_POST['rollno'];
    $class = $_POST['class'];
            mysqli_query($db, "INSERT INTO  studentinfo (name,rollno,class) VALUES ('$Studentname','$rollno','$class')"); 
    $_SESSION['message'] = "student details saved"; 
    header('location: student.php');
}
//End Save

//Update the class form data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $Studentname = $_POST['name'];
    $rollno = $_POST['rollno'];
    $class = $_POST['class'];
    mysqli_query($db, "UPDATE studentinfo SET name='$Studentname', rollno='$rollno' ,class='$class' WHERE id=$id");
    
    $_SESSION['message'] = "student details updated!"; 
    header('location: student.php');
}
//End Update 

//Delete class form Data
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM studentinfo WHERE id=$id");
    $_SESSION['message'] = "student details deleted!"; 
    header('location: student.php');
}
//End Delete


?>