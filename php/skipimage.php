<?php session_start(); include 'databaseconnection.php';

	$url = $_GET['url'];
	$user = $_SESSION["username"];

	$returnString = "";
	
	$stmt = $conn->prepare('SELECT coins from statistics where username = ?');
	$stmt->bind_param('s', $user);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_row();
	
	if(intval($row[0]) > 2)
	{
		
		$stmt = $conn->prepare('SELECT url FROM images where url <> ? ORDER BY RAND() LIMIT 1');
		$stmt->bind_param('s', $url);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();
		
		$returnString = $row[0]."|.|";
		
		$stmt = $conn->prepare("update statistics set coins = coins - 3 where username = ?");
		$stmt->bind_param('s', $user);
		$stmt->execute();
		
		$stmt = $conn->prepare('SELECT coins from statistics where username = ?');
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();
		
		$returnString .= $row[0];
	
	}
	else
	{
		$returnString = "Insuficient coins";
	}
	
	
	
	
	

	echo $returnString;

?>