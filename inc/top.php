<?php 
session_start();
include ('db.php');
if(isset($_SESSION['user_id'))
{
    $records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records-execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $user = NULL;
     
    if(count($results) > 0)
    {
        $user = $results;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>YGO! Genesis</title>
     <link rel="stylesheet" type="text/css" href="https://v4-alpha.getbootstrap.com/examples/narrow-jumbotron/narrow-jumbotron.css">
</head>