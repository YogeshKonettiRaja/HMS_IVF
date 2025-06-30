<?php require_once '../connect.php';
$connection = new dbconnect;
if(isset($_REQUEST['cityinserted']))
{
      $hospitalcityname = $_REQUEST['hospitalcityname'];
      $sql = "INSERT INTO hospitalcity(hospitalcityname) VALUES ('$hospitalcityname')";
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
if(isset($_REQUEST['hospitalcityshow']))
{
    $sno =1;
    $sql1 = "SELECT * FROM hospitalcity";
    $result = mysqli_query($connection->localconn(), $sql1);
    echo "<table border='1' width='100%' style='border-collapse:collapse;background-color:#ec008c;color:white;'><tr><td align='center'>Hospital City Details</td></tr></table>";
    echo  "<table border='1' width='100%' style='border-collapse:collapse;'><tr style='background-color:#a16298;color:white;'>
    <th>S.No</th>
    <th>Hospital City Name</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr><td align='center'>".$sno."</td>";
        echo "<td align='center'>".$row['hospitalcityname']."</td></tr>";
        $sno++;
    }
     echo  "</table>";
    
}
?>