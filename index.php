<?php
session_start();


require_once('./database.php');

require_once('./component.php');

$db=new database(dbname:"productdb", tablename:"producttb");

if(isset($_POST['remove'])){
    if($_GET['action']=='remove'){
        foreach($_SESSION['cart']as $key=>$value){
            if($value["product_id"]==$_GET['id']){
                unset($_SESSION['cart'][$key]);
            }
        }
    }
}

?>







<!DOCTYPE html>
<html>
<head>
<title>Cookies Queen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">

<script src="https://kit.fontawesome.com/fb38530c19.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style-index.css">
<link rel="icon" href="images/cookielogo.png">
</head>
<body>
  

<!-- Navbar (sit on top) -->
<div class="w3-top bg-white">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="index.php" class="w3-bar-item w3-button">HOME</a>
    <a href="index.php#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> ABOUT</a>
    <a href="index.php#portfolio" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> PORTFOLIO</a>
    <a href="index.php#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
    <a href="cart.php" class="w3-bar-item w3-button w3-hide-small" ><i class="fa-solid fa-cart-shopping"> SHOP</i></a>
    <a href="mycart.php" class="w3-bar-item w3-button w3-hide-small" ><i class="fas fa-shopping-basket"></i></a>
                <?php
                if(isset($_SESSION['cart'])){
                    $count=count($_SESSION['cart']);
                    echo"<span id=\"basket_count\">$count</span>";
                }else{
                    echo"<span id=\"basket_count\">0</span>";
                }
                ?>
        </a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">ABOUT</a>
    <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">PORTFOLIO</a>
    <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">COOKIES <span class="w3-hide-small">QUEEN</span></span> 
    <div class="arrow bounce"></div>
  </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center">ABOUT US</h3>
  <p class="w3-center"><em>We Love Baking</em></p>
  <p>We have been in the business of baking custom cookies for a little over 4 years now. We are a small business based in Grenada, a small Caribbean island. We specialise in taking your ideas wether it be for a birthday or for a 
    anniversary and making them into edible art. We have many products that are sure to make every occasion special. Ranging from mini cookies to Jumbo size cookies we do it all. </p>
  <div class="w3-row">
    <div class="w3-col m6 w3-center w3-padding-large">
      <p><b><i class="fa fa-user w3-margin-right"></i>My Partner And I</b></p><br>
      <img src="images/devlopers.jpg" class="w3-round w3-image w3-opacity w3-hover-opacity-off" alt="Photo of Me" width="500" height="333">
    </div>

    <!-- Hide this text on small devices -->
    <div class="w3-col m6 w3-hide-small w3-padding-large">
      <p>My name is Jose and I was born in Venzuela in 2004. I move to Grenada in 2009 and studied from Kindegarten all the way to Form 5 in Grenada. After graduating from econdary school I enrolled in TAMCC's Information Technology Program.
        Cookies Queen is a small business owned by my mother. She is very hard working and always motivates me to do my best. My partner, Gulherme Abreu, is from Brazil and shares many goals with me, we both hope to be successful software engineers in the future. Guilherme was born in Brazil in 2003, he moved to Grenada in
        2017 and studied along with me through secondary school and is currently also studying information technology in TAMCC.
    
    </p>
    </div>
  </div>
  <p class="w3-large w3-center w3-padding-16">We are really good at:</p>
  <p class="w3-wide"></i>Baking</p>
  <div class="w3-light-grey">
    <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:90%">90%</div>
  </div>
  <p class="w3-wide">Decorating Cookies</p>
  <div class="w3-light-grey">
    <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:85%">85%</div>
  </div>
  <p class="w3-wide"></i>Eating Cookies</p>
  <div class="w3-light-grey">
    <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:99%">99%</div>
  </div>
</div>

<div class="w3-row w3-center w3-dark-grey w3-padding-16">
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">10,000+</span><br>
    Cookies Baked
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">500+</span><br>
    Happy Clients
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">100+</span><br>
    designs
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">&infin;</span><br>
    Smiles
  </div>
</div>

<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container w3-opacity-min">
  <div class="w3-display-middle">
    <span class="w3-xxlarge w3-text-white w3-wide">PORTFOLIO</span>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div class="w3-content w3-container w3-padding-64" id="portfolio">
  <h3 class="w3-center">MY WORK</h3>
  <p class="w3-center"><em>Here are some of Cookies Queen's masterpieces<br> Click on the images to make them bigger</em></p><br>

  <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
  <div class="w3-row-padding w3-center">
    <div class="w3-col m3">
      <img src="images/democookies1.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Accounting Cookies">
    </div>

    <div class="w3-col m3">
      <img src="images/democookies2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Beach Themed Cookies">
    </div>

    <div class="w3-col m3">
      <img src="images/democookies3.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Wedding Cookies">
    </div>

    <div class="w3-col m3">
      <img src="images/democookies4.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Mother's Day Cookies">
    </div>
  </div>

  <div class="w3-row-padding w3-center w3-section">
    <div class="w3-col m3">
      <img src="images/democookies5.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="One Piece Anime Cookies">
    </div>

    <div class="w3-col m3">
      <img src="images/democookies6.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Large Order of Paint Bucket Cookies">
    </div>

    <div class="w3-col m3">
      <img src="images/democookies7.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Wedding Cookies">
    </div>

    <div class="w3-col m3">
      <img src="images/democookies8.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Baby Shower Cookies">
    </div>
    
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<!-- Third Parallax Image with Portfolio Text -->
<div class="bgimg-3 w3-display-container w3-opacity-min">
  <div class="w3-display-middle">
     <span class="w3-xxlarge w3-text-white w3-wide">CONTACT</span>
  </div>
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="contact">
  <h3 class="w3-center">WHERE I WORK</h3>
  <p class="w3-center"><em>We'd love your feedback!</em></p>

  <div class="w3-row w3-padding-32 w3-section">
    <div class="w3-col m4 w3-container">
      <img src="images/greenz.webp" class="w3-image w3-round" style="width:100%">
    </div>
    <div class="w3-col m8 w3-panel">
      <div class="w3-large w3-margin-bottom">
        <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> St. George's, GN<br>
        <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: +1 (473) 410-1850/+1 (473) 537-7757<br>
        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: guilhermea2021@tamcc.edu.gd<br>
        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: joseb2021@tamcc.edu.gd<br>
      </div>
      <p>Click here to fill out a short survey to imporove our services for a free cup of <i class="fa fa-coffee"></i></p>
      <a href="https://forms.gle/zwAzbAVaQ6eNopvk8" class="w3-button w3-light-grey" target="_blank"></i>Take Survey</a>
    </div>
  </div>
</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://www.facebook.com/search/top?q=cookiesqueen" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="https://www.instagram.com/cookiesqueen86/?hl=en" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i></a>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>
