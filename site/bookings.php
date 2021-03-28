<?php
session_start();
if(!isset($_SESSION['username']))
header("Location:signin.php");
else{
            $db = mysqli_connect('localhost', 'root','','reservedb') or die("Could not connect to the server!\nIt is what it is...");
            $id = $_SESSION["userID"];
            
    if(isset($_GET['delete'])){
        $idremoval = $_GET['delete'];
        $query1 = "delete from reservation where reservationID = $idremoval";
        $results1 = mysqli_query($db, $query1);
    } 
            
            
            $query = "select reservation.reservationID, movie.title, movie.duration, event.date, cinema.Name, room.name, event.startingTime, seats.seatPos from reservation join event on reservation.eventID=event.id join cinema on cinema.id=event.cinemaID join movie on movie.id=event.movieID join room on room.id=event.roomID join seats on reservation.seatID=seats.id where reservation.userID=$id;";
            $results = mysqli_query($db, $query); 
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
                        <a href="bookings.php" class="active">Reservations</a>
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
    <div class="row justify-content-left">
        <table class="table">
            <thead>
                <tr style="text-align:center">
                    <th>Reservation ID</th>
                    <th style="text-align:center">Movie</th>
                    <th style="text-align:center">Duration</th>
                    <th style="text-align:center">Date</th>
                    <th style="text-align:center">Cinema</th>
                    <th style="text-align:center">Room</th>
                    <th style="text-align:center">Starting time</th>
                    <th style="text-align:center">Seats</th>
                    <th style="text-align:center" colspan="3">Action</th>
                </tr>
            </thead>
            <?php  
            $nrBookings = 0;
            $nrBookings = mysqli_num_rows($results);
            while ($nrBookings != 0){ 
                $linie=mysqli_fetch_array($results);
                $reservationID = $linie[0];
                $movie = $linie[1];
                $duration = $linie[2];
                $date = $linie[3];
                $cinema = $linie[4];
                $room = $linie[5];
                $startingtime = $linie[6];
                $seat = $linie[7];
                $nrBookings--;
                ?>      
            <tr >  
                <td style="text-align:center"><?php echo $reservationID; ?></td>
                <td style="text-align:center"><?php echo $movie; ?></td>
                <td style="text-align:center"><?php echo $duration; ?></td>
                <td style="text-align:center"><?php echo $date; ?></td>
                <td style="text-align:center"><?php echo $cinema; ?></td>
                <td style="text-align:center"><?php echo $room; ?></td>
                <td style="text-align:center"><?php
                
                $str1 = ''; 
                $n = strlen($startingtime) - 8;
                $str1 = substr($startingtime, $n);
                echo $str1;
                
                ?></td>
                <td style="text-align:center"><?php echo $seat; ?></td>
                <td style="text-align:center">
                    <a href="bookings.php?delete=<?php echo $reservationID ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
             <?php } ?>
        </table>
        </div>
           
            
    </div>

    
</body>
</html>