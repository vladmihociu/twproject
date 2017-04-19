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
<h2 style = "text-align : center" >Login Page</h2>
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

</form>


</body>
</html>
