<?php
/*
1. You	can	base	this	assignment	on	week7’s	homework	to	finish	this one.
2. You	need	to	create	a	Database Object (15%)
	a. Object	should	have	a	static	method	for	creating	and	returning	a	single	database	
		method.	
3. You	need	to	create	a	User	Object	(30%)
	a. Should	have	private	properties for	each	column	of	the	accounts	table.	
	b. Should	have	public	getter	and	setter	methods	for	each	property.
	c. Should	have	a	public	method	that	return	a	string	of	HTML	that	displays	all	of	the	
		user’s	information	in	a	table	row.
4. You	need	to	create	a	UserDB Object (30%)
	a. Should	have	static	methods that	can	be	reused for querying	the	accounts table:
		i. Getting	all	users	in	accounts	table,	should	be	return	as	User	Objects.
		ii. Inserting	a	new	user	
		iii. Updating	a	user’s	password
		iv. Deleting	a	user	
	b. Note	we	will	only be	using	the	first	method	in	this	assignment
5. Use	the	static	method	to	get	all	Users	and	display	them	in	a	table.	(25%)
	a. Table	should	have	headers	for	each	column	that	are	bold	and	centered	(hint:	
		there’s	an	HTML	element	that	does	it	for	you)
	b. Borders	should	be	specified	on	the	table.
*/
//****************************************************************************************
//ERROR Detection
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);
//****************************************************************************************
class Database {
	private $user, $password, $host;
	private $conn;
	
	public function _construct ($user, $password, $host) {
		$this->user = $user;
		$this->password = $password;
		$this->host = $host;
		
		$dsn = "mysql:host=$host;dbname=$user";
		try {
			$this->conn = new PDO($dsn, $user, $password);
			echo "Connected successfully<br>";
		} 
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	public function _destructor () {
		$this->conn->close();
	}
}
class User {
	private $
}
$user = "nal9";
$password = "Movlksomh123";
$host = "sql1.njit.edu";

$db = new Database($user, $password, $host);
?>
