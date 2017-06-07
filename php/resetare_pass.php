<?php session_start();

	$oldpass=md5($_POST["oldpas"]);
	$newpass=$_POST["newpas"];
	$newpass2=$_POST["newpas2"];

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
	
		$sql = mysqli_query($conn, "SELECT password FROM date_user WHERE username='".$_SESSION["username"]."' ");
		$result = $sql->fetch_assoc();
		if(strcmp(($result['password']),($oldpass))==0 && strcmp($newpass,$newpass2)==0 && strlen($newpass)<=20 && strlen($newpass)>=4)
		{
			$sql = "UPDATE date_user SET password=md5('$newpass') WHERE username='".$_SESSION["username"]."' ";
			if ($conn->query($sql) === TRUE) 
			{
				echo "<script>alert('Parola schimbata cu succes ');window.location.href='profile.php';</script>";
			} 			
			else 
			{
				echo "<script>alert('Parola nu a putut fi schimbata');window.location.href='profile.php';</script>";
			}
		}
		else
		if(strcmp($result['password'],$oldpass)!=0)
		{
			echo "<script>alert('Parola veche incorecta');window.location.href='profile.php';</script>";
		}
		else
		if(strcmp($newpass,$newpass2)!=0)
		{
			echo "<script>alert('Parolele nu corespund');window.location.href='profile.php';</script>";
		}
		else
		if(strlen($newpass)>20 || strlen($newpass)<4)
		{
			echo "<script>alert('Parola trebuie sa contina maxim 20 de carcatere si minim 4 caractere ');window.location.href='profile.php';</script>";
		}
?>