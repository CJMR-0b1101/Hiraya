<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
	<link rel="icon" href="images/hiraya_icon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
  <title>Baguio</title>
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

<body">
<?php include 'navbar.php'; ?>
  <div class="div-body">
    
    <div class="div-body-margin"></div>
    <br>
    <div class="div-content">
      <div class="div-content-location">
        <img class="location-img" src="https://i.imgur.com/0xW1kiz.png">
        <div class="text"><h1>BAGUIO</h1></div>
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
              <img src="https://i.imgur.com/4Oki4Ss.jpg" id="img_slide">
              <h1><div class="text">Boating at Burnham Park</div></h1>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/6PHfS89.jpg" id="img_slide">
              <div class="text">Explore Camp John Hay</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/daILk0x.jpg" id="img_slide">
              <div class="text">Head to Mines View Park</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <br>
        
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div2">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/8sG5Y6h.jpg" id="img_slide">
              <div class="text">Spend at The Mansion</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/jT5Xy4M.jpg" id="img_slide">
              <div class="text">Unwind at the Baguio Botanical Garden</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/ULMq9qg.jpg" id="img_slide">
              <div class="text">Visit the Baguio Cathedral</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <br>
        
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div3">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/fObWvAS.jpg" id="img_slide">
              <div class="text">Visit Strawberry Farms in La Trinidad</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/Z8uNY5u.jpg" id="img_slide">
              <div class="text">Discover Tam-Awan Village</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/S69wLU9.jpg" id="img_slide">
              <div class="text">Go Bargain-Hunting at Baguio Night Market</div>
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
        <center><h2>HOW TO GET TO BAGUIO</h2>
        <p>
        <h3>From Pasay City</h3>
        <h4> •There are a number of bus companies operating from Pasay to Baguio. The two most popular bus companies are Joy Bus (Genesis Transport) and Victory Liner. Both bus companies offer premier and deluxe-class seats and have routes to the Tarlac–Pangasinan–La Union Expressway (TPLEX), North Luzon Expressway (NLEX), and Subic Clark Tarlac Expressway (SCTEX).</h4>
          <br>
        <h3>From Cubao in Quezon City</h3>
          <h4> •Aside from Victory Liner and Genesis Joy Bus, Partas also offers bus rides to Baguio. These bus companies have terminals in Cubao in Quezon City. Victory Liner, Partas, and Genesis also offer premier seats for a more comfortable trip.</h4>
          <br>
        <h3>From Avenida in Manila</h3>
        <h4> •Genesis Joy Bus and Philippine Rabbit Bus Lines have buses headed for Baguio at the Avenida Terminal in Manila. Both bus companies offer deluxe and semi-deluxe buses from Avenida to Baguio.</h4>
        <br><h3> From Sampaloc in Manila</h3>
        <h4> •Victory Liner offers regular air-conditioned (AC)  buses headed for Baguio at their Sampaloc terminal in the city of Manila. </h4>
          <br>
          <h3>From Parañaque City</h3>
          <h4> •You can catch a ride to Baguio sat the Parañaque Integrated Terminal Exchange (PITX). Solid North Transit’s Baguio routes at PITX offers the first point-to-point (P2P) buses that ply Baguio to Manila. </h4>
          <br>
          <h3>By Private and Shared tours</h3>
          <h4> •If you want to experience Baguio completely without the hassle of commuting, then joining a shared or private tour is the most convenient way.</h4>
          <br>
          <h3> By Car</h3>
          <h4> •You can either rent a car or drive your own car going to Baguio, you just have to choose the most convenient route for you. You can either take the NLEX-SCTEX route, the TPLEX route, and many more.</h4>
          <h4> •Make use of apps like Waze or Google Maps. Book with an accredited operator for your car rentals to avoid mishaps along the way.</h4>
		    </center></p>
      </div>

      <div id="Hotel" class="tabcontent">
        <center><h2>WHERE TO STAY IN BAGUIO</h2></center>
       
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a target="_blank" href="https://campjohnhay.ph/">
                <img class="location-station-img" src="https://i.imgur.com/wlZcjoT.png">
                 <div class="location-station-text"><center><h1>THE MANOR AT CAMP JOHN HAY</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.sierrapinesbaguio.com/">
                <img class="location-station-img" src="https://i.imgur.com/Rh1W8Fm.png">
                 <div class="location-station-text"><center><h1>GRAND SIERRA PINES HOTEL</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.campjohnhayhotels.ph/">
                <img class="location-station-img" src="https://i.imgur.com/s3q8gEe.png">
                 <div class="location-station-text"><center><h1>THE FOREST LODGE AT CAMP JOHN HAY</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://lemonethotel.ph/">
                <img class="location-station-img" src="https://i.imgur.com/QiCUo81.png">
                 <div class="location-station-text"><center><h1>LE MONET HOTEL</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.azalea.com.ph/">
                <img class="location-station-img" src="https://i.imgur.com/tHaKvsK.png">
                 <div class="location-station-text"><center><h1>AZALEA RESIDENCES BAGUIO</h1></center></div>
              </a>
            </div>
        </div>
      </div>
      
      <div id="Dialect" class="tabcontent">
        <center><h2>PROFILE</h2>
        <p>
        <h3>Dialect/Languages: Ilocano,Filipino,English</h3>
        <h3>Currency: Philippine Peso (PHP)</h3>
        <h3> About Baguio</h3>
        <h3>The name Baguio conjures, for both the international and domestic traveler, a highland retreat in the Grand Cordillera in Northern Luzon, with pine trees, crisp cold breezes and low verdant knolls and hillocks. 
          It has made its mark as a premiere tourist destination in the Northern part of the Philippines with its cool climate, foggy hills, panoramic views and lovely flowers.</h3>
      </p></center>
      </div>

      <div id="Restaurant" class="tabcontent">
        <center><h2>WHERE TO EAT IN BAGUIO</h2></center>
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a target="_blank" href="https://www.facebook.com/Good-Taste-Restaurant-FB-Page-338269456209160/">
                <img class="location-station-img" src="https://i.imgur.com/G7Sp7vY.jpg">
                 <div class="location-station-text"><center><h1>Good Taste Café & Restaurant</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.facebook.com/chefscookhouse/">
                <img class="location-station-img" src="https://i.imgur.com/aFnOWhY.png">
                 <div class="location-station-text"><center><h1>Foggy Mountain Cookhouse</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.facebook.com/LemonandOlivesPH/">
                <img class="location-station-img" src="https://i.imgur.com/B97Tizu.jpg">
                 <div class="location-station-text"><center><h1>Lemon and Olives Greek Taverna</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.amarelacucina.com">
                <img class="location-station-img" src="https://i.imgur.com/JAsc2va.jpg">
                 <div class="location-station-text"><center><h1>Amare La Cucina</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.facebook.com/cafebytheruinsph/">
                <img class="location-station-img" src="https://i.imgur.com/jXITeNa.jpg">
                 <div class="location-station-text"><center><h1>Cafe by the Ruins</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://www.facebook.com/OhMyGulayArtistCafeBaguio/">
                <img class="location-station-img" src="https://i.imgur.com/Fxtavo4.jpg">
                 <div class="location-station-text"><center><h1>Oh My Gulay</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="https://hillstationbaguio.com">
                <img class="location-station-img" src="https://i.imgur.com/qQhPM5p.jpg">
                 <div class="location-station-text"><center><h1>Hill Station</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a target="_blank" href="thebarn.ph">
                <img class="location-station-img" src="https://i.imgur.com/BidArf2.jpg">
                 <div class="location-station-text"><center><h1>The Barn</h1></center></div>
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

