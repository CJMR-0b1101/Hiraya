<!DOCTYPE html>
<html>
<head>
	<title>Hiraya Register</title>
	<link rel="icon" href="images/hiraya_icon.ico">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<style>
		/* Background */
		body{
			background-image: url(https://i.imgur.com/4mExAFS.png);
			background-position: center bottom;
		}
		h1{
			margin-top: -10px;
			color: black;
		}
		/* container box */
		div.container1{
			width: 30%;
			margin: 0% 35%;
			padding: 10px 20px;
			box-sizing: border-box;
			border: none;
			border-radius: 10px;
			position: absolute;
			text-align: center;
			color: #A0A603;
			background-color: white;
			font-size: 20px;
			font-family: 'Inconsolata', monospace; color: #747F42;
			font-weight: bold;
		}
		img.logo{
			margin-left: auto;
			margin-right: auto;

		}
		div.icon{
			margin-top: -5px;
			font-size: 20px;
		}

		a:link {
			color: #747F42;
			font-size: 15px;
		}

		/* visited link */
		a:visited {
			color: green;
		}

		/* mouse over link */
		a:hover {
			color: #04BFBF;
		}

		/* selected link */
		a:active {
			color: blue;
		}
		/* Input styles and Buttons*/
		input{
			width: 50%;
			padding: 10px 20px;
			margin: 8px 0;
			margin-top: 2px;
			box-sizing: border-box;
			border: 2px solid #747F42;
			border-radius: 10px;
		}
		input:focus {
			background-color: #04BFBF;
			outline: none;
        	box-shadow: 0px 0px 2px #0066ff;
		}
		button{
			font-size: 15px;
			font-family: 'Inconsolata', monospace;
			background-color: white;
			border: none;
			border-radius: 12px;
			border: 2px solid #747F42;
			color:#747F42;
			padding: 10px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			margin: 4px 2px;
			cursor: pointer;
		}
		button:hover {
			background-image: url(https://i.imgur.com/hi3eFOb.jpg);
			color: white;
		}
		button:focus {
			outline: none;
        	box-shadow: 0px 0px 2px #0066ff;
		}
	</style>
</head>

<!-- REGISTRATION PHP -->
<?php
	$firstname = "";
	$lastname = "";
	$username = "";
	$status_msg = "";
	$color = 'red';
	
	session_start();

	if(isset($_SESSION['login'])) {
		header("location: home_page.php");
	}

    if(isset($_POST['signup'])) {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $username = $_POST['uname'];
        $password = $_POST['pword'];
        $cpassword = $_POST['pword1'];
        
        // echo "$username<br>$firstname<br>$lastname<br>$password<br>$cpassword<br>";

        // PHP VALIDATION
        include 'input_validation.php';
		include 'config.php';

		if(isValidName($firstname, $status_msg) && isValidName($lastname, $status_msg) && isValidUsername($username, $status_msg) 
		&& (isValidPassword($password, $status_msg))) {
			if($password != $cpassword) {
				$status_msg = 'Password does not match';
			}
			else {
				// Check if user is existing
				$sql = "SELECT username FROM users WHERE username = '$username'";
				
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) != 0) {
					$status_msg = 'User already exist';
				}
				else {
					$password = sha1($password);

					$sql = "INSERT INTO users(username, password, first_name, last_name) 
					VALUES('$username', '$password', '$firstname', '$lastname')";
					// echo $sql;
					$insert_result = mysqli_query($conn, $sql);
	
					if($insert_result) {
						$status_msg = 'Registered Succesfully.<br>Redirecting to Login in 3 seconds...';
						$color = 'green';

						$firstname = "";
						$lastname = "";
						$username = "";

						header("Refresh:2.5; url=login.php", True, 303);
					}
					else {
						$status_msg = 'Registration Failed';
					}
				}
			}
		}
    }
?>

<body>
	</div>
	<div class="container1">
		<img class="logo" src="https://i.imgur.com/is4Qk5D.png">
		<h1>H I R A Y A</h1>
		<div class="icon"><i class="fas fa-user-circle fa-3x"></div></i><br>
			<form action="" method="post">
				<?php echo "<h5 style='color: $color;'>$status_msg</h5>"; ?>
				<input type="text" name="fname" placeholder="First name" value=<?php echo "\"$firstname\"";?>>
				
				<input type="text" name="lname" placeholder="Last name" value=<?php echo "\"$lastname\"";?>>
				<br>
				<input type="text" name="uname" placeholder="Username" value=<?php echo"\"$username\"";?>>
				<br>
				<input type="password" name="pword" placeholder="Password">
				<br>
				<input type="password" name="pword1" placeholder="Confirm Password">
				<br>
				<br>
				<button id="sign_up" type="submit" name="signup">Sign up</button>
			</form>
		<br>
		<a href="login.php">Already a member? Login here! </a>
	</div>
</body>
</html>

