<?php session_start();

function logout()
	{
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
		$sql = "UPDATE loggedcounter SET counter = counter - 1";
		$result=null;
		$result = $conn->query($sql);
		$user=$_SESSION["username"];
		$sql = "DELETE FROM loggedusers WHERE username='$user'";
		$result = $conn->query($sql);
		if($result)
		{
			return 1;
		}
		return 0;

	}
	
	if(logout())
	{
		setcookie('username', $_SESSION["username"], time() + (-86400), "/"); // 86400 = 1 day
		echo "bram";
		setcookie('password', $_SESSION["password"], time() + (-86400), "/"); // 86400 = 1 day			

		header("Location: /index.php");
		
	}
	
?>