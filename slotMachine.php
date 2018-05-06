<?php 
ini_set('display_errors', 1);
session_start();
include ('inc/db.php');
if(isset($_SESSION['user_id']))
{
    $records = $conn->prepare('SELECT id,email,password,elo,username FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $user = NULL;
     
    if(count($results) > 0)
    {
        $user = $results;
    }
    
}
?>
<?php
if(!empty($user)):
?>?>
<!DOCTYPE html>
<html>
<head>
    <title>YGO! Genesis</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <script type="text/javascript" src="js/import.min.js"></script>
</head><body>

<nav class="navbar fixed-top navbar-dark navbar-expand-lg bg-dark">
<img src="https://vignette.wikia.nocookie.net/yugioh/images/6/61/Yugioh_Logo.png/revision/latest?cb=20131129140054">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Build a deck</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="findUser.php">Find a user</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Your profile</a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="slotMachine.php">Slot Machine</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rankings.php">Rankings</a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      </ul>
</nav><br><br><br><br>
     <main class="container">
<div class="jumbotron">
        <h1 class="display-3">Slot Machine</h1>
		
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <p class="lead"><script>

						function Slots() {
							if(window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function() {
								if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									document.getElementById("slot").innerHTML = xmlhttp.responseText;
									document.getElementById("click").innerHTML = '	<div class="button"><center><input type="submit" value="Click" class="btn btn-warning" name="click" onclick="Slots();"/></center></div>';
								} else {
									document.getElementById("slot").innerHTML = '<table align=center><tr><td><img src="https://i.pinimg.com/originals/b2/f1/4e/b2f14e176af8040a8a8535741fab5cb8.gif"></td><td><img src="https://i.pinimg.com/originals/b2/f1/4e/b2f14e176af8040a8a8535741fab5cb8.gif"></td><td><img src="https://i.pinimg.com/originals/b2/f1/4e/b2f14e176af8040a8a8535741fab5cb8.gif"></td></tr></table>';
									
									document.getElementById("click").innerHTML = "<div style='float:center;' class='alert alert-warning' role='success' align='center'>Loading...</div>";
								}
							}
							var spinit = document.getElementById("slot").value;
							xmlhttp.open("POST","slots_a44a.php",true);
							xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xmlhttp.setRequestHeader("Connection", "close");
							xmlhttp.send(spinit);						}
					</script>
					<div class="panel panel-info">

						
							<div id="slot" class="slots">
							<center>
											<img src="https://vignette.wikia.nocookie.net/yugioh/images/0/05/DarkMagician-LEDD-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20171005213046">
										
											<img src="https://vignette.wikia.nocookie.net/yugioh/images/7/77/BlueEyesWhiteDragon-LCKC-EN-UR-1E.png/revision/latest/scale-to-width-down/300?cb=20180415030139">
										
											<img src="https://vignette.wikia.nocookie.net/yugioh/images/3/3f/BlackLusterSoldier-YGLD-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20170812174429">
							</center>
										
							</div>
							<div id="click">
							<div class="button">

 <center><input type="submit" value="Click" class="btn btn-warning" name="click" onclick="Slots();" /></center>
                           </div>
<?php include'chatbox.php';?>
<?php
else: 
    include ('inc/notRegistered.php');
    ?>
<?php
endif;
    ?>
</main>
    <!-- js at bottom for sake of lag -->
    <script type="text/javascript" src="js/import-files.js"></script>
    <script type="text/javascript" src="js/import.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  
</body>
</html>