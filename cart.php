<?php

//start session
session_start();


require_once('./database.php');
require_once('./component.php');





//Create instance of database class
$database=new database(dbname:"productdb", tablename:"producttb");


if(isset($_POST['add'])){
   /// print_r($_POST['product_id']);
   if(isset($_SESSION['cart'])){

    $item_array_id=array_column($_SESSION['cart'], column_key:"product_id");

    if(in_array($_POST['product_id'], $item_array_id)){
        echo '<script>alert("Product is already in the cart!")</script>';
        echo "<script>window.location='cart.php</script>";
    }else{
        $count=count($_SESSION['cart']);
        $item_array=array(
            'product_id'=>$_POST['product_id']
        );

        $_SESSION['cart'][$count]=$item_array;
        
    
    }



   }else{
    $item_array=array(
        'product_id'=>$_POST['product_id']
    );

    //Create new session variable
    $_SESSION['cart'][0]=$item_array;
    

   }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
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







<?php require_once("./header.php");?>
<div class="container">
    <div class="row text-center py-5">
        <?php
        $result=$database->getData();  
        while($row=mysqli_fetch_array($result)){
            component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
        }
        ?>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>