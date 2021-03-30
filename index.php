<?php
	session_start();
	
	if(isset($_SESSION['login'])) {
		header("location: home_page.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hiraya</title>
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
				width: 40%;
				margin: 10% 30%;
				padding: 20px 20px;
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
				opacity: 0.9;
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
		            color:#747F42;
		            padding: 15px 32px;
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

<?php
    if(isset($_POST['guest'])) {
        session_start();
        $_SESSION['guestlogin'] = True;

        header('location: home_page.php');
    }
    elseif(isset($_POST['account'])) {
        header('location: login.php');
    }
?>

<body>
	
	<div class="container1">
		<img class="logo" src="https://i.imgur.com/is4Qk5D.png">
		<h1>H I R A Y A</h1>
		<div class="icon"><i class="fas fa-user-circle fa-3x"></div></i><br>
		<form action="" method="post">
			<button type="submit" name="guest">I am a guest</button>
			<button type="submit" name="account">I have an account</button>
		</form>
	</div>
</body>
</html>
