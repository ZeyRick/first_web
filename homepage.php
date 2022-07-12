
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome!</title>
</head>
<body>
		<?php 
		if (session_status() === PHP_SESSION_NONE) {
    		session_start();
		}
		if ($_SESSION['Islogin'] === true){ ?>
		<h1>Welcome Stupid </h1> <br>
		<a href="./logout.php"> Logout!! </a>

		<?php } else {header("Location: ./");} 
	?>
</body>
</html>