<?php session_start();

if(isset($_COOKIE['username'])) {

	//header("Location: /php/chat.php");
	header("Location: /php/home.php");
}
$current_date = date('Y-m-d H:i:s');

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="../css/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
</head>
<body class="body_login">
<form action="/php/login.php" method='POST'>
  <div class="imgcontainer">
    <img src="/photos/Login.png" alt="Avatar" class="avatar">
  </div>

  <div style = "width:40%;margin:0 auto;">
    <label><b>USERNAME:</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
	<br>
    <label><b>PASSWORD:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <br>
    <button class="button-blue" type="submit">Login</button>
	<a href = "/pagini_html/signup.html" > <button class="button-blue" type="button">Sign Up</button> </a>
	</form>
	<input type="checkbox" name="remember" value="save-login">Remember me</input>
  </div>

</form>


</body>
</html>
