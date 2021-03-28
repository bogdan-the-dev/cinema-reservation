<?php
session_start();
if(!isset($_SESSION['username']))
header("Location:signin.php");
?>

<!DOCTYPE html>
<html>
<head>
    <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
body{
    background-image: url('http://getwallpapers.com/wallpaper/full/d/f/d/547494.jpg');
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
      

}

</style>
	<title>Main Page</title>
               <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>

                <ul>
                    <li>
                        <a href="index.php" class="active" >Home</a>
                    </li>
                     <li>
                        <a href="profile.php">Profile</a>
                    </li>
                    <li>
                        <a href="bookings.php">Reservations</a>
                    </li>
                    <li>
                        <a href="availablemovies.php">Movies in cinema</a>
                    </li>
                    <li>
                        <a href="aboutus.php">About Us</a>
                    </li>
                    <li style="float:right">
                        <a href="signout.php">Sign Out</a>
                    </li>
                </ul>
        
       
	
                </div>
                </body>
		</html>
		


                
