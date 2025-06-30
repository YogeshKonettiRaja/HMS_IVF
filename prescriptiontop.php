<?php 
require_once '../connect.php';
$connection = new dbconnect;
if(isset($_REQUEST['prescget'])) { ?>
<html>
<head>
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
</head>
<body>
<form action="prescriptiontop.php" name="prescform" id="prescform">
    <div class="mb-3" style="text-align:center;font-size:20px;background-color:#ec008c;color:white;padding:5px;">Prescription Form</div>
    <fieldset>
    <div class="col-12">
        <label for="medname" class="form-label">Medicine Name</label>
        <input type="text" class="form-control" id="medname" name="medname">
        <input type="hidden" name="mednameid" id="mednameid" class="form-control">
         <input type="hidden" name="tokenid" id="tokenid" value="<?php echo $_REQUEST['id']; ?>" class="form-control">
    </div>
    <br>
     <div class="row">
    <div class="col-3">
        <label for="md" class="form-label">Morning Dosage</label>
        <input type="text" class="form-control" id="md" name="md">
    </div>
    <div class="col-3">
        <label for="ad" class="form-label">Afternooon dosage</label>
        <input type="text" class="form-control" id="ad" name="ad">
    </div>
    <div class="col-3">
        <label for="ed" class="form-label">Evening dosage</label>
        <input type="text" class="form-control" id="ed" name="ed">
    </div>
    <div class="col-3">
        <label for="nd" class="form-label">Night dosage</label>
        <input type="number" class="form-control" id="nd" name="nd">
    </div>
    </div><br> 
    <div class="row">
    <div class="col-5">
       <span>&nbsp;</span>
    </div>
    <div class="col-3">
         <button type="button" name="prescadd" id="prescadd" class="btn btn-primary" style="background-color:#96488b;color:white;">Add medicine</button>
    <div></div>
    </fieldset>
</form>
<?php }  
if(isset($_GET['prescriptionnterm']))
{
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
if(isset($_REQUEST['addprescription']))
{
     $tokenid = $_REQUEST['tokenid'];
     $medname = $_REQUEST['medname'];
     $medmor = $_REQUEST['md'];
     $medaft = $_REQUEST['ad'];
     $medeve= $_REQUEST['ed'];
     $mednyt = $_REQUEST['nd'];
     $mednameid= $_REQUEST['mednameid'];
     $sql = "INSERT INTO prescription(medicineid,tokenid,morningdosage,afternoondosage,eveningdosage,nightdosage)VALUES('$mednameid','$tokenid','$medmor','$medaft','$medeve','$mednyt')";
     $result = mysqli_query($connection->localconn(), $sql);
     if ($result) 
      {
        echo json_encode(array("response" =>true),true);
      } 
      else 
      {
        echo json_encode(array("response" => false, "error" =>  mysqli_error($connection->localconn())),true);
      }
}


$sno =1;
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $sql1 = "SELECT * FROM prescription,medicine WHERE prescription.medicineid=medicine.medicineid AND prescription.tokenid=$id";
    $result = mysqli_query($connection->localconn(), $sql1);
    echo  "<div id='prescriptionTable'>
    <table border='1' width='100%' style='border-collapse:collapse;'><tr align='center' style='background-color:#ec008c;color:white;'><td>Prescription List</td></tr></table>
    <table border='1' width='100%' id='tokenTableFrame' name='tokenTableFrame' style='border-collapse:collapse;'><tr style='background-color:#a16298;color:white;'>
    <th>S.No</th>
    <th>Medicine Name</th>
    <th>Morning Dosage</th>
    <th>Afternoon Dosage</th>
    <th>Evening Dosage</th>
    <th>Night Dosage</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr><td align='center'>".$sno."</td>";
        echo "<td>".$row['medicinename']."</td>";
        echo "<td>".$row['morningdosage']."</td>";
        echo "<td>".$row['afternoondosage']."</td>";
        echo "<td>".$row['eveningdosage']."</td>";
        echo "<td>".$row['nightdosage']."</td></tr>";
        $sno++;
    }
     echo  "</table></div>";

?>
<script>
$(document).ready(function () {
$("#medname").autocomplete({
    source: function(request, response) {
        $.ajax({
        url: "prescriptiontop.php",
        type: "GET",
        dataType: "json",
        data: {
            prescriptionnterm: request.term 
        },
        success: function(data) {
            console.log(data)
            response(data);
        }
        });
    },
    select: function(event, ui) {
            $("#mednameid").val(ui.item.medicineid);
    }
});
// jhgfcv
$("#prescadd").on("click",function(){
    var medname = document.getElementById("medname").value;
    var mednameid = document.getElementById("mednameid").value;
    var tokenid = document.getElementById("tokenid").value;
    var md = document.getElementById("md").value;
    var ad = document.getElementById("ad").value;
    var ed = document.getElementById("ed").value;
    var nd = document.getElementById("nd").value;
    $.ajax({
            url: "prescriptiontop.php",
            type: "POST",
            dataType: "json",
            data: {
                addprescription:true,
                medname : medname,
                mednameid : mednameid ,
                tokenid : tokenid,
                md : md ,
                ad : ad,
                ed : ed,
                nd : nd
            },
            success: function(data) {
                console.log("response => "+data.response);
                if(data.response){
                    alert("Prescription added succesfully");
                    document.getElementById("prescform").reset();
                    $('#prescriptionTable').load('prescriptiontop.php?id=' + tokenid + ' #prescriptionTable>*');
                }else{
                    alert(data.error);
                }   
            }
            });
    });
})
</script>
</body>
</html>

<?php  }?>