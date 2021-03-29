<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
  <title>Boracay</title>
</head>

<style>
  div.text{
    font-family: 'Poppins', sans-serif;
    font-size: 30px;
    color: white;
  }
</style>

<body class="main-body">
<?php include 'navbar.php'; ?>
  <div class="div-body">
    
    <div class="div-body-margin"></div>
    <br>
    <div class="div-content">
      <div class="div-content-location">
        <img class="location-img" src="images/img1.jpg">
        <div class="text"><h1>BORACAY</h1></div>
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
              <img src="images/img1.jpg" id="img_slide">
              <h1><div class="text">Go Beach Hopping</div></h1>
            </div>
            <div class="mySlides fade">
              <img src="images/img2.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
              <img src="images/img3.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <br>
        
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div2">
            <div class="mySlides fade">
              <img src="images/img1.jpg" id="img_slide">
              <div class="text">Go on a Pub Crawl</div>
            </div>
            <div class="mySlides fade">
              <img src="images/img2.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
              <img src="images/img3.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div2">
            <div class="mySlides fade">
              <img src="images/img1.jpg" id="img_slide">
              <div class="text">•	Water Activities</div>
            </div>
            <div class="mySlides fade">
              <img src="images/img2.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
              <img src="images/img3.jpg" id="img_slide">
              <div class="text">Caption Text</div>
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
        <h2>HOW TO GET TO BORACAY</h2>
        <p><h2>From Kalibo Airport to Caticlan jetty port (2 hours)</h2><br>
            •	local bus (120)<br>
            •	non packaged tourist bus (200)<br>
            •	packaged bus/ van<br></p>
        <p><h2>Manila to Caticlan Airport(1 hour)</h2<br>
        From Caticlan Aiport to Caticlan Jetty Port (5-10 mins)<br>
            •	tricycle (50-75)</p>
        <p>Cacticlan Jetty Port to Boracay Island (10-15 mins)<br>
            •	Terminal Fee (PHP100)<br>
            •	Environmental Fee (P75)<br>
            •	Boat Fare (PHP25-30 for pumpboats; PHP100 for Oyster Ferry)<br>
            </p>
      </div>

      <div id="Hotel" class="tabcontent">
        <center><h2>WHERE TO STAY IN LOCATIONNAME</h2></center>
       
        <div class="location-station">
          <center>
            <h1>STATION #1</h1>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>HENNAN PRIME BEACH RESORT</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>TWO SEASONS BORACAY RESORT</h1></center></div>
              </a>
            </div>
            <br>
            <h1>STATION #2</h1>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>THE DISTRICT BORACAY</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>LE SOLEIL DE BORACAY HOTEL</h1></center></div>
              </a>
            </div>
            <br>
            <h1>STATION #3</h1>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>DISCOVERY SHORES</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>THE LIND BORACAY</h1></center></div>
              </a>
            </div>
            <br>
            <h1>STATION #0</h1>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>SHANGRI-LA BORACAY RESORT</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>CRIMSON RESORT AND SPA</h1></center></div>
              </a>
            </div>
        </div>
      </div>
      
      <div id="Dialect" class="tabcontent">
        <h2>PROFILE</h2>
        <p>Languages: English and Tagalog<br>
          Dialect : Ati and Aklanon<br>
          Currency: Philippine Peso (PHP)<br>
          Location: Central Philippines, in the province of Aklan – a part of Panay Island. Best time to visit: For the best weather, visit between February to May. Drier months mean more tourists, so take the crowd into account.
      </p>
      </div>

      <div id="Restaurant" class="tabcontent">
        <center><h2>WHERE TO EAT IN BORACAY</h2></center>
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>Sands</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>Indigo Restaurant</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>Dos Mestizos Boracay</h1></center></div>
              </a>
            </div>
        </div>
      </div>
    </div>
    
  </div>

</body>
</html>

