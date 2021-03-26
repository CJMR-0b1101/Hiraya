<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
  <title></title>
</head>

<body class="main-body">
  <div class="div-body">
    <?php include 'navbar.php'; ?>
    <div class="div-body-margin"></div>
    <br>
    <div class="div-content">
      <div class="div-content-location">
        <img class="location-img" src="images/img1.jpg">
        <div class="div-content-location-text"><h1>NAME OF LOCATION</h1></div>
      </div>
      
      <div class="tab">
        <center>
          <button class="tablinks" onclick="openTab(event, 'Travel')">Travel Spots</button>
          <button class="tablinks" onclick="openTab(event, 'Transportation')">Transportation Guide</button>
          <button class="tablinks" onclick="openTab(event, 'Hotel')">Hotels</button>
          <button class="tablinks" onclick="openTab(event, 'Dialect')">Dialect</button>
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
              <div class="text">Caption Text</div>
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
              <div class="text">Caption Text</div>
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
        <h2>HOW TO GET TO LOCATIONNAME</h2>
        <p>SOME CONTENTS MISSING</p>
        <h2>HOW TO GET AROUND LOCATIONNAME</h2>
        <p>SOME CONTENTS MISSING</p>
      </div>

      <div id="Hotel" class="tabcontent">
        <h2>WHERE TO STAY IN LOCATIONNAME</h2>
        <center><img class="location-hotel-map-img" src="images/img1.jpg"></center>
        <div class="location-station">
          <center>
            <h1>STATION #</h1>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>NAME OF HOTEL</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>NAME OF HOTEL</h1></center></div>
              </a>
            </div>
        </div>
      </div>
      
      <div id="Dialect" class="tabcontent">
        <h2>DIALECT</h2>
        <p>This is for Dialect</p>
      </div>

      <div id="Restaurant" class="tabcontent">
        <h2>WHERE TO EAT IN LOCATIONNAME</h2>
        <div class="location-station">
          <center>
            <h1>STATION #</h1>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>NAME OF RESTAURANT</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="images/img1.jpg">
                 <div class="location-station-text"><center><h1>NAME OF RESTAURANT</h1></center></div>
              </a>
            </div>
        </div>
      </div>
    </div>
    
  </div>

</body>
</html>

