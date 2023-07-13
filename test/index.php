<!DOCTYPE html>
<html lang="en">
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
<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Punalur</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="css/home_1.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">




</head>

<body>
	
	<div id="page">
		
	<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="index.html"><img src="http://emaco.rf.gd/product-images/logo.svg" alt="" width="100" height="35"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="index.html"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
							    <li>
									<a href="index">Home</a>
								</li>
                                <li>
									<a href="search">Search</a>
								</li>
                                <li>
									<a href="contacts.html">Contact</a>
								</li>
								<li>
									<a href="#">Services</a>
								</li>
								<li>
									<a href="#">About</a>
								</li>

							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
						<a class="phone_top" href="tel://9438843343"><strong><span>Need Help?</span>+94 423-23-221</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categories
										</a>
									</span>
									<div id="menu">
										<ul>
											<li><span><a href="#">Electronics</a></span>
											<li><span><a href="#">Grocery</a></span>
											<li><span><a href="#">Vegetables</a></span>
												
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>

<!-- **************************************search****************************** -->
     
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
  <form action="search.php" method="get">
						<div class="custom-search-input">
                        
							<input type="text" placeholder="Search over 10.000 products" required name="search">
							<button type="submit"><i class="header-icon_search_custom"></i></button>
                          
						</div>
  </form>
					</div>
        

					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
								<a href="cart.php" class="cart_bt"></a>
									<div class="dropdown-menu">
										<ul>
                      <?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>        
                                            <?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
           
											<li>

												<a href="hot_item_detail">
													<figure><img src="placeholder/product_placeholder_square_small.jpg" data-src="http://emaco.rf.gd/<?php echo $item["image"]; ?>" alt="" width="50" height="50" class="lazy"></figure>
													<strong><?php echo $item["quantity"]; ?> X <span><?php echo $item["name"]; ?></span><?php echo  number_format($item_price,2); ?></strong>
												</a>
												<a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="action"><i class="ti-trash"></i></a>
											</li>



 <?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>



											
										</ul>
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span><?php echo number_format($total_price, 2); ?></span></div>
											<a href="cart.php" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
										</div>
                                         <?php
} 
?>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<li>
								
							</li>
							<li>
								
								<!-- /dropdown-access-->
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categories
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			
			<div class="search_mob_wp">
  <form action="search.php" method="get">
				<input type="text" class="form-control" placeholder="Search over 10.000 products" name=search>
				<input type="submit" class="btn_1 full-width" value="Search">
				</form>
			</div>
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>
	<!-- /header -->
		
	<main>
		
				<!--/owl-slide-->

                     <div id="carousel-home">
			<div class="owl-carousel owl-theme">
				
				


                                 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="http://emaco.rf.gd/test/img/slides/flex1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="http://emaco.rf.gd/test/img/slides/flex2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="http://emaco.rf.gd/test/img/slides/flex3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
				


                                




				


                                






</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<!--/carousel-->







<div class="container margin_60_35"  id=trent>
                         <div class="main_title">
				<h2>Search by Category</h2>
				<span>Category</span>
				<p>Explore our latest products by category</p>
			</div>
	<div class="row small-gutters">	





	
			
		              <!-- /category -->

                              <div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
<a href=search.php?search=grocery>
						<figure>
							
							
					            <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="http://emaco.rf.gd/image_default/grocery.jpg" alt="">
							
	
						</figure>
						
						
						</a>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->

    <!-- /category -->

                              <div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
                             <a href=search.php?search=vegetable>
						<figure>
							
							
					            <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="http://emaco.rf.gd/image_default/vegetables.jpg" alt="">
							
	
						</figure>
						
						
						</a>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->


    <!-- /category -->

                              <div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
<a href=search.php?search=electronics>
						<figure>
							
							
					            <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="http://emaco.rf.gd/image_default/electro.jpg" alt="">
							
	
						</figure>
						
						</a>
						
					</div>
					<!-- /grid_item -->
				</div>

				<!-- /col -->

    <!-- /category -->

                              <div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
<a href=search.php?search=vegetable>
						<figure>
							
							
					            <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="http://emaco.rf.gd/image_default/vegetables.jpg" alt="">
							
	
						</figure>
						
						</a>
						
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->



</div>
</div>
	



		
		<!--/banners_grid -->
		
		<div class="container margin_60_35"  id=trent>
			<div class="main_title">
				<h2>Top Selling</h2>
				<span>Products</span>
				<p>These Products are only for a Limited Time</p>
			</div>
			<div class="row small-gutters">






<?php



	$product_array = $db_handle->runQuery("SELECT * FROM hot_items");
    
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){

              $discount=(($product_array[$key]["old_price"]-$product_array[$key]["new_price"])*100)/$product_array[$key]["old_price"];
              settype($discount,"integer")

	?>







				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
							<span class="ribbon off">-<?php echo $discount ?>%</span>
							<a href='hot_item_detail.php?view=<?php echo $product_array[$key]["id"]; ?>'>
								<img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="http://emaco.rf.gd/<?php echo $product_array[$key]["image"]; ?>" alt="">
							</a>
							<div data-countdown='<?php echo $product_array[$key]["count_date"]; ?>' class="countdown"></div>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="hot_item_detail.php?view=<?php echo $product_array[$key]["id"]; ?>">
							<h3><?php echo $product_array[$key]["name"]; ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?php echo "Price : ".$product_array[$key]["new_price"]; ?></span>
							<span class="old_price"><?php echo $product_array[$key]["old_price"]; ?></span>
						</div>
						
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->
				
<?php
		}
	}
	?>



<?php
  



	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id DESC LIMIT 4");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>



				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
                    
						<span class="ribbon new">New</span>
						<figure>
							<a href="product-detail.php?view=<?php echo $product_array[$key]["id"]; ?>">
								
								<img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="http://emaco.rf.gd/<?php echo $product_array[$key]["image"]; ?>" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail.php">
							<h3><?php echo $product_array[$key]["name"]; ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?php echo "Price : ".$product_array[$key]["price"]; ?></span>
						</div>
                        
                        
						
					</div>
					<!-- /grid_item -->
				</div>
                  
				<!-- /col -->
<?php
		}
	}
	?>







				
				
			
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div class="featured lazy" data-bg="url(img/adv.jpg)">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
							<h3></h3>
							<p></p>
							<div class="feat_text_block">
								<div class="price_box">
									<span class="new_price"></span>
									<span class="old_price"></span>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /featured -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Featured</h2>
				<span>Products</span>
				<p>Hurry Up! Don't Waste Your Time</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				
				<!-- /item -->
			







<?php
  



	$product_array = $db_handle->runQuery("SELECT * FROM featured_items");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>



				<!-- /item -->
				<div class="item">
					<div class="grid_item">
						<span class="ribbon new">Hot</span>
						<figure>
							<a href='product-featured-detail.php?view=<?php echo $product_array[$key]["id"]; ?>'>
								<img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="http://emaco.rf.gd/<?php echo $product_array[$key]["image"]; ?>" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href='product-featured-detail.php?view=<?php echo $product_array[$key]["id"]; ?>'>
							<h3><?php echo $product_array[$key]["name"]; ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?php echo $product_array[$key]["price"]; ?></span>
						</div>
						
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /item -->
				
				
<?php
		}
	}
	?>










				<!-- /item -->
				
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->
		
		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					
				</div><!-- /carousel -->
			</div><!-- /container -->
		</div>
		<!-- /bg_gray -->

		
		<!-- /container -->
	</main>
	<!-- /main -->
		
	<footer class="revealed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1">Quick Links</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="about.html">About us</a></li>
							<li><a href="help.html">Faq</a></li>
							<li><a href="help.html">Help</a></li>
							<li><a href="account.html">My account</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contacts.html">Contacts</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_2">Categories</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							<li><a href="listing-grid-1-full.html">Clothes</a></li>
							<li><a href="listing-grid-2-full.html">Electronics</a></li>
							<li><a href="listing-grid-1-full.html">Furniture</a></li>
							<li><a href="listing-grid-3.html">Glasses</a></li>
							<li><a href="listing-grid-1-full.html">Shoes</a></li>
							<li><a href="listing-grid-1-full.html">Watches</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_3">Contacts</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="ti-home"></i>97845 Baker st. 567<br>Los Angeles - US</li>
							<li><i class="ti-headphone-alt"></i>+94 423-23-221</li>
							<li><i class="ti-email"></i><a href="#0">info@allaia.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div id="newsletter">
						    <div class="form-group">
						        <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
						        <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
						    </div>
						</div>
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/twitter_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/facebook_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/instagram_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/youtube_icon.svg" alt="" class="lazy"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-6">
					<ul class="footer-selector clearfix">
						<li>
							<div class="styled-select lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
						<li>
							<div class="styled-select currency-selector">
								<select>
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
						</li>
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Developed by Jinoy varghese</a></li>
						<li><span><a href=https://cspsyco.blogspot.com>© cspsyco</a></span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/carousel-home.min.js"></script>

</body>
</html>