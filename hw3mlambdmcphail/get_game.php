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
    <title>Trivia Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" >
	  <style>
		body{
			padding-left: 5px;
			border: 5px solid limegreen;
			border-radius: 25px;
			background-color: cyan;
		}
		 
		h2{
			text-decoration: underline;
			font-family: sans-serif;
			padding-left: 5px;
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
		  label{
			  font-family: sans-serif;
		  }
		  
		#submitButton{
			border-radius: 25px;
			background-color: limegreen;
		}
		
	  
	</style>
  </head>
  <body>
	    <?php
	  		//session_start();
	  		$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
	  		$result = $mysqli->query("SELECT question, choice1, choice2, choice3, choice4 FROM Questions71877 ORDER BY RAND()");
	  		$questionNumber = 1;
	  		$numQuestions = 8;
	  		$currentUser = $_SESSION['username'];
	  		echo '<h2>Trivia Game</h2>';
      		echo '<form method="post" action="process_game.php">';
	  		while($questionNumber <= $numQuestions){
				$row = $result->fetch_row();
				echo '<label>'.$questionNumber.')</label>';
				echo '<label>'.$row[0].'</label><br>';
				echo '<input type="radio" name="answer'.$questionNumber.'" value="1">'.$row[1].'<br>';
				echo '<input type="radio" name="answer'.$questionNumber.'" value="2">'.$row[2].'<br>';
				echo '<input type="radio" name="answer'.$questionNumber.'" value="3">'.$row[3].'<br>';
				echo '<input type="radio" name="answer'.$questionNumber.'" value="4">'.$row[4].'<br>';
				$_SESSION['question'.$questionNumber] = $row[0];
				$questionNumber++;
			}
	  		echo '<input type="submit" id = "submitButton" name="action" value="Next">';
	  		echo '</form>';
	  		$action = $_POST['action'];
	  		if($action == "Next"){
				$gameAnswers = 1;
				while($gameAnswers <= $numQuestions){
					$_SESSION['answer'.$gameAnswers] = $_POST['answer'.$gameAnswers];
					$gameAnswers++;
				}
			}
	  		echo '<p><a href=login.php>Logout</a></p>';
	  		$result->close();
	  		$mysqli->close();
		?>

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	 	
  </body>
</html>