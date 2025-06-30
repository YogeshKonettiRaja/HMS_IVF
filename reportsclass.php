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
file_put_contents("data.txt",print_r($_REQUEST,true));
if(isset($_REQUEST['pressearch']))
{
    $sno =1;
    $regid = $_REQUEST['regno'];
    $sql = "SELECT token.tokenid,token.tokendate,token.drid,medicine.medicinename,prescription.morningdosage,prescription.afternoondosage,prescription.eveningdosage,prescription.nightdosage FROM token JOIN prescription ON token.tokenid = prescription.tokenid JOIN medicine ON prescription.medicineid = medicine.medicineid WHERE token.regid =$regid ";
    $result = mysqli_query($connection->localconn(), $sql);
    // Patient details
    $patientdetails = $connection->get_patient_details($regid);
    echo  "<table border='1' width='100'>
    <tr style='background-color:#ec008c;color:white;'><td align='center' colspan='14'>Patient Full Details</td></tr>
    <tr style='background-color:#a16298;color:white;'>
    <th>Reg ID</th>
    <th>Patient Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Address</th>
    <th>City</th>
    <th>Phone</th>
    <th>Martial Status</th>
    <th>E-Mail</th>
    <th>Nationality</th>
    <th>Occupation</th>
    <th>Emergency Contact Name</th>
    <th>Emergency Contact Relation Ship</th>
    <th>Emergency Contact Number</th>
    </tr>";
    echo "<tr><td align='center'>".$patientdetails['regid']."</td>";
    echo "<td align='center'>".$patientdetails['name']."</td>";
    echo "<td align='center'>".$patientdetails['age']."</td>";
    echo "<td align='center'>".$patientdetails['gender']."</td>";
    echo "<td align='center'>".$patientdetails['address']."</td>";
    echo "<td align='center'>".$patientdetails['city']."</td>";
    echo "<td align='center'>".$patientdetails['phone']."</td>";
    echo "<td align='center'>".$patientdetails['martialstatus']."</td>
    <td align='center'>".$patientdetails['email']."</td>";
    echo "<td align='center'>".$patientdetails['Nationality']."</td>";
    echo "<td align='center'>".$patientdetails['Occupation']."</td>";
    echo "<td align='center'>".$patientdetails['Emergencycontactname']."</td>";
    echo "<td align='center'>".$patientdetails['Emergencycontactrelationship']."</td>";
    echo "<td align='center'>".$patientdetails['Emergencycontactnumber']."</td>";
    echo "</tr></table><br>";

    echo "<table>
    <tr style='background-color:#ec008c;color:white;'><td align='center' colspan='4'>Partner Information</td></tr>
    <tr style='background-color:#a16298;color:white;'>
    <th>Partner Full Name</th>
    <th>Partner Date Of Birth</th>
    <th>Partner Phone Number</th>
    <th>Partner Occupation</th>
    </tr>";
    echo "<tr>";
    echo "<td align='center'>".$patientdetails['Partnerfullname']."</td>";
    echo "<td align='center'>".$patientdetails['Partnerdateofbirth']."</td>";
    echo "<td align='center'>".$patientdetails['Partnerphonenumber']."</td>";
    echo "<td align='center'>".$patientdetails['Partneroccupation']."</td></tr></table><br>";

    echo "<table border='1' width='100'>
    <tr style='background-color:#ec008c;color:white;'><td align='center' colspan='5'>Medical History</td></tr>
    <tr style='background-color:#a16298;color:white;'>
    <th>Blood Group</th>
    <th>Any Allergies</th>
    <th>Any Medications</th>
    <th>past surgeries/hospitalizations</th>
    <th>chronic diseases </th>
    </tr>";
    echo "<tr>";
    echo "<td align='center'>".$patientdetails['Bloodgroup']."</td>
    <td align='center'>".$patientdetails['allergies']."</td>";
    echo "<td align='center'>".$patientdetails['medications']."</td>";
    echo "<td align='center'>".$patientdetails['surgeriesandhospitalizations']."</td>";
    echo "<td align='center'>".$patientdetails['chronicdiseases']."</td></tr></table><br>";

    echo "<table border='1' width='100'>
    <tr style='background-color:#ec008c;color:white;'><td align='center' colspan='7'>Reproductive Health (For Female Patient)</td></tr>
    <tr style='background-color:#a16298;color:white;'>
    <th>First menstruation</th>
    <th>Cycles regularly</th>
    <th>Cycle length</th>
    <th>Menstrual pain/discomfort</th>
    <th>Previous pregnancies</th>
    <th>Previous fertility treatments</th>
    <th>Diagnosed With PCOS</th>
    </tr>";
    echo "<tr>";
     echo "<td align='center'>".$patientdetails['firstmenstruation']."</td>";
    echo "<td align='center'>".$patientdetails['cyclesregular']."</td>";
    echo "<td align='center'>".$patientdetails['Cyclelength']."</td>";
    echo "<td align='center'>".$patientdetails['menstrualpainanddiscomfort']."</td>";
    echo "<td align='center'>".$patientdetails['previouspregnancies']."</td>";
    echo "<td align='center'>".$patientdetails['Previousfertilitytreatments']."</td>";
    echo "<td align='center'>".$patientdetails['diagnosed']."</td>";
    echo "</tr></table><br>";

    echo "<table border='1' width='100'>
    <tr style='background-color:#ec008c;color:white;'><td align='center' colspan='10'>Partner Fertility (for Male Partner)</td></tr>
    <tr style='background-color:#a16298;color:white;'>
    <th>Semen analysis</th>
    <th>History of reproductive surgeries</th>
    <th>Smoke or drink alcohol</th>
    <th>Genetic disorders in family</th>
    <th>Infertility issues in family</th>
    <th>Insurance coverage</th>
    <th>Insurance Provider Name</th>
    <th>Policy Number</th>
    <th>Date of Registration</th>
    <th>Created Time</th>
    </tr>";
    echo "<tr>";
    echo "<td align='center'>".$patientdetails['semenanalysis']."</td>
    <td align='center'>".$patientdetails['Historyofsurgery']."</td>";
    echo "<td align='center'>".$patientdetails['smokeordrinkalcohol']."</td>";
    echo "<td align='center'>".$patientdetails['geneticdisordersinfamily']."</td>";
    echo "<td align='center'>".$patientdetails['infertilityissuesinfamily']."</td>";
    echo "<td align='center'>".$patientdetails['insurancecoverage']."</td>";
    echo "<td align='center'>".$patientdetails['InsuranceProviderName']."</td>";
    echo "<td align='center'>".$patientdetails['Policynumber']."</td>";
    echo "<td align='center'>".$patientdetails['dateofregistration']."</td>";
    echo "<td align='center'>".$patientdetails['regcreatedts']."</td>";
    echo "</tr></table><br>";


    // Medicine Table
    echo "<table border='1' width='100%'>
    <tr style='background-color:#ec008c;color:white;'><td colspan='20' align='center'>Medicine Details</td></tr>
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
        $consultantname = $connection->get_consultant_name($row['drid']);
        if($tokendate=="" ||  $tokendate!=$row['tokendate'])
        { 
                echo "<tr><td colspan='7' align='center'>".$row['tokendate']."</td></tr>";
        }
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
    echo "</table><br>";
    //Vital table
    echo "<table border='1' width='100%'><tr style='background-color:#ec008c;color:white;'><td colspan='20' align='center'>Vitals Details</td></tr>
    <tr style='background-color:#a16298;color:white;'>
    <th>S.No</th>
    <th>Blood Pressure</th>
    <th>Pulse</th>
    <th>Temp</th>
    <th>Weight</th>
    <th>Height</th>
    <th>BMI</th>
    <th>Cycle Day</th>
    <th>Mensural Date</th>
    <th>Estradiol</th>
    <th>FSH</th>
    <th>LH</th>
    <th>AMH</th>
    <th>TSH</th>
    <th>Consultant Name</th>
    <th>Vitals Created Time</th>
    </tr>";
    $sno1 =1;
    $sql1 = "SELECT vitals.*,token.tokenid,token.tokendate,token.drid FROM token JOIN vitals ON token.tokenid = vitals.tokenid WHERE token.regid =$regid ";
    $result1 = mysqli_query($connection->localconn(), $sql1);
    $tokendate1="";
    while($row1 = mysqli_fetch_array($result1))
    {
        $consultantname = $connection->get_consultant_name($row1['drid']);
        if($tokendate1=="" ||  $tokendate1 !=$row1['tokendate'])
        { 
                echo "<tr><td colspan='17' align='center'>".$row1['tokendate']."</td></tr>";
        }
        $tokendate1 =$row1['tokendate']; 
         echo "<tr><td align='center'>".$sno1."</td>";
         echo "<td align='center'>".$row1['bp']."</td>";
         echo "<td align='center'>".$row1['pulse']."</td>";
         echo "<td align='center'>".$row1['temp']."</td>";
         echo "<td align='center'>".$row1['weight']."</td>";
         echo "<td align='center'>".$row1['height']."</td>";
         echo "<td align='center'>".$row1['bmi']."</td>";
         echo "<td align='center'>".$row1['cycleDay']."</td>";
         echo "<td align='center'>".$row1['menstrualDate']."</td>";
         echo "<td align='center'>".$row1['estradiol']."</td>";
         echo "<td align='center'>".$row1['fsh']."</td>";
         echo "<td align='center'>".$row1['lh']."</td>";
         echo "<td align='center'>".$row1['amh']."</td>";
         echo "<td align='center'>".$row1['tsh']."</td>";
         echo "<td align='center'>".$consultantname['consultantname']."</td>";
         echo "<td align='center'>".$row1['vitalscreatedts']."</td>";
         echo "</tr>";
         $sno1++;
    }
    echo "</table><br>";
     echo "<table border='1' width='100%'><tr style='background-color:#ec008c;color:white;'><td colspan='20' align='center'>Treatment Details</td></tr>
    <tr style='background-color:#a16298;color:white;'>
    <th>S.No</th>
    <th>Infertility Duration</th>
    <th>Infertility Type</th>
    <th>IVF Cycle Number</th>
    <th>Protocol Type</th>
    <th>Stimulation Start Date</th>
    <th>Trigger Date</th>
    <th>Egg Retrieval Date</th>
    <th>Number of Oocytes Retrieved</th>
    <th>Fertilization Method</th>
    <th>Embryo Transfer Date</th>
    <th>Embryos Transferred</th>
    <th>Beta HCG Test Date</th>
    <th>Beta HCG Result</th>
    <th>Pregnancy Outcome</th>
    <th>Consultant Name</th>
    <th>Treatment Created Time</th>
    </tr>";
    $sno2 =1;
    $sql2 = "SELECT treatment.*,token.tokenid,token.tokendate,token.drid FROM token JOIN treatment ON token.tokenid = treatment.tokenid WHERE token.regid =$regid ";
    $result2 = mysqli_query($connection->localconn(), $sql2);
    $tokendate2="";
    while($row2 = mysqli_fetch_array($result2))
    {
        $consultantname = $connection->get_consultant_name($row2['drid']);
        if($tokendate2=="" ||  $tokendate2 != $row2['tokendate'])
        { 
                echo "<tr><td colspan='17' align='center'>".$row2['tokendate']."</td></tr>";
        }
        $tokendate2 =$row2['tokendate']; 
         echo "<tr><td align='center'>".$sno2."</td>";
         echo "<td align='center'>".$row2['infertility_duration']."</td>";
         echo "<td align='center'>".$row2['infertility_type']."</td>";
         echo "<td align='center'>".$row2['ivf_cycle']."</td>";
         echo "<td align='center'>".$row2['protocol']."</td>";
         echo "<td align='center'>".$row2['stim_start_date']."</td>";
         echo "<td align='center'>".$row2['trigger_date']."</td>";
         echo "<td align='center'>".$row2['retrieval_date']."</td>";
         echo "<td align='center'>".$row2['oocytes_retrieved']."</td>";
         echo "<td align='center'>".$row2['fert_method']."</td>";
         echo "<td align='center'>".$row2['et_date']."</td>";
         echo "<td align='center'>".$row2['embryos_transferred']."</td>";
         echo "<td align='center'>".$row2['bhcg_date']."</td>";
         echo "<td align='center'>".$row2['bhcg_result']."</td>";
         echo "<td align='center'>".$row2['outcome']."</td>";
         echo "<td align='center'>".$consultantname['consultantname']."</td>";
         echo "<td align='center'>".$row2['treatmentts']."</td>";
         echo "</tr>";
         $sno2++;
    }
    echo "</table><br>";

}
?>