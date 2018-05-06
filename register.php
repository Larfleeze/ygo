<?php 

session_start();

if(isset($_SESSION['user_id']))
{
    header("Location: /");
}

include 'inc/db.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
    $sql = "INSERT INTO users (email, password, elo, username) VALUES (:email, :password, '0', :username)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
    
	
    $usernameChecker = $conn->prepare("SELECT username FROM users WHERE username = :username");
    $usernameChecker->bindParam(':username', $username);
    $usernameChecker->execute();
	if($usernameChecker->rowCount() > 0){
    echo "That username exists!".die();
	} 
	
	$emailChecker = $conn->prepare("SELECT email FROM users WHERE email = :email");
    $emailChecker->bindParam(':email', $email);
    $emailChecker->execute();
	if($emailChecker->rowCount() > 0){
    echo "That email exists!".die();
	} 
    if($stmt->execute()):
        $message = "You are ready to duel!";
    else: 
        $message = "Invalid information";
    endif;
    
endif;
?>
<!DOCTYPE html>
<html>
<head>
<title>YGO! Genesis</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://v4-alpha.getbootstrap.com/examples/narrow-jumbotron/narrow-jumbotron.css">
</head>
<body>
<div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Register<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">YGO! Genesis</h3>
      </div>
<main class="container">
<div class="jumbotron">
<form class="form-signin" action="register.php" method="POST">
      <img src="https://vignette.wikia.nocookie.net/yugioh/images/6/61/Yugioh_Logo.png/revision/latest?cb=20131129140054" alt="YGO">
      <?php if(!empty($message)): ?>
        <p><?php echo $message; ?></p>
	  <?php endif; ?>
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
       <label for="inputEmail" class="sr-only">Username</label>
      <input type="username" id="inputUsername" class="form-control" name="username" placeholder="Username" required>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
      <label for="inputPassword" class="sr-only">Confirm Password</label>
      <input type="password" id="inputConfirmPassword" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Up">
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?></p>
    </form>