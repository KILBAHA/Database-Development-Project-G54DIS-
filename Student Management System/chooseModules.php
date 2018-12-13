<?php
$servername = "mysql.cs.nott.ac.uk";
$username = "styya1_project";
$password = "myproject";
$dbname = "styya1_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Enroll In Module</title>

	<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

table {
	border-spacing: 10px;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
        <fieldset>
		<form action = "chooseModules.php" method = "post">
            <legend>Student ID:<legend>
            <input type="text" name = "studid"/>
            <input type = "submit" value = "GO!">
        </fieldset>


<?php

$studid = $_POST["studid"];

$sql1 = "SELECT * FROM Student_Enrolment where stud_id ='".$studid."'";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $schoolid = $row["school_id"];      
    }
}

$sql2 = "SELECT * FROM Schools where schoolid ='".$schoolid."'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $schoolname = $row["schoolname"];      
    }
}

?>
	<fieldset>
		<legend>Your School</legend
    <p><?php echo $schoolname; ?></p>
	</fieldset>

<?php

$sql3 = "SELECT * FROM Available_Modules where school_id ='".$schoolid."'";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $module_id = $row["module_id"];      
    }
}

$sql4 = "SELECT * FROM Modules where modid ='".$module_id."'";
$result = $conn->query($sql4);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $modname = $row["modname"];      
    }
}
?>
<fieldset>
	<legend>Available Modules:</legend>
	<table>
		<tr>
			<th>Module name:</th>
			<th>Module ID:</th>
		</tr>
		<tr>
			<td><?php echo $modname; ?></td>
			<td><?php echo $module_id; ?></td>
	</table>
</fieldset>


<fieldset>
	<legend>Choose Modules</legend>
<form action ="chooseModules.php" method="post"/>
		<legend>Enter the ID of the Module you wish to choose</legend>
		<input type = "number" name = "choosenmod"/>
		<input type = "submit" value = "GO!"/>
</fieldset>
<?php

$chosenmod = $_POST["choosenmod"];

$sql5 = "Insert into Choices (stud_id,mod_id) VALUES ('".$studid."','".$module_id."')";
$result = $conn->query($sql5);

if ($result->num_rows > 0) {
    // output data of each row
    echo "Entrys added successfully";
}

$conn->close(); 
?> 

<p><a href = "home.php">Back</a></p>
<p><a href = "help.php">Help</a></p>