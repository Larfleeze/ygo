<?php
$server = 'localhost';
$username = 'elham';
$password = 'azarm';
$database = 'ygo';

try
{
$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} 
catch(PDOException $e)
{
die("fail" . $e->getMessage());
}