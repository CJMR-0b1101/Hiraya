<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
	<link rel="icon" href="images/hiraya_icon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
  <title>Bohol</title>
</head>

<style>
  .main-body{
    font-family: 'Poppins', sans-serif;
  }
  div.text{
    font-family: 'Poppins', sans-serif;
    font-size: 30px;
    color: white;
  }
  h2{
    color: #c9e265;
    text-decoration: underline;
  }
</style>

<body>
<?php include 'navbar.php'; ?>
  <div class="div-body">
    
    <div class="div-body-margin"></div>
    <br>
    <div class="div-content">
      <div class="div-content-location">
        <img class="location-img" src="https://i.imgur.com/LUuri3J.png">
        <div class="text"><h1>BOHOL</h1></div>
      </div>
      
      <div class="tab">
        <center>
          <button class="tablinks" onclick="openTab(event, 'Travel')">Travel Spots</button>
          <button class="tablinks" onclick="openTab(event, 'Transportation')">Transportation Guide</button>
          <button class="tablinks" onclick="openTab(event, 'Hotel')">Hotels</button>
          <button class="tablinks" onclick="openTab(event, 'Dialect')">Profile</button>
          <button class="tablinks" onclick="openTab(event, 'Restaurant')">Restaurants</button>
        </center>
      </div>
      <script>
        function openTab(evt, tabName) {
          // Declare all variables
          var i, tabcontent, tablinks;

          // Get all elements with class="tabcontent" and hide them
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }

          // Get all elements with class="tablinks" and remove the class "active"
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }

          // Show the current tab, and add an "active" class to the button that opened the tab
          document.getElementById(tabName).style.display = "block";
          evt.currentTarget.className += " active";
        } 
      </script>

      <div id="Travel" class="tabcontent">
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div1">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/sLTuYvU.jpg" id="img_slide">
              <h1><div class="text">Visit the Chocolate Hills</div></h1>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/EVcHMTe.jpg" id="img_slide">
              <div class="text">Lounge at the beaches of Panglao</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/Mw2RgUj.png" id="img_slide">
              <div class="text">Face your fears at Bohol’s Adventure Parks</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <br>
        
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div2">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/lwZkCNc.png" id="img_slide">
              <div class="text">Watch the dolphins up close at Pamilacan Island</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/DTYabY5.jpg" id="img_slide">
              <div class="text">Cross the hanging bridge</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/B7kZ95I.png" id="img_slide">
              <div class="text">See one of the world’s smallest primate</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <br>

        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div3">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/B4tJk2Z.png" id="img_slide">
              <div class="text">Witness the amazing man-made forest</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/WhoquJP.png" id="img_slide">
              <div class="text">Be amazed at the Hinagdanan Cave</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/gSGryPU.png" id="img_slide">
              <div class="text">Visit the iconic church made of egg whites</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <script>
          var sliderObjects = [];
          createSliderObjects();

          function plusDivs(obj, n) {
            var parentDiv = $(obj).parent();
            var matchedDiv;
            $.each(sliderObjects, function(i, item) {
              if ($(parentDiv[0]).attr('id') == $(item).attr('id')) {
                matchedDiv = item;
                return false;
              }
            });
            matchedDiv.slideIndex=matchedDiv.slideIndex+n;
            showDivs(matchedDiv, matchedDiv.slideIndex);
          }

          function createSliderObjects() {
            var sliderDivs = $('.slider');
            $.each(sliderDivs, function(i, item) {
              var obj = {};
              obj.id = $(item).attr('id');
              obj.divContent = item;
              obj.slideIndex = 1;
              obj.slideContents = $(item).find('.mySlides');
              showDivs(obj, 1);
              sliderObjects.push(obj);
            });
          }

          function showDivs(divObject, n) {
            debugger;
            var i;
            if (n > divObject.slideContents.length) {
              divObject.slideIndex = 1
            }
            if (n < 1) {
              divObject.slideIndex = divObject.slideContents.length
            }
            for (i = 0; i < divObject.slideContents.length; i++) {
              divObject.slideContents[i].style.display = "none";
            }
            divObject.slideContents[divObject.slideIndex - 1].style.display = "block";
          }
        </script>
      </div>

      <div id="Transportation" class="tabcontent">
        <center><h2>HOW TO GET TO BOHOL</h2>
        <p><h3>By Plane</h3>
            <h4>•	From Manila to Tagbiliran City</h4>
            <h4>•	From Cebu City to Tagbiliran City</h4></p><br>
        <p><h3>By Boat</h3>
        <h4>•	From Cebu City to Tagbiliran City Pier</h4>
        <h4>•	From Manila Tagbiliran City Piebr</h4>
        <h4> •	From Dipolog to Tagbiliran City Pierr</h4> 
        <h4>•	From Dumaguete to Tagbiliran City Pier </h4></p></center>
      </div>

      <div id="Hotel" class="tabcontent">
        <center><h2>WHERE TO STAY IN BOHOL</h2></center>
       
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a target="_blank" href="https://threelittlebirdsresort.com/">
                <img class="location-station-img" src="https://i.imgur.com/ZtQnCWG.png">
                 <div class="location-station-text"><center><h1>Three Little Birds Resort</h1></center></div>
              </a>
            </div>
            <br>
            <div class="location-station-content">
              <a target="_blank" href="https://panglaosearesort.com/">
                <img class="location-station-img" src="https://i.imgur.com/k54SRug.png">
                 <div class="location-station-text"><center><h1>Panglao Sea Resort – Tangnan</h1></center></div>
              </a>
            </div>
            <br>
            <div class="location-station-content">
              <a target="_blank" href="https://www.booking.com/hotel/ph/sweet-home-boutique.html">
                <img class="location-station-img" src="https://i.imgur.com/PAsG57L.png">
                 <div class="location-station-text"><center><h1>Sweet Home Boutique Hotel</h1></center></div>
              </a>
            </div>
          </center>
        </div>
      </div>

      <div id="Dialect" class="tabcontent">
        <center><h2>PROFILE</h2>
        <p><h3>Languages: English and Tagalog</h3>
        <h3>Dialect : Cebuano and Boholano</h3>
        <h3> Currency: Philippine Peso (PHP)</h3>
        <h3>Location: Central Visayas, Philippines. It is the second main tourist destination in the country after Boracay. </h3>
        <h3>Bohol Island is also the main scuba diving destination in the Phillipines and has excellent diving opportunities to offer.</h3>
        </p></center>
      </div>

      <div id="Restaurant" class="tabcontent">
        <center><h2>WHERE TO EAT IN BOHOL</h2></center>
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a target="_blank" href="https://www.facebook.com/payagrestaurantofficialpage/ ">
                <img class="location-station-img" src="https://i.imgur.com/XZE8kGx.png">
                 <div class="location-station-text"><center><h1>Payag</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://lobocriverwatch.com/ ">
                <img class="location-station-img" src="https://i.imgur.com/BUhjQao.png">
                 <div class="location-station-text"><center><h1>Loboc River Floating Restaurant</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.facebook.com/Tarsier-Paprika-1310740022316731/ ">
                <img class="location-station-img" src="https://i.imgur.com/cCTi4YV.png">
                 <div class="location-station-text"><center><h1>Tarsier Paprika</h1></center></div>
              </a>
            </div>
        </div>
      </div>
    </div>
    
  </div>
  <div class="div-blog-footer">
    <h3>All rights reserve. Hiraya 2021</h3>
  </div>
</body>
</html>

