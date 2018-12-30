<html>
<head>
<title>Manage shipment</title>
</head>
<body>
<h1>Please enter the information of the shipment</h1>
<form action="changeShipmentl1.php" method="post">
	Enter Shipment id(required): <input name="sid" type="text">
	Enter Line number(required): <input name="ln" type = "text">
    Enter Ship date: <input name="sd" type = "text" default = "xxxx-xx-xx">
    Enter Product type id(required): <input name="pid" type = "text">
    Enter Quantity(required): <input name="quant" type = "text">
    Enter Cost: <input name="cost" type = "text">
	<input type="submit">
</form>
</body>
</html>
