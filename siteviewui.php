<html>
<head>
    <title>Treatment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
</head>
<body>
    <div class="mb-3" style="text-align:center;font-size:20px;background-color:#ec008c;color:white;padding:5px;">Today's Doctor Views</div>
</body>
</html>

<?php
require_once '../connect.php';
$connection = new dbconnect;
if(isset($_REQUEST['show']))
{
    $sno =1;
    $sql1 = "SELECT * FROM token,registration WHERE registration.regid = token.regid AND token.tokencompleted = 0 AND token.tokenamount > 0 AND token.tokendate = CURDATE() ";
    $result = mysqli_query($connection->localconn(), $sql1);
    echo  "<table border='1' width='100%' style='border-collapse:collapse;'><tr style='background-color:#a16298;color:white;padding:5px;'>
    <th>S.No</th>
    <th class='align-middle'>Patient Details [Age / Sex]</th>
    <th>Age</th>
    <th style='padding-left:30px;'>Gender</th>
    <th style='padding-left:40px;'>Address</th>
    <th style='padding-left:50px;'>City</th>
    <th style='padding-left:240px;'>Action</th>
    </tr>";
    $currentDoctor = "";
    while($row = mysqli_fetch_array($result))
    {
        $consultantname = $connection->get_consultant_name($row['drid']);
        if ($currentDoctor != $consultantname['consultantname']) 
        {
            $currentDoctor = $consultantname['consultantname'];
            echo "<tr style='background:#a5c8d2; font-weight:bold;' align='center'><td colspan='7'>Doctor: $currentDoctor</td></tr>";
            $sno = 1; // Reset S.No for new doctor
        }
        $tokenid = $row['tokenid'];
        echo "<tr><td align='center'>".$sno."</td>";
        echo "<td style='padding-left:30px;'>".$row['name']." [".$row['age']." / ".$row['gender']."]</td>";
        echo "<td align='center'>".$row['age']."</td>";
        echo "<td align='center'>".$row['gender']."</td>";
        echo "<td align='center'>".$row['address']."</td>";
        echo "<td align='center'>".$row['city']."</td>";
        echo "<td align='center'>
                <form action='prescriptiontop.php' method='get' style='display:inline;'>
                    <input type='hidden' name='id' value='$tokenid'>
                    <button type='submit' class='btn btn-primary' name='prescget'>Prescription</button>
                </form>
                <form action='vitalstop.php' method='get' style='display:inline;'>
                    <input type='hidden' name='id' value='$tokenid'>
                    <button type='submit' class='btn btn-success' name='vitalsget'>Vitals</button>
                </form>
                <form action='treatmenttop.php' method='get' style='display:inline;'>
                    <input type='hidden' name='id' value='$tokenid'>
                    <button type='submit' class='btn btn-danger' name='treatmentget'>Treatment</button>
                </form>
                <form action='completedtop.php' method='get' style='display:inline;'>
                    <input type='hidden' name='id' value='$tokenid'>
                    <button type='submit' class='btn btn-warning' name='completedget'>Token Completed</button>
                </form>
            </td></tr>";
        $sno++;
    }
     echo  "</table>";
    
}
?>