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
?><body>

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

<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<?php 
try
{
  $sqlNews = 'SELECT title,
                    id,
                    picture,
                    content,
                    date
               FROM news
              ORDER BY id';
 
    $qN = $conn->query($sqlNews);
    $qN->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("error " . $e->getMessage());
}
?>
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
  <?php while ($rowNews = $qN->fetch()): ?>
          <h1 class="display-3"> <?php echo $rowNews['title']; ?></h1>
        <p class="lead">
     <div class="panel-body">
    <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><img alt="User Pic" src="<?php echo $rowNews['picture']; ?>" height="300px" width="150px"></td>
                        <td><?php echo $rowNews['content']; ?></td>
                      </tr>
                     </tbody>
                  </table> <?php endwhile; ?></p>
      </div>
<?php include('chatbox.php');?>
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