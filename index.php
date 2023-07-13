<!doctype html>
<html amp>

<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="0; url = http://emaco.rf.gd/test/index.php" />
<script async src="https://cdn.ampproject.org/v0.js"></script>
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<link href="stylee.css" type="text/css" rel="stylesheet" />
<style>

::-webkit-scrollbar
{
    display: none;
}
@media only screen and (max-width: 600px) {

#na
{
    color:black !important;
}

.product-item
{
    width:36vw;
    height:200px;
    margin:1.5vw;
}
.product-item amp-img,.product-image{
    width:35.5vw;
    height:60px;

}
.product-title
{
    
    width:100%;
    height:25px;
    font-size:99%;
    
}
  .row
  {

      width:100vw;
      overflow:hidden;
  }
  .cart-action input
{
    width:50%;
    height:25px;
    position:relative;
    margin-left:-10px;
}
  .btnAddAction
  {
      line-height:15px;
     top:0%;
      padding-left:17px;
      bottom:0;
      
  }
.cart-action
{
margin-top:-15px;
width:100%;

}
.product-price
{
font-size:12px;
margin-top:2px;
}





}
  amp-img {
    background-color: gray;
    
  }

    </style>
<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<?php




    $servername="sql200.epizy.com";
    $username="epiz_25734166";
    $password="3Skznn54eolG4Ft";
    $dbname="epiz_25734166_emaco";
    $conn=new mysqli($servername,$username,$password,$dbname);
    
    if($conn->connect_error)
    {
        die("connection failed:".$conn->connect_error);
        echo $conn->connect_error;
    }









    ?>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noarchive">
    <title> Punalur </title>
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- icofont -->
    <link rel="stylesheet" href="assets/css/fontawesome.5.7.2.css">
    <!-- flaticon -->
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    
    <nav class="navbar navbar-area navbar-expand-lg nav-absolute white nav-style-01">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="index" class="logo">
                        <h2 style=color:white>Punalur</h2>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#appside_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="appside_main_menu">
                <ul class="navbar-nav">
                    <li class="current-menu-item">
                        <a href="#"  id="na">Home</a>
                    </li>
                    
                
                    <li class="button-wrapper">
                        <a href="http://emaco.rf.gd/login/index" class="boxed-btn btn-rounded">Login</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

    <!-- header area start  -->
    <header class="header-area header-bg-4 style-four" id="home">
        <div class="header-right-image wow zoomIn">
            
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="header-inner">
                        <h1 class="title wow fadeInDown">Order Your Items</h1>
                        <p>This website is associated with punalur and only people near punalur can order their needs.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>





<div class=row>
















<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>


<br>
<br>
<br>
<br>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<a id="btnEmpty" href="index.php?action=empty">Empty Your Cart</a>
<table class="tbl-cart" cellpadding="10" cellspacing="1" style=width:97vw;>
<tbody>
<tr>
<th style="text-align:left;">Name</th>

<th style="text-align:right;" width="5%">Quantity</th>

<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				
				<td  style="text-align:right;"><?php echo  number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="1" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>

<td align="right" colspan="1"><strong><?php echo number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>

<br>

 <a href="http://emaco.rf.gd/checkout" class="boxed-btn" style=float:right;margin-right:23px;width:140px;height:45px;align-items:center;justify-content:center;display:flex;>Checkout</a>



  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>






<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item" style="border:1px solid black;">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image" style=overflow:hidden;><amp-img src="<?php echo $product_array[$key]["image"]; ?>" alt="products"  layout="responsive" height=400 width=800></amp-img></div>
			<div class="product-tile-footer">
			<div class="product-title"><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
            <div class="product-price"><?php echo "Price : ".$product_array[$key]["price"]; ?></div>
            <br>
            <div class="cart-action" style=margin-left:10px;margin-top:5px;>
            <input type="text" class="product-quantity" name="quantity" value="1" size="2"  style="border:1px solid black;border-radius:5px 0px 0px 5px;border-right:0px;" />
            
            <input type="submit" value="Add to Cart" class="btnAddAction"   style="border:1px solid black;border-radius:0px 5px 5px 0px;border-left:0px;"/></div><br>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>

     




</div>










    
    
<div class="preloader-wrapper" id="preloader">
    <div class="preloader" >
        <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
        </div>
    </div>
</div>

  <!-- preloader area end -->

  <!-- back to top area start -->
  <div class="back-to-top">
        <i class="fas fa-angle-up"></i>
  </div>
  <!-- back to top area end -->

    <!-- jquery -->
    <script src="assets/js/jquery.js"></script>
    <!-- popper -->
    <script src="assets/js/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <!-- contact js-->
    <script src="assets/js/contact.js"></script>
    <!-- wow js-->
    <script src="assets/js/wow.min.js"></script>
    <!-- way points js-->
    <script src="assets/js/waypoints.min.js"></script>
    <!-- counterup js-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- main -->
    <script src="assets/js/main.js"></script>
</body>

</html>