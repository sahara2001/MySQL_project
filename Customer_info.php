
<html>
    <head>
        <title>Customer information</title>
    </head>
    <?php
	include "header.php";
	?>
    <body>
        <table>
        <thead>
            <tr>
                <td>Buyer_id</td>
                <td>Customer name</td>
				<td>Phone number</td>
				<td>Address</td>
                <td>Payment information</td>
                <td>Rating</td>
				<td>Rating count</td>
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
			$customer = "select * from customer";
			$result = mysqli_query($con, $customer) or die(mysqli_error($con));

            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                //Editing address information
                $address_id = $row["Address_id"];
                $add_request = "select * from address_table where Address_id = '". $address_id ."'";
                $add = mysqli_query($con, $add_request) or die(mysqli_error($con));
                $r = mysqli_fetch_array($add, MYSQLI_ASSOC);
                $output_add = $r["Street_1"];
                if( isset( $r["Street_2"] )){
                    $output_add .= $r["Street_2"];
                }
                if( isset( $r["Street_3"] )){
                    $output_add .= $r["Street_3"];
                }
                $output_add .= "\r\n";
                $output_add .= "Postal code: " . $r["Postal_code"] . "\n";
                $output_add .= "Recipient: " . $r["Recipient"] . "\n";
                $output_add .= "Additional info: " . $r["Additional_info"];
                
                //Editing payment information
                $buyer_id = $row["Buyer_id"];
                $pi_request = "select * from payment_info where Buyer_id = '". $buyer_id ."'";
                $pi = mysqli_query($con, $pi_request) or die(mysqli_error($con));
                $r2 = mysqli_fetch_array($pi, MYSQLI_ASSOC);
                $output_pi = "Card no. " . $r2["Card_no"] . "\n Expiration date: " . $r2["Card_expire"];


            	echo <<<Rows
                <tr>
                    <td>{$row['Buyer_id']}</td>
		            <td>{$row["User_name"]}</td>
					<td>{$row["Phone_number"]}</td>
                    <td>$output_add</td>
                    <td>$output_pi</td>
		            <td>{$row["Rating"]}</td>
					<td>{$row["Rating_count"]}</td>
                </tr>
Rows;
			}
			?>
        </tbody>
        </table>
    </body>
</html>
