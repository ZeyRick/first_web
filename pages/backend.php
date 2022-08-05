<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Traval Guide</title>
	<link rel="stylesheet" href="./styles/header.css">
	<link rel="stylesheet" href="./styles/general.css">
	<link rel="stylesheet" href="./styles/main.css">
	<link rel="stylesheet" href="./styles/modal.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	
		
	
	<?php renderpage('header');?>

	<main>
			<div class="command-buttons">
				<button class="addnew-btn" id="addnew-btn">Add New</button>
				
				<input type="submit" id="delete-btn" value="Delete Tours">
			</div>
			<table id="table">
				<thead>
					<th class="checkbox">Select</th>
					<th>ID</th>
					<th>name</th>
					<th>location</th>
					<th>duration</th>
					<th>price</th>
					<th>photo</th>
					<th>edit</th>
				</thead>
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
	
				<tr class="data-row" id="<?php echo htmlspecialchars($data["locID"])  ?>n">
					<td class="checkbox"><input type="checkbox" name="delete[]" value="<?php echo htmlspecialchars($data["locID"])  ?>"></td>
					<td><?php echo $data["locID"] ?> </td>
					<td><?php echo htmlspecialchars($data["Name"]) ?> </td>
					<td><?php echo htmlspecialchars($data["Province"]) ?> </td>
					<td><?php echo htmlspecialchars($data["Duration"]) ?> </td>
					<td ><?php echo htmlspecialchars($data["Price"]) ?> $</td>
					<td><img src=" <?php echo $imgfolder . htmlspecialchars($data["Image"]) ?>" alt="img"></td>
					<td class="delete">

						<div class="delete-button">
							Update
							<input id="update" type="submit" name="delete[]" value="<?php echo $data["locID"] ?>">
						</div>
						<div class="delete-button">
							Delete
							<input id="delete" type="submit" name="delete[]" value="<?php echo $data["locID"] ?>">
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

<div class="modal-container"id="modal-container">
	<form id="addnew">
	<div class="modal">
		<img src="" alt="close" class="close-modal" id="close-modal">
		<div class="input-field">
			<p>Tour Name: </p><input type="text" id="input-name">
			<p>Province: </p><input type="text" id="input-province">
			<p>Duration: </p><input type="text" id="input-duration">
			<p>Price: </p><input type="text" id="input-price">
			<p>Photo: </p><input type="file" id="input-photo">
			<div id="textarea-field"><p >Description: </p><textarea id="input-description"></textarea>
		</div>
	</div>
	<input type="submit" class="addnew-btn modal-addnew" id="input-addnew" value="ADD" name="ADD">
	<input type="submit" class="addnew-btn modal-addnew" id="input-update" value="UPDATE" name="UPDATE">
	</form>
</div>

<div id="loading" class="loading">	
		<img src="#" alt="loading">
</div>
	
	<script src="./scripts/modal.js"></script>
</body>
</html>


