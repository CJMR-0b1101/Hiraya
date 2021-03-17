<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<title></title>
</head>

<!-- LOGIN PHP -->
<?php
	if(isset($_POST['login'])) {
		$username = $_POST['uname'];
		$password = sha1($_POST['pword']);

		include 'config.php';

		$sql = "SELECT user_id, username, first_name, last_name, age, email, location, profile_picture
		 FROM users WHERE username = '$username' AND password = '$password'";

		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);

			session_start();

			$_SESSION['login'] = True;
			$_SESSION['user'] = $row;
			
			header("location: home_page.php");
		} 
		else {
			echo '<h2 align="center" style="color: red;">Invalid Login Credentials!</h2>';
		}
	}
?>

<!-- REGISTRATION PHP -->
<?php
	$firstname = "";
	$lastname = "";
	$username = "";

    if(isset($_POST['signup'])) {
        // include 'config.php';
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $username = $_POST['uname'];
        $password = $_POST['pword'];
        $cpassword = $_POST['pword1'];
        
        // echo "$username<br>$firstname<br>$lastname<br>$password<br>$cpassword<br>";

        // PHP VALIDATION
        include 'input_validation.php';
		include 'config.php';

		if(isValidName($firstname) && isValidName($lastname) && isValidUsername($username) 
		&& (isValidPassword($password))) {
			if($password != $cpassword) {
				echo "Password does not match<br>";
				return;
			}
			else {
				// Check if user is existing
				$sql = "SELECT username FROM users WHERE username = '$username'";
				
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) != 0) {
					echo '<h2 align="center" style="color: red;">User already exist!</h2>';
				}
				else {
					$password = sha1($password);

					$sql = "INSERT INTO users(username, password, first_name, last_name) 
					VALUES('$username', '$password', '$firstname', '$lastname')";

					$insert_result = mysqli_query($conn, $sql);
	
					if($insert_result) {
						echo '<h2 align="center" style="color: green";>Registered Succesfully</h2>';
						echo '<h4 align="center" style="color: green";>Redirecting to Login in 3 seconds</h4>';

						header( "Refresh:3; url=login.php", True, 303);
					}
					else {
						echo '<h2 align="center" style="color: red;">Registration Failed</h2>';
					}
				}
			}
				$firstname = "";
				$lastname = "";
				$username = "";
		}
    }
?>

<body>
	<div class="div-nav-bar">
		<div class="div-nav-bar-left">
			<div class="dropdown">
				<button class="nav-bar-btn"><a href="home_page.php">HOME</button>
			</div>
			<div class="dropdown">
				<button class="dropbtn"><a href="destination_page.php">DESTINATION</a></button>
				<div class="dropdown-content">
					<a href="location_page.php">BORACAY</a>
					<a href="location_page.php">MANILA</a>
					<a href="location_page.php">BOHOL</a>
					<a href="location_page.php">PUERTO PRINSESA</a>
					<a href="location_page.php">EL NIDO PALAWAN</a>
					<a href="location_page.php">CEBU</a>
					<a href="location_page.php">CORON PALAWAN</a>
					<a href="location_page.php">BAGUIO</a>
					<a href="location_page.php">SIARGAO</a>
					<a href="location_page.php">PUERTO GALLERA</a>
					<a href="location_page.php">DAVAO</a>
					<a href="location_page.php">SAGADA</a>
					<a href="location_page.php">VIGAN</a>
					<a href="location_page.php">MINDANAO</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn"><a href="itinerary_page.php">ITINERARY</a></button>
				<div class="dropdown-content">
					<a href="diy_page.php">BORACAY</a>
					<a href="diy_page.php">MANILA</a>
					<a href="diy_page.php">BOHOL</a>
					<a href="diy_page.php">PUERTO PRINSESA</a>
					<a href="diy_page.php">EL NIDO PALAWAN</a>
					<a href="diy_page.php">CEBU</a>
					<a href="diy_page.php">CORON PALAWAN</a>
					<a href="diy_page.php">BAGUIO</a>
					<a href="diy_page.php">SIARGAO</a>
					<a href="diy_page.php">PUERTO GALLERA</a>
					<a href="diy_page.php">DAVAO</a>
					<a href="diy_page.php">SAGADA</a>
					<a href="diy_page.php">VIGAN</a>
					<a href="diy_page.php">MINDANAO</a>
				</div>
			</div>
		</div>
		<?php
			@session_start();
			if(isset($_SESSION['guestlogin']) && !isset($_SESSION['login'])) {
				echo '<div class="div-nav-bar-right">
					<button class="nav-bar-btn" id="btn-login">Guest</button>
					
					<form class=\'search-form\'>
						<input type="text" name="">
					</form>
				</div>';
			}
			elseif(isset($_SESSION['login'])) {
				$_SESSION['guestlogin'] = False;
				$user = $_SESSION['user'];

				echo '<div class="div-nav-bar-right">
						<div class="dropdown">
							<button class="dropbtn">'.$user['username'].'</a></button>
							<div class="dropdown-content">
								<a href="profile.php">Profile</a>
								<a href="logout.php">Logout</a>
							</div>
						</div>
						<form class=\'search-form\'>
							<input type="text" name="">
						</form>
					</div>';
			}
			else {
				echo '<div class="div-nav-bar-right">
					<button class="nav-bar-btn" id="btn-login">Login</button>
					
					<form class=\'search-form\'>
						<input type="text" name="">
					</form>
				</div>';
			}
		?>
	</div>

	<!-- LOGIN FORM -->
	<div id="id01" class="modal-form">
		<div class="modal-content animate">
			<div class="modal-content-body">
				<div class="modal-img-logo">
					<img class="logo" src="https://i.imgur.com/is4Qk5D.png">
					<h1>HIRAYA</h1>
					<div class="icon"><i class="fas fa-user-circle fa-3x"></i></div><br>
				</div>

				<div class="container">
					<form action="" method="post">
						<input class="input-login-register" type="text" name="uname" placeholder="Username" required>
						<br>
						<input class="input-login-register" type="password" name="pword" placeholder="Password" required>
						<br>
						<button class="submit-login" type="submit" value="login" name="login">Login</button>
						<br>
					</form>
					<span>New here? <a id="btn-register">Create an account</a></span>
				</div>
			</div>
		</div>
	</div>

	<!-- REGISTRATION FORM -->
	<div id="id02" class="modal-form">
		<div class="modal-content animate">
			<div class="modal-content-body">
				<div class="modal-img-logo">
					<img class="logo" src="https://i.imgur.com/is4Qk5D.png">
					<h1>HIRAYA</h1>
					<div class="icon"><i class="fas fa-user-circle fa-3x"></div></i><br>
				</div>

				<div class="container">
					<form action="" method="post">
						<input class="input-login-register" type="text" name="fname" placeholder="First name" value=<?php echo "\"$firstname\"";?>required>
						<input class="input-login-register" type="text" name="lname" placeholder="Last name" value=<?php echo "\"$lastname\"";?>required>
						<br>
						<input class="input-login-register" type="text" name="uname" placeholder="Username" value=<?php echo"\"$username\"";?>required>
						<br>
						<input class="input-login-register" type="password" name="pword" placeholder="Password" required>
						<br>
						<input class="input-login-register" type="password" name="pword1" placeholder="Confirm Password" required>
						<br>
						<br>
						<button class="submit-register" type="submit" value="signup" name="signup">Sign up</button>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		var modal_login = document.getElementById('id01');
		var modal_register = document.getElementById('id02');
		var btn_register = document.getElementById('btn-register');
		var btn_login = document.getElementById('btn-login');

		btn_register.onclick = function(event) {
			if (event.target == btn_register) {
		    	modal_register.style.display = "block";
		    	modal_login.style.display = "none";
		  	}
		}

		btn_login.onclick = function(event) {
		  if (event.target == btn_login) {
		      modal_login.style.display = "block";
		    }
		}

		window.onclick = function(event) {
		  if (event.target == modal_register || event.target == modal_login) {
		    modal_register.style.display = "none";
		    modal_login.style.display = "none";
		  }
		}
	</script>
</body>
</html>