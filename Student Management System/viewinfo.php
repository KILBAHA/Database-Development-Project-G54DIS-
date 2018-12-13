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
<title>Student Info</title>
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

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
    <meta charset="utf-8" />
    <title>View Info</title>
</head>
<body>
<h1>View Student Details:</h1>
    <form action ="viewinfo.php" method = "post">
        <fieldset>
            <legend>Search</legend>
            ID:
            <input type="text" name = "studid"/>
            <input type="submit" value="Search"/> <br>
        </fieldset>
    </form>

        <fieldset>
            <legend>Details</legend>

<?php


$studid = $_POST['studid'];

$sql = "SELECT * FROM Students where studentid ='".$studid."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["FirstName"]. " " . $row["LastName"]. "<br>";
        echo "ID: " . $row["studentid"]. "<br>";
        echo "Degree: " . $row["Degree"]. "<br>";
        echo "Year: " . $row["Year"]. "<br>";
        
    }
}


?>
        </fieldset>

</body>
    <fieldset>
        <legend>Current Modules</legend>


<?php

$sql2 = "SELECT * FROM Choices where stud_id ='".$studid."'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $mod_id = $row["mod_id"];      
    }
}

$sql3 = "SELECT * FROM Modules where modid ='".$mod_id."'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
        $modname = $row['modname'];
        echo $modname;      
    }
}
?>
    </fieldset>
    <fieldset>
        <legend>School</legend>
<?php

$sql4 = "SELECT * FROM Student_Enrolment where stud_id ='".$studid."'";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    // output data of each row
    while($row = $result4->fetch_assoc()) {
        $school_id = $row['school_id'];      
    }
}

$sql5 = "SELECT * FROM Schools where schoolid ='".$school_id."'";
$result5 = $conn->query($sql5);

if ($result5->num_rows > 0) {
    // output data of each row
    while($row = $result5->fetch_assoc()) {
        $schoolname = $row['schoolname'];
        echo $schoolname;      
    }
}
?>
    </fieldset>
    <fieldset>
        <legend>Available Modules:</legend>
<?php

$sql6 = "SELECT * FROM Available_Modules where school_id ='".$school_id."'";
$result6 = $conn->query($sql6);

if ($result6->num_rows > 0) {
    // output data of each row
    while($row = $result6->fetch_assoc()) {
        $available_mod_id = $row['module_id'];
      
    }
}

$sql7 = "SELECT * FROM Modules where modid ='".$available_mod_id."'";
$result7 = $conn->query($sql7);

if ($result7->num_rows > 0) {
    // output data of each row
    while($row = $result7->fetch_assoc()) {
        $available_mod_name = $row['modname'];
        echo $available_mod_name;      
    }
}

$conn->close();
?>
</fieldset>
<p><a href = "home.php">Back</a></p>
<p><a href = "help.php">Help</a></p>