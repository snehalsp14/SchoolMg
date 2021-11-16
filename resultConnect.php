<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'studentmanagement');
// initialize subject form variables
$Studentname = "";
$rollno = "";
$class = "";
$math = "";
$science = "";
$history = "";
$score="";
$id = 0;
$update = false;
//Save Class Form Data
if (isset($_POST['save'])) {
    $Studentname = $_POST['Sname'];
    $rollno = $_POST['rollno'];
    $class = $_POST['class'];
    $math = $_POST['math'];
    $science = $_POST['science'];
    $history = $_POST['history'];
    $score=$math+$science+$history;
    var_dump($score);
            mysqli_query($db, "INSERT INTO  studentresult (Sname,rollno,class,math,science,history) VALUES ('$Studentname','$rollno','$class','$math','$science','$history')"); 
    $_SESSION['message'] = "Result details saved"; 
    header('location: Addresult.php');
}
//End Save

//Update the class form data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $Studentname = $_POST['Sname'];
    $rollno = $_POST['rollno'];
    $class = $_POST['class'];
    $math = $_POST['math'];
    $science = $_POST['science'];
    $history = $_POST['history'];
    mysqli_query($db, "UPDATE studentresult SET Sname='$Studentname', rollno='$rollno' ,class='$class',math='$math',science='$science',history='$history' WHERE id=$id");
    
    $_SESSION['message'] = "Result details updated!"; 
    header('location: Addresult.php');
}
//End Update 

//Delete class form Data
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM studentresult WHERE id=$id");
    $_SESSION['message'] = "student details deleted!"; 
    header('location: Addresult.php');
}
//End Delete
if (isset($_GET['view'])) {
    $Sid = $_GET['id'];
    mysqli_query($db, "select * FROM studentresult WHERE id=$id");
    header('location: ViewResult.php');
}

?>