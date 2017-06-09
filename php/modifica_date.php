<?php session_start();

	$nume = $_POST["nume"];
	$prenume = $_POST["prenume"];
	$email = $_POST["email"];
	$adresa = $_POST["adresa"];
	$sex=$_POST["sex"];
	$tara=$_POST["tara"];

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
		if(preg_match('/[^\w ]/',$nume))
		{
			echo "<script>alert('Numele poate contine doar caractere alfanumerice si \'_\' .');window.location.href='profile_enabled.php';</script>";
		}
		else
		if(preg_match('/[^\w- ]/',$prenume))
		{
			echo "<script>alert('Prenumele poate contine doar caractere alfanumerice si \'_\' \'-\' .');window.location.href='profile_enabled.php';</script>";
		}
		else
		if(preg_match('/[^\w,. ]/',$adresa))
		{
			echo "<script>alert('Adresa poate contine doar caractere alfanumerice si \'_\' , \'.\' , \',\' , \';\'.');window.location.href='profile_enabled.php';</script>";
		}
		else
		{
		$sql = "UPDATE date_user SET nume='$nume', prenume='$prenume',sex='$sex', tara='$tara', email='$email', adresa='$adresa' WHERE username='".$_SESSION["username"]."' ";
		if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Date modificate cu succes ');window.location.href='profile.php';</script>";} 		
		else 
		{
			echo "<script>alert('Datele nu au putut fi modificate ');window.location.href='profile.php';</script>";
		}
		}
		
		
?>