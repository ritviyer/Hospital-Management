<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "software_lab";

$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT name, mail FROM doctor  where dept_id=4";
$result = $conn->query($sql);
echo "<br><h3>Available Doctors</h3>";
echo "<table border='1' cellpadding=\"8\"><tr><th>Name</th><th>Email</th></tr>";

while($row = mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['mail'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>