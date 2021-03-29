<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Question</title>
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
		label{
			font-family: sans-serif;
			color: limegreen;
			font-weight: bold;
		}
		 #submitButton{
			  border-radius: 25px;
			  background-color: limegreen;
		  }
		  
		
	  
	</style>
  </head>
  <body>
	 
	  
	  	<h2>Create a New Question</h2>
	  	<form method="post" action="insert_question.php">
    		<label>Question: 
				<input type="text" name="question">
			</label>
			<br>
    		<label>Choice 1: 
				<input type="text" name="choice1">
				<input type="radio" name="answer" value="1">
			</label>
			<br>
    		<label>Choice 2: 
				<input type="text" name="choice2">
				<input type="radio" name="answer" value="2">
			</label>
			<br>
    		<label>Choice 3: 
				<input type="text" name="choice3">
				<input type="radio" name="answer" value="3">
			</label>
			<br>
    		<label>Choice 4: 
				<input type="text" name="choice4">
				<input type="radio" name="answer" value="4">
			</label>
			<br>
    		<input type="submit" id="submitButton" name="action" value="Insert"> 
  		</form>
	  
	   <?php
	  	$action = $_POST['action'];
	  	$q = $_POST['question'];
	  	$c1 = $_POST['choice1'];
	  	$c2 = $_POST['choice2'];
	  	$c3 = $_POST['choice3'];
	  	$c4 = $_POST['choice4'];
	  	$a = $_POST['answer'];
	  	
	  	if($q != "" && $c1 != "" && $c2 != "" && $c3 != "" && $c4 != "" && $a != "" && $action == "Insert"){
			
			$sql = "INSERT INTO Questions71877 (question, choice1, choice2, choice3, choice4, answer) VALUES ('$q','$c1','$c2','$c3','$c4','$a')";
			require_once("functions.php");
			$mysqli = db_connect();	
			$mysqli->query($sql);
			
			$result = $mysqli->query("SHOW COLUMNS FROM Questions71877");

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
			


			
			$result->close();
			$mysqli->close();
		}
	  	echo '<br> <a href="insert_question.php">Insert Another Question</a>';
		echo '<p><a href="show_questions.php">Show Questions</a></p>';
		echo '<p><a href="admin.php">Return to Admin Home Page</a></p>';

	  ?>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  </body>
</html>
