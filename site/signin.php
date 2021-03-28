<?php include('auth.php') ?>
<!DOCTYPE HTML>
<html lang='en' dir='ltr'>
    <head>
    <meta charset="utf-8">
    <title>
        Cinema Reservation - Login Page
        </title>
    <link rel = "stylesheet" type="text/css" href="loginstyle.css" />
    </head>
    <body>
        <form class="box" action="signin.php" method="POST">
		<!--<?php include('error.php') ?> -->
        <h1>Sign In</h1>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name = "signin" placeholder="SignIn"</input>
            <p>Do you want to join the Dark Side? <a id = "a1" href="signup.php"> <br> We have cookies </a></p>
        </form>       
    </body>
	
	</html>
	<?php 
	//$errors = array();
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Initialize connection

$db = mysqli_connect('localhost', 'root','','reservedb') or die("Could not connect to the server!\nIt is what it is...");
	if(isset($_POST['signin'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);
	$query = "SELECT * from userauth where username = '$username' and password = '$password'";
	$results = mysqli_query	($db, $query);
	if(mysqli_num_rows($results)){
		$linie=mysqli_fetch_array($results);
		$_SESSION['username'] = $username;
		$_SESSION['userID'] = $linie[0]; 
		header('Location:index.php');
	}else{
	?><script type="text/javascript">
                               alert("Wrong combination :(");
                            </script><?php
		
	}
		
	}


?>