<!DOCTYPE html>
<html lang="en">

<head>




    <?php
session_start();
if($_SESSION["loggedin"]!=true)
{

  header("location:https://emaco.rf.gd/login/index.php");



}


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


    if (isset($_POST['upload']))
    {
        $image = "product-images/".$_FILES['image']['name'];
        $iname=$_POST['iname'];
        $code=$_POST['code'];
        $price=$_POST['price'];
        $target = "product-images/".basename($image);
    
        $sql = "INSERT INTO tblproduct(name,code,image,price) VALUES ('$iname','$code','$image',$price)";
        mysqli_query($conn, $sql);
    
       if( move_uploaded_file($_FILES['image']['tmp_name'], $target));
       {
        echo "<div class=update><center><font >Uploaded Sucessfully</font></center></div>";
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
    width:30px;
    height:30px;
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
                    <li class="current-menu-item"><a href="http://emaco.rf.gd/blog" id=na>Home</a></li>
                    <li><a href="orders" id=na>Orders</a></li>
                    
                    
                </ul>
            </div>
            <div class="nav-right-content">
                <ul>
                    <li class="button-wrapper">
                        <li><a href="blog.php?log=logout" id=na class="boxed-btn btn-rounded">Logout</a></li>
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
                        <li>Orders</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<div class="page-content-area padding-top-120 padding-bottom-120">
    <div class="container">
      
            



    <h3>
Order Placed
</h3>
<br>
<br><br>


    <?php
 $result = mysqli_query($conn, "SELECT * FROM orders where action='unchecked'");
 echo "<div style=width:100%;overflow:scroll;>";
 echo "<table style=width:100%;text-align:center; border=1 align=center>";
 echo "<th>Name</th><th>Address</th><th>Ph.no:</th><th>Items</th><th>Action</th>";
 while ($row = mysqli_fetch_array($result))
     {
       
     echo "<tr style=width:100vw;><td>".$row['uname']."</td><td>".$row['address']."</td><td>".$row['phno']."</td><td>".$row['items']."</td><td>
     <a href=check.php?n=".$row['num'].">&nbsp;<img id=imgjp src='icon-delete.png' alt='Remove Item' />&nbsp;</a>
     
     </td></tr>";

     }
     echo "</table></div>";
?>



  
    </div>


<br>
<br>
<br>
<br>
<div style=width:100vw;>
<font size=5>

</font>
</div>
</div>





   



<!-- footer area start -->


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