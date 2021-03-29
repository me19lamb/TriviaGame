<?php session_start();

if ($_SESSION['authenticated'] != true) {
	die("Access denied");	
}
?> 


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Show Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" >
	  <style>
		body{
			text-align: center;
			border: 5px solid limegreen;
			border-radius: 25px;
			background-color: cyan;
		}
		h2{
			text-decoration: underline;
			font-family: sans-serif;
		}  
		a:hover{
			color: red;
		}
		a{
			font-family: monospace;
			color: limegreen;
			font-weight: bold;
			font-size: 25px;
		}
		  p{
			  font-family: sans-serif;
			  font-weight: bold;
		  }
	</style>
  </head>
 
  <body>





<?php
$currentUser = $_SESSION['username'];
$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			
echo '<h2>Results of Each Game Played by '.$currentUser.':</h2>';
$result = $mysqli->query("SELECT * FROM Game718773 WHERE username = '".$currentUser."'");
while($row = $result->fetch_row()){
	echo '<p>You scored '.$row[2].' correct and '.$row[3].' incorrect!';
}
echo '<p><a href="get_game.php">Play Another Game</a></p>';
echo '<p><a href=login.php>Logout</a></p>';

