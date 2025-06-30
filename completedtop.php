<?php 
require_once '../connect.php';
$connection = new dbconnect;
if (isset($_REQUEST['completedget'])) { 
$tokenid=$_REQUEST['id'];
$sql = "UPDATE token SET tokencompleted=1 WHERE tokenid=$tokenid";
$result = mysqli_query($connection->localconn(), $sql);
if ($result) {
        echo "<script>alert('Token Completed Succcesfully');
         window.location.href = 'http://localhost/Workspace/aravindivf/siteview/siteviewframe.php';</script>";
} else {
     echo "<script>alert('Token Not Completed Succcesfully');</script>";   
}
exit;


}?>