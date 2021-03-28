<?php

session_start();

$username = "";
$password = "";
$password1 = "";
$password2 = "";
$email = "";
$firstname = "";
$lastname = "";
$phone = "";
//$_POST['username']="";
//$_POST['password1']="";
//$_POST['password2']="";
//$_POST['email']="";
//$_POST['phone']="";
//$_POST['firstname']="";
//$_POST['lastname']="";


$errors = array();
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Initialize connection

$db = mysqli_connect('localhost', 'root','','reservedb') or die("Could not connect to the server!\nIt is what it is...");

if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $db -> connect_error;
  exit();
}
//Register User record data

//$username = mysqli_real_escape_string($db, ($_POST["username"]));
//$password_2 = mysqli_real_escape_string($db, $_POST['password2']);
//$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
//$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
//$email = mysqli_real_escape_string($db, $_POST['email']);
//$phone = mysqli_real_escape_string($db, $_POST['phone']);

/*
//Validate data

//if(empty($username))array_push($errors, "Username is required!");
//if(empty($password1))array_push($errors, "Password is required!");
//if(empty($firstname))array_push($errors, "First Name is required!");
//if(empty($lastname))array_push($errors, "Last Name is required!");
//if(empty($email))array_push($errors, "Email is required!");
//if(empty($phone))array_push($errors, "Phone number is required!");
if($password1 != $password2)array_push($errors, "Passwords do not match :(");

//Check db for existing user with the same username

$username_check_query = "Select * from userauth where username = '.$username' limit 1";
$userdata_check_query = "Select * from userprofile where email = '.$email' or phone = '.$phone' limit 1";

$results = mysqli_query($db, $username_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
	
	if($user['username'] === $username)array_push($errors, "Username already in use :(")	;
	
}

$results = mysqli_query($db, $userdata_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
	
	if($user['email'] === $email){array_push($errors, "Email adress already in use :(");}
	if($user['phone'] === $phone){array_push($errors, "Phone number already in use :(");}
}

if(count($errors) == 0){
	$password = md5($password1);
	$query_auth = "insert into userauth (username, password) values ('$username', '$password');";
	$query_data = "insert into userprofile ('First Name', 'Last Name', email, phone) values ('$firstname', '$lastname', '$email', '$phone');";
	mysqli_query($db, $query_auth);
	mysqli_query($db, $query_data);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "You are now logged in!";
	header('location index.php');
}





//Sign In
*/

/*
if(isset($_Post['signin'])){
	$username = mysqli_real_escape_string($db,$_Post['username']);
	$password = mysqli_real_escape_string($db,$_Post['password']);
	
	if(count($errors)){
	
		$password = md5($password);
		
		$query = "SELECT * from userauth where username = '$username' and password = '$password'";
		$results = mysql_queryi($db, $query);
		if(mysqli_num_rows($results)){
			
			$_SESSION['username'] = $username;
			$_SESSION['userID'] = results['userid']; 
			$_SESSION['success'] = "Logged in successfully";
			header('lcoation: index.html');
		}else{
			array_push($errors, "Wrong combination");
		}
		
	}
}

?>
*/
?>