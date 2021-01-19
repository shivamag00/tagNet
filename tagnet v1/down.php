
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
	
	<!-- Mask Starts-->
<!--
	<div id="intro" class="view">
		<div class="full-bg-img mask rgba-black-strong">
			<center><div class="mainDiv">
				<h2 class="display-4 white-text pt-5 mb-2">I want to...</h2>
				<from method="post">
					<button type="submit" class="btn btn-default btn-rounded" formaction="uploadform.html"><i class="fas fa-file-upload mr-2"></i>Upload</button>
					<button class="btn btn-default"><i class="fas fa-file-download mr-2"></i>Download</button>
				</from>
			</div></center>
		</div>
	</div>
-->
	<!-- Mask Ends-->
</header>

	
<!--========== 			Main Layout		==========-->	
<main class="mt-5">
	<div class="container">
		<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th class="th-sm">File Name
			  </th>
			   <th class="th-sm">Download
			  </th>
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
</body>

</html>';
?>