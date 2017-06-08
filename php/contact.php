<?php session_start();
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
		if(isset($_SESSION["username"]))
		{
   		$sql = mysqli_query($conn, " SELECT * FROM date_user WHERE username='".$_SESSION["username"]."' ");
		$result = $sql->fetch_assoc();
		$email=$result['email'];
		$user=$_SESSION["username"];
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	
	<style>
	/* Scrooling loged users bar  */
	nav ul{height:100px; width:48%;}
	nav ul{overflow:hidden; overflow-y:scroll;}
	</style>
</head>
<body class="body_website">
	<img class="header2" src='../photos/banner1.png' alt="Guess the VIP">
	<ul>
		<li class = "li-customize"><a href="home.php">Home</a></li>
		<li class = "li-customize"><a href="start.php">Start playing</a></li>
		<li class = "li-customize"><a href="top.php">Top players</a></li>
		<li class = "li-customize"><a href="profile.php">Profile</a></li>
		
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a href="logout.php">Log out</a></li>
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a class="active" href="contact.php">Contact</a></li>
	</ul>
	<div class="continut">
	<div id="nume1">
	<p>Nume: Lupu Andrei-Catalin</p>
	<p>Email_1: catalin.lupu@feniri.info.uaic.ro</p>
	<p>Email_2: andrei.lupu96@yahoo.com</p>
	<p>Grupa: B6</p>
	<p>An: II</p>
	<p>Profesor indrumator: Coman Alexandru</p>
	</div>
	<div id="nume2">
	<p>Nume: Mihociu Vlad</p>
	<p>Email_1: vlad.mihociu@feniri.info.uaic.ro</p>
	<p>Email_2: vlad.maciu@gmail.com</p>
	<p>Grupa: B6</p>
	<p>An: II</p>
	<p>Profesor indrumator: Coman Alexandru</p>
	</div>
	<div style="margin-top:10%;margin-left:15%;text-align:center;width:70%;margin-bottom:10%">
	<form action="send_email.php" method="POST">
	<p style="font-size:20px;">Formular de contact</p><br>
    <p>User</p>
    <input type="text" name="user" value="<?PHP echo     $user?>" style="color:white;">

    <p>Email<p>
    <input type="text" name="email" value="<?PHP echo     $email?>" style="color:white;" >

    <p>Problema semnalata<p>
    <select name="problema">
      <option value="intrebare">Intrebare</option>
      <option value="problema">Raportare problema</option>
      <option value="altele">Altele</option>
    </select>
	<br><br>
    <p>Subiect</p>
    <textarea name="subiect" placeholder="Detalii despre problema semnalata" style="width:100%;"></textarea>
	<br><br>
	<p class="name"  style=" display: none;">
      <label>If you're human leave this blank:</label>
      <input name="name" type="text" />
    </p>
    <input type="submit" value="Submit">
	</form>
	</div>
	</div>
	
	<!-- @Andrei - Aici trebuie sa il faci responsive -->
	<div class="rightside">
	<h3 class='paddingg' style = "color : gold;">Online Players:</h3>
		<nav>	
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
					
					$sql = "select username from loggedusers";
					$result = $conn->query($sql);

					if($result === FALSE) { 
					echo "Query invalid";
					/* die(mysql_error()); // TODO: better error handling */
				}					 
					echo "<ul>";

					while($row = mysqli_fetch_array($result)){
						echo "<b>".$row['username']."</b>"."<br>";
					}
					echo "</ul>";
					
					?>
		</<nav>
	<div class="profileinfo"><h3 class='paddingg' style = "color : gold;">Profile info: </h3>
	<p class='paddingg' > Total games played: </p>
	<p class='paddingg' > Total used coins: </p>
	<p class='paddingg' > Total unused coins: </p>
	<p class='paddingg' > Personal record: </p>
	<p class='paddingg' > Global rank: </p>
	<p> </p>
	</div>
	</div>
	
	
	<div class="footer">
		<a class="time" id="time" style="float:right;margin-right: 10px;margin-top: 3px; text-decoration:none; color:silver"> 
			<script > 
			
				var time = document.getElementById('time');
				function writeDate () {
					var today = new Date();
					time.innerHTML = today.getHours() +":" + today.getMinutes() + ":" + today.getSeconds();
					time.innerHTML += " " + today.getDate() + "/" + (today.getMonth() + 1) + "/" + today.getFullYear();
				}

				setInterval(writeDate, 100);
				
			</script>
		</a>
	</div>
	
	
</body>
</html>