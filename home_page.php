<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/hiraya_icon.ico">
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
	<title>Hiraya</title>
</head>
<style>
	.main-body{
        float:center;
        background-image: url(https://i.imgur.com/bYsVdHu.png);
    }
	h1{
		color:#c9e265;
	}
	div.text{
		font-family: 'Poppins', sans-serif;
		font-size: 30px;
	}
	</style>
<body class="main-body">
	
		<?php include 'navbar.php'; ?>
		<div class="div-body-margin"></div>
		<div class="div-body-margin"></div>
		<br>
		<div class="slideshow-container">
			<div class="mySlides fade" id='first_slide'>
				<img src="https://i.imgur.com/6CCp3sL.jpg" id="img_slide">
				<div class="text">B O R A C A Y</div>
			</div>
			<div class="mySlides fade">
				<img src="https://i.imgur.com/xLjrrsL.jpg" id="img_slide">
				<div class="text">S I A R G A O</div>
			</div>
			<div class="mySlides fade">
				<img src="https://i.imgur.com/FgdctQq.jpg" id="img_slide">
				<div class="text">P A L A W A N</div>
			</div>
			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>
		<div class="div-slideshow-dot">
		  <span class="dot" onclick="currentSlide(1)"></span>
		  <span class="dot" onclick="currentSlide(2)"></span>
		  <span class="dot" onclick="currentSlide(3)"></span>
		</div>
		<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
			      slides[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
			      dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " active";
			}
		</script>
		<br><hr class="solid">
			<div class="div-content-home-header">
					<center><h1>L A T E S T  B L O G S</h1></center>
				<?php
					include 'config.php';

					$sql = "SELECT blog_id, blog_title, blog_description FROM blogs ORDER BY blog_id DESC LIMIT 5";
					$result = mysqli_query($conn, $sql);

				if($result) {
					$rows = mysqli_fetch_all($result);
				}
			else {
				echo "NOT FETCHED";
			}
		?>
		</div>
		<div class="div-content-home-background">
			<div class="div-content-home-list">
				<div class="div-content-home-list-content">
					<div class="div-content-home-list-content-header">
						<i class="fas fa-clipboard-check"></i>
						<a href="<?php echo 'view_blog.php?blog_id='.$rows[0][0];?>"><?php echo $rows[0][1]?></a>
					</div>
					<div class="div-content-home-list-content-content">
						<p><?php echo $rows[0][2]; ?></p>
					</div>
				</div>
				<div class="div-content-home-list-content">
					<div class="div-content-home-list-content-header">
						<i class="fas fa-clipboard-check"></i>
						<a href="<?php echo 'view_blog.php?blog_id='.$rows[1][0];?>"><?php echo $rows[1][1]?></a>
					</div>
					<div class="div-content-home-list-content-content">
						<p><?php echo $rows[1][2]; ?></p>
					</div>
				</div>
				<div class="div-content-home-list-content">
					<div class="div-content-home-list-content-header">
						<i class="fas fa-clipboard-check"></i>
						<a href="<?php echo 'view_blog.php?blog_id='.$rows[2][0];?>"><?php echo $rows[2][1]?></a>
					</div>
					<div class="div-content-home-list-content-content">
						<p><?php echo $rows[2][2]; ?></p>
					</div>
				</div>
				<div class="div-content-home-list-content">
					<div class="div-content-home-list-content-header">
						<i class="fas fa-clipboard-check"></i>
						<a href="<?php echo 'view_blog.php?blog_id='.$rows[3][0];?>"><?php echo $rows[3][1]?></a>
					</div>
					<div class="div-content-home-list-content-content">
						<p><?php echo $rows[3][2]; ?></p>
					</div>
				</div>
				<div class="div-content-home-list-content">
					<div class="div-content-home-list-content-header">
						<i class="fas fa-clipboard-check"></i>
						<a href="<?php echo 'view_blog.php?blog_id='.$rows[4][0];?>"><?php echo $rows[4][1]?></a>
					</div>
					<div class="div-content-home-list-content-content">
					<p><?php echo $rows[4][2]; ?></p>
				</div>
			</div>
		</div>
	</div>

	
</body>
</html>