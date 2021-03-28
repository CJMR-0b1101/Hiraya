<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<title></title>
</head>
<style>
	.main-body{
		background-image: url(https://i.imgur.com/bYsVdHu.png);
	}
	.image{
		margin-top: 50px;
		margin-bottom: 50px;
		max-width: 100%;  
		height: auto; 
	}
	.div-contents{
		margin-top: 100px;
		margin-bottom: 20px;
	}
	/* BUTTON STYLE */
		.like-container {
    	width: max-content;
		}
		.unlike-button {
			margin-top: 10px;
			font-size: 35px;
			cursor: pointer;
			width: 55px;
			border-radius: 50px;
		}
		.like-button {
			margin-top: 10px;
			font-size: 35px;
			color: red;
			cursor: pointer;
			width: 55px;
			border-radius: 50px;
		}
		.unlike-button:focus, .like-button:focus {
			outline: none;
			box-shadow: 0px 0px 2px red;
		}
		#first_div {
  		display: block;
		}

		.myDivs {
  		display: none;
		}
</style>

<body class="main-body">
<?php include 'navbar.php'; ?>
		<div class="div-content">
			<div class="div-itinerary-background">
				<div class="diy-progress-container">
					<div class="diy-progress" id="progress"></div>
					<div class="progress-circle active">1</div>
					<div class="progress-circle">2</div>
					<div class="progress-circle">3</div>
				</div>
				<!-- ADD CONTENTS HERE  -->
				<center>
				<div class="div-contents">
					<div class="myDivs" id="first_div"><img src="images/img1.jpg"> CONTENT 1 </div>
					<div class="myDivs"><img src="images/img2.jpg"> CONTENT 2 </div>
					<div class="myDivs"><img src="images/img3.jpg"> CONTENT 3 </div>
				</div>
				</center>

				<div class="add_button"> 
				<!-- ADD BUTTON  -->
				<center>
					<?php
						$like_class = "unlike-button";
						$user_id = $_GET['user_id'];
						$location_id = $_GET['location_id'];
						$status_msg = "";
						echo "UID: $user_id";
						echo "<br>Loc ID: $location_id";

						include 'config.php';

						// FETCH CURRENT ITINERARY OF USER
						$sql = "SELECT * FROM itinerary WHERE user_id = $user_id AND location_id = $location_id";
						// echo "<br>SQL: ".$sql;
						$query_result = mysqli_query($conn, $sql);
						
						if(isset($_POST['unlike'])) {
						// IF NO EXISTING RECORD, INSERT
						if(!mysqli_num_rows($query_result) == 1) {
							$sql = "INSERT INTO itinerary(user_id, location_id) VALUES($user_id, $location_id)";
							// echo "<br>".$sql;
							$insert_result = mysqli_query($conn, $sql);

							if($insert_result) {
							$like_class = "like-button";
							$status_msg = "Added to My Plans";
							echo '<div class="like-container">';
							echo '  <form action="" method="post">
										<button class="'.$like_class.'" type="submit" name="like">♥</button>
										<i style="margin-left: 5px; font-size: 20px;">'.$status_msg.'</i>
									</form>';
							echo '</div>';
							}
						}
						// IF THERE'S A RECORD, DELETE
						else {
							$sql = "DELETE FROM itinerary WHERE user_id = $user_id AND location_id = $location_id";
							// echo "<br>".$sql;
							$delete_result = mysqli_query($conn, $sql);

							if($delete_result) {
							$like_class = "unlike-button";
							$status_msg = "";
							echo '<div class="like-container">';
							echo '  <form action="" method="post">
										<button class="'.$like_class.'" type="submit" name="like">♥</button>
										<i style="margin-left: 5px; font-size: 20px;">'.$status_msg.'</i>
									</form>';
							echo '</div>';
							}
						}

						unset($_POST['like']);
						if(!isset($_POST['like'])) {
							header("Refresh:0");
						}
						}
						else {
						if(mysqli_num_rows($query_result) == 1) {
							$like_class = "like-button";
							$status_msg = "Added to My Plans";

							echo '<div class="like-container">';
							echo '  <form action="" method="post">
									<button class="'.$like_class.'" type="submit" name="unlike">♥</button>
									<i style="margin-left: 5px; font-size: 20px;">'.$status_msg.'</i>
									</form>';
							echo '</div>';
						}
						else {
							$status_msg = "";
							
							echo '<div class="like-container">';
							echo '  <form action="" method="post">
									<button class="'.$like_class.'" type="submit" name="unlike">♥</button>
									<i style="margin-left: 5px; font-size: 20px;">'.$status_msg.'</i>
									</form>';
							echo '</div>';
						}
						}
					?> </div>
				</center>
				<center><button class="progress-btn" id="progress-prev" disabled>Prev</button>
				<button class="progress-btn" id="progress-next">Next</button></center>
			</div>
	

	<script>
	  const progress = document.getElementById("progress");
	  const prev = document.getElementById("progress-prev");
	  const next = document.getElementById("progress-next");
	  const circles = document.querySelectorAll(".progress-circle");
	  var divs = document.getElementsByClassName("myDivs");

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
		if (currentActive == 1){
            divs[0].style.display = "block";
            divs[1].style.display = "none";
            divs[2].style.display = "none";
        }else if (currentActive == 2){
            divs[0].style.display = "none";
            divs[1].style.display = "block";
            divs[2].style.display = "none";
        }else if (currentActive == 3){
            divs[0].style.display = "none";
            divs[1].style.display = "none";
            divs[2].style.display = "block";
        }
	  }
	</script>

</body>



</html>

