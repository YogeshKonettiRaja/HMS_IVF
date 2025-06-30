<?php
class dbconnect
{
  public $conn;
  function localconn()
  {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "ivf";
      $conn = new mysqli($servername, $username, $password,$dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      return $conn;
  }
function get_patient_details($regid)
{
    $sql1 = "SELECT * from registration WHERE regid =$regid ";
    $result1 = mysqli_query($this->localconn(), $sql1);
    $row1 = mysqli_fetch_array($result1);
    return $row1;
}
function get_consultant_name($drid)
{
  $sql1 = "SELECT consultantname from consultant WHERE consultantid =$drid ";
  $result1 = mysqli_query($this->localconn(), $sql1);
  $row1 = mysqli_fetch_array($result1);
  return $row1;
}
function get_vitals($tokenid)
{
  $sql1 = "SELECT * from vitals WHERE  tokenid = $tokenid";
  $result1 = mysqli_query($this->localconn(), $sql1);
  $row1 = mysqli_fetch_array($result1);
  return $row1;
}
}
?>