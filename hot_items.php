<!DOCTYPE html>
<html lang="en">

<head>




    <?php

session_start();

if($_SESSION["loggedin"]!=true)
{

  header("location:https://punalur.ml/login/index.php");



}



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
        $image = "product-images/".$_FILES['image']['name'];
        $iname=$_POST['iname'];
        $code=$_POST['code'];
         $oprice=$_POST['oprice'];
         $nprice=$_POST['nprice'];
         $position=$_POST['position'];
         $date=$_POST['date'];
        $target = "product-images/".basename($image);
    
        $sql = "UPDATE hot_items SET  name = '$iname', code = '$code', image = '$image', old_price = '$oprice', new_price = '$nprice', count_date = '$date' WHERE id = $position";
        if(mysqli_query($conn, $sql));
    {
       if( move_uploaded_file($_FILES['image']['tmp_name'], $target));
       {
        echo "<div class=update><center><font >Uploaded Sucessfully</font></center></div>";
       }
    }
    }

?>

<style>
img
{
   	
   	margin: 0px;
   	width: 70px;
   	height: 60px;
    
}
#imgjp
{
    width:29px;
    height:29px;
}
::-webkit-scrollbar
{
    display: none;
}
@media only screen and (max-width: 600px) {

#na
{
    color:black !important;
}
}

</style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noarchive">
    <title> Admin Panel </title>
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
                    <a href="index.html" class="logo">
                        <h2>Punalur</h2>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#appside_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="appside_main_menu">
                <ul class="navbar-nav">
                    <li class="current-menu-item"><a href="blog" id=na>Home</a></li>
                    <li><a href="hot_items" id=na>Hot items</a></li>
                    <li><a href="orders" id=na>Orders</a></li>
                    
                    <li><a href="featured_items" id=na>Featured items</a></li>

                    
                </ul>
            </div>
            <div class="nav-right-content">
                <ul>
                    <li class="button-wrapper">
                        <a href="blog.php?log=logout" id=na class="boxed-btn btn-rounded">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

<!-- breadcrumb area start -->
<div class="breadcrumb-area breadcrumb-bg extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Admin Panel</h1>
                    <ul class="page-navigation">
                        <li><a href="https://punalur.ml/"> Home</a></li>
                        <li>Hot items</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<div class="page-content-area padding-top-120 padding-bottom-120">
    <div class="container">
 
            


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
  
<center>
    Name : <input type=text name=iname required><br><br>
    Code : <input type=text name=code required><br><br>
    Old Price : <input type=text name=oprice required><br><br>
    New Price : <input type=text name=nprice required><br><br>
    Countdown Date : <input type=date name=date required><br><br>
    Item Position: <select name=position required>
     <option value="100000">1st</option>
     <option value="100001">2nd</option>
     <option value="100002">3rd</option>
     <option value="100003">4th</option>
     
     
     </select>
    <br>
    <br>
    
    
     
      
    
    Image : <input type="file" name="image" style="width:221px;">
        
    
      <br><br>
    <button type="submit" name="upload">POST</button>
</center>

    </form>
    </div>


<br>
<br><h3>
Item list
</h3>
<br>
<br>
<div style=width:100vw;>

<?php
 $result = mysqli_query($conn, "SELECT * FROM hot_items");
 echo "<table style=width:100%;text-align:center; border=1 align=center>";
 echo "<th>Code</th><th>Image</th><th>Name</th><th>Price</th><th>Action</th>";
 while ($row = mysqli_fetch_array($result))
     {
       
        echo "<tr style=width:100vw;><td>".$row['code']."</td><td><a href='".$row['image']."' imageanchor=1 class=iimg style=width:50px;height:50px;><img src='".$row['image']."' ></a></td><td>".$row['name']."</td><td>".$row['price']."</td>
        <td><a href=delete_item.php?n=".$row['id'].">&nbsp;<img id=imgjp src='icon-delete.png' alt='Remove Item' />&nbsp;</a></td>
        
        
        
        </tr>";

     }
     echo "</table>";
?>

</div>
</div>





   



<!-- footer area start -->
<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget about_widget">
                        <a href="index.html" class="footer-logo">
                            <h2>Punalur</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium iste tenetur illum deleniti corrupti, consequatur nemo. Ipsam eum eaque, tempora, necessitatibus sed labore, illum beatae temporibus neque quasi repudiandae reprehenderit.</p>
                        <ul class="social-icon">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget nav_menus_widget">
                        <h4 class="widget-title">Useful Links</h4>
                        <ul>
                            <li><a href="index.html"><i class="fas fa-chevron-right"></i> Home</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Service</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget nav_menus_widget">
                        <h4 class="widget-title">Need Help?</h4>
                        <ul>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Faqs</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Privacy</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Policy</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Support</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Temrs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget nav_menus_widget">
                        <h4 class="widget-title"></h4>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area"><!-- copyright area -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-inner"><!-- copyright inner wrapper -->
                        <div class="left-content-area"><!-- left content area -->
                            &copy; Copyrights 2019 Appside All rights reserved.
                        </div><!-- //. left content aera -->
                        <div class="right-content-area"><!-- right content area -->
                            Designed by <strong>Jinoy</strong>
                        </div><!-- //. right content area -->
                    </div><!-- //.copyright inner wrapper -->
                </div>
            </div>
        </div>
    </div><!-- //. copyright area -->
</footer>
<!-- footer area end -->

<!-- preloader area start -->
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