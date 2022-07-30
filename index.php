

<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/htdocs1/first_web/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/htdocs1/first_web/helper.php');

	session_start();
if (isset($_GET['q']) ) {
	$q = $_GET['q'];
	switch ($q) {
		case 'logout':
			session_destroy();
			header("Refresh:0; url=./");
			break;

		case 'backend':
			$page = 'backend';
			renderpage($page);
			exit();
			break;
		case 'addnew':
			$page = 'add_new';
			renderpage($page);
			exit();
			break;
		default:
			$page = 'changepfp';
			renderpage($page);
			exit();
			break;
	}
}

if (isset($_SESSION['userID'])) {
	//selecting the user name
		$sql = "SELECT * FROM users WHERE userID = :userID LIMIT 1";
		$prepared = $pdo->prepare($sql);
		$prepared->execute([':userID'=>$_SESSION['userID']]);
		//fetch the file that is selected
		$getuser = $prepared->fetch();
		//re sessioning
		$_SESSION['username'] = $getuser['Username'];
		$_SESSION['pfp'] = $getuser['pfp'];
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
				$sql = "INSERT INTO users (Username, Password, pfp) VALUES (:username, :password, :pfp)";
				$prepared = $pdo->prepare($sql);
				if ($prepared->execute([':username'=>$reg_username, ':password'=>$reg_passHash, ':pfp'=>$default_pfp])){
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
					$_SESSION['userID'] = $getuser['userID'];
					header("Refresh:0; url=./");
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

	elseif(isset($_POST['addnew'])){
		$name = $_POST['name'];
		$province = $_POST['province'];
		$duration = $_POST['duration'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$image = str_replace(' ', '-', $name) . '.png';
		//moving photo into folder
		move_uploaded_file(	$_FILES['photo']['tmp_name'], $imgfolder . $image	);
	
		//setting up sql
		$sql = 'INSERT INTO locations (Name, Province, Duration, Price, Description, Image) VALUES (:name, :province, :duration, :price, :description, :image)';
		$prepared = $pdo->prepare($sql);
		$prepared->execute([':name'=>$name, ':province'=>$province, ':duration'=>$duration, ':price'=>$price, 'description'=>$description, ':image'=>$image]);
		echo "<meta http-equiv='refresh' content='0'>";
		exit();

	}


	elseif(isset($_POST['delete'])){
		
	foreach($_POST['delete'] as $id):
		//delte img
		$sql = 'SELECT Name FROM locations WHERE locID = :id LIMIT 1';
		$prepared = $pdo->prepare($sql);
		$prepared->execute([':id'=>$id]);
		$name = $prepared->fetch();
		@unlink($imgfolder . $name['Name'] . '.png');

		//delete data 
		$sql = 'DELETE FROM locations WHERE locID = :id';
		$prepared = $pdo->prepare($sql);
		$prepared->execute([':id'=>$id]);

		$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}?q=backend";
		$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'">';
	endforeach;
		exit();
	}

		//change pfp
		elseif(isset($_POST['changepfp'])){
		@unlink($pfpfolder . $_SESSION['userID'] . '.png');
		$olfpfpname = $_FILES['pic']['name'];
		move_uploaded_file(	$_FILES['pic']['tmp_name'], $pfpfolder	. $olfpfpname	);
		$newpfpname = $_SESSION['userID'] . '.png';
		$newpfpname = str_replace(' ', '-', $newpfpname);
		rename($pfpfolder . $olfpfpname, $pfpfolder . $newpfpname);
		$_SESSION['pfp'] = $newpfpname;
		$sql = "UPDATE users SET pfp=:pfp WHERE userID = :userID";
		$prepared = $pdo->prepare($sql);
		$prepared->execute([':pfp'=>$newpfpname, ':userID' => $_SESSION['userID']]);
	}

}


$page = 'homepage';
renderpage($page);
exit();

	
?>