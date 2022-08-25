
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.00, maximum-scale=2.00, minimum-scale=1.00">
	<title>Homage page</title>
	<link rel="stylesheet" href="./styles/header.css">
	<link rel="stylesheet" href="./styles/general.css">
	<link rel="stylesheet" href="./styles/homepage.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
			<div class="content" id="<?php echo $data["locID"]?>n">
				<div class="image clicker"><img src="<?php echo $imgfolder . $data['Image']?>"></div>
				<div class="txt">
					<div><p href="" class="clicker" id="title"><?php echo $data['Name'] ?></p></div>
					<div><p id="description"><?php echo $data['Description'] ?></p></div>
					<button class="book-btn clicker" id="book-btn">Book Now</button>
				</div>
			</div>
		</div>

    <?php endforeach ?>
	</main>

		<div class="modal-details">	
				<div class="container">	
					<div class="modal-info">
						<div ><span id="info-header-name">BOOKING</span> : <p id="info-name">name</p></div>
						<div >
							<img class="info-img" src="./styles/icons/location-dot-solid.svg" alt="">
							<span id="info-header-province">Location</span> : <p id="info-province">province</p>
						</div>
						<div >
							<img class="info-img" src="./styles/icons/clock-solid.svg" alt="">
							<span id="info-header-duration">Duration</span> : <p id="info-duration">1 Day</p>
						</div>
						<div >
							<img class="info-img" src="./styles/icons/dollar-sign-solid.svg" alt="">
							<span id="info-header-description">Tour Price</span> : <p id="info-price">Contact us for inquiry</p>
						</div>
						<p id="info-description">this is description</p>
						<img id = "info-image" src="#" alt="image">
					</div>
					<div class="modal-form"> 
						<P>Title :</P>
						<select name="" id=""></select>
						<p>Enter Full Name :</p>
						<input type="text">
						<p>Enter Email :</p>
						<input type="text">
						<p>Select Country :</p>
						<select name="" id=""></select>
						<p>Check-in Date :</p>
						<input type="date">
						<p>Check-out Date :</p>
						<input type="date">
						<p>Number of Person :</p>
						<input type="text">
						<p>Travel Detail :</p>
						<textarea></textarea>
						<button class="book-btn" id="send">Send Now </button>
					</div>
					<img src="./styles/icons/xmark-solid.svg" alt="close" id="close-btn">
				</div>
		</div>	

		<div id="loading" class="loading"></div>
		<script src="./scripts/homepage.js"></script>
</body>
</html>