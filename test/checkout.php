<!DOCTYPE html>
<html lang="en">

<head>
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
    $servername="sql209.web.rafled.com";
    $username="ra1ws_25227903";
    $password="jinoyparayil";
    $dbname="ra1ws_25227903_punalur";
    $conn=new mysqli($servername,$username,$password,$dbname);
    
    if($conn->connect_error)
    {
        die("connection failed:".$conn->connect_error);
        echo $conn->connect_error;
    }


    if (isset($_POST['upload']))
    {
        

        $name=$_POST["name"];
        $phno=$_POST["phno"];
        $address=$_POST["address"];
        $items=" ";
        $price=$_POST["price"];
  	
        foreach ($_SESSION["cart_item"] as $item)
        {
          $items .=" , ".$item["quantity"]." X ".$item["name"];

        }

		$sql="INSERT INTO orders(uname,address,phno,items,price)values('$name','$address',$phno,'$items','$price')";
        if($conn->query($sql))
        {
        unset($_SESSION["cart_item"]);
        echo '<script>alert("Order Placed");';
        echo 'window.location="https://punalur.ml/test/index.php";</script>';
        
      
        }
        else
        {
            echo '<script>alert("Item ordering failed");</script>';
        }


    }
?>

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
    <link href="css/checkout.css" rel="stylesheet">

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
							<a href="index.html"><img src="img/logo.svg" alt="" width="100" height="35"></a>
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
									<a href="#">Contact</a>
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

		<div class="main_nav inner Sticky">
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
											<li><span><a href="#">Electronics</a></span></li>
											<li><span><a href="#">Grocery</a></span></li>
											<li><span><a href="#">Vegetables</a></span></li>
												
											
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
                        <form action="search.php" method="get">
							<input type="text" placeholder="Search over 10.000 products" name=search>
							<button type="submit"><i class="header-icon_search_custom"></i></button>
                            </form>
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="cart.php" class="cart_bt"><strong>*</strong></a>
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

												<a href="#">
													<figure><img src="img/products/product_placeholder_square_small.jpg" data-src="https://punalur.ml/<?php echo $item["image"]; ?>" alt="" width="50" height="50" class="lazy"></figure>
													<strong><?php echo $item["quantity"]; ?> X <span><?php echo $item["name"]; ?></span><?php echo  number_format($item_price,2); ?></strong>
												</a>
												<a href="search.php?action=remove&code=<?php echo $item["code"]; ?>" class="action"><i class="ti-trash"></i></a>
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
	
	<main class="bg_gray">
	
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
		</div>
		<h1>Place your order</h1>
			
	</div>
	<!-- /page_header -->
			<div class="row">
				<div class="col-lg-4 col-md-6">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
					<div class="step first">
						<h3>1. User Info and Billing address</h3>
					
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
							<div class="form-group">
								
                                <input type=text placeholder="Name" name=name required class="form-control">
							</div>
							<div class="form-group">
							
                                <input type=text placeholder="Address" name=address required class="form-control">
							</div>
							
                            
							
							<!-- /row -->
							<div class="form-group">
                                <input type=number placeholder="Phone Number" name=phno required class="form-control">
							</div>
							
							<!-- /row -->
							
							<!-- /row -->
							
							
							
							<div id="other_addr_c" class="pt-2">
							
							<!-- /row -->
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Full Address">
							</div>
							
							<!-- /row -->
							
							<!-- /row -->
							
							</div>
							<!-- /other_addr_c -->
							
						</div>
						<!-- /tab_1 -->
					  
						<!-- /tab_2 -->
					</div>
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step middle payments">
						<h3>2. Payment and Shipping</h3>
							<ul>
								
								
								<li>
									<label class="container_radio">Cash on delivery<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="payment" checked>
										<span class="checkmark"></span>
									</label>
								</li>
								
							</ul>
							<div class="payment_info d-none d-sm-block"><figure><img src="img/cards_all.svg" alt=""></figure>	<p>The information given above is highly secured with modern ciher sute.</p></div>
							
							<h6 class="pb-2">Shipping Method</h6>
							
						
						<ul>
								<li>
									<label class="container_radio">Standard shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="shipping" checked>
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Express shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="shipping">
										<span class="checkmark"></span>
									</label>
								</li>
								
							</ul>
						
					</div>
					<!-- /step -->
					
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. Order Summary</h3>
					<div class="box_general summary">
						<ul>

<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>

							<li class="clearfix"><em><?php echo $item["quantity"]; ?> X <?php echo $item["name"]; ?></em>  <span><?php echo  number_format($item_price,2); ?></span></li>

<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?> 
							
						</ul>
						<ul>
							<li class="clearfix"><em><strong>Subtotal </em><?php echo  $total_price=(number_format($total_price, 2))/2; ?></strong></span></li>
							<li class="clearfix"><em><strong>Delivery charge</strong></em><span>40.00</span></li>
							
						</ul>
						<div class="total clearfix">TOTAL<span><?php echo number_format($total_price, 2)+40 ?></span></div>
						
						<input type=hidden name=price value="<?php echo number_format($total_price, 2)+40 ?>">
                        <button name=upload type=submit class="btn_1 full-width" style="border:none;">Place Order</button>
					</div>
                    </form>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	
	<footer>
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
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2020 Allaia</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	<!-- Modal Payments Method-->
	<div class="modal fade" id="payments_method" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="payments_method_title">Payments Methods</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>Lorem ipsum dolor sit amet, oratio possim ius cu. Labore prompta nominavi sea ei. Sea no animal saperet gloriatur, ius iusto ullamcorper ad. Qui ignota reformidans ei, vix in elit conceptam adipiscing, quaestio repudiandae delicatissimi vis ei. Fabulas accusamus no has.</p>
			 <p>Et nam vidit zril, pri elaboraret suscipiantur ut. Duo mucius gloriatur at, in vis integre labitur dolores, mei omnis utinam labitur id. An eum prodesset appellantur. Ut alia nemore mei, at velit veniam vix, nonumy propriae conclusionemque ea cum.</p>
		  </div>
		</div>
	  </div>
	</div>
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>

    <script>
    	// Other address Panel
		$('#other_addr input').on("change", function (){
	        if(this.checked)
	            $('#other_addr_c').fadeIn('fast');
	        else
	            $('#other_addr_c').fadeOut('fast');
	    });
	</script>
		
</body>
</html>