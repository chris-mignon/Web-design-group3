<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
    <a href="index.php#about" class="w3-bar-item w3-button" onclick="toggleFunction()">ABOUT</a>
    <a href="index.php#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">PORTFOLIO</a>
    <a href="index.php#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">COOKIES <span class="w3-hide-small">QUEEN</span></span> 
    <div class="arrow bounce"></div>
  </div>
</div>


</nav>
</header>