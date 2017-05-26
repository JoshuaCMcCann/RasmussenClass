<html>
		<head>
	<title>Find a Contact</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" /> 
	<link rel="stylesheet" href="css/JMcCann.css" />
	<link rel="stylesheet" href="css/JMcCann.min.css" />
	<link rel="stylesheet" href="css/jquery.mobile.icons.min.css" />
	<script src="scripts/jquery-1.11.3.min.js"></script> 
	<script src="scripts/jquery.mobile-1.4.5.min.js"></script>
</head>
	<body>
		<div id="page" data-role="page" data-theme="b" >
	<div data-role="header" data-theme="b">
<h1>
	Find your contact
		</h1>	</div>
				<div data-role="content">


					<?php
					include 'config.php';
					include 'opendb.php';

					$fname = (isset($_POST['fname'])    ? $_POST['fname']   : '');
					$lname = (isset($_POST['lname'])    ? $_POST['lname']   : '');

					$sql= "SELECT id, fname, lname, email
					FROM testtable
					WHERE fname LIKE CONCAT('%','$fname','%') AND lname LIKE CONCAT('%','$lname','%') LIMIT 50";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
									echo "ID: " . $row["id"]. "<br>";
					        echo "First Name: " . $row["fname"]. "<br>";
					        echo "Last Name: " . $row["lname"]. "<br>";
							echo "Email: " . $row['email'] . "<br><hr>";
					    }
					} else {
					    echo "0 results";
					}

					mysqli_close($conn);

					?>

				<div data-role="footer" data-theme="b">
	  <h4>Darice Corey-Gilbert &copy; 2016</h4>
	</div>
	</body>
</html>
