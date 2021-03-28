<?php
session_start();
if(!isset($_SESSION['username']))
header("Location:signin.php");
else {
    $id = $_SESSION["userID"];
    $picpath = "";
    $username = $_SESSION["username"];
    $db = mysqli_connect('localhost', 'root','','reservedb') or die("Could not connect to the server!\nIt is what it is...");
    $query="SELECT * FROM userprofile where userID = '$id'";
    $results = mysqli_query($db, $query);
    if(mysqli_num_rows($results)){
	$linie=mysqli_fetch_array($results);
	$firstName = $linie[1];
	$lastName = $linie[2];
        $email = $linie[3];
        $phone = $linie[4];
        $picpath = $linie[5];
        }
    if($picpath == "")
        $picpath = "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";
}
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
  text-decoration: none;
}

.active {
  background-color: #4CAF50;
  text-decoration: none;
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

 <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                     <li>
                         <a href="profile.php" class="active">Profile</a>
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
<div class="container">
	<div class="row">
		
        
        
       <div class="col-md-13 ">


       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-4">
                     <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                
                <input id="profile-image-upload" class="hidden" type="file">
                <!--Upload Image Js And Css-->
           
              
   
                
                
                     
                     
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
                <h4 style="color:#00b1b1;"><?php echo $_SESSION["username"];?> </h4>
              <span><p>Movie Watcher</p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $firstName;?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"> <?php echo $lastName;?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Email Address:</div><div class="col-sm-7"> <?php echo $email;?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone Number:</div><div class="col-sm-7"><?php echo $phone;?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

</div>  
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});      

              </script> 
       
       
       
       
       
       
       
       
       
   </div>
</div>

</body>
</html>
