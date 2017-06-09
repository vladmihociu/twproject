<?php
	session_start();
	if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "OK")) {
			echo "<script>alert('Nu sunteti logat ');window.location.href='../index.php';</script>";
			exit;
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Top players</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
	
	<style>
	/* Scrooling loged users bar  */
	nav ul{height:100px; width:90%;}
	nav ul{overflow:hidden; overflow-y:scroll;}
	</style>
</head>
<body class="body_website">
	<img class="header2" src='../photos/banner1.png' alt="Guess the VIP">
	<ul>
		<li class = "li-customize"><a href="home.php">Home</a></li>
		<li class = "li-customize"><a href="start.php">Start playing</a></li>
		<li class = "li-customize"><a class="active" href="top.php">Top players</a></li>
		<li class = "li-customize"><a href="profile.php">Profile</a></li>
		
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a href="logout.php">Log out</a></li>
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a href="contact.php">Contact</a></li>
	</ul>
	<div class="continut">
	<div class="clasament">
	<table border="1" style="margin-left:5%;width:90%;margin-bottom:5%;text-align:left;margin-top:5%;" >
	<tr><th><p style="font-size:60px;text-align:center;">Clasament</p><br></th></tr>
	<div style="text-align:left;margin-left:3%">
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
					
					$sql = "SELECT username,correct_answers FROM statistics order by correct_answers desc LIMIT  10";
					$result = $conn->query($sql);

					if($result === FALSE) { 
					echo "Query invalid";
					/* die(mysql_error()); // TODO: better error handling */
				}					 
					$i=1;
					while($row = mysqli_fetch_array($result)){
						echo "<tr><td>".$i.". ".$row['username']."   ".$row['correct_answers']." raspunsuri corecte."."</td></tr>";
						$i=$i+1;
					}
					
	?>
	</div>
	</table>
	</div>
	</div>
	
	<!-- @Andrei - Aici trebuie sa il faci responsive -->
	<div class="rightside">
	<h3 class='paddingg' style = "color : gold;">Online Players:</h3>
		<nav id="online" name="online">	
		
		</nav>
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
	
<script>
	function loadOnlinePlayers(){
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'loggedusers.php');
			xhr.onload = function() {
				if (xhr.status === 200) 
				{
					document.getElementById('online').innerHTML = xhr.responseText;
				}
				else {
					alert('Request failed.  Returned status of ' + xhr.status);
				}
			};
			xhr.send();
	}
					setInterval(function(){loadOnlinePlayers()}, 100);
</script>
</body>
</html>