<?php session_start(); include 'databaseconnection.php';

	$raspuns = $_GET['raspunsul'];
	$url = $_GET['urll'];
	$user = $_SESSION["username"];
	$returnedString = '';

	/* 
	$stmt = $conn->prepare('SELECT id FROM date_user WHERE username = ?');
	$stmt->bind_param('s', $user);

	$stmt->execute();
	
	$result = $stmt->get_result();
	$row = $result->fetch_row();
	
	$_GET['raspunsul'] = $row[0]."|^|";
	*/

	
	/* Validation of the client answer */

	$stmt = $conn->prepare('SELECT answer from images where url = ?');
	$stmt->bind_param('s', $url);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_row();

	if( strcmp($row[0], $raspuns) == 0 ){
		/* Raspunsul este corect */
		
		/* Extracting the coin number */

		$stmt = $conn->prepare('SELECT coins from statistics where username = ?');
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();

		$returnedString = $row[0]."|^|";
		
		/* Extracting the next image url */
		
		$stmt = $conn->prepare('SELECT url FROM images where url <> ? ORDER BY RAND() LIMIT 1');
		$stmt->bind_param('s', $url);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();
		
		$returnedString .= $row[0]."|^|";
	}
	else{
		/* Raspunsul este gresit */
		/* Extracting the next image url */
		
		$stmt = $conn->prepare('SELECT url FROM images where url <> ? ORDER BY RAND() LIMIT 1');
		$stmt->bind_param('s', $url);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();
		
		$returnedString = $row[0];
	}


	echo $returnedString;
	//echo "https://scontent.fotp3-3.fna.fbcdn.net/v/t31.0-8/291557_264324856928137_6624986_o.jpg?oh=907186e91d9f203bb9ccc73bc482dcdf&oe=59AC90DB";
?>
