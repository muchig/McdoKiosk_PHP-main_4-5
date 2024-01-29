<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McDo Kiosk</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script src="script.js"></script> -->

    <style>
        
        /* .card-input-element:checked + .menuitem {
            box-shadow: 0px 0 0px 2px #2ecc71;
          
            
            border-radius: 20px;
            color: #2ecc71 !important;

        }

        .card-input-element {
            outline: #e0e0e0 solid 5px !important;
   

        }

        .menuitem:clicked{
            border: solid 5px #2ecc71 !important;
        }

        .card-input:hover {
            cursor: pointer;
          
        }

        .menuitem:hover{
            border: solid  5px red !important; 
            border-radius: 25px;
        } */

      
        
       
    </style>
</head>
<body style="overflow-y:hidden;">

    <?php
    ob_start();
        $category = array("Burgers", "Chicken", "Drinks", "Extras");

        require_once ("Products.php");
        $product = new Product();
        $productArray = $product->getAllProduct();
        $total = 0;

        
        // function to display each item in cart to a container
        function cartListing(){
            if(!empty($_SESSION['cart'])){
                

                foreach($_SESSION['cart'] as $cartItems){
                    $arrayKey = searchArrayKeyVal("name", $cartItems, $_SESSION['cart']);
                    

                    ?>
                    <div class="order">
                    <div style="width: 150px;"><?php echo $cartItems; ?></div>
                    <div><?php echo $GLOBALS['productArray'][$arrayKey]['price'];?></div>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <button class= "button-24" type="submit" name="remove" value="<?php echo $cartItems;?>" style=
                        "font-weight: normal;
                        height: 10px;"
                        >remove</button>
                    </form>
                    </div>
                    <?php
                    

                }
            }else{echo "You don't have anything in the cart right now";}
        }

        // function to search items thorugh array
        function searchArrayKeyVal($sKey, $id, $array) {
            foreach ($GLOBALS['productArray'] as $key => $val) {
                if ($val[$sKey] == $id) {
                    return $key;
                }
            }
            return false;
        }

        // function for computing total amount 
        function compute(){
            global $total;
            if(!empty($_SESSION['cart'])){
                

                foreach($_SESSION['cart'] as $cartItems){
                    $arrayKey = searchArrayKeyVal("name", $cartItems, $_SESSION['cart']);
                    if ($arrayKey!==false) {
                        $total =  $total +  $GLOBALS['productArray'][$arrayKey]['price'];
                       
                    }

                    

                }
            }
            // return $total = $value;
        }

        
    
    ?>
    <div class="header">
        <div class="logo"><img src="../img/logo.png" alt=""></div>
        
        <div>I'm lovin it</div>
    </div>

    <div class="content">
        <div class="menu">
            <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
                <?php
                    foreach ($category as $itemCategory) {
                        echo "
                        <input type=\"submit\" value=\"$itemCategory\" 
                        class=\"category-container\"
                        style=\"background-image: url('../img/$itemCategory.jpg');
                        
                        background-repeat:no-repeat;
                        background-size:70% 80%;
                        padding-top: 120px;
                        background-position: top;
                        margin: 25px;
                        width: 220px;
                        height: 170px;
                        font-weight:bold;
                        \"
                        name=\"item_cat\">
                        ";
                    }
                ?>
            </form>

        </div>
        <!-- loop that displays menu category as buttons inside a form -->
    
        <!-- assigning selected button to a variable do display menu items based on menu category -->
        <?php

            if(isset($_POST['item_cat']))
            {
                $foodCategory = $_POST['item_cat'];
                $Cat = $foodCategory;
                compute();
            }
            
            if(empty($foodCategory)){
                $foodCategory = "Burgers";
                $Cat = "Burgers";
            } else {
                $foodCategory = $_POST['item_cat'];
            }

        ?>
        <!-- putting menu items inside container -->
        <div class="container-fluid">

            <!-- looping through TEST.PHP Items to be placed inside radion button cards -->
            <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="catalog">
                <div>
                    <div class="item-catalog">
                        <?php
                            if (!empty($productArray)) {
                                foreach ($productArray as $k => $v) {
                                    if( $productArray[$k]["category"] == $Cat){
                        ?>
                                            <div class = "menuitem" style = "
                                                /* padding:25px; */
                                                padding-top: 11px;
                                                margin:20px;
                                                height: 230px;
                                                width: 230px;
                                                overflow: hidden;
                                                text-align: center;
                                                /* border: #e0e0e0 solid 5px; */
                                                border-radius: 25px;
                                                background-color: white;
                                                
                                            ">
                                            
                                                <label>
                                                    <input type="radio" name="selection" class="card-input-element" value="<?php echo $productArray[$k]["name"]; ?>"
                                                    style = "
                                                    display:none;
                                                    outline: 5px solid black;
                                                    "/>
    
                                                    <div class="panel panel-default card-input">
                                                
                                                        <img src = '<?php echo $productArray[$k]["image"]; ?>'
                                                            style = "
                                                            padding:15px;
                                                            width: 200px;
                                                            max-height: 150px;
                                                            object-fit: contain;
                                                            ##border: black solid 1px;
                                                        ">
                                                    
                                                        <div class="panel-heading"><?php echo $productArray[$k]["name"]; ?></div>
                                                        <div class="panel-body">
                                                            <?php echo $productArray[$k]["price"]; ?>
                                                        </div>
                                                    </div>
    
                                                </label>
    
                                            </div>
                        
                                <?php
                                
                                        }
                                    }
                                }
                                ?>
                    </div>
                </div>
                <!-- action buttons for cart -->
                <div class="cart-actions">
                    <button type="submit" name="addToCart" value="addToCart" class="button-24">Add to cart</button>
                    <!-- <button type="submit" name="checkout" value="checkout">checkout</button> -->
                    <!-- <button type="submit" name="reset" value="reset">empty cart</button> -->
                </div>

            </form>
           
         </div>

    </div>
    <div class="order-view">
        <div class="total-view">
            <p>MY ORDER</p>
            
            

            
        </div>
        

            
            <div class="order-list" style="padding: 30px;">

            <!-- <p>Dear, help di ko na kayang pagandahin yung colors ememe :(( but functionalities are okeeeh</p> -->
            <!-- <p style = 
            "font-size: 110%;
            font-weight: bold;">cart</p> -->
                <?php
                    // hey you
                    // heeyyy booy
   
                    // adds item to cart
                    // $_SESSION['cart'] = array();
                    
                    if(isset($_POST['addToCart']))
                    {
                        if(!empty($_POST["selection"])){
                            

                            
                            $_SESSION['cart'] [] = $_POST["selection"];
                            // array_push($_SESSION["cart"], $_POST["selection"]);
                            
                            cartListing();
                            compute();
                            // header('Location:http://localhost/ITDOM2/McdoKiosk_PHP-main_4/McdoKiosk_PHP-main/Catalog/Menu.php');
                            // echo "total" .$total;
                            
                            // $_POST['selection'] = '';
                            
                            
                        }else{
                            
                            echo "please select an item";
                        }


                    }


                   
                    // continue displaying regardless of what menu button was picked
                    if(isset($_POST['item_cat']))
                    {
                        cartListing();
                        
                    }

                    // removing element from cart array
                    if(isset($_POST['remove'])){
                        $_SESSION['removeItem'] = $_POST['remove'];
                        unset($_SESSION['cart'][array_search($_SESSION['removeItem'] ,$_SESSION['cart'])]);
                        cartListing();
                        echo compute();
                    }    
                    // listing items in cart
                    // if(isset($_POST['checkout']))
                    // {
                    //     foreach($_SESSION['cart'] as $checkoutItems){
                    //         echo"
                    //         <div>
                    //         <p>$checkoutItems</p>
                    //         </div>
                    //         ";
                    //     }
                        
                    // }
                ?>
            </div>
            
            
            <div class="total-panel">
                <!-- <div style="width: 150px;"> &nbsp; &nbsp;</div> -->
                <p style=
                "margin-right:1vw;
                font-weight: bold;
                font-size: 150%;
                "
                >Total: ₱<?php echo sprintf("%.2f", $total);?></p>
                
            </div>
            <div class="button-panel">
                <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                      <button type="submit"  class="button-24" name="reset" value="reset" style=
                        "width: 39vw;"
                        >Cancel</button>
                    </form>
                    <form method="post" action="../Service.php">  
                    
                        
                            <input type = "submit" name="order" value = "Order" class="button-25" style=
                                "width: 39vw;" id="order-page"
                                >
                                <!-- Order -->
                            </input>
                       


                            <!-- <button type="submit"  class="button-24" name="reset" value="reset" style=
                        "width: 39vw;"
                        >Cancel</button> -->
                     
                    </form>
                    


                    <!-- EMEEMEMEMEMEMME -->
                
                    
            </div>

    <?php
                        // resetting website to remove all items in cart
                        if(isset($_POST["reset"]))
                        {
                            session_destroy();
                            compute();
                            // header("Location:Service.php");
                            // exit();
                            // header("Location: ../Service.php");
                            // echo "test";
                        }

                        
                        
                    ?>

                        <?phpif(isset($_POST['order'])) {
                            session_destroy();
                            // header("Location: http://localhost/ITDOM2/McdoKiosk_PHP-main_4/McdoKiosk_PHP-main/Service.php");
                            // ob_end_flush();
                            echo "this is the end";
                        }?>

       

        

    </div>

    


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>