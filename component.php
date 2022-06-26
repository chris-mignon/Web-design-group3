<?php

function component($productname, $productprice, $productimg, $productid){
    $element="
    <div class=\"col-md-3 col-sm-6 my-3 my-md-3\">
    <form action=\"cart.php\" method=\"post\">
        <div class=\"card shadow\">
            <div>
                <img src=\"$productimg\" alt=\"image\" class=\"img-fluid card-img-top\">
            </div>
            <div class=\"card-boy\">
                <h5 class=\"card-title\">$productname</h5>
                <h6>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                </h6>

                <h5>
                    <span class=\"price\">$productprice</span>
                </h5>

                <button type=\"submit\" class=\"btn btn-warning my-3\"name=\"add\">Add To Cart<i class=\"fas fa-shopping-cart\"></i></button>
                <input type='hidden' name='product_id' value='$productid'>

            </div>
        </div>
    </form>
</div>
";
echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element="
    <form action=\"mycart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div id=\"row1\"class=\"border rounded\">
                        <div id=\"row\"class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"productimg\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Cookies Queen</small>
                                <h5 class=\"pt-2\">$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                            </div>
                        </div>
                    </div>
                </form>
    ";
    echo $element;
}














?>

