<?php session_start(); include 'databaseconnection.php';

	$raspuns = $_GET['raspuns'];
	$url = $_GET['url'];
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
		
	
		
		$stmt = $conn->prepare("update statistics  set correct_answers_per_game = correct_answers_per_game + 1, correct_answers = correct_answers + 1, strike = strike + 1 where username = ?");
		$stmt->bind_param('s', $user);
		$stmt->execute();
		
		/* Extracting the strike value */
		
		$stmt = $conn->prepare('SELECT strike from statistics where username = ?');
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();
		
		if($row[0] > 2 && $row[0] < 6)
		{
			$stmt = $conn->prepare("update statistics set coins = coins + 1 where username = ?");
			$stmt->bind_param('s', $user);
			$stmt->execute();
		}
		else if ( $row[0] > 5 )
		{
			$stmt = $conn->prepare("update statistics set coins = coins + 3 where username = ?");
			$stmt->bind_param('s', $user);
			$stmt->execute();
		}
		/*******************************/
		
		/* Extracting the coin number */
		
		$stmt = $conn->prepare('SELECT coins from statistics where username = ?');
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();

		$returnedString = $row[0]."|^|";
		/*******************************/

		/* Extracting the next image url */
		
		$stmt = $conn->prepare('SELECT url FROM images where url <> ? ORDER BY RAND() LIMIT 1');
		$stmt->bind_param('s', $url);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();
		
		$returnedString .= $row[0]."|^|";
		/*******************************/
		
		/* Extracting the correct_answers */
		
		$stmt = $conn->prepare('SELECT correct_answers FROM statistics where username = ?');
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();
		
		$returnedString .= $row[0]."|^|";		

	}
	else{
		/* Raspunsul este gresit */
		
		$stmt = $conn->prepare("update statistics  set strike = 0, wrong_answer = wrong_answer-1 where username = ?");
		$stmt->bind_param('s', $user);
		$stmt->execute();
		
		$stmt = $conn->prepare("select wrong_answer from statistics where username = ?");
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_row();
		
		if( $row[0] > -3 ) /* Jocul inca continua */
		{
			/* Extracting the next image url */
			
			$stmt = $conn->prepare('SELECT url FROM images where url <> ? ORDER BY RAND() LIMIT 1');
			$stmt->bind_param('s', $url);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_row();
			
			$returnedString = $row[0];
		}
		else
		{
			$stmt = $conn->prepare('SELECT correct_answers_per_game FROM statistics where username = ?');
			$stmt->bind_param('s', $user);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_row();
			
			$returnedString = $row[0];
		
			$stmt = $conn->prepare("update statistics  set correct_answers_per_game = 0, strike = 0, wrong_answer = 0 where username = ?");
			$stmt->bind_param('s', $user);
			$stmt->execute();
		}
	}


	echo $returnedString;
	//echo "https://scontent.fotp3-3.fna.fbcdn.net/v/t31.0-8/291557_264324856928137_6624986_o.jpg?oh=907186e91d9f203bb9ccc73bc482dcdf&oe=59AC90DB";
?>
