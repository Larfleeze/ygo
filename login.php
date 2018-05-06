<?php

session_start();

if( isset($_SESSION['user_id']) )
{
	header("Location: /");
}
require 'inc/db.php';
if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$message = '';
	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) )
    {
		$_SESSION['user_id'] = $results['id'];
		header("Location: /");
	}
    else 
    {
		$message = 'Invalid information';
	}
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
              <a class="nav-link active" href="#">Login <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">YGO! Genesis</h3>
      </div>
<main class="container">
<div class="jumbotron">
 <form class="form-signin" action="login.php" method="POST">
      <img src="https://vignette.wikia.nocookie.net/yugioh/images/6/61/Yugioh_Logo.png/revision/latest?cb=20131129140054" alt="YGO">
      <?php if(!empty($message)): ?>
    	<p><?php echo $message; ?></p>
	  <?php endif; ?>
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?></p>
    </form>