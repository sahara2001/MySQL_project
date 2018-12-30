
<html>
    <head>
        <title>Shipment history</title>
    </head>
    <?php
	include "header.php";
	?>
    <body>
    <a href = "http://localhost:8080/3241_pj/changeShipment.php">Edit</a>
        <table>
        <thead>
            <tr>
                <td>Shipment id</td>
                <td>Line number</td>
				<td>Ship date</td>
				<td>Product type id</td>
				<td>Product type</td>
                <td>Quantity</td>
				<td>Cost per item</td>
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
			$shipment = "select * from shipment";
			$shipment = mysqli_query($con, $shipment) or die(mysqli_error($con));
            while($row = mysqli_fetch_array($shipment, MYSQLI_ASSOC)) {
                $pt = "select Prod_type from product_type where Product_type_id = '". $row["Product_type_id"] ."'";
                $result_pt = mysqli_query($con, $pt) or die(mysqli_error($con));
                $ptt =  mysqli_fetch_array($result_pt, MYSQLI_ASSOC);
            	echo <<<Rows
                <tr>
                    <td>$row[Shipment_id]</td>
		            <td>$row[Line_number]</td>
					<td>$row[Ship_date]</td>
                    <td>$row[Product_type_id]</td>
                    <td>$ptt[Prod_type]</td>
		            <td>$row[Quantity]</td>
					<td>$row[Cost]</td>
                </tr>
Rows;
			}
			?>
        </tbody>
        </table>
    </body>
</html>
