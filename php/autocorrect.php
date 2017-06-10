<?php session_start(); include 'databaseconnection.php';

	$url = $_GET['url'];
	$user = $_SESSION["username"];
	$returnString = "";
	
	$stmt = $conn->prepare('SELECT coins from statistics where username = ?');
	$stmt->bind_param('s', $user);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_row();
	
	if(intval($row[0]) > 4)
	{
		
		$stmt = $conn->prepare('SELECT answer from images where url = ?');
		$stmt->bind_param('s', $url);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();
		$returnString = $row[0];
		$stmt = $conn->prepare("update statistics set coins = coins - 5 where username = ?");
		$stmt->bind_param('s', $user);
		$stmt->execute();
	
	}
	else
	{
		$returnString = "Insuficient coins";
	}
	
	
	echo $returnString;

?>