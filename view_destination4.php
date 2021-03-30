<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
	<link rel="icon" href="images/hiraya_icon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
  <title>Coron, Palawan</title>
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
        <img class="location-img" src="https://i.imgur.com/ZlE9V0z.jpg?1">
        <div class="text"><h1>CORON PALAWAN</h1></div>
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
              <img src="https://i.imgur.com/b8DRTlL.jpg" id="img_slide">
              <h1><div class="text">Lake Hopping</div></h1>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/bLuP3Cq.jpg" id="img_slide">
              <div class="text">CYC Beach</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/XKCOkjP.jpg" id="img_slide">
              <div class="text">Pamalican Island</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <br>
        
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div2">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/26PscWg.jpg" id="img_slide">
              <div class="text">Shipwreck Diving</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/K9LbB9E.jpg" id="img_slide">
              <div class="text">Seafood Galore</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/FQR5BAs.jpg" id="img_slide">
              <div class="text">Water Activities </div>
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
        <center><h2>HOW TO GET TO CORON PALAWAN</h2>
        <p>
        	<h3>Plane</h3>
          <h4>•You have to fly from Manila to Busuanga airport, Palawan. You can take Cebu Pacific Air, Zest Air or PAL Express. </h4>
          <h4>•From Busuanga aiport, you take a jeepney for about one hour to reach Coron Town. </h4>
          <h4>•The ride cost about P150 per person.</h4>
          <h3>Ferry Boat</h3>
          <h4>•From Manila you can take the SuperFerry. It goes once a week to Puerto Princesa and stops off at Coron on the way. </h4>
		    </p></center>
      </div>

      <div id="Hotel" class="tabcontent">
        <center><h2>WHERE TO STAY IN CORON PALAWAN</h2></center>
       
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a href="https://twoseasonsresorts.com/coron/">
                <img class="location-station-img" src="https://i.imgur.com/Ub4Pq9Q.png">
                 <div class="location-station-text"><center><h1>TWO SEASONS CORON ISLAND RESORT AND SPA</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://www.clubparadisepalawan.com/">
                <img class="location-station-img" src="https://i.imgur.com/6kIcOVl.png">
                 <div class="location-station-text"><center><h1>CLUB PARADISE PALAWAN</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://busuangabaylodge.com/">
                <img class="location-station-img" src="https://i.imgur.com/07xXKgi.png">
                 <div class="location-station-text"><center><h1>BUSUANGA BAY LODGE</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://www.humaisland.com/">
                <img class="location-station-img" src="https://i.imgur.com/7kuHNST.png">
                 <div class="location-station-text"><center><h1>HUMA ISLAND RESORT SPA</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://www.coronwestownresort.com/">
                <img class="location-station-img" src="https://i.imgur.com/9VwKvlx.jpg">
                 <div class="location-station-text"><center><h1>CORON WESTOWN RESORT</h1></center></div>
              </a>
            </div>
        </div>
      </div>
      
      <div id="Dialect" class="tabcontent">
        <center><h2>PROFILE</h2>
        <p>
        <h3>Language: Pilipino and Cuyonon, English.  Bisaya (or Cebuano) </h3>
        <h3>Currency:  The main currency is the Philippine Peso.  US Dollars may be exchanged but at a slightly lower rate than in Manila. </h3>
        <h3>About Coron: Coron is a small, rapidly developing town on the island of Busuanga where most people stay when they visit the Calamianes Group of islands in northern Palawan. </h3>
        </p></center>
      </div>

      <div id="Restaurant" class="tabcontent">
        <center><h2>WHERE TO EAT IN CORON PALAWAN</h2></center>
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/rLDtlfh.png">
                 <div class="location-station-text"><center><h1>Le Voyage</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/C7fsGdR.png">
                 <div class="location-station-text"><center><h1>Trattoria Altrove Coron</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/qoNJFGU.png">
                 <div class="location-station-text"><center><h1>Summer Café and Bar</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/Vyl783X.png">
                 <div class="location-station-text"><center><h1>Rosa’s Cantina</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/vCPLtCs.png">
                 <div class="location-station-text"><center><h1>Buzz Express</h1></center></div>
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

