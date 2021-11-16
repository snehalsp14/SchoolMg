<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'studentmanagement');

	// initialize class form variables
	$Classname = "";
	$id = 0;
	$update = false;
    //Save Class Form Data
	if (isset($_POST['save'])) {
		$Classname = $_POST['name'];
				mysqli_query($db, "INSERT INTO  class (name) VALUES ('$Classname')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: class.php');
	}
    //End Save

    //Update the class form data
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $Classname = $_POST['name'];
        
    
        mysqli_query($db, "UPDATE class SET name='$Classname' WHERE id=$id");
        $_SESSION['message'] = "Class updated!"; 
        header('location: class.php');
    }
    //End Update 

    //Delete class form Data
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM class WHERE id=$id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: class.php');
    }
    //End Delete



