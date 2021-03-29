<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
  <title></title>
</head>

<style>
	main-body{
		background-image: url(https://i.imgur.com/bYsVdHu.png) ;
	}
  div.text{
		font-family: 'Poppins', sans-serif;
		font-size: 30px;
    color: black;
	}
</style>

<body class="main-body">
<?php include 'navbar.php'; ?>
  <div class="div-body">
    
    <div class="div-body-margin"></div>
    <br>
    <div class="div-content">
      <div class="div-content-location">
        <img class="location-img" src="https://i.imgur.com/eZdAUh6.png">
        <div class="text"><h1>S I A R G A O</h1></div>
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
              <img src="https://i.imgur.com/ulXvcif.jpg" id="img_slide">
              <h1><div class="text">Surf Cloud 9’s World Famous Waves</div></h1>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/H0bs1tC.jpg" id="img_slide">
              <div class="text">Take the Leap at Sugba Lagoon</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/yU3keXQ.jpg" id="img_slide">
              <div class="text">Swim in the Magpupungko Rock Pools</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <br>
        
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div2">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/bk6YXyL.jpg" id="img_slide">
              <div class="text">Swing in Maasin’s Bent Coconut Tree Rope</div>
            </div>
            <div class="mySlides fade">
              <img src="images/img2.jpg" id="img_slide">
              <div class="text">Dive in the Blue Cathedral</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/qJuCeOO.png" id="img_slide">
              <div class="text">Learn How to Surf in Secret Beach</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div3">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/i4f1ydl.png" id="img_slide">
              <div class="text">Dive in the Blue Cathedral</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/ZaCe26I.jpg" id="img_slide">
              <div class="text">Taste the Best Barbecue at Mama’s Grill</div>
            </div>
            <div class="mySlides fade">
              <img src="images/img3.jpg" id="img_slide">
              <div class="text">Enjoy a Tropical Feast at Daku Island</div>
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
      <center><h2>HOW TO GET TO SIARGAO</h2>
        <p><h2>From Manila – Fly via Cebu Pacific, PAL or Skyjet directly to Siargao</h2><br>
            •	From Surigao City – Ride a ferry to Dapa Port in Siargao.(P220-P320)<br>
            •	From Butuan City – Ride a bus or van to Surigao City. Travel should take 3-4 hours(P220)<br>
            •	From the bus terminal, ride a minivan or tricycle to Surigao Port (P15.) Then ride a ferry to Dapa Port in Siargao Island.<br></p>
        <p><h2>From Cebu – Cebu Pacific also has direct flights from Cebu to Siargao. </h2<br>
        Fares range as low as P825 for the economy seat to P5550 for an executive suite.<br></p>
        <p>From Davao – Philippine Airlines now has direct flights to Siargao. <br>
            •	Fare is P570 (non-AC) ; P720 (AC) and travel could last up to 15Hrs. <br>
            •	In Surigao City, simply hop on a ferry to Dapa Port in Siargao Island.<br>
            </p></center>
      </div>

      <div id="Hotel" class="tabcontent">
        <center><h2>WHERE TO STAY IN SIARGAO</h2></center>
       
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a href="https://www.islacabanaresort.com/">
                <img class="location-station-img" src="https://i.imgur.com/ZW8aW28.png">
                 <div class="text"><center><h1>Isla Cabana Resort</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://bulanvillas.com/">
                <img class="location-station-img" src="https://i.imgur.com/k2tBTAd.png">
                 <div class="text"><center><h1>Bulan Villas Siargao</h1></center></div>
              </a>
            </div>
            <br>
            <div class="location-station-content">
              <a href="https://www.bravosiargao.com/">
                <img class="location-station-img" src="https://i.imgur.com/1nuvI01.png">
                 <div class="text"><center><h1>Bravo Beach Resort</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://www.sandyfeetsiargao.com/">
                <img class="location-station-img" src="https://i.imgur.com/gsK2bfe.png">
                 <div class="text"><center><h1>Sandy Feet Siargao</h1></center></div>
              </a>
            </div>
            <br>
        </div>
      </div>
      
      <div id="Dialect" class="tabcontent">
        <center><h2>PROFILE</h2>
        <p>Languages: English and Tagalog<br>
            Dialect : Surigaonon, Bisayan Language, Cebuano, Boholano<br>
      </p></center>
      </div>

      <div id="Restaurant" class="tabcontent">
        <center><h2>WHERE TO EAT IN SIARGAO</h2></center>
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/vHHEnM6.png">
                 <div class="text"><center><h1>Bliss Restaurant</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/vHHEnM6.png">
                 <div class="text"><center><h1>Bravo Restaurant</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/FGsz9uJ.png">
                 <div class="text"><center><h1>Kalinaw Resort Restaurant</h1></center></div>
              </a>
            </div>
        </div>
      </div>
    </div>
    
  </div>

</body>
</html>

