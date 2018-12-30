
<html>
    <head>
        <title>Past orders</title>
    </head>
    <?php
	include "header.php";
	?>
    <body>
        <table>
        <a href = "http://localhost:8080/3241_pj/changeOrder.php">Insert a new order</a>

        <thead>
            <tr>
                <td>Order id</td>
                <td>Buyer id</td>
                <td>Buyer name </td>
				<td>Order date</td>
				<td>Total payment(after tax)</td>
                <td>Product type id</td>
				<td>Product type</td>
				<td>Invoice number</td>
				<td>Sale price</td>
				<td>Quantity</td>
            </tr>
        </thead>
        <tbody>
        	<br>
        	<br>
        	<?php
        	$con = mysqli_connect('localhost','root','990622$Grow','3241_pj');
			If (!$con)
			{ die('Could not connect'.mysqli_connect_error());
			}
			$oi = "select * from order_info";
			$oi_request = mysqli_query($con, $oi) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($oi_request, MYSQLI_ASSOC)) {
                //Getting the buyer name
                $customer = "select User_name from customer where Buyer_id = '". $row["Buyer_id"] ."'";
                $c_result = mysqli_query($con, $customer) or die(mysqli_error($con));
                $c = mysqli_fetch_array($c_result, MYSQLI_ASSOC);

                //Getting product type
                $pt = "select Prod_type from product_type where Product_type_id = '". $row["Product_type_id"] ."'";
                $result_pt = mysqli_query($con, $pt) or die(mysqli_error($con));
                $ptt =  mysqli_fetch_array($result_pt, MYSQLI_ASSOC);

            	echo <<<Rows
                <tr>
                    <td>$row[OID]</td>
                    <td>$row[Buyer_id]</td>
                    <td>$c[User_name]</td>
					<td>$row[Order_date]</td>
					<td>$row[Tax_and_Total]</td>
                    <td>$row[Product_type_id]</td>
                    <td>$ptt[Prod_type]</td> 
                    <td>$row[Invoice_Num]</td>
                    <td>$row[Sale_price]</td>
                    <td>$row[Quantity]</td>
                </tr>
Rows;
			}
			?>
        </tbody>
        </table>
    </body>
</html>
