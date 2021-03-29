<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
		  #errorMessage{
			  color: red;
			  font-weight: bold;
		  }
		
	  
	</style>
  </head>
 
  <body>
	  
	  <?php
	  		session_start();
	  	
	  
	  		echo '<form method = "post" action = "login.php">';
	  		echo '<h2>Trivia Game Login</h2>';
	  		echo '<label>Username: <input type = "text" name = "username"></label><br>';
	  		echo '<label>Password: <input type = "password" name = "password"></label><br>';
	  		echo '<input type = "submit" id = "submitButton" name = "action" value = "Login">';
	  
	  
	  
	  
	  
	  
	  		$error = false;
	  		$_SESSION['authenticated'] = false;
	  		$action = $_POST['action'];
	  		if($action == "Login"){
				$username = $_POST['username'];
				$submitted_password = $_POST['password'];
				
				$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
				$result = $mysqli->query("SELECT password FROM Users71877 WHERE username='$username'");
				$row = $result->fetch_row();
				$stored_password = $row[0];
				$mysqli->close();
				
				if($stored_password != null && ($submitted_password == $stored_password)){
					$_SESSION['authenticated'] = true;
					$_SESSION['username'] = $_POST['username'];
					echo '<p>You have been authenticated.</p>';
					echo '<p><a href="get_game.php">Play A Game</a></p>';
					echo '<p><a href="show_results.php">Show Your Results</a></p>';
					echo '<p><a href="login.php">Logout</a></p>';
					die();
				}
				else{
					echo '<p id = "errorMessage">Login Failed</p>';
				}
				
				
				
			}
	  ?>
	  
	  
	  
	  
	  
	  
	
	  
	  
	  
	  
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	 	
  </body>
</html>