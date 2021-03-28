<?php
session_start();
if(!isset($_SESSION['username']))
header("Location:signin.php");
else {
    $dateselected = 0;
    $cinemaselected = 0;
    
      $db = mysqli_connect('localhost', 'root','','reservedb') or die("Could not connect to the server!\nIt is what it is...");

      if(isset($_GET['date']) && $_GET['date'] != ""){
          $seldate = $_GET['date'];
          $_SESSION['finaldate'] = $seldate;
          $dateselected = 1;
      }
      $cinemaselected = 0;
      if(isset($_GET['Cinema'])){
          $selcinema = $_GET['Cinema'];
          $_SESSION['selectedcinema'] = $selcinema;
           $results = mysqli_query($db, "select Name from cinema where id = $selcinema");
           $linie = mysqli_fetch_array($results);
           
           $selcinemaname = $linie[0];
           $cinemaselected = 1;
      }
}
?>
<script src="link">
_today: function () {
  var myDate = document.querySelector(myDate);
  var today = new Date();
  myDate.value = today.toISOString().substr(0, 10);
}
</script>

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
                        <a href="index.php">Home</a>
                    </li>
                     <li>
                         <a href="profile.php" >Profile</a>
                    </li>
                    <li>
                        <a href="bookings.php" >Reservations</a>
                    </li>
                    <li>
                        <a href="availablemovies.php" class="active">Movies in cinema</a>
                    </li>
                    <li>
                        <a href="aboutus.php">About Us</a>
                    </li>
                    <li style="float:right">
                        <a href="signout.php">Sign Out</a>
                    </li>
                </ul>
    

      <form action="" method="">

    
    
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th><input type="date" name="date" value="<?php echo $seldate ?>"></th>
                <th><select class="form-select form-select-lg mb-3" aria-label="Default select example" name="Cinema" id="cinemaid" value="<?php echo $selcinema ?>">
    <?php
    
    if($cinemaselected == 1){?>
        <option value="<?php echo $selcinema; ?>" ><?php echo $selcinemaname ?></option>
<?php
    } 
  
  $query = "select name, id from cinema";
  $results = mysqli_query($db, $query);
  $nrcinema = mysqli_num_rows($results);
    while($nrcinema != 0){
        $linie = mysqli_fetch_array($results);
        $cname = $linie[0];
        $cid = $linie[1];
        $nrcinema --;
        if($cid != $selcinema){
    ?>
    <option value="<?php echo $cid; ?>" ><?php echo $cname ?></option>
    <?php
    }}
    ?>
  </select></th>
                <th><input class="btn btn-primary" type="submit" name="datesent" value="Select"></th>
            </tr>
            </thead>
        </table>
        
        
    </div>
    
          <?php
          
          if($dateselected == 1 && $cinemaselected == 1){
          ?>
          <div class="ontainer">
              <table class="table">
                  <thead>
                      <tr>
                          <th style="text-align:center">Title</th>
                          <th style="text-align:center">Storyline</th>
                          <th style="text-align:center">Duration</th>
                          <th style="text-align:center">Starting time</th>
                          <th>Options</th>
                      </tr>
                  </thead>
                  
                  <?php 
                  
                  $query = "select event.id, title, description, duration, startingTime from event join movie on event.movieID = movie.id where date = '$seldate' and event.cinemaID = $selcinema;";
                  $results = mysqli_query($db, $query);
                  $nrevents = 0;
                  $nrevents = mysqli_num_rows($results);
                  
                 

                  
                  ?>
                  
                  <tbody>
                      <?php 
                      while($nrevents != 0){
                        $linie = mysqli_fetch_array($results);         
                        $eid = $linie[0];
                        $filname = $linie[1];
                        $story = $linie[2];
                        $duration = $linie[3];
                        $stime = $linie[4];
                        $nrevents --;
                        ?>
                      <tr> 
                  <td><?php echo $filname; ?></td>
                  <td><?php echo $story; ?></td>
                  <td style="text-align:center"><?php echo $duration; ?></td>
                  <td style="text-align:center"><?php echo     $str1 = ''; 
                $n = strlen($stime) - 8;
                $str1 = substr($stime, $n);
                echo $str1;
                ; ?></td>
                  <td><a href="seat.php?selectedevent=<?php echo $eid ?>" class="btn btn-primary">Reserve</a></td> 
                      </tr>
                      <?php
                  }
                      ?>
                      
                      
                      
                      
                      
                      
                  </tbody>
                  
              </table>
              
              
              
            
              
                    </div>
          <?php }?>
    
  

          
          
          
          
          

    
</body>
</html>
