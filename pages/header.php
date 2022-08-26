<header>
		<div id="logo">
			<img src="images/logo.png" alt="">
		</div>
		<div class="nav">
			<a href="./"><div <?php if(!isset($_GET['q'])): ?>style="background-color: lightgray;" <?php endif ?>>Home</div></a>

			<a href="./?q=backend"><div <?php if(isset($_GET['q'])): ?>style="background-color: lightgray;"<?php endif ?>>Back End</div></a>
		</div>
		<div class="login"></div>
</header>