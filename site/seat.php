<?php
session_start();
if(!isset($_SESSION['username']))
header("Location:signin.php");
else {
          $db = mysqli_connect('localhost', 'root','','reservedb') or die("Could not connect to the server!\nIt is what it is...");
    if(isset($_GET['selectedevent']) && $_GET['selectedevent'] != ""){
        $eventid = $_GET['selectedevent'];
              if(isset($_GET['seat'])){
          $finalid=$_GET['seat'];
          $userid = $_SESSION['userID'];
          $resulr2=mysqli_query($db, "select date from event where id=$eventid;" );
          $linie = mysqli_fetch_array($resulr2);
          $bookingdate=$linie[0];
          $ending=mysqli_query($db, "insert into reservation (userID, eventID, ReservationDate, seatID) values ($userid, $eventid, $bookingdate, $finalid);" );
         header("Location:bookings.php");
              }
      
        }
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
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

                <ul>
                    <li>
                        <a href="index.php">Surrender</a>
                    </li>
                </ul>
    <?php
    $query = "select NoSeats from event join room on room.id = event.roomID where event.id = $eventid;";
   $results = mysqli_query($db, $query);
   $linie = mysqli_fetch_array($results);
   $nrseats = $linie[0];    
   $query = "select roomID from event where id = $eventid;";
   $results = mysqli_query($db, $query);
   $linie = mysqli_fetch_array($results);
   $roomid = $linie[0];    
      
    ?>
    
    <div class="container">
        <table>
            <tbody>
                <?php 
                $query = "select id, seatPos from seats where roomID = $roomid";
                $results = mysqli_query($db, $query);

                
                    for($i = 0; $i < $nrseats/6; $i++){?>
                <tr>
                <?php
                        for($j = 0; $j<6; $j++){
                           $linie = mysqli_fetch_array($results);
                           $seatid = $linie[0];
                           $seatPos = $linie[1];
                             $results1 = mysqli_query($db, "select seatID from reservation where eventID = $eventid and seatID = $seatid");
                             $status = mysqli_num_rows($results1);
                             if($status == 0){?>
                                 <td><a href="seat.php?selectedevent=<?php echo $eventid ?>&seat=<?php echo $seatid ?>" class="btn btn-primary btn-lg"><?php echo $seatPos ?></a></td><?php
                             }
                             else{?>
                                 <td><a href="" class="btn btn-danger btn-lg"><?php echo $seatPos ?></a></td>
                           <?php  
                            }
                                 
                           ?>
            <?php    
                        }
                        
                        
                        ?>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
    </div>
    
</body>
</html>
