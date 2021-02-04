<html>
<head><title>New Patient</title>
<style>
    body {
            background-image: url("Images/hospital.jpg");
            background-position: top center;
            background-size: unset;
            background-repeat:no-repeat;
            background-color: aliceblue;
        }

        input {
            padding: 8px;
            border: 2px solid black;
            width: 300px;
        }

            input[type=submit] {
                padding: 8px;
                border: 2px solid black;
                width: 150px;
                text-align: center;
            }

</style>
</head>
<body>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="text" name="name" placeholder="Name" required><br>
<input type="text" name="address" placeholder="Address" required><br>
<input type="text" name="age" placeholder="Age" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="text" name="phone" placeholder="Phone Number" required><br>
<input type="password" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{3,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 3 or more characters" required><br>
<input type="password" name="password1" placeholder="Confirm password" required><br>
<br>
<input type="submit" value="submit" name="submit">
</form>
</center>
<?php
if(isset($_POST['submit'])){
$servername = "localhost";
$username = "root";
$password = "";
$db = "software_lab";

$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
$a = htmlspecialchars($_POST['name']);
$b = htmlspecialchars($_POST['password']);
$c = htmlspecialchars($_POST['password1']);
$d = htmlspecialchars($_POST['email']);
$e = htmlspecialchars($_POST['address']);
$f = htmlspecialchars($_POST['age']);
$g = htmlspecialchars($_POST['phone']);

$e=0;
$sql = "SELECT email FROM patient";
$result = $conn->query($sql);

if($b!=$c){
	echo "The two passwords don't match";
}
else{
	if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
		if($d==$row["email"]){
			$e=1;
        echo "User with email id  ".$d." already exists<br>";
		echo "<br><a href='admit.html'><img src=\"Images/login.jpg\" alt=\"LOGIN\" height=\"50\" width=\"150\"></a>";
    }}}
			$num=mysqli_num_rows($result);
			$h=$num+1;
			if($e==0){
				$sql1="insert into patient values($h,'$a','$e',$f,'$d',$g,'$b')";
				$result1 = $conn->query($sql1);
				if($result1){
					echo "Patient profile with ID ".$h." created";
					echo "<br><a href='admit.html'><img src=\"Images/login.jpg\" alt=\"LOGIN\" height=\"50\" width=\"150\"></a>";
				}
				else{
					echo "Error signing up";
					echo "<br><a href='admit.html'><img src=\"Images/login.jpg\" alt=\"LOGIN\" height=\"50\" width=\"150\"></a>";
				}
			}
	

 
}
 mysqli_close($conn);
}
?>
</body>
</html>