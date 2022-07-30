
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homage page</title>
	<link rel="stylesheet" href="./styles/header.css">
	<link rel="stylesheet" href="./styles/general.css">
	<link rel="stylesheet" href="./styles/homepage.css">
</head>
<body>
	<?php renderpage('header'); ?>
	<img class="hero" src="./images/cover/cover1.jpg">
	<main>

    <?php
      $dsn = 'mysql:dbname=db_stock;host=localhost';
      $user = 'root';
      $pass = '';
      $pdo = NEW PDO($dsn, $user, $pass);
      $imgfolder = './images/';

      $sql = 'SELECT * FROM locations';
      $prepared = $pdo->prepare($sql);
      $prepared->execute();


      foreach($prepared->fetchAll() as $data ):
    ?>

		<div class="contents">
			<div class="content">
				<div class="image"><a href=""><img src="<?php echo $imgfolder . $data['Image']?>"></a></div>
				<div class="txt">
					<div><a href="" id="title"><?php echo $data['Name'] ?></a></div>
					<div><p id="description"><?php echo $data['Description'] ?></p></div>
					<div><input id="book-btn" type="submit" value="Book Now"></div>
				</div>
			</div>
		</div>

    <?php endforeach ?>
	</main>

</body>
</html>