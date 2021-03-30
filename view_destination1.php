<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
  <title>Boracay</title>
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

<body class="main-body">
<?php include 'navbar.php'; ?>
  <div class="div-body">
    
    <div class="div-body-margin"></div>
    <br>
    <div class="div-content">
      <div class="div-content-location">
        <img class="location-img" src="https://i.imgur.com/M51bxhi.png">
        <div class="text"><h1>B O R A C A Y</h1></div>
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
              <img src="https://i.imgur.com/yEZaYDN.jpg" id="img_slide">
              <h1><div class="text">Go Beach Hopping</div></h1>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/rtcSMQu.jpg" id="img_slide">
              <div class="text">Cliff Dive at Ariel's Point</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/kSITuyd.jpg" id="img_slide">
              <div class="text">Go on a Pub Crawl</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <br>
        
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div2">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/mvyuBl4.jpg" id="img_slide">
              <div class="text">Puka Beach</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/P4CZeph.jpg" id="img_slide">
              <div class="text">Water Activities</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/ago4ThU.jpg?1" id="img_slide">
              <div class="text">High-Altitude Activities</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/E4bPZz1.png" id="img_slide">
              <div class="text">Trek to Mount Luho</div>
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
      <center><h2>HOW TO GET TO BORACAY</h2>
        <p><h3>From Kalibo Airport to Caticlan jetty port (2 hours)</h3>
          <h4> •	local bus (120)<h4>
          <h4>•	non packaged tourist bus (200)<h4>
          <h4>•	packaged bus/ van<h4><br></p>
        <p><h3>Manila to Caticlan Airport(1 hour)</h3>
        <h3>From Caticlan Aiport to Caticlan Jetty Port (5-10 mins)</h3>
          <h4>•	tricycle (50-75)</h4></p><br>
        <p><h3>Cacticlan Jetty Port to Boracay Island (10-15 mins)</h3>
          <h4>•	Terminal Fee (PHP100)</h4>
          <h4>•	Environmental Fee (P75)</h4>
          <h4> •Boat Fare (PHP25-30 for pumpboats; PHP100 for Oyster Ferry)</h4><br>
        </p></center>
      </div>

      <div id="Hotel" class="tabcontent">
        <center><h2>WHERE TO STAY IN BORACAY</h2></center>
       
        <div class="location-station">
          <center>
            <h1>STATION #1</h1>
            <div class="location-station-content">
              <a target="_blank" href="https://www.henann.com/henannprimebeach/stay/room-packages">
                <img class="location-station-img" src="https://i.imgur.com/S0bp4qh.png">
                 <div class="location-station-text"><center><h1>Hennan Prime Beach Resort</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://twoseasonsresorts.com/">
                <img class="location-station-img" src="https://i.imgur.com/p4aCL1X.png">
                 <div class="location-station-text"><center><h1>Two Seasons Boracay Resort</h1></center></div>
              </a>
            </div>
            <br>
            <h1>STATION #2</h1>
            <div class="location-station-content">
              <a target="_blank" href="https://thedistrictboracay.com/">
                <img class="location-station-img" src="https://i.imgur.com/IVRAoGa.jpg">
                 <div class="location-station-text"><center><h1>The District Boracay</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="Boracay">
                <img class="location-station-img" src="https://i.imgur.com/YctQj3X.png">
                 <div class="location-station-text"><center><h1>Le Soleil De Boracay Hotel</h1></center></div>
              </a>
            </div>
            <br>
            <h1>STATION #3</h1>
            <div class="location-station-content">
              <a target="_blank" href="https://www.discoveryshoresboracay.com/">
                <img class="location-station-img" src="https://i.imgur.com/ochDaFv.png">
                 <div class="location-station-text"><center><h1>Discovery Shores</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.thelindhotels.com/">
                <img class="location-station-img" src="https://i.imgur.com/wdNsDTn.png">
                 <div class="location-station-text"><center><h1>The Lind Boracay</h1></center></div>
              </a>
            </div>
            <br>
            <h1>STATION #0</h1>
            <div class="location-station-content">
              <a target="_blank" href="https://www.shangri-la.com/en/boracay/boracayresort/">
                <img class="location-station-img" src="https://i.imgur.com/Pd4cUc6.png">
                 <div class="location-station-text"><center><h1>Shangri-la Boracay Resort</h1></center></div>
              </a>
            </div>
        </div>
      </div>
      
      <div id="Dialect" class="tabcontent">
       <center> <h2>PROFILE</h2>
        <p><h3>Languages: English and Tagalog</h3>
        <h3>Dialect : Ati and Aklanon</h3>
        <h3>Currency: Philippine Peso (PHP)</h3>
        <h3>Location: Central Philippines, in the province of Aklan – a part of Panay Island.</h3>
        <h3>Best time to visit: For the best weather, visit between February to May. Drier months mean more tourists, so take the crowd into account.
      </p></center>
      </div>

      <div id="Restaurant" class="tabcontent">
        <center><h2>WHERE TO EAT IN BORACAY</h2></center>
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a target="_blank" href="https://www.discoveryshoresboracay.com/bars-restaurants/sands-restaurant/">
                <img class="location-station-img" src="https://i.imgur.com/h5FMLea.jpg">
                 <div class="location-station-text"><center><h1>Sands</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.discoveryshoresboracay.com/bars-restaurants/indigo-restaurant/">
                <img class="location-station-img" src="https://i.imgur.com/8o7ROIP.jpg">
                 <div class="location-station-text"><center><h1>Indigo Restaurant</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="http://dosmestizos.com/">
                <img class="location-station-img" src="https://i.imgur.com/a2fBTIa.jpg">
                 <div class="location-station-text"><center><h1>Dos Mestizos Boracay</h1></center></div>
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

