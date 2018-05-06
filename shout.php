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

$db_username = 'elham';
$db_password = 'azarm';
$db_name = 'ygo';
$db_host = 'localhost';

if($_POST)
{
	$sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)or die('error');
	
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    } 
	
	if(isset($_POST["message"]) &&  strlen($_POST["message"])>0)
	{
		$username = filter_var(trim($user['username']),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$message = filter_var(trim($_POST["message"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$user_ip = $_SERVER['REMOTE_ADDR'];
		

		if(mysqli_query($sql_con,"INSERT INTO shout_box(user, message, ip_address) value('$username','$message','$user_ip')"));
		{
			$msg_time = date('h:i A M d',time()); // current time
			echo '<div class="shout_msg"><time>'.$msg_time.'</time><span class="username">'.$username.'</span><span class="message">'.$message.'</span></div>';
		}
		
			}
	elseif($_POST["fetch"]==1)
	{
		$results = mysqli_query($sql_con,"SELECT user, message, date_time FROM (select * from shout_box ORDER BY id DESC LIMIT 30) shout_box ORDER BY shout_box.id ASC");
		while($row = mysqli_fetch_array($results))
		{
			$msg_time = date('h:i A M d',strtotime($row["date_time"])); //message posted time
			echo '<div class="shout_msg"><time>'.$msg_time.'</time><span class="username">'.$row["user"].'</span> <span class="message">'.$row["message"].'</span></div>';
		}
	}
	else
	{
		header('error');
    	exit();
	}
}
?>