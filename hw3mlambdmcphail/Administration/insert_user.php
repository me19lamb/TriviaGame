<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add User</title>
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
	<h2>Create A New User</h2>
	<form method="post" action="insert_user.php">
    		<label>Username: 
				<input type="text" name="username">
			</label>
			<br>
    		<label>Password: 
				<input type="password" name="password">
			</label>
			<br>
    		<input type="submit" id = "submitButton" name="action" value="Insert"> 
  	</form>
	  
	  <?php
	  	$username = $_POST['username'];
	  	$password = $_POST['password'];
	  	$action = $_POST['action'];
	  	
	  	if($username != "" && $password != "" && $action == "Insert"){
				require_once("functions.php");
				$mysqli = db_connect();	
				$mysqli->query($sql);
				$sql = "INSERT INTO Users71877 (username, password) VALUES ('$username','$password')";
				if($mysqli->query($sql)){
					$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");	
					$result = $mysqli->query("SHOW COLUMNS FROM Users71877");

					echo '<table>';
					echo '<tr>';
					while ($row = $result->fetch_row()) {
						echo '<th>'.$row[0]."</th>";
					}
					echo '</tr>';

					$result->close();

					$result = $mysqli->query("SELECT * FROM Users71877");

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
			 	elseif ($mysqli->errno == 1062) {
					echo '<p>'.$username. ' already exists.</p>';
                	echo '<br> <a href="insert_user.php">Insert another User</a>';
          			die();
       			}
			}
	  		echo '<p><a href="admin.php">Return to Admin Home Page</a></p>';
		?>
	
	
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  </body>
</html>