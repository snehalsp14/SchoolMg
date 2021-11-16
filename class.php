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
	<?php  include('connect.php'); ?>
	<?php 
		if (isset($_GET['edit'])) 
		{
			$id = $_GET['edit'];
			$update = true;
			$record = mysqli_query($db, "SELECT * FROM class WHERE id=$id");

		if (count($record) == 1 ) 
			{
			$n = mysqli_fetch_array($record);
			$Classname = $n['name'];
			
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

<!-- End edit code -->
<h1><center>Class Details</center> </h1>
<?php $results = mysqli_query($db, "SELECT * FROM class"); ?>

<table>
	<thead>
		<tr>
			<th>Class Name</th>
			
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			
			<td>
				<a href="class.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="connect.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<!-- Class Form -->
	<form method="post" action="connect.php" >
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<div class="input-group">
			<label>Class Name:</label>
			<input type="text" name="name" value="<?php echo $Classname; ?>">
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