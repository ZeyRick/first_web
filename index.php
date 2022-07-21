

<?php
	require ('helper.php');
	require ('config.php');
	session_start();
if (isset($_SESSION['Islogin']) && $_SESSION['Islogin'] === true) {
	echo "logged in ";
	header("Location: ./pages/homepage.php");
	exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if (isset($_POST['register'])) {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			

			//getting username and pw from input
			$reg_username = trim($_POST['username']);
			if( !ctype_alnum( $reg_username ) )
   				die( 'Invalid characters' );
			$reg_password = trim($_POST['password']);
			if (empty($reg_password)) {
				die( 'Invalid characters' );
			}
			$reg_passHash = password_hash($reg_password, PASSWORD_DEFAULT);

			//check if username already exist
			$sql = "SELECT Username FROM users WHERE Username = :username";
			$prepared = $pdo->prepare($sql);
			$prepared->execute([':username'=>$reg_username]);
	

			if ($prepared->rowCount() > 0 ) {
				echo "Username Already Exist";
			}

			else{

			
				//insert into users table
				$sql = "INSERT INTO users (Username, Password) VALUES (:username, :password)";
				$prepared = $pdo->prepare($sql);
				if ($prepared->execute([':username'=>$reg_username, ':password'=>$reg_passHash])){
					echo "Registered Successfully";
				}

				else {
					echo "Registered Failed";
				}



			}
		
		}

		$_POST = array();
	}

	elseif (isset($_POST['login'])) {

		if (isset($_POST['username']) && isset($_POST['password'])) {
			
			$log_username = trim($_POST['username']);
			$log_password = trim($_POST['password']);

			//selecting the user name
			$sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
			$prepared = $pdo->prepare($sql);
			$prepared->execute([':username'=>$log_username]);
			//fetch the file that is selected
			$getuser = $prepared->fetch();
			//check if we got more than one row
			if ($prepared->rowCount() > 0 ) {
				
				//compare password hashed
				$pwcompare = password_verify($log_password, $getuser["Password"]);
			
				//if right pw
				if ($pwcompare) {
					$_SESSION['Islogin'] = true;
					renderpage("homepage",array("name"=>$log_username));
				}
				//if wrong pw
				else{
					echo "login failed";
					$error = "Password";
					renderpage("error", array("error"=>$error));
				}
			}
			//if selected 0 row
			else {
				$error = "Username";
				renderpage("error", array("error"=>$error));
			}
		}


		$_POST = array();

		// code...
	}

}

else{
		if (isset($_GET['login'])) {
			$page = 'signup';
		}
		else{
			$page = 'homepage';
		}

		renderpage($page);
}

	
?>