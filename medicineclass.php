<?php require_once '../connect.php';
$connection = new dbconnect;
if(isset($_REQUEST['medicineinserted']))
{
      $medicinename = $_REQUEST['medicinename'];
      $stock = $_REQUEST['medicinestock'];
      $medicinerate = $_REQUEST['medicinerate'];
      $sql = "INSERT INTO medicine(medicinename,medicinestock,medicinerate) VALUES ('$medicinename','$stock','$medicinerate')";
      if (mysqli_query($connection->localconn(), $sql)) 
      {
        echo json_encode(array("response"=>true),true);
      } 
      else 
      {
         echo json_encode(array("response" => false, "error" =>  mysqli_error($connection->localconn())),true);
      }
      mysqli_close($connection->localconn());
}
if(isset($_REQUEST['medicineshow']))
{
    $sno =1;
    $sql1 = "SELECT * FROM medicine";
    $result = mysqli_query($connection->localconn(), $sql1);
    echo "<table border='1' width='100%' style='border-collapse:collapse;background-color:#ec008c;color:white;'><tr><td align='center'>Medicine Form Details</td></tr></table>";
    echo  "<table border='1' width='100%' style='border-collapse:collapse;'><tr style='background-color:#a16298;color:white;'>
    <th>S.No</th>
    <th>Medicine Name</th>
    <th>Medicine Stock</th>
    <th>Medicine Rate</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr><td align='center'>".$sno."</td>";
        echo "<td align='center'>".$row['medicinename']."</td>";
        echo "<td align='center'>".$row['medicinestock']."</td>";
        echo "<td align='center'>".$row['medicinerate']."</td></tr>";
        $sno++;
    }
     echo  "</table>";
    
}
?>