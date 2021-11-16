<?PHP
session_start();
$db = mysqli_connect('localhost', 'root', '', 'studentmanagement');
// initialize subject form variables
$Subjectname = "";
$passingMarks = "";
$OutOfMarks = "";
$id = 0;
$update = false;
//Save Class Form Data
if (isset($_POST['save'])) {
    $Subjectname = $_POST['name'];
    $passingMarks = $_POST['passingMarks'];
    $OutOfMarks = $_POST['OutOfMarks'];
            mysqli_query($db, "INSERT INTO  subjects (name,passingMarks,OutOfMarks) VALUES ('$Subjectname','$passingMarks','$OutOfMarks')"); 
    $_SESSION['message'] = "Subjects saved"; 
    header('location: subject.php');
}
//End Save

//Update the class form data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $Subjectname = $_POST['name'];
    $passingMarks = $_POST['passingMarks'];
    $OutOfMarks = $_POST['OutOfMarks'];
    mysqli_query($db, "UPDATE subjects SET name='$Subjectname', passingMarks='$passingMarks' ,OutOfMarks='$OutOfMarks' WHERE id=$id");
    
    $_SESSION['message'] = "Subject updated!"; 
    header('location: subject.php');
}
//End Update 

//Delete class form Data
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM subjects WHERE id=$id");
    $_SESSION['message'] = "Subject deleted!"; 
    header('location: subject.php');
}
//End Delete

?>