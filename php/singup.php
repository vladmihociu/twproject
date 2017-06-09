<?php
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

		$email = $_POST["email"];
		$user = $_POST["user"];
		$pass = $_POST["psw"];
		$pass2= $_POST["psw-repeat"];
		
		$query = mysqli_query($conn, "SELECT email FROM date_user WHERE email='$email'");
		$query2 = mysqli_query($conn, "SELECT username FROM date_user WHERE username='$user'");
		
		if (mysqli_num_rows($query))
		{
			echo "<script>alert('Emailul este deja folosit ');window.location.href='../pagini_html/signup.html';</script>";
		}
		else
		if (mysqli_num_rows($query2))
		{
			echo "<script>alert('Usernameul este deja folosit ');window.location.href='../pagini_html/signup.html';</script>";
		}
		else
		if(preg_match('/[^\w ]/',$user))
		{
			echo "<script>alert('Usernameul poate contine doar caractere alfanumerice si \'_\' .');window.location.href='../pagini_html/signup.html';</script>";
		}
		else
		if(preg_match('/[^\w ]/',$pass))
		{
			echo "<script>alert('Parola poate contine doar caractere alfanumerice si \'_\' .');window.location.href='../pagini_html/signup.html';</script>";
		}
		else
		if(strcmp($pass,$pass2)!=0)
		{
			echo "<script>alert('Parolele nu corespund ');window.location.href='../pagini_html/signup.html';</script>";
		}
		else
		if(strlen($pass)>20||strlen($pass)<4)
		{
			echo "<script>alert('Parola trebuie sa contina maxim 20 de carcatere si minim 4 caractere ');window.location.href='../pagini_html/signup.html';</script>";
		}
		else	
		{
			mysqli_query($conn, " INSERT INTO date_user( username, password, nume, prenume, sex, email, adresa, tara ) VALUES('$user',md5('$pass'),'-','-','-','$email','-','-')");
			mysqli_query($conn, " INSERT INTO statistics(username, coins) VALUES('$user', 110)");
			echo "<script>alert('Cont creat cu succes');window.location.href='../index.php';</script>";
		}
?>


