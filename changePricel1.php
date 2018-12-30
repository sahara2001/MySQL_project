<?php
	session_start();
	$PID = $_POST["PID"];
	$bp = $_POST["bp"];
	$con = mysqli_connect('localhost','root','990622$Grow','3241_pj');
	If (!$con)
	{ die('Could not connect'.mysqli_connect_error());
	}
	$sql= "update product_type set Base_price = '" . $bp . "' where Product_type_id = '". $PID ."'";
    $result=mysqli_query($con, $sql) or die(mysqli_error($con));
    $sql1= "Select Base_price, Current_price, Inventory_quantity from product_type where Product_type_id = '". $PID ."'";
    $result1=mysqli_query($con, $sql1) or die(mysqli_error($con));

    $row = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	if($row["Base_price"] === $bp)
	{ 
     echo <<<congrats
     <p>Your base price has been updated successfully!</p>
     <p>New base price: $row[Base_price]</p>
     <p>Current price: $row[Current_price]</p>
     <p>Inventory quantity: $row[Inventory_quantity]</p>
congrats;
	}
	else{
	 echo "Not updating correctly.";
    }

    echo '<a href="http://localhost:8080/3241_pj/homepage.php" class = "return_hp">Homepage</a>';
    
    
?>