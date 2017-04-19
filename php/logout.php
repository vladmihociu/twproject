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
		//unset($_COOKIE['username']);
		//unset($_COOKIE['password']);

		//setcookie('username', null, -1, '/');
		//setcookie('password', null, -1, '/');
		setcookie($cookie_username, $cookie_username_value, time() + (-86400), "/"); // 86400 = 1 day
		setcookie($cookie_pass, $cookie_pass_value, time() + (-86400), "/"); // 86400 = 1 day			

		header("Location: /index.php");
	}
?>