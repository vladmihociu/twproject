<?php session_start(); include 'databaseconnection.php';

	$user = $_SESSION["username"];

	$stmt = $conn->prepare('SELECT id FROM date_user WHERE username = ?');
	$stmt->bind_param('s', $user);

	$stmt->execute();
	
	$result = $stmt->get_result();
	$row = $result->fetch_row();
	
	$_GET['raspunsul'] = $row[0]."|^|";
	echo $_GET['raspunsul'];
	//echo "https://scontent.fotp3-3.fna.fbcdn.net/v/t31.0-8/291557_264324856928137_6624986_o.jpg?oh=907186e91d9f203bb9ccc73bc482dcdf&oe=59AC90DB";
?>