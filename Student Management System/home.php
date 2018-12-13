<!DOCTYPE html>
<html lang="en">
<head>
<title>Homepage</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
  font-size: 35px;
}

/* Container for flexboxes */
.row {
  display: -webkit-flex;
  display: flex;
}

/* Create three equal columns that sits next to each other */
.column {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
  .row {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

<style type="text/css">
div.box {
    position: relative;
    width: 200px;
    height: 200px;
    background: #eee;
    color: #000;
    padding: 20px;    
}

div.box:hover {
    cursor: hand;
    cursor: pointer;
    opacity: .9;
}

a.divLink {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    text-decoration: none;
    /* Makes sure the link doesn't get underlined */
    z-index: 10;
    /* raises anchor tag above everything else in div */
    background-color: white;
    /*workaround to make clickable in IE */
    opacity: 0;
    /*workaround to make clickable in IE */
    filter: alpha(opacity=0);
    /*workaround to make clickable in IE */
}
</style>
</head>
<body>

<div class="header">
  <h2>Welcome to the Student Management System:</h2>
</div>

<div class="row">
  <div class="column" style="background-color:#aaa;">
	<a href = "viewinfo.php"><center>View Student Information <br>
		<img src = "magnifying_glass.png" id = "magnifying_glass" width = "200px" height = "200px">
		</center>
		</a>
			</div>
  <div class="column" style="background-color:#bbb;">
	<a href = "adddata.php"><center>Enroll in a School<br>
		<img src = "pencil2.png" id ="pencil" width = "200px" height = "200px">
		</center>
		</a>
			</div>
  <div class="column" style="background-color:#ccc;">
	<a href = "chooseModules.php"><center>Enroll in a Module<br>
		<img src = "pencil2.png" id = "pencil" width = "200px" height = "200px">
		</center>
		</a>
			</div>
</div>

<div class="footer">
  <p><a href = "help.php">Help</a></p>
</div>

</body>
</html>
