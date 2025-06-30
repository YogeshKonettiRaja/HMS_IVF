<?php require_once '../connect.php';
$connection = new dbconnect;
if(isset($_GET['prescriptionnterm'])){
    $medicinename = $_GET['prescriptionnterm'];
    $sql = "SELECT medicinename,medicineid from medicine where medicinename like '%$medicinename%'";
    $result = mysqli_query($connection->localconn(), $sql);
    $query_array = [];
    while($row = mysqli_fetch_array($result))
    {
        $query_array[] =[
            'label' => $row['medicinename'],
            "value" => $row['medicinename'],
            "medicineid" => $row['medicineid']
        ]; 
    }
    echo json_encode($query_array);
}
file_put_contents("data67.txt",print_r($_REQUEST,true));
if(isset($_REQUEST['prescadd']))
{
     $tokenid = $_REQUEST['tokenid'];
     $medname = $_REQUEST['medname'];
     $medmor = $_REQUEST['medmor'];
     $medaft = $_REQUEST['medaft'];
     $medeve= $_REQUEST['medeve'];
     $mednyt = $_REQUEST['mednyt'];
     $mednameid= $_REQUEST['mednameid'];
     $sql = "INSERT INTO prescription(medicineid,tokenid,morningdosage,afternoondosage,eveningdosage,nightdosage)VALUES('$mednameid','$tokenid','$medmor','$medaft','$medeve','$mednyt')";
     $result = mysqli_query($connection->localconn(), $sql);
     if ($result) 
      {
        echo "New record created successfully";
      } 
      else 
      {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}
?>