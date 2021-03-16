<!DOCTYPE html>
<html>
<head>
	<title>Hiraya Login</title>
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

			$_SESSION['login'] = true;
			$_SESSION['user'] = $row;
			
			header("location: home_page.php");
		} 
		else {
			echo '<h2 align="center" style="color: red;">Invalid Login Credentials!</h2>';
		}
	}
?>

<body>
	
	<div class="container1">
		<img class="logo" src="https://i.imgur.com/is4Qk5D.png">
		<h1>HIRAYA</h1>
		<div class="icon"><i class="fas fa-user-circle fa-3x"></div></i><br>
		<form action="" method="post">
			<input type="text" name="uname" placeholder="Username" required>
			<br>
			<input type="password" name="pword" placeholder="Password" required>
			<br>
			<button type="submit" value="login" name="login">Login</button><br>
		</form>
		<br>
		<a href="register.php">Create an account -> </a>
	</div>
</body>
</html>

