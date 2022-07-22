<?php 
	
	function renderpage($page, $data=array()){
		extract($data);
		$path = "./pages/" . $page . ".php";
		require($path);

	}

	function checkingLogin(){

	}








	function loginbar($data=array()){
		if (isset($_SESSION['userID'])) {
			extract	($data);
			echo ('      <nav id="mainav" class="fl_right"> 
        <ul class="clear">
         <li style="font-size: 20px;">' . $_SESSION['username'] . '
          <ul>
          	<li style="width: 80px; height: 30px;" ><a style="font-size: 15px; padding: 5px;"href="./?q=logout">Logout</a></li>
          </ul>
        </li>

        	<li style="font-size: 20px;"> <div class="image-cropper">
  				<img src="./images/pfp/'. $_SESSION['pfp'] .'" class="rounded" id="pfp"/>
				</div>
          <ul>
          	<li style="width: 120px; height: 30px;" ><a style="font-size: 15px; padding: 5px;"href="./?q=changepfp">Change Profile</a></li>
          </ul>
 
      </nav>');
		}

		else{
			echo '<li><a href="./pages/signup.php?q=login" title="Login"><i class="fas fa-sign-in-alt"></i></a></li>
        <li><a href="./pages/signup.php" title="Sign Up"><i class="fas fa-edit"></i></a></li>';
		}
	}

	function renderimg(){

		for ($i=0; $i < 3; $i++) { 
			echo '<ul class="nospace group btmspace-80">';
			echo 
		'<li class="one_third first">
          <figure><a class="imgover" href="#"><img src="images/demo/348x400.png" alt=""></a>
            <figcaption>
              <h6 class="heading">Mollis suscipit</h6>
              <div>
                <p>Eu adipiscing sit amet ante donec vulputate magna duis posuere tellus vel fringilla auctor nisi arcu.</p>
              </div>
            </figcaption>
          </figure>
        </li>';
			for ($j=0; $j < 2; $j++) { 
				echo '<li class="one_third">
          <figure><a class="imgover" href="#"><img src="images/demo/348x400.png" alt=""></a>
            <figcaption>
              <h6 class="heading">Vestibulum maecenas</h6>
              <div>
                <p>Urna at congue lectus nisi ac neque suspendisse vitae sapien eu mi placerat tincidunt sed eget elit in.</p>
              </div>
            </figcaption>
          </figure>
        </li>';
			}
			echo '</ul>';
		}
	}
?>