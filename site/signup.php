<?php include('auth.php') ?>
<!DOCTYPE HTML>
<html lang='en' dir='ltr'>
    <head>
    <meta charset="utf-8">
    <title>
        Cinema Reservation - Signup Page
        </title>
    <link rel = "stylesheet" type="text/css" href="signupstyle.css" />
    </head>
    <body>
        <form class="box" action="" method="post">
		<?php include('error.php') ?>
        <h1>Sign Up</h1>
        <input type="text" name="username" placeholder="Username" required> 
        <input type="password" name="password1" placeholder="Password" required>
        <input type="password" name="password2" placeholder="Confirm Password" required>
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email adress" required>
        <input type="text" name="phone" placeholder="Phone Number" required>        
            
        <input type="submit" name = "SignUp" placeholder="Sign Up">
            <p>Already a Sith Lord?<a href="signin.php"> <br>Destroy the rebels </a></p> 
        </form>
        
    </body>
	</html>
	<?php
	//Register User record data

	
	
	if(isset($_POST['SignUp'])){


$username = $_POST["username"];
$password_1 = $_POST['password1'];
$password_2 = $_POST['password2'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone =  $_POST['phone'];
$username_check_query = "Select * from userauth where username = '$username' limit 1";
$userdata_check_query = "Select * from userprofile where email = '$email' or phone = '$phone' limit 1";

$results = mysqli_query($db, $username_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
	?><script type="text/javascript">
                               alert("Username already used :(");
                            </script><?php
}
else{
	$results = mysqli_query($db, $userdata_check_query);
	$user = mysqli_fetch_assoc($results);
	if($user){
	if($user['email'] == $email){
		?><script type="text/javascript">
                               alert("Email already used :(");
			</script><?php}
	if($user['phone'] == $phone){
		?><script type="text/javascript">
                               alert("Phone number already used :(");
                            </script><?php
	}
	}
	else
	{
		if($password_1 == $password_2){
	$password = md5($password_1);
	$query_auth = "insert into userauth (username, password) values ('$username', '$password');";
	$query_data = "insert into userprofile (FirstName, LastName, email, phone) values ('$firstname', '$lastname', '$email', '$phone');";
	if(mysqli_query($db, $query_data)){
		if(mysqli_query($db, $query_auth)){       
        
	$structure = "./profilepic/$username";
        if(!mkdir($structure, 0777, true)){
            die('Faild to create folder!');
        }
	header("Location:signin.php");
	}
	}
	else
		echo "e groasa!";
	}
	else
		echo "Nu merg datele";
	}
}


}


	
	?>