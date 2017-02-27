<?php
	$user = $_POST["username"];
	$pass = $_POST["password"];

	// if user is in DB
		// if password matches for that user
		//continue; else return;
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "proiect";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$sql = "SELECT * FROM login WHERE username='$user' AND password='$pass'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		echo "Sunteti logat ca : " .$user;
	} else {
		echo "Userul si parola sunt gresite";
}
?>