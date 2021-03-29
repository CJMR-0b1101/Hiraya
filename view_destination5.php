<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
  <title>Baguio</title>
</head>

<style>
  div.text{
    font-family: 'Poppins', sans-serif;
    font-size: 30px;
    color: white;
  }
</style>

<body">
<?php include 'navbar.php'; ?>
  <div class="div-body">
    
    <div class="div-body-margin"></div>
    <br>
    <div class="div-content">
      <div class="div-content-location">
        <img class="location-img" src="https://i.imgur.com/ZlE9V0z.jpg?1">
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
              <img src="https://i.imgur.com/b8DRTlL.jpg" id="img_slide">
              <h1><div class="text">Caption Text</div></h1>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/bLuP3Cq.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/XKCOkjP.jpg" id="img_slide">
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
              <img src="https://i.imgur.com/26PscWg.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/K9LbB9E.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/FQR5BAs.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>

            <a class="prev" onclick="plusDivs(this,-1)">&#10094;</a>
            <a class="next" onclick="plusDivs(this,1)">&#10095;</a>
          </div>
        </div>
        <div class="location-travel-slideshow">
          <div class="slideshow-container slider" id="div3">
            <div class="mySlides fade">
              <img src="https://i.imgur.com/cuk3Coo.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/nufS4xf.jpg" id="img_slide">
              <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
              <img src="https://i.imgur.com/W1BrckD.jpg" id="img_slide">
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
        <h2>HOW TO GET TO BAGUIO</h2>
        <p>
        	From Pasay City
          <br><br>
          There are a number of bus companies operating from Pasay to Baguio. The two most popular bus companies are Joy Bus (Genesis Transport) and Victory Liner. Both bus companies offer premier and deluxe-class seats and have routes to the Tarlac–Pangasinan–La Union Expressway (TPLEX), North Luzon Expressway (NLEX), and Subic Clark Tarlac Expressway (SCTEX).
          <br>
          From Cubao in Quezon City
          <br><br>
          Aside from Victory Liner and Genesis Joy Bus, Partas also offers bus rides to Baguio. These bus companies have terminals in Cubao in Quezon City. Victory Liner, Partas, and Genesis also offer premier seats for a more comfortable trip.
          <br>
          From Avenida in Manila
          <br><br>
          Genesis Joy Bus and Philippine Rabbit Bus Lines have buses headed for Baguio at the Avenida Terminal in Manila. Both bus companies offer deluxe and semi-deluxe buses from Avenida to Baguio. These deluxe buses boast comfy couches with spacious legroom.
          <br><br>
          From Sampaloc in Manila
          <br><br>
          Victory Liner offers regular air-conditioned (AC)  buses headed for Baguio at their Sampaloc terminal in the city of Manila. As of now, first-class deluxe buses are not available yet.
          <br>
          From Parañaque City
          <br><br>
          You can catch a ride to Baguio at the Parañaque Integrated Terminal Exchange (PITX). Solid North Transit’s Baguio routes at PITX offers the first point-to-point (P2P) buses that ply Baguio to Manila. Aside from spacious seats, P2P buses do not have stop-overs and have toilets on board, which ensures you get to Baguio faster.
          <br>
          By Private and Shared tours
          <br>
          If you want to experience Baguio completely without the hassle of commuting, then joining a shared or private tour is the most convenient way.
          There are a lot of Baguio tour operators offering different Baguio tours and activities with free roundtrip transportation. You just have to look for the right one that fits your budget and schedule.
          <br>
          By Car
          <br>
          You can either rent a car or drive your own car going to Baguio, you just have to choose the most convenient route for you. You can either take the NLEX-SCTEX route, the TPLEX route, and many more.
          <br>
          Make use of apps like Waze or Google Maps. Book with an accredited operator for your car rentals to avoid mishaps along the way.
		</p>
      </div>

      <div id="Hotel" class="tabcontent">
        <center><h2>WHERE TO STAY IN BAGUIO</h2></center>
       
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a href="https://campjohnhay.ph/">
                <img class="location-station-img" src="https://i.imgur.com/wlZcjoT.png">
                 <div class="location-station-text"><center><h1>THE MANOR AT CAMP JOHN HAY</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://www.sierrapinesbaguio.com/">
                <img class="location-station-img" src="https://i.imgur.com/Rh1W8Fm.png">
                 <div class="location-station-text"><center><h1>GRAND SIERRA PINES HOTEL</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://www.campjohnhayhotels.ph/">
                <img class="location-station-img" src="https://i.imgur.com/s3q8gEe.png">
                 <div class="location-station-text"><center><h1>THE FOREST LODGE AT CAMP JOHN HAY</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://lemonethotel.ph/">
                <img class="location-station-img" src="https://i.imgur.com/QiCUo81.png">
                 <div class="location-station-text"><center><h1>LE MONET HOTEL</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="https://www.azalea.com.ph/">
                <img class="location-station-img" src="https://i.imgur.com/tHaKvsK.png">
                 <div class="location-station-text"><center><h1>AZALEA RESIDENCES BAGUIO</h1></center></div>
              </a>
            </div>
        </div>
      </div>
      
      <div id="Dialect" class="tabcontent">
        <h2>PROFILE</h2>
        <p>
          Dialect/Languages
          <br>
          Ilocano is the predominant dialect in the city. The national language, Filipino, is of course spoken by almost everyone. English is widely spoken and understood.
          <br>
          Profile
          <br>
          The name Baguio conjures, for both the international and domestic traveler, a highland retreat in the Grand Cordillera in Northern Luzon, with pine trees, crisp cold breezes and low verdant knolls and hillocks. Through the numerous decades Baguio has morphed from what was once a grassy marshland into one of the cleanest and greenest, most highly urbanized cities in the country. It has made its mark as a premiere tourist destination in the Northern part of the Philippines with its cool climate, foggy hills, panoramic views and lovely flowers. Being the ideal convergence zone of neighboring highland places, Baguio is the melting pot of different peoples and cultures and has boosted its ability to provide a center for education for its neighbors. Its rich culture and countless resources have lured numerous investments and business opportunities to the city.


      </p>
      </div>

      <div id="Restaurant" class="tabcontent">
        <center><h2>WHERE TO EAT IN BAGUIO</h2></center>
        <div class="location-station">
          <center>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/rLDtlfh.png">
                 <div class="location-station-text"><center><h1>Good Taste Café & Restaurant</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/C7fsGdR.png">
                 <div class="location-station-text"><center><h1>Foggy Mountain Cookhouse</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/qoNJFGU.png">
                 <div class="location-station-text"><center><h1>Lemon and Olives Greek Taverna</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/Vyl783X.png">
                 <div class="location-station-text"><center><h1>Amare La Cucina</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/vCPLtCs.png">
                 <div class="location-station-text"><center><h1>Cafe by the Ruins</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/rLDtlfh.png">
                 <div class="location-station-text"><center><h1>Oh My Gulay</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/C7fsGdR.png">
                 <div class="location-station-text"><center><h1>Hill Station</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/qoNJFGU.png">
                 <div class="location-station-text"><center><h1>Grümpy Joe</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/Vyl783X.png">
                 <div class="location-station-text"><center><h1>The Barn</h1></center></div>
              </a>
            </div>
            <div class="location-station-content">
              <a href="#">
                <img class="location-station-img" src="https://i.imgur.com/vCPLtCs.png">
                 <div class="location-station-text"><center><h1>Chef’s Home</h1></center></div>
              </a>
            </div>
        </div>
      </div>
    </div>
    
  </div>

</body>
</html>
