<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delete Question</title>
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
  
<?
$action = $_POST['action'];

if ($action == "Delete Question" ) {

  $question = $_POST['question'];

	$mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
				
	$sql = "DELETE FROM Questions71877 WHERE question='$question'";
	$mysqli->query($sql);
	
	if ($mysqli->affected_rows > 0) {
		echo '<p>'.$question. ' was deleted.</p>
					<p><a href="delete_question.php">Delete Another Question</a></p>';
		die();
	}
	else  {
		echo '<p>'.$question. ' was not found.</p>
					<p><a href="delete_question.php">Delete Another Question</a></p>';
		die();
	}
	$mysqli->close();
}
?>

  <form method="post" action="delete_question.php">
    <h2>Delete Question</h2>
      <label>Question: <!--<input type="text" name="username">-->
          <?php
            $mysqli = new mysqli("localhost", "sienasel_sbxusr", "Sandbox@)!&", "sienasel_sandbox");
          
            $result = $mysqli->query("SELECT question FROM Questions71877");
		  	echo '<select name="question">';
            while ($row = $result->fetch_row()) {
	          echo '<option>'.$row[0].'</option>';
	        }
          echo '</select>';
		  echo '<p><a href="show_questions.php">Show Questions</a></p>';
		  echo '<p><a href="insert_user.php">Insert User</a></p>';
		  echo '<p><a href="admin.php">Return to Admin Home Page</a></p>';
          $result->close();
		  $mysqli->close();
          ?>
      
      </label><br>
    <input type="submit" id = "submitButton" name="action" value="Delete Question"> 
  </form>
	  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	 	
  </body>
</html>
	