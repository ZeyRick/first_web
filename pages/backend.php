<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Traval Guide</title>
	<link rel="stylesheet" href="./styles/header.css">
	<link rel="stylesheet" href="./styles/general.css">
	<link rel="stylesheet" href="./styles/main.css">
</head>
<body>
	<form action="./" method="get">
		
	
	<?php renderpage('header');?>

	<main>
			<div class="command-buttons">
				<input type="submit" id="addnew-btn" value="Add New Tour" name="q">
				<input type="submit" id="delete-btn" value="Delete">
			</div>
			<table>
				<tr>
					<th class="checkbox">Select</th>
					<th>ID</th>
					<th>name</th>
					<th>location</th>
					<th>duration</th>
					<th>price</th>
					<th>photo</th>
					<th>edit</th>
				</tr>
		<?php 	
		$sum = 0;
		//connecting to db
		$dsn = 'mysql:dbname=db_stock;host=localhost';
		$user = 'root';
		$pass = '';
		$pdo = new PDO($dsn,$user,$pass);

		$imgfolder= 'images/';

		$sql = 'SELECT * FROM locations';
		$prepared = $pdo->prepare($sql);
		$prepared->execute();
			
		foreach ($prepared->fetchAll() as $data):
		$sum += 1;
		?>
				<tr class="data-row">
					<td class="checkbox"><input type="checkbox" name=""></td>
					<td><?php echo $data["locID"] ?> </td>
					<td><?php echo $data["Name"] ?> </td>
					<td><?php echo $data["Province"] ?> </td>
					<td><?php echo $data["Duration"] ?> </td>
					<td><?php echo $data["Price"] ?> </td>
					<td><<img src=" <?php echo $imgfolder . $data["Image"] ?>" alt="img"></td>
					<td class="delete">
						<a href="#">Update</a>
						<a href="#">Delete</a>
					</td>
				</tr>
		<?php endforeach ?>
			</table>

			<footer>
				<div class="sum-result">Showing <?php echo $sum ?> Datas</div>
			</footer>
	</main>
</form>
</body>
</html>