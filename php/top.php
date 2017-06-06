<!DOCTYPE html>
<html>
<head>
	<title>Top players</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
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
	<div style="width:40%;margin-top:10%;margin-left:30%;text-align:center;color:white;">
	<p style="font-size:30px;">Clasament</p><br>
	<p>1.Admin:22 puncte</p>
	<p>2.Vlad:20 puncte</p>
	<p>3.Andrei:17 puncte</p>
	</div>
	</div>
	
	<div class="rightside">
	<h3 class='paddingg' style = "color : gold;">Online Players:</h3>
		<p class='paddingg' >VLAD </p>
		<p class='paddingg' >ANDREI </p>
		<p class='paddingg' >ADMIN </p>
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