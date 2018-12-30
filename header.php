<?php 
session_start();
$usn = $_SESSION["username"];
echo<<< header
<body>
	<h1>Welcome $usn!</h1>

	<div class="hp-top">
		<a href="http://localhost:8080/3241_pj/homepage.php" class = "return_hp">Homepage</a>
		<!-- Float links to the right. Hide them on small screens -->
		<div class="Access_bar">
		  <a href="http://localhost:8080/3241_pj/price.php" >Manage Prices</a>
		  <a href="http://localhost:8080/3241_pj/Customer_info.php" >Customer info</a>
		  <a href="http://localhost:8080/3241_pj/shipment.php" >Shipment info</a>
		  <a href="http://localhost:8080/3241_pj/order.php" >Past orders</a>
		</div>
	 </div>


	</body>
header;
?>