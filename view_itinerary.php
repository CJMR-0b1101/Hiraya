<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<title></title>
</head>
<style>
	.image{
		margin-top: 50px;
		margin-bottom: 50px;
		max-width: 100%;  
		height: auto; 
	}
</style>

<body class="main-body">
	<div class="div-body">
		<?php include 'navbar.php'; ?>
		<div class="div-body-margin"></div>
		<div class="div-content">
			<div class="div-content-background">
				<div class="diy-progress-container">
					<div class="diy-progress" id="progress"></div>
					<div class="progress-circle active">1</div>
					<div class="progress-circle">2</div>
					<div class="progress-circle">3</div>
				</div>

				<div class="image"> <img src="https://i.imgur.com/iPF3pTD.png"> </div>

				<button class="progress-btn" id="progress-prev" disabled>Prev</button>
				<button class="progress-btn" id="progress-next">Next</button>
			</div>
		</div>
	</div>

	<script>
	  const progress = document.getElementById("progress");
	  const prev = document.getElementById("progress-prev");
	  const next = document.getElementById("progress-next");
	  const circles = document.querySelectorAll(".progress-circle");

	  let currentActive = 1;

	  next.addEventListener("click", ()=> {
	  	currentActive++;
	  	if(currentActive > circles.length){
	  		currentActive = circles.length;
	  	}
	  	update();
	  });

	  prev.addEventListener("click", ()=> {
	  	currentActive--;
	  	if(currentActive < 1){
	  		currentActive = 1;
	  	}
	  	update();
	  });

	  function update(){
	  	circles.forEach((circle, idx)=>{
	  		if (idx < currentActive){
	  			circle.classList.add("active");
	  		} else {
	  			circle.classList.remove("active");
	  		}
	  	});

	  	const actives = document.querySelectorAll(".active");
	  	progress.style.width = ((actives.length - 1) / (circles.length - 1)) * 100 + "%";

	  	if (currentActive === 1){
	  		prev.disabled = true;
	  	} else if (currentActive === circles.length){
	  		next.disabled = true;
	  	} else {
	  		prev.disabled = false;
	  		next.disabled = false;
	  	}
	  }


	</script>

</body>



</html>

