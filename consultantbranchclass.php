<?php require_once '../connect.php';
$connection = new dbconnect;
if(isset($_REQUEST['branchinserted']))
{
      $cityname = $_REQUEST['cityname'];
      $cityid = $_REQUEST['cityid'];
      $cname =$_REQUEST['consultantname'];
      $cphone = $_REQUEST['consultantphone'];
      $cqualification = $_REQUEST['consultantqua'];
      $sql = "INSERT INTO consultant (consultantcity,consultanthospitalcityid,consultantname,consultantphone,consultantqualification) VALUES ('$cityname','$cityid','$cname','$cphone','$cqualification')";
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
if(isset($_REQUEST['branchshow']))
{
    $sno =1;
    $sql1 = "SELECT * FROM consultant";
    $result = mysqli_query($connection->localconn(), $sql1);
    echo "<table border='1' width='100%' style='border-collapse:collapse;background-color:#ec008c;color:white;'><tr><td align='center'>Consultant Branch Details</td></tr></table>";
    echo  "<table border='1' width='100%' style='border-collapse:collapse;'><tr style='background-color:#a16298;color:white;'>
    <th>S.No</th>
    <th>Consultant Branch Name</th>
    <th>Consultant Name</th>
    <th>Consultant Qualification</th>
    <th>Consultant No</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr><td align='center'>".$sno."</td>";
        echo "<td align='center'>".$row['consultantcity']."</td>";
        echo "<td align='center'>".$row['consultantname']."</td>";
        echo "<td align='center'>".$row['consultantqualification']."</td>";
        echo "<td align='center'>".$row['consultantphone']."</td>";
        $sno++;
    }
     echo  "</table>";
    
}
if(isset($_GET['hospitalterm']))
{
    $cityname = $_GET['hospitalterm'];
    $sql = "SELECT hospitalid,hospitalcityname from hospitalcity WHERE hospitalcityname like '%$cityname%'";
    $result = mysqli_query($connection->localconn(),$sql);
    $query_array = [];
    while($row = mysqli_fetch_array($result))
    {
        $query_array[] =[
            "value" => $row['hospitalcityname'],
            "hospitalid" => $row['hospitalid'],
        ]; 
    }
    echo json_encode($query_array);
}
?>