<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	
	<style>
	/* Scrooling loged users bar  */
	nav ul{height:100px; width:48%;}
	nav ul{overflow:hidden; overflow-y:scroll;}
	</style>

</head>
<body class="body_website">
	<img class="header2" src='../photos/banner1.png' alt="Guess the VIP">
	<ul>
		<li class = "li-customize"><a class="active" href="home.php">Home</a></li>
		<li class = "li-customize"><a href="start.php">Start playing</a></li>
		<li class = "li-customize"><a href="top.php">Top players</a></li>
		<li class = "li-customize"><a href="profile.php">Profile</a></li>
		
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a href="logout.php">Log out</a></li>
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a href="contact.php">Contact</a></li>
	</ul>
	
	
	<div class="continut">
	
	<br>
	
	<h3 class = "paddingg" style = "color:gold; text-align:center;" > Bine ati venit la jocul Guess the VIP. <br><br>Regulile sunt simple: <br><br> </h3>
	<p class='paddingg' style = "color:silver; text-align:center;"> 
	-La fiecare nivel va trebui sa ghiciti numele persoane/obiectivului din imagine.<br>	
	-Daca reusiti, veti trece la urmatorul nivel, veti obtine un punct si un banut.<br>
	-Cu ajutorul punctelor veti creste in clasamentul jocului.<br>
	-Cu ajutorul banutilot puteti folosi variante ajutatoare:<br>
	-Afla o litera a numelui(cost:1 banut);<br>
	-Alege dintre 2 variante de raspuns(cost:5 banuti);<br>
	-Afla raspunsul corect(cost:10 banuti);<br>
	-Aveti la dispozitie 3 vieti .<br>
	-La fiecare 5 nivele trecute consecutiv mai primiti o viata.<br>
	-Daca ramaneti fara vieti jocul se termina si ramaneti cu punctele si banutii adunati pe parcurs.<br>
	</p>
	
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