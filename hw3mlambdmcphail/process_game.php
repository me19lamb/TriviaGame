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
    <title>Process Game</title>
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
	</style>
  </head>
 
  <body>


<?php
	session_start();
	$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
	$question = 1;
	$userAnswer = 1;
	$questions = 8;
	$correct = 0;
	$incorrect = 0;
	$currentUser = $_SESSION['username'];
	while($question <= $questions){
		$currentQuestion = $_SESSION['question'.$question];
		$gameAnswer = $_POST['answer'.$userAnswer];
		$sql = $mysqli->query("SELECT answer FROM Questions71877 WHERE question = '".$currentQuestion."'");
		$row = $sql->fetch_row();
		if($gameAnswer == $row[0]){
			//echo "Your answer is correct!<br>";
			$correct++;
			$question++;
			$userAnswer++;
		}
		else{
			//echo "Wrong answer. The correct answer is choice: ".$row[0]."<br>";
			$incorrect++;
			$question++;
			$userAnswer++;
		}
	}
	echo '<p>The current user is: '.$currentUser.'.</p>';
	echo '<p><a href="get_game.php">Play Another Game</a></p>';
	echo '<p><a href="show_results.php">Show Your Results</a></p>';
	$sql = $mysqli->query("INSERT INTO Game718773 (username, correct, incorrect) VALUES ('$currentUser','$correct','$incorrect')");

	$mysqli->close();
	

?>
	  
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	 	
  </body>
</html>