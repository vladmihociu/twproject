<!DOCTYPE html>
<html>
<head>
	<title>Start playnig</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	
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
		<li class = "li-customize"><a class="active" href="start.php">Start playing</a></li>
		<li class = "li-customize"><a href="top.php">Top players</a></li>
		<li class = "li-customize"><a href="profile.php">Profile</a></li>
		
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a href="logout.php">Log out</a></li>
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a href="contact.php">Contact</a></li>
	</ul>
	
	
	<div class="continut" style="position: relative;">
	<br><br><br>

	<img class="coin" src="/photos/coin.png" alt="">
	<p class="coins" name="banuti" id="banuti"> 
	
			<?php session_start(); include 'databaseconnection.php';
			
			$user = $_SESSION["username"];
			/* Extracting the coin number */

					$stmt = $conn->prepare('SELECT coins from statistics where username = ?');
					$stmt->bind_param('s', $user);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_row();
					echo $row[0];
			?>

	</p>
	<img id="imagine" class="picture" style = "display: block; margin: 0 auto;" src="
																					<?php include 'databaseconnection.php';
																					/* Extracting the next image url */
		
																					$sql = "SELECT url FROM images ORDER BY RAND() LIMIT 1";
																					$result = $conn->query($sql);
																					$row = $result->fetch_assoc();
																					echo $row["url"];
																					?>
																					"
																					width="400" height="227" alt="">
	
	<br><br>
	
	<div class="user-input" >
	<input name="raspunss" id="raspunss" type="raspuns2" placeholder="Your answer" style="width:30%;" required/>
	<button class="button-submit-answer" type="button" onclick="validate()">Submit answer</button>
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
	
	
	
	

<script>

	function validate(){
		
			var raspuns = document.getElementById('raspunss').value;
			var url = document.getElementById("imagine").src;
			$.ajax({
				type : "GET",
				url  : 'validate.php',
				data: { 
				urll: url, 
				raspunsul: raspuns, 
			  },
				success: function(data) {
					var splitResult=data.split("|^|");
					if( splitResult.length > 1 )
					{
						//$("#imagine").attr("src",data);
						//console.log(data);
						//$("#imagine").html(data);
						alert("Felicitari, ati raspuns corect!");
						document.getElementById('raspunss').value = '';
						$("#banuti").html(splitResult[0]);
						$("#imagine").attr("src",splitResult[1]);
					}
					else
					{
						alert("Din pacate, raspunsul a fost gresit!");
						document.getElementById('raspunss').value = '';
						$("#imagine").attr("src",data);
					}
				},
				error: function (XMLHttpRequest, textStatus, errorThrow) {
					alert("Timeout connecting server...");
				}
			})
		}
</script>
	
</body>
</html>
