<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "software_lab";

$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 

$a = htmlspecialchars($_POST['pid']);
$b = htmlspecialchars($_POST['pass']);

$x=0;
$sql = "SELECT pid, password FROM patient";
$result = $conn->query($sql);

if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
		if($a==$row["pid"]&&$b==$row["password"]){
			$x=1;
    }}}
		
			if($x==1){
				header('Location: Assign.html');
                exit;
			}
			else{
				echo "Username and password don't match";
			}
?>