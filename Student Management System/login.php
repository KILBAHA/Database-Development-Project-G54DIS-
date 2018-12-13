  <?php
$servername = "mysql.cs.nott.ac.uk";
$username = "styya1_project";
$password = "myproject";
$dbname = "styya1_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['user']) and isset($_POST['password'])){
    $username = filter_var(trim($_POST['user']),FILTER_SANITIZE_STRING);
    $password = hash('sha256',$_POST['password']);
}
else{
    $validation = false;
    echo "name/pasword not set";
}

$sql1 = "select * from Login where user ='".$username."'and hash ='".$password."'";
$result1= $conn->query($sql1); 
if ($result1->num_rows > 0){
	$validation = true;
}
else{
    $validation = false;
}

if($validation = true){
    echo "Welcome".$username;
}
else{
    echo "Incorrect Login Details. Did you mean to sign in instead?";
}
$conn->close();
?> 