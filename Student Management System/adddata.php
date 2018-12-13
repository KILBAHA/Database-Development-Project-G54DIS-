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
<title>Enrol In School</title>
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

<h1>Enrol in School</h1>
<form action = "adddata.php" method = "post">
	<fieldset>
		<legend>ID</legend>
			<input type ="text" name ="studid"/>
			<input type = "submit" value ="Go!"/>
	</fieldset>


	<fieldset>
		<legend>Choose School</legend>
		<select name="school"> <br>
			<option value="Biosciences"> Biosciences</option>
			<option value="Computer Science">Computer Science</option>
			<option value="Life Sciences">Life Sciences</option>
			<input type ="submit" value = "Assign">
			</form> <br>
	</fieldset>

<?php
$studid = $_POST['studid'];
$school = $_POST['school'];

echo $studid . "<br>";
echo $school ."<br>";

$sql = "SELECT * FROM Schools where schoolname ='".$school."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $schoolid = $row["schoolid"];      
    }
}

//echo $schoolid . "<br>";

$sql2 = "INSERT INTO Student_Enrolment (stud_id,school_id)
VALUES ('".$studid."','".$schoolid."')";

if ($conn->multi_query($sql2) === TRUE) {
    echo "New records created successfully";
}
?>
</fieldset>
<p><a href = "home.php">Back</a></p>
<p><a href = "help.php">Help</a></p>