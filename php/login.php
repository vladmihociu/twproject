<?php session_start();

	$user = $_POST["username"];
	$pass = $_POST["password"];

	function login($user,$pass)
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
		
		$sql = "SELECT * FROM login WHERE username='$user' AND password='$pass'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			$sql = "UPDATE loggedcounter SET counter = counter + 1";
			$result = $conn->query($sql);
			$sql = "INSERT INTO loggedusers(username) VALUES ('$user')";
			$result = $conn->query($sql);
			return 1;
		}
		return 0;
		
	}
	
	
	
	$_SESSION["username"] = $user;
	if(login($user,$pass))
		{
			if(isset($_POST["remember"]))
			{
			$cookie_username = "username";
			$cookie_username_value = $user;
			$cookie_pass = "password";
			$cookie_pass_value = $pass;
			setcookie($cookie_username, $cookie_username_value, time() + (86400), "/"); // 86400 = 1 day
			setcookie($cookie_pass, $cookie_pass_value, time() + (86400), "/"); // 86400 = 1 day
			}
			
			//header("Location: ../php/chat.php");
			header("Location: ../pagini_html/home.html");


		}
	else
	{
		
		echo "<script>alert('Parola este gresita');window.location.href='/index.php';</script>";
		/*header("Location: /index.php");*/

	}
	
?>
