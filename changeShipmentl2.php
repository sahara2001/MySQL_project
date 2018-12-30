<?php
	session_start();
    $pd = $_POST["pd"];
    $d = $_POST["d"];

	$con = mysqli_connect('localhost','root','990622$Grow','3241_pj');
	If (!$con)
	{ die('Could not connect'.mysqli_connect_error());
    }
    $sql = "update product_type set Prod_type = '" . $pd . "', Description = '". $d. "' where Product_type_id = '" .$_SESSION["pid"]. "'";
    $result=mysqli_query($con, $sql) or die(mysqli_error($con));
    echo 'Update successfully ';
    echo '<br>';
    echo '<a href="http://localhost:8080/3241_pj/shipment.php" class = "return_hp">return</a>';
    
    
?>