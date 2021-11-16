<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="slide.css">
<style>
body,html {
    height: 100%;
    margin:0;}
.bg {
  /* The image used */
  background-image: url("background.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-position:fixed;
}
.topnav {
  overflow: hidden;
  background-color: transparent;
}

.topnav a {
  float: left;
  display: block;
  color: Red;
  text-align: center;
  padding: 20px 20px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid black;
}

.topnav a.active {
  border-bottom: 3px solid black;
}
</style>
</head>
<body class="bg"> 

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="class.php">Add class</a>
  <a href="subject.php">Add Subject</a>
  <a href="student.php">Add Student</a>
  <a href="Addresult.php">Add Result</a>
</div>

<div class="slider">
      <span id="slide-1"></span>
      <span id="slide-2"></span>
      <span id="slide-3"></span>
      <div class="image-container">
        <img src="quote1.jpg" class="slide" width="700" height="400" />
        <img src="quote2.jpg" class="slide" width="500" height="400" />
       
      </div>
      <div class="buttons">
        <a href="#slide-1"></a>
        <a href="#slide-2"></a>
        
      </div>
    </div>

</body>
</html>