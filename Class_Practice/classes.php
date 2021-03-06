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
	private static $user = "nal9";
	private static $password = "Movlksomh123";
	private static $dsn = 'mysql:host=sql1.njit.edu;dbname=nal9';
	private static $conn;
	
	public function __construct () {}

	public static function getConnection() {
		try {
			self::$conn = new PDO(self::$dsn, self::$user, self::$password);
			echo "Connected successfully<br>";
		} 
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		return self::$conn;
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

	public function __construct ($id, $email, $fname, $lname, $phone, $birthday, $gender, $password) {
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
		$this->email = $email;
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
	//Translate into a table
	public function toHTML() {
		$out = "<table border='1'><tr>";
		$out .= "<th>ID</th>";
		$out .= "<th>First name</th>";
		$out .= "<th>Last name</th>";
		$out .= "<th>Email</th>";
		$out .= "<th>Phone</th>";
		$out .= "<th>Birthday</th>";
		$out .= "<th>Gender</th>";
		$out .= "<th>Password</th></tr>";
		$out .= "<tr><td>" . $this->getId() . "</td>";
		$out .= "<td>" . $this->getFname() . "</td>";
		$out .= "<td>" . $this->getLname() . "</td>";
		$out .= "<td>" . $this->getEmail() . "</td>";
		$out .= "<td>" . $this->getPhone() . "</td>";
		$out .= "<td>" . $this->getBirthday() . "</td>";
		$out .= "<td>" . $this->getGender() . "</td>";
		$out .= "<td>" . $this->getPassword() . "</td>";
		$out .= "</tr></table><br />";
		echo $out;
	}
}
/*
4. You	need	to	create	a	UserDB Object (30%)
	a. Should	have	static	methods that	can	be	reused for querying	the	accounts table:
		i. Getting	all	users	in	accounts	table,	should	be	return	as	User	Objects.
		ii. Inserting a new user
		iii. Updating a user’s password
		iv. Deleting a user
	b. Note	we will only be	using the first method in this assignment
*/
class UserDB {
	public function __construct() {}
	
	public static function getUsers() {
		$conn = Database::getConnection();
		$users = array();
		
		$s = "SELECT * FROM accounts";
		$result = $conn->prepare($s);
		$result->execute();
		
		$numRows = $result->rowCount();
		echo "Results: $numRows";

		$rows = $result->fetchAll();
		$result->closeCursor();
		
		foreach ($rows as $rows) {
			$user = new User($rows['id'], $rows['email'], $rows['fname'], $rows['lname'], $rows['phone'], $rows['birthday'], $rows['gender'], $rows['password']);

			$users[] = $user;
		}

		return $users;
	}
	public function newUser($id, $email, $fname, $lname, $phone, $birthday, $gender, $password) {
		$conn = Database::getConnection();
	
		$insert = "INSERT INTO accounts VALUES(:id, :email, :fname, :lname, :phone, :birthday, :gender, :password)";
		$resultIn = $conn->prepare($insert);
		$resultIn->execute(array(
			"id" => $id,
			"email" => $email,
			"fname" => $fname,
			"lname" => $lname,
			"phone" => $phone,
			"birthday" => $birthday,
			"gender" => $gender,
			"password" => $password
		));
	}
	public function updatePassword($id, $password) {
		$conn = Database::getConnection();
	
		$s = "UPDATE accounts SET `password` = $password WHERE id='$id'";
		$result = $conn->prepare($s);
		$result->execute();
		
		echo "Password updated.";
	}
	public function deleteUser($id){
		$conn = Database::getConnection();
		
		$s = "DELETE FROM accounts WHERE id='$id'";
		$result = $conn->prepare($s);
		$result->execute();
		
		echo "User deleted.";
	}
}

/*
5. Use	the	static	method	to	get	all	Users	and	display	them	in	a	table.	(25%)
	a. Table	should	have	headers	for	each	column	that	are	bold	and	centered	(hint:	
		there’s	an	HTML	element	that	does	it	for	you)
	b. Borders	should	be	specified	on	the	table.
*/
$users = array();
$users = UserDB::getUsers();

//print_r(array_values($users));

foreach ($users as $user) :
	echo $user->toHTML();
endforeach;
?>
