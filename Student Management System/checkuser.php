  <?php
$servername = "mysql.cs.nott.ac.uk";
$username = "styya1_project";
$password = "myproject";
$dbname = "styya1_project";

$username = $_POST["user"]
$pwd = $_POST["pwd"]

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$newuser = true;

if(isset($_POST['username']) and isset($_POST['pwd'])){
    $username = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
    $password = hash('sha256',$_POST['password']);
}
else{
    $newuser = false;
    echo "name/pasword not set";
}

$sql1 = "select * from Login where user ='".$username."'";
$result1= $conn->query($sql1); 
if ($result1->num_rows > 0){
	$newuser = false;
    echo "The data you've just input doesn't match are records. Are you new here?"
}

if($newuser = true){
    $sql2 = "insert into users (user,hash) values('".$username."','".$password."')";
    $result2 = $conn->query($sql2);
}
$conn->close();
?> 
 
 
 
