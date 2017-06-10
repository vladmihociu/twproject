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
	<title>Start playnig</title>
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
	
			<?php include 'databaseconnection.php';
			
			$user = $_SESSION["username"];
			/* Reset the wrong answers */
			
			$stmt = $conn->prepare("update statistics  set wrong_answer = 0, strike = 0, correct_answers_per_game = 0 where username = ?");
			$stmt->bind_param('s', $user);
			$stmt->execute();
			/*******************************/
			
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
	<br><br>
	<button class="button-submit-answer" type="button" onclick="autocorrect()"> Correct answer - 5 coins </button>    
	<button class="button-submit-answer" type="button" onclick="skipimage()"> Skip picture - 3 coins </button> 

	</div>
	
	</div>
		
	
	<!-- @Andrei - Aici trebuie sa il faci responsive -->
	<div class="rightside">
	<h3 class='paddingg' style = "color : gold;">Online Players:</h3>
		<nav id="online" name="online">	
		
		</nav>
	<div class="profileinfo">
	<h3 class='paddingg' style = "color : gold;">Profile info: </h3>
	<p class='paddingg' name="correctanswer" id="correctanswer"> Total correct answers: 
						<?php include 'databaseconnection.php';
						
						/* Extracting the next image url */
						
						$user = $_SESSION["username"];
						$stmt = $conn->prepare('SELECT correct_answers FROM statistics where username = ?');
						$stmt->bind_param('s', $user);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_row();

						echo $row[0];
						?>
	</p>
	<p class='paddingg' name="banuti-righside" id="banuti-righside"  > Total coins: 
						<?php include 'databaseconnection.php';
						
						/* Extracting the next image url */
						
						$user = $_SESSION["username"];
						$stmt = $conn->prepare('SELECT coins FROM statistics where username = ?');
						$stmt->bind_param('s', $user);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_row();

						echo $row[0];
						?></p>
	<p class='paddingg' name="strike" id="strike"> Current game strikes: 
						<?php include 'databaseconnection.php';
						
						/* Extracting the next image url */
						
						$user = $_SESSION["username"];
						$stmt = $conn->prepare('SELECT strike FROM statistics where username = ?');
						$stmt->bind_param('s', $user);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_row();

						echo $row[0];
						?>
	</p>
	<p class='paddingg' name="correctpergame" id="correctpergame"> Current game correct answers: 
					<?php include 'databaseconnection.php';
						
						/* Extracting the next image url */
						
						$user = $_SESSION["username"];
						$stmt = $conn->prepare('SELECT correct_answers_per_game FROM statistics where username = ?');
						$stmt->bind_param('s', $user);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_row();

						echo $row[0];
						?>
	</p>
	<p class='paddingg' name="wronganswer" id="wronganswer"> Chances left: 
						<?php include 'databaseconnection.php';
						
						/* Extracting the next image url */
						
						$user = $_SESSION["username"];
						$stmt = $conn->prepare('SELECT wrong_answer FROM statistics where username = ?');
						$stmt->bind_param('s', $user);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_row();
						$sanse = intval($row[0]) + 3;
						echo $sanse;
						?>
	</p>
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
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'validate.php?raspuns='+raspuns+'&url='+url);
			xhr.onload = function() {
				if (xhr.status === 200) {
					var splitResult=xhr.responseText.split("|^|");
					
					if( splitResult.length > 1 )
					{
						alert("Felicitari, ati raspuns corect!");
						document.getElementById('raspunss').value = '';
						document.getElementById('banuti').innerHTML = splitResult[0];
						document.getElementById("banuti-righside").innerHTML = " Total coins: " +splitResult[0];
						document.getElementById("imagine").src=splitResult[1];
						document.getElementById("correctanswer").innerHTML = " Total correct answers: " + splitResult[2];
						document.getElementById("correctpergame").innerHTML = " Current game correct answers:  " + splitResult[3];
						document.getElementById("strike").innerHTML = " Current game strikes: " + splitResult[4];


					

					}
					else
					{
						var raspuns_server = xhr.responseText;
						if(!raspuns_server.startsWith("http"))
						{
							alert("Ati raspuns gresit!\n\nJocul s-a terminat!\n\n In acest meci ai acumulat "+xhr.responseText+" puncte.");
							window.location = "home.php";
							
						}
						else
						{
							var parse = xhr.responseText.split("|||");
							var sanse = parseInt(parse[1]) + 3;
							alert("Din pacate, raspunsul a fost gresit!\n\nMai ai "+sanse+" vieti.");
							document.getElementById('raspunss').value = '';
							document.getElementById("imagine").src=parse[0];
							document.getElementById("wronganswer").innerHTML = " Chances left: " + sanse;
							document.getElementById("strike").innerHTML = " Current game strikes: " + parse[2];


						}
						

					}
				}
				else {
					alert('Request failed.  Returned status of ' + xhr.status);
				}
			};
			xhr.send();
		
	}
	
	function autocorrect(){
		
			var url = document.getElementById("imagine").src;
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'autocorrect.php?url='+url);
			xhr.onload = function() {

				if (xhr.status === 200) 
				{
					var raspuns = xhr.responseText;
					if( raspuns.startsWith("Insuf"))
					{
							alert(raspuns);
					}
					else
					{
						document.getElementById('raspunss').value  = raspuns;
					}
				}
				else {
					alert('Request failed.  Returned status of ' + xhr.status);
				}
			};
			xhr.send();
	}
	
	function skipimage(){
		
			var url = document.getElementById("imagine").src;
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'skipimage.php?url='+url);
			xhr.onload = function() {

				if (xhr.status === 200) 
				{
					var raspuns = xhr.responseText;
					if(raspuns.startsWith("http"))
					{
						var parse = xhr.responseText.split("|.|");
						
						document.getElementById("imagine").src=parse[0];
						document.getElementById('banuti').innerHTML = parse[1];
						document.getElementById("banuti-righside").innerHTML = " Total coins: " +parse[1];
					}
					else
					{
						alert(raspuns);

					}
				}
				else {
					alert('Request failed.  Returned status of ' + xhr.status);
				}
			};
			xhr.send();
	}
	
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
