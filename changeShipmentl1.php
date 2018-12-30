<?php
	session_start();
    $sid = $_POST["sid"];
    $ln = $_POST["ln"];
    $sd = $_POST["sd"];
    $pid = $_POST["pid"];
    $quant = $_POST["quant"];
    $cost = $_POST["cost"];

	$con = mysqli_connect('localhost','root','990622$Grow','3241_pj');
	If (!$con)
	{ die('Could not connect'.mysqli_connect_error());
    }
    
    $bl =  "select Product_type_id from product_type where Product_type_id = '" . $pid. "'";
    $bli = mysqli_query($con, $bl) or die(mysqli_error($con));
    $row = mysqli_fetch_array($bli,MYSQLI_ASSOC);

	$sql= "insert into shipment values ('" . $sid. "','". $ln."','".$sd ."','".$pid ."','". $quant."','".$cost."')";
    $result=mysqli_query($con, $sql) or die(mysqli_error($con));

   
	if(!$row)
	{ 
    $_SESSION["pid"] = $pid; 
     echo <<<congrats
    <p>This is a new product, please enter additional information</p>
    <form action="changeShipmentl2.php" method="post">
	Enter Product type in words: <input name="pd" type="text">
	Enter Breif Description : <input name="d" type = "text">
	<input type="submit">
</form>
congrats;
	}else{
     echo "update successfully";
    }


    echo '<a href="http://localhost:8080/3241_pj/shipment.php" class = "return_hp">return</a>';
    
    
?>