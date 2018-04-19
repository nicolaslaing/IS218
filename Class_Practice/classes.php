<?php
//****************************************************************************************
//ERROR Detection
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);
//****************************************************************************************
/*
1. You	can	base	this	assignment	on	week7’s	homework	to	finish	this one.

2. You	need	to	create	a	Database Object (15%)
	a. Object	should	have	a	static	method	for	creating	and	returning	a	single	database	
		method.	
*/
class Database {
	private $user, $password, $host;
	private $conn;
	
	public static function _construct ($user, $password, $host) {
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
/*
3. You	need	to	create	a	User	Object	(30%)
	a. Should	have	private	properties for	each	column	of	the	accounts	table.	
	b. Should	have	public	getter	and	setter	methods	for	each	property.
	c. Should	have	a	public	method	that	return	a	string	of	HTML	that	displays	all	of	the	
		user’s	information	in	a	table	row.
*/
class User {
	private $id, $email, $fname, $lname, $phone, $birthday, $gender, $password;
	
	public function _construct ($id, $email, $fname, $lname, $phone, $birthday, $gender, $password) {
		$this->id = $id;
		$this->email = $email;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->phone = $phone;
		$this->birthday = $birthday;
		$this->gender = $gender;
		$this->password = $password;
	}
	//ID
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	//Email
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email
	}
	//Fname
	public function getFname() {
		return $this->fname;
	}
	public function setFname($fname) {
		$this->fname = $fname;
	}
	//Lname
	public function getLname() {
		return $this->lname;
	}
	public function setlname($lname) {
		$this->lname = $lname;
	}
	//Phone
	public function getPhone() {
		return $this->phone;
	}
	public function setPhone($phone) {
		$this->phone = $phone;
	}
	//Birthday
	public function getBirthday() {
		return $this->birthday;
	}
	public function setBirthday($birthday) {
		$this->birthday = $birthday;
	}
	//Gender
	public function getGender() {
		return $this->gender;
	}
	public function setGender($gender) {
		$this->gender = $gender;
	}
	//Password
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	
	public function toHTML() {
		$s = "SELECT * FROM accounts WHERE id=$id";
		$result = $conn->prepare($s);
		$result->execute();

		$row = $result->fetch();
			$out = "<table><tr>";
			$out .= "<th>First name</th>";
			$out .= "<th>Last name</th>";
			$out .= "<th>Email</th>"
			$out .= "<th>Phone</th>"
			$out .= "<th>Birthday</th>"
			$out .= "<th>Gender</th></tr>"
			$out .= "<tr><td>" . $this->fname . "</td>";
			$out .= "<td>" . $this->lname . "</td>";
			$out .= "<td>" . $this->email . "</td>";
			$out .= "<td>" . $this->phone . "</td>";
			$out .= "<td>" . $this->birthday . "</td>";
			$out .= "<td>" . $this->birthday . "</td>";
			$out .= "</tr></table>";
		echo $out;
		
		$result->closeCursor();
	}
}
/*
4. You	need	to	create	a	UserDB Object (30%)
	a. Should	have	static	methods that	can	be	reused for querying	the	accounts table:
		i. Getting	all	users	in	accounts	table,	should	be	return	as	User	Objects.
		ii. Inserting	a	new	user	
		iii. Updating	a	user’s	password
		iv. Deleting	a	user	
	b. Note	we	will	only be	using	the	first	method	in	this	assignment
*/
class UserDB {
	private $user;

	public function _construct() {
		$this-user = new User($id, $email, $fname, $lname, $phone, $birthday, $gender, $password);
	}
	public function getUsers() {
		
	}
	public function newUser($id, $email, $fname, $lname, $phone, $birthday, $gender, $password) {
		
	}
	public function updatePassword($password) {
		
	}
	public function deleteUser($user){
		
	}
}
/*
5. Use	the	static	method	to	get	all	Users	and	display	them	in	a	table.	(25%)
	a. Table	should	have	headers	for	each	column	that	are	bold	and	centered	(hint:	
		there’s	an	HTML	element	that	does	it	for	you)
	b. Borders	should	be	specified	on	the	table.
*/
$user = "nal9";
$password = "Movlksomh123";
$host = "sql1.njit.edu";

$db = new Database($user, $password, $host);
?>
