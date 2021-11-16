
<!DOCTYPE html>
<html>

<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="classStyle.css">
	<style>
body, html {
  height: 100%;
  margin: 0;
}
.hd{

padding-top: 75px;


}
.bg {
  /* The image used */
  background-image: url("background.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}</style>
</head>
<body class="bg">
<!-- Message Alert after saving data -->
	<?php  include('studentConnect.php'); ?>
    <?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	<br>
    <!-- Edit student details -->
	<?php 
		if (isset($_GET['edit'])) 
		{
			$id = $_GET['edit'];
			$update = true;
			$record = mysqli_query($db, "SELECT * FROM  studentinfo WHERE id=$id");

		if (count($record) == 1 ) 
			{
			$n = mysqli_fetch_array($record);
			$Studentname = $n['name'];
            $rollno = $n['rollno'];
            $class = $n['class'];
			
			}
		}
	?>
	


	<h1><center> Student  Details</center> </h1>
<!-- End edit code table -->
<?php $results = mysqli_query($db, "SELECT * FROM  studentinfo"); ?>



<table>
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Roll No</th>
            <th>Class</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['rollno']; ?></td>
            <td><?php echo $row['class']; ?></td>
			<td>
				<a href="student.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="studentConnect.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
       
<!-- Class Form -->
	<form method="post" action="studentConnect.php" >
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<div class="input-group">
			<label>Student Name:</label>
			<input type="text" name="name" value="<?php echo $Studentname; ?>">
		</div>
        <div class="input-group">
			<label>Roll No:</label>
			<input type="text" name="rollno" value="<?php echo $rollno; ?>">
		</div>
        <div class="input-group">
			<label>Class:</label>
			<!--<input type="text" name="class" value=">"> -->
            <select name="class" value="<?php echo $class; ?>">
    <option disabled selected>-- Select class --</option>
    <?php
        
        $records = mysqli_query($db, "SELECT id,name From class");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
		</div>
		<div class="input-group">
			<!-- <button class="btn" type="submit" name="save" >Save</button> -->
			<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
			<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
			<button class="btn" >
			<a href="Header.php">Home</a></button>
		</div>
	</form>
</body>
</html>