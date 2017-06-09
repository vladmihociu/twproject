<?php session_start();

function logout()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "proiect";
		
		$user=$_SESSION["username"];

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$stmt = $conn->prepare('DELETE FROM loggedusers WHERE username=?');
		$stmt->bind_param('s', $user);
		$stmt->execute();
		
		return 1;
	}
	
	if(logout())
	{
		setcookie('username', $_SESSION["username"], time() + (-86400), "/"); // 86400 = 1 day
		setcookie('password', $_SESSION["password"], time() + (-86400), "/"); // 86400 = 1 day	
		session_destroy();		
		header("Location: ../index.php");
		
	}
	
?>