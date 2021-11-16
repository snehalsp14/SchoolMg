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
	<?php  include('subjectConnect.php'); ?>
	<?php 
		if (isset($_GET['edit'])) 
		{
			$id = $_GET['edit'];
			$update = true;
			$record = mysqli_query($db, "SELECT * FROM  subjects WHERE id=$id");

		if (count($record) == 1 ) 
			{
			$n = mysqli_fetch_array($record);
			$Subjectname = $n['name'];
            $passingMarks = $n['passingMarks'];
            $OutOfMarks = $n['OutOfMarks'];
			
			}
		}
	?>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	<br>

<!-- Edit Data php code -->
<h1><center>Subject Details</center> </h1>
<!-- End edit code -->
<?php $results = mysqli_query($db, "SELECT * FROM  subjects"); ?>

<table>
	<thead>
		<tr>
			<th>Subject Name</th>
			<th>Passing Marks</th>
            <th>Out Of Marks</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['passingMarks']; ?></td>
            <td><?php echo $row['OutOfMarks']; ?></td>
			<td>
				<a href="subject.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="subjectConnect.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<!-- Class Form -->
	<form method="post" action="subjectConnect.php" >
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<div class="input-group">
			<label>Subject Name:</label>
			<input type="text" name="name" value="<?php echo $Subjectname; ?>">
		</div>
        <div class="input-group">
			<label>Passing Marks:</label>
			<input type="text" name="passingMarks" value="<?php echo $passingMarks; ?>">
		</div>
        <div class="input-group">
			<label>Out OF Mark:</label>
			<input type="text" name="OutOfMarks" value="<?php echo $OutOfMarks; ?>">
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