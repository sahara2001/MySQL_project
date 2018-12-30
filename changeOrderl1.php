<?php
	session_start();
    $oid = $_POST["oid"];
    $bid = $_POST["bid"];
    $od = $_POST["od"];
    $pid = $_POST["pid"];
    $in = $_POST["in"];
    $quant = $_POST["quant"];

	$con = mysqli_connect('localhost','root','990622$Grow','3241_pj');
	If (!$con)
	{ die('Could not connect'.mysqli_connect_error());
    }
    
    $bl =  "select Current_price, Inventory_quantity from product_type where Product_type_id = '" . $pid. "'";
    $bli = mysqli_query($con, $bl) or die(mysqli_error($con));
    $row = mysqli_fetch_array($bli,MYSQLI_ASSOC);
    if(!isset($row["Inventory_quantity"]) || $row["Inventory_quantity"] < $quant){
        echo "There is not enough quantity left for this order";
        echo "<br>";
    }else{
        $cp = $row["Current_price"];
        $tnt = $quant*$cp*1.025;
        
        $bll =  "select Buyer_id from customer where Buyer_id = '" . $bid. "'";
        $blli = mysqli_query($con, $bll) or die(mysqli_error($con));
        $row1 = mysqli_fetch_array($blli,MYSQLI_ASSOC);

        $sql= "insert into order_info values ('" . $oid. "','". $bid."','".$od ."','".$tnt ."','". $pid."','".$in."','". $cp. "','". $quant. "')";
        $result= mysqli_query($con, $sql) or die(mysqli_error($con));

        if(!$row1)
            { 
            $_SESSION["bid"] = $bid; 
            echo <<<congrats
            <p>This is a order from a new customer, please enter additional information</p>
            <form action="changeOrderl2.php" method="post">
            Enter User name: <input name="usn" type="text">
            Enter Phone number : <input name="pn" type = "text">
            Enter Rating : <input name="r" type = "text">
            Enter Rating count : <input name="rc" type = "text">
            Enter street add1 : <input name="sa1" type = "text">
            Enter street add2 : <input name="sa2" type = "text">
            Enter street add3 : <input name="sa3" type = "text">
            Enter postal code : <input name = "pc" type = "text">
            Enter recipient : <input name="rp" type = "text">
            Enter Card no : <input name="cd" type = "text">
            Enter Expiration date : <input name="ed" type = "text">

            Enter Additoinal information : <input name="ad" type = "text">

             <input type="submit">
        </form>
congrats;
            }else{
                echo "Order placed!";
            }


    }


    echo '<a href="http://localhost:8080/3241_pj/shipment.php" class = "return_hp">return</a>';
    
    
?>