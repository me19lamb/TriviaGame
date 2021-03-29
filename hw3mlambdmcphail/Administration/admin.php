 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Home Page</title>
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
	echo '<h2>Administration Home Page</h2>';
	
	  
	echo '<p><a href="insert_user.php">Create a User</a></p>';
	echo '<p><a href="show_users.php">Show All Users</a></p>';
	echo '<p><a href="delete_user.php">Delete a User</a></p>';
	echo '<p><a href="insert_question.php">Create A Question</a></p>';
	echo '<p><a href="show_questions.php">Show All Questions</a></p>';
	echo '<p><a href="delete_question.php">Delete a Question</a></p>';
	echo '<p><a href="../login.php">Go to Login Page</a></p>';
	  
	
?>
	  
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	 	
  </body>
</html>