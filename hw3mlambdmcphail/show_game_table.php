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
    <title>Show Game Table</title>
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
		table{
			border-collapse: collapse;
			margin: 0 auto;
			border: 5px solid limegreen;
		  }
	</style>
  </head>
  <body>







<?php

$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");			

$result = $mysqli->query("SHOW COLUMNS FROM Game718773");

echo '<table>';
echo '<tr>';
while ($row = $result->fetch_row()) {
	echo '<th>'.$row[0]."</th>";
}
echo '</tr>';

$result->close();

$result = $mysqli->query("SELECT * FROM Game718773");

while ($row = $result->fetch_row()) {
	echo '<tr>';
	foreach ($row as $value) {
		echo '<td>'.$value.'</td>';
	}
	echo '</tr>';
}
echo '</table>';

$result->close();

$mysqli->close();

?>
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	 	
  </body>
</html>