
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
}
</style>
</head>
<body class="bg">
<!-- Message Alert after saving data -->
	<?php  include('resultConnect.php'); ?>
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
			$record = mysqli_query($db, "SELECT * FROM  studentresult WHERE id=$id");

		if (count($record) == 1 ) 
			{
			$n = mysqli_fetch_array($record);
			$Studentname = $n['Sname'];
            $rollno = $n['rollno'];
            $class = $n['class'];
			$math = $n['math'];
			$science = $n['science'];
			$history = $n['history'];
			
			}
		}
	?>
	


<h1><center> Student Result Details</center> </h1>
<!-- End edit code table -->
<?php $results = mysqli_query($db, "SELECT * FROM  studentresult"); ?>



<table>
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Roll No</th>
            <th>Class</th>
			<th>Maths Score</th>
			<th>Science Score</th>
			<th>History Score</th>
			<th>Total score </th>
			<th>Percentage</th>
			<th>Status</th>
		
		
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { 
		$sum="";
		$status="";
		$sum=$row['math']+$row['science']+$row['history'];
		$percentage=$sum/300*100;
		$per=round($percentage, 2);
				if($per >50 ){
					
			$status='<span style="color: green;">Promoted</span>';
		}
		else{
			$status='<span style="color: red;">Failed</span>';
		}
		?>
		<tr>
			<td><?php echo $row['Sname']; ?></td>
			<td><?php echo $row['rollno']; ?></td>
            <td><?php echo $row['class']; ?></td>
			<td><?php echo $row['math']; ?></td>
			<td><?php echo $row['science']; ?></td>
			<td><?php echo $row['history']; ?></td>
			<td><?php echo $sum; ?></td>
			<td><?php echo $per; ?></td>
			<td><?php echo $status; ?></td>
		
		
			<td>
				<a href="Addresult.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="resultConnect.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
			
		</tr>
	<?php } ?>
</table>
       
<!-- Class Form -->
	<form method="post" action="resultConnect.php" >
		<input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="input-group">
			<label>Student Name:</label>
			<input type="text" name="Sname" value="<?php echo $Studentname; ?>">
		</div>
        <div class="input-group">
        <label>Roll No:</label>
			<!--<input type="text" name="class" value=">"> -->
            <select name="rollno" value="<?php echo $rollno; ?>">
    <option disabled selected>-- Select Roll No --</option>
    <?php
        
        $records = mysqli_query($db, "SELECT id,rollno From studentinfo");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['rollno'] ."'>" .$data['rollno'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
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
			<label><b>Subjects:</b></label>
                <div >
                <label>Maths:</label>
                <input type="text" name="math" value="<?php echo $math; ?>">
                <label>Science:</label>
                <input type="text" name="science" value="<?php echo $science; ?>">
                <label>History:</label>
                <input type="text" name="history" value="<?php echo $history; ?>">
                </div>   
			
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