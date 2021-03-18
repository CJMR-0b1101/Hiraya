<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<title></title>
</head>

<body class="main-body">
	<div class="div-body">
		<?php include 'navbar.php'; ?>
		<div class="div-body-margin"></div>
		<div class="slideshow-container">
			<div class="mySlides fade" id='first_slide'>
				<img src="images/img1.jpg" id="img_slide">
				<div class="text">Caption Text</div>
			</div>
			<div class="mySlides fade">
				<img src="images/img2.jpg" id="img_slide">
				<div class="text">Caption Two</div>
			</div>
			<div class="mySlides fade">
				<img src="images/img3.jpg" id="img_slide">
				<div class="text">Caption Three</div>
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
		<div class="div-body-margin"></div>
		<div class="div-content">
			<div class="div-content-background">
				<div class="div-content-left">
					<div class="div-content-left-header">
						<p>LATEST BLOGS</p>
					</div>
					<div class="div-content-left-background">
						<div class="div-content-left-list">
							<div class="div-content-left-list-content">
								<div class="div-content-left-list-content-header">
									<a href="#">TITLE 1</a>
								</div>
								<div class="div-content-left-list-content-content">
									<p>Welcome to HIRAYA!</p>
								</div>
							</div>
							<div class="div-content-left-list-content">
								<div class="div-content-left-list-content-header">
									<a href="#">TITLE 2</a>
								</div>
								<div class="div-content-left-list-content-content">
									<p>Welcome to HIRAYA!</p>
								</div>
							</div>
							<div class="div-content-left-list-content">
								<div class="div-content-left-list-content-header">
									<a href="#">TITLE 3</a>
								</div>
								<div class="div-content-left-list-content-content">
									<p>Welcome to HIRAYA!</p>
								</div>
							</div>
							<div class="div-content-left-list-content">
								<div class="div-content-left-list-content-header">
									<a href="#">TITLE 4</a>
								</div>
								<div class="div-content-left-list-content-content">
									<p>Welcome to HIRAYA!</p>
								</div>
							</div>
							<div class="div-content-left-list-content">
								<div class="div-content-left-list-content-header">
									<a href="#">TITLE 5</a>
								</div>
								<div class="div-content-left-list-content-content">
									<p>Welcome to HIRAYA!</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="div-content-right">
					
				</div>
			</div>
		</div>
	</div>

	
</body>
</html>