<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
	<title></title>
</head>

<body class="main-body">
	<div class="div-body">
		<?php include 'navbar.php'; ?>
		<div class="div-body-margin"></div>
		<div class="slideshow-container">
			<div class="mySlides fade" id='first_slide'>
				<img src="https://i.imgur.com/6CCp3sL.jpg" id="img_slide">
				<div class="text">BORACAY</div>
			</div>
			<div class="mySlides fade">
				<img src="https://i.imgur.com/xLjrrsL.jpg" id="img_slide">
				<div class="text">SIARGAO</div>
			</div>
			<div class="mySlides fade">
				<img src="https://i.imgur.com/FgdctQq.jpg" id="img_slide">
				<div class="text">PALAWAN</div>
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
		<div class="div-body-margin"></div>
		<div class="div-content">
			<div class="div-content-home">
				<div class="div-content-home-header">
					<h1>LATEST BLOGS<a class="div-content-home-header-blog" href="">more</a></h1>
					
				</div>
				<div class="div-content-home-background">
					<div class="div-content-home-list">
						<div class="div-content-home-list-content">
							<div class="div-content-home-list-content-header">
								<a href="#">TITLE 1</a>
							</div>
							<div class="div-content-home-list-content-content">
								<p>Welcome to HIRAYA!</p>
							</div>
						</div>
						<div class="div-content-home-list-content">
							<div class="div-content-home-list-content-header">
								<a href="#">TITLE 2</a>
							</div>
							<div class="div-content-home-list-content-content">
								<p>Welcome to HIRAYA!</p>
							</div>
						</div>
						<div class="div-content-home-list-content">
							<div class="div-content-home-list-content-header">
								<a href="#">TITLE 3</a>
							</div>
							<div class="div-content-home-list-content-content">
								<p>Welcome to HIRAYA!</p>
							</div>
						</div>
						<div class="div-content-home-list-content">
							<div class="div-content-home-list-content-header">
								<a href="#">TITLE 4</a>
							</div>
							<div class="div-content-home-list-content-content">
								<p>Welcome to HIRAYA!</p>
							</div>
						</div>
						<div class="div-content-home-list-content">
							<div class="div-content-home-list-content-header">
								<a href="#">TITLE 5</a>
							</div>
							<div class="div-content-home-list-content-content">
								<p>Welcome to HIRAYA!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
</body>
</html>