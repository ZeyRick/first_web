
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome!</title>
</head>
<body>
		<?php 
		if (session_status() === PHP_SESSION_NONE) { session_start();}
		if ($_SESSION['Islogin'] !== true){ header("Location: ./"); } 
		?>

		<?php if (isset($_GET['s'])) {
			$s = urlencode($_GET['s']);
			$url = "https://query1.finance.yahoo.com/v7/finance/download/{$s}?period1=1626169123&period2=1657705123&interval=1d&events=history&includeAdjustedClose=true";
			$handle = fopen($url, 'r');
			$row = fgetcsv($handle);
			fclose($handle);

			echo $row[1];

		}
		?>
		<?php else { ?> <h1>Welcome Stupid </h1> <br>
		<form action="./logout.php" method="get">
			<input type="text" name="s"> <br>
			<input type="submit" >
		</form> <br>
		<a href="./logout.php"> Logout!! </a> <?php } ?>
</body>
</html>