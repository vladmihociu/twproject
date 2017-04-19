<?php

if(isset($_COOKIE['username'])) {

	//header("Location: /php/chat.php");
	header("Location: /home.html");
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="css/style.css" />
<title>Login Page</title>
</head>
<body>
<h2>Login Form</h2>
-
<form action="php/login.php" method='POST'>
  <div class="imgcontainer">
    <img src="photos/img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
	<br>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <br>
    <button type="submit">Login</button>
	<a href = "/pagini_html/signup.html" > <button type="button">Sign Up</button> </a>
	</form>
	<input type="checkbox" name="remember" value="save-login">Remember me</input>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
  <div> <a data-flickr-embed="true"  href="https://www.flickr.com/photos/150866114@N02/32413347981/in/photolist-5a4DCk-5a4CDP-5a8RPW-5a8TPE-5a4DP2-5a4C3c-5a8Srs-RN9wFG-5a8RZj-5a8QDd-2yQTFj-5a4DJn-5a4DgD-RofT6g-5a8RsN-5a4CcV-5a4E8M-5a4CYR-5a8RaC-5a8TS5-21HDEa-5a8Snb-5a4Cyn-5a4E5v-5a4DZ8-5a8QGG-5a8RTC-5a8SBL-5a8SFS-5a4Cwe-5a8SU9-fiS7Z6-cvLxSA-bzScCD-FecxC-bzSbZX-FedSz-8JGyAq-9TCEpD-4Fw4j4-3dymas-bmXkEU-ezgYT6-8ACHMh-3dtWwx-6kQNb5-9accca-qdYvgv-dfzqfZ-q1hw8N/" title="Colosseum"><img src="https://c1.staticflickr.com/1/462/32413347981_87b3f6ceed_b.jpg" width="1024" height="601" alt="Colosseum"></a><script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script> </div>
</form>


</body>
</html>
