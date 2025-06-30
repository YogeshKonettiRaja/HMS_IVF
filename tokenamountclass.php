<?php 
require_once '../connect.php';
$connection = new dbconnect;
header('Content-Type: application/json');
if(isset($_REQUEST['tokenamount'])){
    $amount = $_REQUEST['amount'];
    $tokenid=$_REQUEST['tokenid'];
    $conn = $connection->localconn();

    $query = "SELECT * FROM token WHERE tokenid=$tokenid";
    $queryresult = mysqli_query($conn,$query);
    $queryrow = mysqli_fetch_array($queryresult);
    $sql12 ="";
if($queryrow['appointmentschedule'] === "1")
{
    $sql11 = "(SELECT COALESCE(max(t.tokenno),0)+1 FROM token t where t.tokendate=CURDATE() AND t.drid=".$queryrow['drid'].")";
    $sql12 = ",tokenno = $sql11";
}


    $sql1 = "UPDATE token SET tokenschedule=1,tokenupdatedts=NOW(),tokenamount=$amount $sql12 WHERE tokenid= $tokenid";
    file_put_contents("data68.txt",print_r($sql1,true));
    $result = mysqli_query($conn, $sql1);
   if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Token Amount Paid Successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . mysqli_error($conn)]);
    }
    exit;

}
 ?>