<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CampusCravingHub</title>
  <!-- Link to Google Fonts for a fantasy-style font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
</head>
<style>
  /* General reset */
@import
url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");


  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
  }

  /* Body background */
  body {
    background-color: #f0f1f7;
    padding-top: 0; /* Remove padding for fixed header */
    color: #333;
    text-align: center;
  }

  /* Fixed header styling */
  header {
    position: fixed;
    top: 0;
    width: 100%;
    background: rgb(246, 236, 208);
    padding: 20px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    z-index: 1000;
  }

  /* Title styling */
  header h1 {
    font-family: 'Lobster', cursive;
    font-size: 2.5rem;
    color: black;
  }

  /* Centered navigation container */
  header nav {
    flex: 1;
    display: flex;
    justify-content: center;
    gap: 40px;
  }

  /* Navigation links styling */
  header nav a {
    color: black;
    text-decoration: none;
    font-size: 1.3rem;
    transition: color 0.3s;
  }

  /* Hover effect on navigation links */
  header nav a:hover {
    color: white;
  }

  /* Slideshow container */
  .slideshow-container {
    padding-top: 5%; /* Add margin to compensate for header height */
    width: 100%;
    position: relative;
    overflow: hidden;
  }

  /* Slide images with increased height */
  .slide {
    display: none;
    width: 100%;
    height: 70vh; /* Increased height for larger display */
  }

  /* Images should take up the full slide */
  .slide img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures images cover the area without stretching */
  }

  /* Navigation buttons */
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.3s ease;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    user-select: none;
    transform: translateY(-50%);
  }

  /* Position the "prev button" to the left */
  .prev {
    left: 20px;
  }

  /* Position the "next button" to the right */
  .next {
    right: 20px;
  }

  /* Dots for navigation */
  .dot-container {
    text-align: center;
    margin-top: 20px;
  }

  .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active, .dot:hover {
    background-color: #717171;
  }

  /* Attention message styling */
  .attention-message {
    background-color:rgb(246, 236, 208); /* Same color as the header */
    border-radius:50px;
    color: black;
    font-size: 1.5rem;
    padding: 20px;
    font-weight: bold;
    border-top: 5px solid rgb(246, 236, 208); /* Same color as the border of the header */
    margin-top: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  }

  /* Features section styling */
  .features {
    padding: 10%;
    padding-top: 7%;
    padding-bottom: 0%;
    margin-top: 50px;
    text-align: center;
    border-top: 3px solid rgb(255, 211, 91);
    border-bottom: 3px solid rgb(246, 236, 208);
  }

  .features h2 {
  font-family: 'Lobster', cursive;
  font-size: 3rem; /* Increased font size */
  margin-bottom: 20px;
}

  .features p {
    font-size: 1.1rem;
    margin-bottom: 40px;
  }

  /* Photo gallery section styling */
  .photo-gallery {
    display: flex;
    justify-content: center;
    gap: 20px; /* Adjusted gap between photos */
    margin-top: 40px;
    padding: 0% 10%;
    padding-bottom: 5%;
  }

  .photo-gallery img {
    width: 250px;
    height: 250px;
    object-fit: cover;
    border-radius: 10px;
  }

  .photo-caption {
    text-align: center;
    font-size: 1rem;
    margin-top: 10px;
  }

  /* Styling for the buttons */
  .login-btn {
    color: black;
    text-decoration: none;
    font-size: 1.3rem;
    padding: 10px 20px;
    background-color: rgb(246, 236, 208); /* Matches header gradient */
    border: 2px solid rgb(255, 211, 91);
    border-radius: 25px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  /* Hover effect for the login button */
  .login-btn:hover {
    color: black;
    background-color: white;
    border-color: white;
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
  }
  




  .footer {
  position: relative;
  width: 100%;
  background:rgb(246, 236, 208);
  min-height: 100px;
  padding: 5% 50px;
  padding-bottom: 2%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.social-icon,
.menu {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px 0;
  flex-wrap: wrap;
}

.social-icon__item,
.menu__item {
  list-style: none;
}

.social-icon__link {
  font-size: 2rem;
  color: black;
  margin: 0 10px;
  display: inline-block;
  transition: 0.5s;
}
.social-icon__link:hover {
  transform: translateY(-10px);
}


.footer p {
  color: black;
  margin: 15px 0 10px 0;
  font-size: 1rem;
  font-weight: 300;
}





/* About Us Section Styling for To-Do List */
.about-us-section {
  display: flex;
  gap: 10%;
  background-color: #F7F8FC;
  padding: 4%;
  margin: 5% auto;
  border-radius: 10px;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
  max-width: 900px;
}

.about-message {
  flex: 1;
  color: #333;
}

.about-message h2 {
  font-family: 'Lobster', cursive;
  font-size: 2.5rem;
  margin-bottom: 20px;
  margin-top: 7%;
}

.about-message p {
  font-size: 1.2rem;
  margin-bottom: 20px;
}

.go-to-features-btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: rgb(255, 211, 91);
  color: white;
  text-decoration: none;
  font-size: 1rem;
  border-radius: 25px;
  transition: all 0.3s ease-in-out;
}

.go-to-features-btn:hover {
  background-color:rgb(255, 211, 91);
}

.about-summary {
  flex: 1;
  background-color:rgb(246, 236, 208);
  padding: 20px;
  border-radius: 10px;
  text-align: left;
}

.about-image {
  width: 100%;
  height: 70%;
  border-radius: 10px;
  margin-bottom: 20px;
}

.about-summary h3 {
  font-size: 1.5rem;
  color: #333;
}

.about-summary p {
  font-size: 1rem;
  color: #555;
  margin: 5px 0;
}

</style>
<body>

  <!-- Header with styled title and centered links -->
  <header>
    <h1>CampusCravingHub</h1>
    <nav>
      <a href="#slideshow-container">Home</a>
      <a href="#about-us">About Us</a>
      <a href="#features">Features</a>
      <a href="#footer">Contact Us</a>
    </nav>
    <a href="login.php" class="login-btn">Login</a>
  </header>

  <!-- Slideshow container -->
  <div class="slideshow-container" id="slideshow-container">
    <!-- Slides -->
    <div class="slide">
      <img src="Screenshot 2024-12-23 124200.png" alt="Slide 1">
    </div>
    
    <div class="slide">
      <img src="burger.jpg" alt="Slide 2">
    </div>
    
    <div class="slide">
      <img src="OIP_(2)-MbbHPn3ox-transformed.jpeg" alt="Slide 3">
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
    <a class="next" onclick="changeSlide(1)">&#10095;</a>
    
  </div>

  <!-- Dot indicators -->
  <div class="dot-container">
    <span class="dot" onclick="setSlide(1)"></span> 
    <span class="dot" onclick="setSlide(2)"></span> 
    <span class="dot" onclick="setSlide(3)"></span> 
  </div>

  <!-- Attention message under slideshow -->
  <div class="attention-message" id="about-us">
  "Crave it? Get it! Quick, tasty bites for students at CampusCravingHub!"
  </div>
  <div class="about-us-section">
  <div class="about-message">
    <h2>About Us</h2>
    <p>Welcome to Campus Craving Hub, your ultimate food companion! We’re here to make student life easier by bringing all your favorite campus restaurants together in one place. Whether you're craving a quick snack between classes or a hearty meal to fuel your study sessions, we’ve got you covered.</p>  
<p>Our mission is to simplify the way you eat on campus with easy delivery and pickup options tailored to your busy schedule. Explore a seamless platform designed to connect you with delicious food, exclusive student deals, and a hassle-free dining experience.</p>
    <a href="#features" class="go-to-features-btn">Explore Our Features</a>
  </div>
  <div class="about-summary">
    <img src="MIS logo.png" alt="Food Delivery on Campus" class="about-image">
    <h3>All Your Campus Cravings, One Hub</h3>
    <p>Explore menus from every university restaurant, grab exclusive student deals, and enjoy fast delivery or easy pickup.</p>
</div>

</div>

 <!-- Features Section -->
<div class="features" id="features">
  <h2>Features</h2>
  <p>Campus Craving Hub is your all-in-one platform designed to make dining on campus simple and convenient. Explore menus from every university restaurant, place orders for delivery or pickup, and grab exclusive student deals. The platform allows you to track your orders in real time, saving you precious time between classes. Plus, enjoy a personalized experience with recommendations tailored to your cravings and preferences.</p>
</div>

<!-- Photo Gallery Section with side-by-side images -->
<div class="photo-gallery">
  <div>
    <img src="delivery-bike.png" alt="Delivery Option">
    <div class="photo-caption">
      Get your food delivered straight to you.
      <p>Enjoy the ultimate convenience of having your favorite meals delivered wherever you are on campus. Whether you're stuck in a study session or relaxing in your dorm, we make sure your cravings are satisfied. Track your delivery in real time and enjoy hot, fresh food without the hassle of waiting in line.</p>
    </div>
  </div>
  <div>
    <img src="food-delivery.png" alt="Pickup Option">
    <div class="photo-caption">
      Quick and easy pickup at your convenience.
      <p>Order ahead and skip the wait with our hassle-free pickup option. Perfect for busy students on the go, you can choose your pickup time, ensuring your meal is ready exactly when you need it. Whether you're rushing between classes or heading to a group study, we make grabbing your food quick and simple.</p>
    </div>
  </div>
  <div>
    <img src="menu.png" alt="Easy Menu Navigation">
    <div class="photo-caption">
      Explore easy-to-navigate menus.
      <p>Say goodbye to confusing restaurant websites and scattered menus. With Campus Craving Hub, you can browse clear and organized menus from every campus restaurant. Easily search by cuisine, meal type, or dietary preferences to find exactly what you're looking for in seconds. Discover new favorites while saving time and effort.</p>
    </div>
  </div>
</div>

<br>
<br>
<br>
  <footer class="footer" id="footer">
 
    <ul class="social-icon">
      <li class="social-icon_item"><a class="social-icon_link" href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon_item"><a class="social-icon_link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon_item"><a class="social-icon_link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon_item"><a class="social-icon_link" href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <p>&copy;2024 CyberSecurity/DataScience Team | All Rights Reserved</p>
  </footer>


  <script src="../../public/js/landing.js"></script>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script>
    let slideIndex = 0;

function showSlide(n) {
  let i;
  let slides = document.getElementsByClassName("slide");
  let dots = document.getElementsByClassName("dot");

  if (n >= slides.length) { slideIndex = 0; }
  if (n < 0) { slideIndex = slides.length - 1; }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex].style.display = "block";
  dots[slideIndex].className += " active";
}

function changeSlide(n) {
  slideIndex += n;
  showSlide(slideIndex);
}

function autoSlide() {
  slideIndex++;
  showSlide(slideIndex);
  setTimeout(autoSlide, 3000); // Change image every 3 seconds
}

function setSlide(n) {
  slideIndex = n - 1;
  showSlide(slideIndex);
}

// Initialize slideshow
showSlide(slideIndex);
autoSlide();
  </script>

</body>
</html>