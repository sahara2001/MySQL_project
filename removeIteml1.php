<?php
	session_start();
	$PID = $_POST["PID"];
	$con = mysqli_connect('localhost','root','990622$Grow','3241_pj');
	If (!$con)
	{ die('Could not connect'.mysqli_connect_error());
	}
	$sql= "select Inventory_quantity from product_type where Product_type_id = '" . $PID. "'";
    $result=mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if($row["Inventory_quantity"] == 0){
        $sqli= "delete from product_type where Product_type_id = '" . $PID. "'";
        $result1=mysqli_query($con, $sqli) or die(mysqli_error($con));
        echo "delete successfully";
    }else{
        echo "The inventory of the product you want to delete is not yet 0";
        echo "<br>";
        echo "Delete failed";
    }
    echo "<br>";
    echo '<a href="http://localhost:8080/3241_pj/price.php" class = "return_hp">return</a>';
    
    
?>