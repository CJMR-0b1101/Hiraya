<!DOCTYPE html>
<html>
<head>
	<title>Hiraya Login</title>
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<style>
		/* Background */
			body{
				background-image: url(https://i.imgur.com/bYsVdHu.png);
			}
			h1{
				margin-top: -10px;
				color: black;
			}
		/* container box */
			div.container1{
				width: 30%;
				margin: 5% 35%;
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
		            padding: 10px 32px;
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

<!-- LOGIN PHP -->
<?php
	$status_msg = "";
	session_start();
	
	if(isset($_SESSION['login'])) {
		header("location: home_page.php");
	}

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

			$_SESSION['login'] = true;
			$_SESSION['user'] = $row;
			header("location: home_page.php");
		} 
		else {
			$status_msg = 'Invalid login credentials';
		}
	}
?>

<body>
	
	<div class="container1">
		<img class="logo" src="https://i.imgur.com/is4Qk5D.png">
		<h1>H I R A Y A</h1>
		<div class="icon"><i class="fas fa-user-circle fa-3x"></div></i><br>
		<form action="" method="post">
			<?php echo "<h5 style='color: red;'>$status_msg</h5>"; ?>
			<input type="text" name="uname" placeholder="Username">
			<br>
			<input type="password" name="pword" placeholder="Password">
			<br>
			<button type="submit" value="login" name="login">Login</button><br>
		</form>
		<br>
		<a href="register.php"> Not a member? Register here! </a>
	</div>
</body>
</html>

