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
		<div id="page" data-role="page" data-theme="a" >
	<div data-role="header" data-theme="a">
<h1>
	Find your contact
		</h1>	</div>
				<div data-role="content">


					<?php
					include 'config.php';
					include 'opendb.php';

					$order = (isset($_POST['confirmationNumber'])    ? $_POST['confirmationNumber']   : '');

					$sql= "SELECT testorders.confirmationNumber, testtable.fname, testtable.lname, testtable.email, testorders.salesAmount, 	 products.ProductName
						FROM testorders
						JOIN testtable on testorders.customerID = testtable.id
						JOIN products on testorders.productID = products.ProductID
                    	WHERE confirmationNumber LIKE '$order'";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
									echo "Confirmation Number: " . $row["confirmationNumber"]. "<br>";
					        echo "First Name: " . $row["fname"]. "<br>";
					        echo "Last Name: " . $row["lname"]. "<br>";
							echo "Email: " . $row['email'] . "<br>";
							echo "Total: " . $row["salesAmount"]. "<br>";
							echo "Product: " . $row["ProductName"]. "<br><hr>";
					    }
					} else {
					    echo "0 results";
					}

					mysqli_close($conn);

					?>

			<div data-role="footer">
	  			<h4>JMcCann App &copy; 2017</h4>
			</div>
	</body>
</html>
