<!DOCTYPE html>
<html lang="en">






    <?php
session_start();
if($_SESSION["loggedin"]!=true)
{

  header("location:http://emaco.rf.gd/login/index.php");



}
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
    
        $sql = "delete from tblproduct where id='".$k."'";
        mysqli_query($conn, $sql);
        header("Location:http://emaco.rf.gd/blog");
      
    

?>




<body>
    
  
</body>

</html>