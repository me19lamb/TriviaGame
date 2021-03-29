 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Show Questions</title>
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

$result = $mysqli->query("SHOW COLUMNS FROM Questions71877");
echo '<h2>Questions Table</h2>';
echo '<table>';
echo '<tr>';
while ($row = $result->fetch_row()) {
	echo '<th>'.$row[0]."</th>";
}
echo '</tr>';

$result->close();

$result = $mysqli->query("SELECT * FROM Questions71877");

while ($row = $result->fetch_row()) {
	echo '<tr>';
	foreach ($row as $value) {
		echo '<td>'.$value.'</td>';
	}
	echo '</tr>';
}
echo '</table>';
echo '<p><a href="insert_question.php">Insert a Question</a></p>';
echo '<p><a href="delete_question.php">Delete a Question</a></p>';
echo '<p><a href="admin.php">Return to Admin Home Page</a></p>';

$result->close();

$mysqli->close();

?>
	  
	  
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	 	
  </body>
</html>