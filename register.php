<!DOCTYPE html>
<html>
<head>
	<title>Hiraya Register</title>
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<style>
		/* Background */
			body{
				background-image: url(https://i.imgur.com/8fthuou.png);
			}
			h1{
				margin-top: -10px;
			}
		/* container box */
			div.container1{
				width: 30%;
				margin: 1% 35%;
				padding: 10px 20px;
				box-sizing: border-box;
				border: 2px solid #04BFBF;
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
				 input[type=text]:focus {
			  		background-color: #04BFBF;
			  		border-radius: 10px;
				}
				input[type=int]:focus {
			  		background-color: #04BFBF;
			  		border-radius: 10px;
				}
				button{
					font-size: 15px;
					font-family: 'Inconsolata', monospace;
		          	background-color: white;
		            border: none;
		            border-radius: 12px;
		            border: 2px solid #747F42;
		            color:#A5CC82;
		            padding: 15px 32px;
		            text-align: center;
		            text-decoration: none;
		            display: inline-block;
		            margin: 4px 2px;
		            cursor: pointer;
				}
				button:hover {
				  background-image: url(https://i.imgur.com/hi3eFOb.jpg);
				}
	</style>
</head>

<!-- REGISTRATION PHP -->
<?php
	$firstname = "";
	$lastname = "";
	$username = "";
	
	session_start();
	
	if(isset($_SESSION['login'])) {
		header("location: home_page.php");
	}

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
	
	<div class="container1">
		<img class="logo" src="https://i.imgur.com/is4Qk5D.png">
		<h1>HIRAYA</h1>
		<div class="icon"><i class="fas fa-user-circle fa-3x"></div></i><br>
		<form action="" method="post">
			<input type="text" name="fname" placeholder="First name" value=<?php echo "\"$firstname\"";?>required>
			
			<input type="text" name="lname" placeholder="Last name" value=<?php echo "\"$lastname\"";?>required>
			<br>
			<input type="text" name="uname" placeholder="Username" value=<?php echo"\"$username\"";?>required>
			<br>
			<input type="password" name="pword" placeholder="Password" required>
			<br>
			<input type="password" name="pword1" placeholder="Confirm Password" required>
			<br>
			<br>
			<button type="submit" value="signup" name="signup">Sign up</button>
		</form>
		<br>
		Click <a href="login.php">here</a> to login.
	</div>
</body>
</html>

