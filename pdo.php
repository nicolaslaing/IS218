<?php
//****************************************************************************************
//DATABASE CONNECTION
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

$user = "nal9";
$password = "Movlksomh123";
$host = "sql1.njit.edu";

$dsn = "mysql:host=$host;dbname=$user";

try {
    $conn = new PDO($dsn, $user, $password);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;

//mysqli_select_db($conn, $project );
//****************************************************************************************
$s = "SELECT * FROM accounts WHERE id < 6";
$result = prepare($s);

$numRows = mysqli_num_rows($result);
echo "Results: $numRows";
echo "<table border='1'><tr><th>ID</th><th>Email</th></tr>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$out = "<tr><td>" . $row["id"] . "</td><td>" . $row["email"] . "</td></tr><br>";
	
	echo $out;
}
echo "</table>";
?>
