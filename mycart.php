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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="mycartphp.css">
</head>
<body class="bg-light">
    



<?php require_once("./header.php");?>


<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md7">
            <div class="shopping-cart">
                <h6 class="top mt-5 pr-2">My Cart:</h6>
                <hr>

                <?php
                
                $total="Contact for this information";
                $delivery="10";
                if(isset($_SESSION['cart'])){
                    $product_id=array_column($_SESSION['cart'], column_key:'product_id');

                    $result=$db->getData();
                    while($row=mysqli_fetch_assoc($result)){
                        foreach($product_id as $id){
                            if($row['id']==$id){
                                cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                            }
                        }
                    }
    
                }else{
                    echo "<h5>Cart Is Empty!</h5>";
                }

                ?>

            </div>
        </div>

            <div id="info" class="px-5 mt-5">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if(isset($_SESSION['cart'])){
                            $count=count($_SESSION['cart']);
                        }
                        if($count>0){
                            echo"<h6>Cart : ($count items)</h6>";
                        }
                        if($count==0){
                            echo"<h6>Cart : (Empty!)</h6>";
                            $delivery='0';
                        }
                        ?>

                        <h6>Delivery Charges :</h6>
                        <hr>
                        <h6>Amount Payable :</h6>

                    </div>
                    <div class="col-md-6">
                        <h6>------------------------</h6>
                        <h6 class="text-success">$<?php echo"$delivery"?></h6>
                        <hr>
                        <h6 class="red"><?php echo"$total"?></h6>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>