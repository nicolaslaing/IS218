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
//$conn = null;

//****************************************************************************************
$s = "SELECT * FROM accounts WHERE id < 6";
$result = $conn->prepare($s);
$result->execute();

$numRows = $result->rowCount();
echo "Results: $numRows";

echo "<table border='1'><tr><th>ID</th><th>Email</th></tr>";
while($row = $result->fetch()){
	$out = "<tr><td>" . $row["id"] . "</td><td>" . $row["email"] . "</td></tr><br>";
	
	echo $out;
}
$result->closeCursor();
echo "</table>";
?>
