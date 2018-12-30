<html>
<head>
<title>System login page</title>
</head>
<body>
<h1>User login</h1>
<form action="process.php" method="post">
	<td>Enter Username:</td>
	<?php if (isset($_COOKIE["username"])): ?>
		<input name="user" type="text" value="<?= htmlspecialchars($_COOKIE["username"]) ?>">
	<?php else: ?>
		<input name="username" type="text">
	<?php endif ?>
	Enter Password: <input name="pwd" type = "text">
	<input type="submit">
</form>
</body>
</html>
