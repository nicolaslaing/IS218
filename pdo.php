<?php
//****************************************************************************************
//DATABASE CONNECTION
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

$user = "nal9";
$project = "nal9";
$password = "Movlksomh123";
$host = "sql1.njit.edu";

$db = mysqli_connect($host, $user, $password, $project);

if (mysqli_connect_errno())
  {
	  echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "<h1>Successfully connected to MySQL.</h1><br />";

mysqli_select_db($db, $project );
//****************************************************************************************
$s = "SELECT * FROM accounts WHERE id < 6";
$result = mysqli_query($db, $s);

$numRows = mysqli_num_rows($result);
echo "Results: $numRows";
echo "<table border='1'><tr><th>ID</th><th>Email</th></tr>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$out = "<tr><td>" . $row["id"] . "</td><td>" . $row["email"] . "</td></tr><br>";
	
	echo $out;
}
echo "</table>";
?>