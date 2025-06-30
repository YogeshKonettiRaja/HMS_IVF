<?php require_once '../connect.php';
$connection = new dbconnect;
?>
<?php 
if(isset($_REQUEST['patientreg']))
{
      $name = $_REQUEST['fname'];
      $age =$_REQUEST['age'];
      $phone = $_REQUEST['phone'];
      $gender = $_REQUEST['gender'];
      $address = $_REQUEST['address'];
      $city = $_REQUEST['city'];
      if($gender === "1")
      {
        $gender ="Male";
      } 
      elseif($gender === "2")
      {
        $gender ="Female";
      }
      else
      {
        $gender ="Other";
      }
      $martial = $_REQUEST['martial']; //martialstatus
      $email = $_REQUEST['email']; //email adddress
      $Nationality = $_REQUEST['Nationality']; //Nationality
      $Occupation = $_REQUEST['Occupation'];
      $ecn = $_REQUEST['ecn']; //emergency contacy name
      $ecr = $_REQUEST['ecr']; //emergency contact relation
      $ecnum = $_REQUEST['ecnum']; //emergency contact number
      $pfn = $_REQUEST['pfn']; //partner full name
      $pdob = $_REQUEST['pdob']; //partner dob
      $ppn = $_REQUEST['ppn'];//partner phone number
      $po = $_REQUEST['po']; //partner occupation
      $bg = $_REQUEST['bg'];//blood group
      $allergy = $_REQUEST['allergy']; //allergy
      $meditation = $_REQUEST['meditation']; //meditation
      $surhos = $_REQUEST['surhos']; //any surgical/hospitality
      $chrodis = $_REQUEST['chrodis']; //chronicaldiseases.
      $firmen = $_REQUEST['firmen']; //first mensuration
      $cr = $_REQUEST['cr']; //cycle regularly
      $cld = $_REQUEST['cld']; //cycle length
      $pd = $_REQUEST['pd'];//Any menstrual pain/discomfort
      $pp = $_REQUEST['pp']; //Any previous pregnancies 
      $pft = $_REQUEST['pft']; //Previous fertility treatment
      $diagnosed = $_REQUEST['diagnosed']; //Have you been diagnosed with PCOS
      $semen = $_REQUEST['semen']; //Have you had a semen analysis 
      $surgeries = $_REQUEST['surgeries']; //History of reproductive surgeries
      $alcohol = $_REQUEST['alcohol']; //smoke or drink alcohol 
      $disorders = $_REQUEST['disorders']; //genetic disorders in family
      $infertility = $_REQUEST['infertility']; //infertility issues in family
      $insurance = $_REQUEST['insurance']; //insurance coverage
      $iProvider = $_REQUEST['iProvider']; //Insurance Provider Name
      $policy = $_REQUEST['policy'];//Policy Number
      $dater = $_REQUEST['dater'];//daate of registration
      $consent = $_REQUEST['consent']; //consent

      $sql = "INSERT INTO registration (name,age,gender,phone,address,city,regcreatedts,martialstatus,email,Nationality,Occupation,Emergencycontactname,Emergencycontactrelationship,	Emergencycontactnumber,Partnerfullname,Partnerdateofbirth,Partnerphonenumber,Partneroccupation,Bloodgroup,allergies,medications,surgeriesandhospitalizations,chronicdiseases,firstmenstruation,cyclesregular,Cyclelength,menstrualpainanddiscomfort,previouspregnancies,Previousfertilitytreatments,diagnosed,semenanalysis,Historyofsurgery,smokeordrinkalcohol,geneticdisordersinfamily,infertilityissuesinfamily,insurancecoverage,InsuranceProviderName,	Policynumber,dateofregistration,consent)
                           VALUES ('$name','$age','$gender','$phone','$address','$city',NOW(),'$martial','$email','$Nationality','$Occupation','$ecn','$ecr','$ecnum','$pfn','$pdob','$ppn','$po','$bg','$allergy','$meditation','$surhos','$chrodis','$firmen','$cr','$cld','$pd','$pp','$pft','$diagnosed','$semen','$surgeries','$alcohol','$disorders','$infertility','$insurance','$iProvider','$policy','$dater','$consent')";
      if (mysqli_query($connection->localconn(), $sql)) 
      {
        echo json_encode(array("response" =>true),true);
      } 
      else 
      {
        echo json_encode(array("response" => false, "error" =>  mysqli_error($connection->localconn())),true);
      }
      mysqli_close($connection->localconn());
}
if(isset($_REQUEST['show']))
{
    $sno =1;
    $sql1 = "SELECT * FROM registration";
    $result = mysqli_query($connection->localconn(), $sql1);
    echo  "<div id='registrationtable'>
    <table border='1' width='100%' style='border-collapse:collapse;'><tr align='center' style='background-color:#ec008c;color:white;'><td>Patient Detail List</td></tr></table>
    <table border='1' width='100%' style='border-collapse:collapse;'><tr style='background-color:#a16298;color:white;'>
    <th>S.No</th>
    <th>Reg ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Address</th>
    <th>City</th>
    <th>Phone</th>
    <th>Martial Status</th>
    <th>E-Mail</th>
    <th>Nationality</th>
    <th>Occupation</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr><td align='center'>".$sno."</td>";
        echo "<td align='center'>".$row['regid']."</td>";
        echo "<td align='center'>".$row['name']."</td>";
        echo "<td align='center'>".$row['age']."</td>";
        echo "<td align='center'>".$row['gender']."</td>";
        echo "<td align='center'>".$row['address']."</td>";
        echo "<td align='center'>".$row['city']."</td>";
        echo "<td align='center'>".$row['phone']."</td>";
        echo "<td align='center'>".$row['martialstatus']."</td>";
        echo "<td align='center'>".$row['email']."</td>";
        echo "<td align='center'>".$row['Nationality']."</td>";
        echo "<td align='center'>".$row['Occupation']."</td>";
        echo "</tr>";
        $sno++;
    }
     echo  "</table></div>";
    
}



?>
