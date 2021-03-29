<?php
if($_GET['key']!="845"){
    die("Access denied");
}
require_once("functions.php");
$mysqli = db_connect();	
$sql = "CREATE TABLE Game718773 (
				id INT NOT NULL AUTO_INCREMENT,
				username VARCHAR(64) NOT NULL,
                correct INT NOT NULL,
                incorrect INT NOT NULL,
				PRIMARY KEY (`id`) 
                )";
$result = $mysqli->query($sql);
echo '<p>'.$result.'</p>';
$result->close();
$mysqli->close();
?>