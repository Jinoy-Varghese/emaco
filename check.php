<!DOCTYPE html>
<html lang="en">






    <?php
$servername="sql200.epizy.com";
$username="epiz_25734166";
$password="3Skznn54eolG4Ft";
$dbname="epiz_25734166_emaco";
    $k=$_GET['n'];
    $conn=new mysqli($servername,$username,$password,$dbname);
    
    if($conn->connect_error)
    {
        die("connection failed:".$conn->connect_error);
        echo $conn->connect_error;
    }
    
        $sql = "update orders set action='checked' where num='".$k."'";
        mysqli_query($conn, $sql);
        header("Location:http://emaco.rf.gd/orders");
      
    

?>




<body>
    
  
</body>

</html>