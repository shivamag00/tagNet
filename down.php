
<?php

	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "tagnet";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT * FROM files";
	$result = $conn->query($sql);
	
	echo '
			<html lang="en">
				<head>
					<title>tagNet</title>
					
					<!-- Including CSS fonts -->
					<link rel="stylesheet" href="css/fonts.css"> 
					<link rel="stylesheet" href="customcss.css"> 
				</head>

				<body style="background: white">

<!---------------------- Main HTML Code ---------------------->

	
<!--==========   Header 	==========-->

					<header>
						
						<!-- Header -->
						<div class="header" style="height:5%; text-align:left;">
							<a title="Home Page" href="index.html" class="glow mainhead" style="margin-left:2%; text-decoration:none; color:white; font-size:200%">#tagnet</a>
						</div>
					</header>
	
					<!--========== 			Main Layout		==========-->	
					<div class="container">
	
						<!-- Search Box -->
					<!--
						<div class="md-form mt-3" style="width: 15%; float: right;">
							<input id="materialSubscriptionFormPasswords" onkeyup="searchtable1()" type="text" autocomplete="off" class="form-control" name="Filename"> 
							<label for="materialSubscriptionFormPasswords">Search</label>
						</div>
					-->
		
						<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="th-sm">File Name</th>
									<th class="th-sm">Download</th>
								</tr>
							</thead>
							<tbody>
		 ';
	if($result->num_rows > 0)
	{
		// output data of each row
		while($row = $result->fetch_assoc())
		{
			echo'
		  
								<tr>
									<td>'.$row['File Name'].'</td>
									<td><p><a href="download.php?file='.$row['File Location'].'" target="_blank ">Download</a></p></td>
								</tr>
				';
		}
	}	
		
	echo '
							</tbody>
						</table>
					</div>
	
  <!-- SCRIPTS -->
					<script>
						function searchtable1() 
						{
							// Declare variables
							var input, filter, table, tr, td, i, txtValue;
							input = document.getElementById("materialSubscriptionFormPasswords");
							filter = input.value.toUpperCase();
							table = document.getElementById("dtBasicExample");
							tr = table.getElementsByTagName("tr");

							// Loop through all table rows, and hide those who dont match the search query
							for (i = 0; i < tr.length; i++) 
							{
								td = tr[i].getElementsByTagName("td")[0];
								if (td) 
								{
									txtValue = td.textContent || td.innerText;
									if (txtValue.toUpperCase().indexOf(filter) > -1) 
									{
										tr[i].style.display = "";
									} 
									else 
									{
										tr[i].style.display = "none";
									}
								}
							}
						}
					</script>
				</body>

			</html>';
?>
