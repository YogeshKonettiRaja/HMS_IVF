<?php require_once '../connect.php';
$connection = new dbconnect;
if(isset($_GET['presearchterm'])){
    $regid = $_GET['presearchterm'];
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
if(isset($_GET['searchpreterm']))
{
    $consultantname = $_GET['searchpreterm'];
    $sql = "SELECT consultantname,consultantid from consultant where consultantname like '%$consultantname%'";
    $result = mysqli_query($connection->localconn(), $sql);
    $query_array = [];
    while($row = mysqli_fetch_array($result))
    {
        $query_array[] =[
            "consultantid" => $row['consultantid'], 
            "value" => $row['consultantname']
        ]; 
    }
    echo json_encode($query_array);
}
if(isset($_REQUEST['pressearch']))
{
    $sno =1;
    $regid = $_REQUEST['regno'];

    $sql = "SELECT registration.*,token.*,medicine.medicinename,prescription.morningdosage,prescription.afternoondosage,prescription.eveningdosage,prescription.nightdosage FROM token JOIN registration ON token.regid = registration.regid JOIN prescription ON token.tokenid = prescription.tokenid JOIN medicine ON prescription.medicineid = medicine.medicineid WHERE token.regid =$regid ";
    $result = mysqli_query($connection->localconn(), $sql);
echo "<table border='1' width='100%' style='border-collapse:collapse;background-color:#ec008c;color:white;'><tr><td align='center'>Patient Prescription Details</td></tr></table>";
echo  "<table border='1' width='100%' style='border-collapse:collapse;'>
       <tr style='background-color:#a16298;color:white;'>
            <th>S.No</th>
            <th>Medicine Name</th>
            <th>Morning Dosage</th>
            <th>Afternoon Dosage</th>
            <th>Evening Dosage</th>
            <th>Night Dosage</th>
            <th>Consultant Name</th>
        </tr>";
    $tokendate="";
    while($row = mysqli_fetch_array($result))
    {
       $formattedDate = date('d-m-Y', strtotime($row['tokendate']));
       if($tokendate=="" ||  $tokendate!=$row['tokendate'])
       { 
         echo "<tr><td align='center' colspan='7' style='font-weight:bold;background-color:#a5c8d2;'>".$formattedDate."</td></tr>";
       }
       $consultantname = $connection->get_consultant_name($row['drid']);
        $tokendate=$row['tokendate'];  // UpdaPrevoius Token dATE
        echo "<tr><td align='center'>".$sno."</td>";
        echo "<td>".$row['medicinename']."</td>";
        echo "<td align='center'>".$row['morningdosage']."</td>";
        echo "<td align='center'>".$row['afternoondosage']."</td>";
        echo "<td align='center'>".$row['eveningdosage']."</td>";
        echo "<td align='center'>".$row['nightdosage']."</td>";
        echo "<td align='center'>".$consultantname['consultantname']."</td>";
        echo "</tr>";
         $sno++;
    }
    echo "</table>";
}
?>