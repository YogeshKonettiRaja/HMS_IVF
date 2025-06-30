<?php require_once '../connect.php';
$connection = new dbconnect;
if(isset($_GET['term'])){
    $regid = $_GET['term'];
    $sql = "SELECT regid,name,age,city from registration where regid like '%$regid%'";
    $result = mysqli_query($connection->localconn(), $sql);
    $query_array = [];
    while($row = mysqli_fetch_array($result))
    {
        $query_array[] =[
            "name" => $row['name'], 
            "value" => $row['regid'],
            "age"   => $row['age'],
            "city"   => $row['city']  
        ]; 
    }
    echo json_encode($query_array);
}
if(isset($_GET['termname']))
{
    $termname =$_GET['termname'];
    $sql = "SELECT regid,name,age,city from registration WHERE name like '%$termname%'";
    $result = mysqli_query($connection->localconn(),$sql);
    $query_array = [];
    while($row = mysqli_fetch_array($result))
    {
        $query_array[] =[
            "value" => $row['name'], 
            "regid" => $row['regid'],
            "age"   => $row['age'],
            "city"   => $row['city'] 
        ]; 
    }
    echo json_encode($query_array);
}
if(isset($_GET['termbranch']))
{
    $termbranch =$_GET['termbranch'];
    $sql = "SELECT hospitalcityname,hospitalid from hospitalcity WHERE hospitalcityname like '%$termbranch%'";
    $result = mysqli_query($connection->localconn(),$sql);
    $query_array = [];
    while($row = mysqli_fetch_array($result))
    {
        $query_array[] =[
            "value" => $row['hospitalcityname'], 
            "branchid" => $row['hospitalid'],
        ]; 
    }
    echo json_encode($query_array);
}
if(isset($_GET['branchname']) && isset($_GET['getConsultants']))
{
    $branchname = $_GET['branchname'];
    $branchid = $_GET['branchid'];
    $sql = "SELECT consultantname,consultantqualification,consultantphone,consultantid from consultant WHERE consultanthospitalcityid ='$branchid'";
    $result = mysqli_query($connection->localconn(),$sql);
    $query_array = [];
    while($row = mysqli_fetch_array($result))
    {
        $query_array[] =[
            "label" => $row['consultantname']." / ".$row['consultantqualification']." / ".$row['consultantphone'].")",
            "value" => $row['consultantname'],
            "consultantid" => $row['consultantid'] 
        ]; 
    }
    echo json_encode($query_array);
}
if(isset($_REQUEST['tokeninserted']) || isset($_REQUEST['appointementinserted']))
{
      $date = $_REQUEST['appdate'];
      $regno = $_REQUEST['regno'];
      $consultantid =$_REQUEST['consultantid'];
      $appointmentschedule = "";
      $tokenschedule ="";
      $sql1 ="";
      $sql2 ="";
      if(isset($_REQUEST['tokeninserted']))
      {
          $tokenschedule      = 1;
          $todaydate = date("Y-m-d");
          if($todaydate < $date)
          {
            echo "<script>alert('Token is Not Allowed for Future Date');</script>";
            return;
          }
          $sql1 = ",(SELECT COALESCE(max(t.tokenno),0)+1 FROM token t where t.tokendate=CURDATE() AND t.drid=$consultantid)";
          $sql2 = ",tokenno";
      }
      else
      {
          $tokenschedule      = 0;
          $appointmentschedule = 1;
      }
      

      $sql = "INSERT INTO token(tokendate,regid,drid,appointmentschedule,tokenschedule,tokencreatedts $sql2) VALUES ('$date','$regno','$consultantid','$appointmentschedule','$tokenschedule',NOW() $sql1)";
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
if(isset($_REQUEST['tokenshow']))
{
    $sno =1;
    $sql1 = "SELECT * FROM token LEFT JOIN registration on token.regid = registration.regid LEFT JOIN consultant ON token.drid=consultant.consultantid  WHERE tokendate = CURDATE() ORDER BY token.drid";
    $result = mysqli_query($connection->localconn(), $sql1);
    echo  "
    <table border='1' width='100%' style='border-collapse:collapse;'><tr align='center' style='background-color:#ec008c;color:white;'><td>Token / Appointement View</td></tr></table>
    <table border='1' width='100%' style='border-collapse:collapse;'><tr align='center' style='background-color:#a16298;color:white;'>
    <th>S.No</th>
    <th>Token Date</th>
    <th>Token No</th>
    <th>Name [Age / Sex]</th>
    <th>Action</th>
    </tr>";
    $currentDoctor = "";
    while($row = mysqli_fetch_array($result))
    {
        if ($currentDoctor != $row['consultantname']) 
        {
            $currentDoctor = $row['consultantname'];
            echo "<tr style='background-color:#a5c8d2;font-weight:bold;' align='center'><td colspan='5'>Doctor: $currentDoctor</td></tr>";
            $sno = 1; // Reset S.No for new doctor
        }
        $formattedDate = date('d-m-Y', strtotime($row['tokendate']));
        echo "<tr><td align='center'>".$sno."</td>";
        echo "<td align='center'>".$formattedDate."</td>";
        echo "<td align='center'>".$row['tokenno']."</td>";
        echo "<td align='center'>".$row['name'].' ['.$row['age'].' Y / '.$row['gender']."]</td>";
        echo '
            <form method="GET" action="tokenamount.php">
            <input type="hidden" name="tokenid" value="'.$row['tokenid'] .'">';
            if((($row['appointmentschedule'] === "1")&&($row['tokenschedule'] === "0")))
            {
                if($row['tokenamount'] === "0")
                {
                    echo '<td align="center"><button type="submit" style="background-color:#628d9d;color:white;padding:5px;border-radius:5px;" class="btn">Generate Token</button></td>';
                }
                else
                {
                    if((($row['appointmentschedule'] === "1")&&($row['tokenschedule'] === "1")))
                    {
                         echo '<td style="color:red;" align="center">Appointment Via Token Generated</td>';
                    }
                    else
                    {
                        echo '<td style="color:green;" align="center">Normal Token Generated</td>';
                    }
                }
            }
            else
            {
                if($row['tokenamount'] === "0")
                {
                 echo '<td align="center"><button type="submit" class="btn" style="background-color:#96488b;color:white;padding:5px;border-radius:5px;">Pay Amount</button></td>';
                }
                else
                {
                    if((($row['appointmentschedule'] === "1")&&($row['tokenschedule'] === "1")))
                    {
                         echo '<td style="color:red;" align="center">Appointment Via Token Generated</td>';
                    }
                    else
                    {
                        echo '<td style="color:green;" align="center">Normal Token Generated</td>';
                    }
                }
            }
        echo '</form>';
        $sno++;
    }
     echo  "</table>";
    
}

?>
