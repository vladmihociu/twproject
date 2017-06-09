<?php include 'databaseconnection.php';
					
					$sql = "select username from loggedusers";
					$result = $conn->query($sql);

					if($result === FALSE) { 
					echo "Query invalid";
					/* die(mysql_error()); // TODO: better error handling */
				}					 
					echo "<ul>";

					while($row = mysqli_fetch_array($result)){
						echo "<b>".$row['username']."</b>"."<br>";
					}
					echo "</ul>";
					
?>