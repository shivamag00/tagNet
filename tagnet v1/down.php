
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
	
	echo '
<html lang="en">

	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>tagNet</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">
	<!-- Custom styles  -->
	<!-- Custom styles  -->
	<link rel="stylesheet" href="css/styleUpload.css">

	<style>
		th {
			cursor: pointer;
		}
	</style>

	</head>

	<body style="background: white">

	<!---------------------- Main HTML Code ---------------------->
	<!--========== 			Navbar		 	==========-->
		<header>
			<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
			<a class="navbar-brand" href="index.html">#IIITNet</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
				aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent-333">
				<ul class="navbar-nav ml-auto nav-flex-icons">
				<li class="nav-item">
					<a class="nav-link waves-effect waves-light">
					<i class="fab fa-instagram"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link waves-effect waves-light">
					<i class="fab fa-facebook"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link waves-effect waves-light">
					<i class="fab fa-google-plus-g"></i>
					</a>
				</li>
				</ul>
			</div>
			</nav>	
		<!--========== 			Navbar Ends	 	==========-->
		</header>

	<!--========== 			Main Layout		==========-->	
	<main class="mt-5">
		
		<div class="container">
			<div style="margin-top: 7rem!important">
				<input type="text" id="searchInput" placeholder="Search for files.." style="width:50%" onkeyup="myFunction()">
			</div>

			<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th-sm" onclick="sortTable(0)">File Name</th>
						<th class="th-sm">Download</th>
					</tr>
				</thead>
			
				<tbody>
			';
			if($result->num_rows > 0){
			// output data of each row
			while($row = $result->fetch_assoc()){
				echo'
			
				<tr>
				<td>'.$row['File Name'].'</td>
				<td><p><a href="download.php?file='.$row['File Location'].'" target="_blank ">Download</a></p></td>
				</tr>';
			}
			}	
			echo '
				</tbody>
			</table>
		</div>
	</main>
	<!--========== 			Footer			 ==========-->
	<footer>
	</footer>

		
	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/js/mdb.min.js"></script>

	<script>
		function myFunction() {
			// Declare variables
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("searchInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("dtBasicExample");
			tr = table.getElementsByTagName("tr");
		
			// Loop through all table rows, and hide those who don"t match the search query
			for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
				} else {
				tr[i].style.display = "none";
				}
			}
			}
		}

		function sortTable(n) {
			var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
			table = document.getElementById("dtBasicExample");
			switching = true;

			// Set the sorting direction to ascending:
			dir = "asc";

			/* Make a loop that will continue until
			no switching has been done: */
			while (switching) {

			  // Start by saying: no switching is done:
			  switching = false;
			  rows = table.rows;

			  /* Loop through all table rows (except the
			  first, which contains table headers): */
			  for (i = 1; i < (rows.length - 1); i++) {
				// Start by saying there should be no switching:
				shouldSwitch = false;
				/* Get the two elements you want to compare,
				one from current row and one from the next: */
				x = rows[i].getElementsByTagName("TD")[n];
				y = rows[i + 1].getElementsByTagName("TD")[n];
				/* Check if the two rows should switch place,
				based on the direction, asc or desc: */
				if (dir == "asc") {
				  if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
					// If so, mark as a switch and break the loop:
					shouldSwitch = true;
					break;
				  }
				} else if (dir == "desc") {
				  if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
					// If so, mark as a switch and break the loop:
					shouldSwitch = true;
					break;
				  }
				}
			  }
			  if (shouldSwitch) {
				/* If a switch has been marked, make the switch
				and mark that a switch has been done: */
				rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
				switching = true;
				// Each time a switch is done, increase this count by 1:
				switchcount ++;
			  } else {
				/* If no switching has been done AND the direction is "asc",
				set the direction to "desc" and run the while loop again. */
				if (switchcount == 0 && dir == "asc") {
				  dir = "desc";
				  switching = true;
				}
			  }
			}
		}
	</script>


	</body>

</html>';
?>