<?php 
require_once '../connect.php';
$connection = new dbconnect;

// Show form if 'vitalsget' is set
if (isset($_REQUEST['vitalsget'])) { 
?>
<html>
<head>
    <title>Vitals Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
</head>
<body>
<form action="vitalstop.php" name="vitalsform" id="vitalsform">
    <div class="mb-3" style="text-align:center;font-size:20px;background-color:#ec008c;color:white;padding:5px;">Vitals Form</div>
    <fieldset>
        <div class="row">
        <div class="col-3">
            <label for="bp" class="form-label">Blood Pressure (mmHg)</label>
            <input type="text" class="form-control" id="bp" name="bp">
            <input type="hidden" name="tokenid" id="tokenid" value="<?php echo $_REQUEST['id']; ?>">
        </div>
        <div class="col-3">
            <label for="pulse" class="form-label">Pulse Rate (bpm)</label>
            <input type="text" class="form-control" id="pulse" name="pulse">
        </div>
        <div class="col-3">
            <label for="temp" class="form-label">Temperature (°F)</label>
            <input type="text" class="form-control" id="temp" name="temp">
        </div>
        <div class="col-3">
            <label for="weight" class="form-label">Weight (kg)</label>
            <input type="text" class="form-control" id="weight" name="weight">
        </div>
        </div><br>
        <div class="row">
        <div class="col-3">
            <label for="height" class="form-label">Height (cm)</label>
            <input type="text" class="form-control" id="height" name="height">
        </div>  
        <div class="col-3">
            <label for="bmi" class="form-label">BMI</label>
            <input type="text" class="form-control" id="bmi" name="bmi">
        </div> 
        <div class="col-3">
            <label for="cycleDay" class="form-label">Cycle Day</label>
            <input type="text" class="form-control" id="cycleDay" name="cycleDay">
        </div>
        <div class="col-3">
            <label for="menstrualDate" class="form-label">Last Menstrual Period (LMP)</label>
            <input type="date" class="form-control" id="menstrualDate" name="menstrualDate">
        </div>
        </div><br>
        <div class="row">
        <div class="col-3">
            <label for="estradiol" class="form-label">Estradiol Level (pg/mL)</label>
            <input type="text" class="form-control" id="estradiol" name="estradiol">
        </div>
        <div class="col-3">
            <label for="fsh" class="form-label">FSH Level (mIU/mL)</label>
            <input type="text" class="form-control" id="fsh" name="fsh">
        </div>
        <div class="col-3">
            <label for="lh" class="form-label">LH Level (mIU/mL)</label>
            <input type="text" class="form-control" id="lh" name="lh">
        </div>
        <div class="col-3">
            <label class="form-label">AMH (ng/mL)</label>
            <input type="number" step="0.01" class="form-control" name="amh" id="amh">
        </div>
        </div><br>
        <div class="row">
        <div class="col-3">
            <label class="form-label">TSH (µIU/mL)</label>
            <input type="number" step="0.01" class="form-control" name="tsh" id="tsh">
        </div>
        </div><br>
        <div class="row">
        <div class="col-5">
            <span>&nbsp;</span>
        </div>
        <div class="col-3">
                <button type="button" name="vitalsadd" id="vitalsadd" class="btn btn-primary" style="background-color:#96488b;">Save Vitals</button>
        </div>
        </div>
    </fieldset>
</form>

<script>
$(document).ready(function () {
    $("#vitalsadd").on("click", function () {
        $.ajax({
            url: "vitalstop.php",
            type: "POST",
            dataType: "json",
            data: {
                addvitals: true,
                tokenid: $("#tokenid").val(),
                bp: $("#bp").val(),
                pulse: $("#pulse").val(),
                temp: $("#temp").val(),
                weight: $("#weight").val(),
                height: $("#height").val(),
                bmi: $("#bmi").val(),
                cycleDay: $("#cycleDay").val(),
                menstrualDate: $("#menstrualDate").val(),
                estradiol: $("#estradiol").val(),
                fsh: $("#fsh").val(),
                lh: $("#lh").val(),
                amh: $("#amh").val(),
                tsh: $("#tsh").val()
            },
            success: function (data) {
                if (data.response) {
                    alert("Vitals added successfully");
                    $("#vitalsform")[0].reset();
                } else {
                    alert("Error: " + data.error);
                }
            },
            error: function (xhr, status, error) {
                alert("AJAX Error: " + error);
            }
        });
    });
});
</script>
</body>
</html>
<?php 
exit;
}

if (isset($_REQUEST['addvitals'])) {
    header('Content-Type: application/json');
    $tokenid = $_REQUEST['tokenid'];
    $bp = $_REQUEST['bp'];
    $pulse = $_REQUEST['pulse'];
    $temp = $_REQUEST['temp'];
    $weight = $_REQUEST['weight'];
    $height = $_REQUEST['height'];
    $bmi = $_REQUEST['bmi'];
    $cycleDay = $_REQUEST['cycleDay'];
    $menstrualDate = $_REQUEST['menstrualDate'];
    $estradiol = $_REQUEST['estradiol'];
    $fsh = $_REQUEST['fsh'];
    $lh = $_REQUEST['lh'];
    $amh = $_REQUEST['amh'];
    $tsh = $_REQUEST['tsh'];

    $sql = "INSERT INTO vitals(tokenid, bp, pulse, temp, weight, height, bmi, cycleday, menstrualDate, estradiol, fsh, lh,amh,tsh, vitalscreatedts)
            VALUES('$tokenid', '$bp', '$pulse', '$temp', '$weight', '$height', '$bmi', '$cycleDay', '$menstrualDate', '$estradiol', '$fsh', '$lh','$amh','$tsh', NOW())";

    $result = mysqli_query($connection->localconn(), $sql);

    if ($result) {
        echo json_encode(array("response" => true));
    } else {
        echo json_encode(array("response" => false, "error" => mysqli_error($connection->localconn())));
    }
    exit;
}
?>
