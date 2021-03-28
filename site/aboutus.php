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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                         <a href="profile.php" >Profile</a>
                    </li>
                    <li>
                        <a href="bookings.php" >Reservations</a>
                    </li>
                    <li>
                        <a href="availablemovies.php">Movies in cinema</a>
                    </li>
                    <li>
                        <a href="aboutus.php"class="active">About Us</a>
                    </li>
                    <li style="float:right">
                        <a href="signout.php">Sign Out</a>
                    </li>
                </ul>
    <section id="contact">
  <div class="container">
    <div class="well well-sm">
      <h3><strong>Contact Us</strong></h3>
    </div>
	
	<div class="row">
	  <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d341.5773174501754!2d23.58585755483622!3d46.77241499774402!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9a21cdd271a51c8b!2sUTCN%20Facultatea%20de%20Automatic%C4%83%20%C8%99i%20Calculatoare!5e0!3m2!1sro!2sro!4v1610193690031!5m2!1sro!2sro" width="650" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>

      <div class="col-md-7 wow animated fadeInRight" data-wow-delay=".2s">
                  <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                      <!-- Name -->

                      <!-- Message -->
                      <div class="form-group label-floating">
                          <label for="message" class="control-label">Message</label>
                          <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                          <div class="help-block with-errors"></div>
                      </div>
                      <!-- Form Submit -->
                      <div class="form-submit mt-5">
                          <button class="btn btn-common" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                          <div id="msgSubmit" class="h3 text-center hidden"></div>
                          <div class="clearfix"></div>
                      </div>
                  </form>
              </div>
    </div>
  </div>
</section>
</body>
</html>

<?php 
if(isset($_POST['message'])){
    $text = $_POST['message'];
    $db = mysqli_connect('localhost', 'root','','reservedb') or die("Could not connect to the server!\nIt is what it is...");
    $id = $_SESSION['userID'];
    $query = "insert into feedback (message, clientID) values ('$text', '$id');";
    mysqli_query($db, $query);

}
?>