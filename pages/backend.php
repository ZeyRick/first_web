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
	<form action="./" method="post">
		
	
	<?php renderpage('header');?>

	<main>
			<div class="command-buttons">
				<a  id="addnew-btn"  href="./?q=addnew">Add New</a>
				<input type="submit" id="delete-btn" value="Delete Tours">
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
					<td class="checkbox"><input type="checkbox" name="delete[]" value="<?php echo htmlspecialchars($data["locID"])  ?>"></td>
					<td><?php echo $data["locID"] ?> </td>
					<td><?php echo htmlspecialchars($data["Name"]) ?> </td>
					<td><?php echo htmlspecialchars($data["Province"]) ?> </td>
					<td><?php echo htmlspecialchars($data["Duration"]) ?> </td>
					<td><?php echo htmlspecialchars($data["Price"]) ?> $</td>
					<td><img src=" <?php echo $imgfolder . htmlspecialchars($data["Image"]) ?>" alt="img"></td>
					<td class="delete">

						<a href="#">Update</a>
						<div class="delete-button">
							Delete
							<input type="submit" name="delete[]" value="<?php echo $data["locID"] ?>">
						</div>
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