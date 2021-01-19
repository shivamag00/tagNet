
<?php

	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "tagnet";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	// $link = mysqli_connect("localhost", "username", "password", "lab");
	// if($link === false){
        // die("ERROR: Could not connect. " . mysqli_connect_error());
    // }
	
	$sql = "SELECT * FROM files";
	$result = $conn->query($sql);
	
	echo"
		<html><head>
		<style>
			table, th, td{
			border: 1px solid black;
			border-collapse: collapse;
		}
		</style></head><body>
		<table>
			<tr><th>File Name</th><th>Action</th></tr>
	";
	
	if($result->num_rows > 0){
		// output data of each row
		while($row = $result->fetch_assoc()){
			echo
			"<tr><td>".$row['File Name']."</td><td><p><a href='download.php?file=".$row['File Location']."' target='_blank '>Download</a></p></td></tr>";
			}
	}
	else{
		echo "No results to display";
	}
	// }
	
    // close connection
    $conn->close();