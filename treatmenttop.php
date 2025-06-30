<?php 
require_once '../connect.php';
$connection = new dbconnect;

if (isset($_REQUEST['treatmentget'])) { 
?>
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
<form action="treatmenttop.php" name="treatmentform" id="treatmentform">
     <div class="mb-3" style="text-align:center;font-size:20px;background-color:#ec008c;color:white;padding:5px;">Treatment Form</div>
    <fieldset>
       <legend>Reproductive History</legend>
        <div class="row">
            <div class="col-3">
                <label class="form-label">Infertility Duration (years)</label>
                <input type="number" class="form-control" id="infertility_duration" name="infertility_duration" placeholder="Infertility Duration">
                <input type="hidden" name="tokenid" id="tokenid" value="<?php echo $_REQUEST['id']; ?>">
            </div>
            <div class="col-3">
                <label class="form-label">Infertility Type</label>
                <select class="form-control" name="infertility_type" id="infertility_type">
                    <option value="Primary">Primary</option>
                    <option value="Secondary">Secondary</option>
                </select>
            </div>
        </div><br>
    <fieldset>  
    <hr>
    <fieldset>
        <legend>Cycle & Treatment Details</legend>
        <div class="row">
        <div class="col-3">
            <label class="form-label">IVF Cycle Number</label>
            <input type="number" class="form-control" name="ivf_cycle" id="ivf_cycle">
        </div>
        <div class="col-3">
            <label class="form-label">Protocol Type</label>
            <select class="form-control" name="protocol" id="protocol">
                <option value="Long">Long</option>
                <option value="Antagonist">Antagonist</option>
                <option value="Short">Short</option>
            </select>
        </div>
        <div class="col-3">
            <label class="form-label">Stimulation Start Date</label>
            <input type="date" class="form-control" name="stim_start_date" id="stim_start_date">
        </div>
        <div class="col-3">
            <label class="form-label">Trigger Date</label>
            <input type="date" class="form-control" name="trigger_date" id="trigger_date">
        </div>
    </div><br>
    <div class="row">
        <div class="col-3">
            <label class="form-label">Egg Retrieval Date</label>
            <input type="date" class="form-control" name="retrieval_date" id="retrieval_date">
        </div>
        <div class="col-3">
            <label class="form-label">Number of Oocytes Retrieved</label>
            <input type="number" class="form-control" name="oocytes_retrieved" id="oocytes_retrieved">
        </div>
        <div class="col-3">
            <label class="form-label">Fertilization Method</label>
            <select class="form-control" name="fert_method" id="fert_method">
                <option value="IVF">IVF</option>
                <option value="ICSI">ICSI</option>
            </select>
        </div>
        <div class="col-3">
            <label class="form-label">Embryo Transfer Date</label>
            <input type="date" class="form-control" name="et_date" id="et_date">
         </div>
    </div><br>
    <div class="row">
        <div class="col-3">
            <label class="form-label">Embryos Transferred (number and grade)</label>
            <input type="text" class="form-control" name="embryos_transferred" id="embryos_transferred">
        </div>
    </div><br>
  </fieldset>
  <hr>
  <fieldset>
            <legend>Follow-Up</legend>
            <div class="row">
            <div class="col-3">
            <label class="form-label">Beta HCG Test Date</label>
            <input type="date" class="form-control" name="bhcg_date" id="bhcg_date">
            </div>
            <div class="col-3">
            <label class="form-label">Beta HCG Result</label>
            <input type="number" class="form-control" step="0.1" name="bhcg_result" id="bhcg_result">
            </div>
            <div class="col-3">
            <label class="form-label">Pregnancy Outcome</label>
            <select class="form-control" name="outcome" id="outcome">
                <option value="Positive">Positive</option>
                <option value="Negative">Negative</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Miscarriage">Miscarriage</option>
            </select>
            </div>
        </div><br>
    </fieldset>
    <hr>
    <fieldset>
            <legend>Next Visit Date</legend>
            <div class="row">
            <div class="col-3">
                    <label class="form-label">Next Visit Date</label>
                    <input type="date" class="form-control" name="visit_date" id="visit_date">
            </div>
            </div>
            <br>
  </fieldset>
  <hr>
  <div class="row">
    <div class="col-5">
        <span>&nbsp;</span>
    </div>
    <div class="col-3">
        <button type="button" name="treatadd" id="treatadd" class="btn btn-primary" style="background-color:#96488b;">Save Treatment</button>
    </div>
</div>
</form>

<script>
$(document).ready(function () {
    $("#treatadd").on("click", function () {
        $.ajax({
            url: "treatmenttop.php",
            type: "POST",
            dataType: "json",
            data: {
                addtreatment: true,
                tokenid: $("#tokenid").val(),
                infertility_duration: $("#infertility_duration").val(),
                infertility_type: $("#infertility_type").val(),
                ivf_cycle: $("#ivf_cycle").val(),
                protocol: $("#protocol").val(),
                stim_start_date: $("#stim_start_date").val(),
                trigger_date: $("#trigger_date").val(),
                retrieval_date: $("#retrieval_date").val(),
                oocytes_retrieved: $("#oocytes_retrieved").val(),
                fert_method: $("#fert_method").val(),
                et_date: $("#et_date").val(),
                embryos_transferred: $("#embryos_transferred").val(),
                bhcg_date: $("#bhcg_date").val(),
                bhcg_result: $("#bhcg_result").val(),
                outcome :$("#outcome").val(),
                visit_date :$("#visit_date").val(),
            },
            success: function (data) {
                if (data.response) {
                    alert("Treatment added successfully");
                    $("#treatmentform")[0].reset();
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

if (isset($_REQUEST['addtreatment'])) {
    header('Content-Type: application/json');
    $tokenid = $_REQUEST['tokenid'];
    $infertility_duration = $_REQUEST['infertility_duration'];
    $infertility_type = $_REQUEST['infertility_type'];
    $ivf_cycle = $_REQUEST['ivf_cycle'];
    $protocol = $_REQUEST['protocol'];
    $stim_start_date = $_REQUEST['stim_start_date'];
    $trigger_date = $_REQUEST['trigger_date'];
    $retrieval_date = $_REQUEST['retrieval_date'];
    $oocytes_retrieved = $_REQUEST['oocytes_retrieved'];
    $fert_method = $_REQUEST['fert_method'];
    $et_date = $_REQUEST['et_date'];
    $embryos_transferred = $_REQUEST['embryos_transferred'];
    $bhcg_date = $_REQUEST['bhcg_date'];
    $bhcg_result = $_REQUEST['bhcg_result'];
    $visit_date = $_REQUEST['visit_date'];
    $outcome =$_REQUEST['outcome'];

    $sql = "INSERT INTO treatment(tokenid,infertility_duration,	infertility_type, ivf_cycle,protocol, stim_start_date, trigger_date, retrieval_date, oocytes_retrieved, fert_method, et_date, embryos_transferred,bhcg_date,bhcg_result,outcome,visitdate,treatmentts)
                           VALUES('$tokenid','$infertility_duration','$infertility_type','$ivf_cycle','$protocol','$stim_start_date', '$trigger_date', '$retrieval_date', '$oocytes_retrieved', '$fert_method', '$et_date', '$embryos_transferred','$bhcg_date','$bhcg_result','$outcome','$visit_date',NOW())";

    $result = mysqli_query($connection->localconn(), $sql);

    if ($result) {
        echo json_encode(array("response" => true));
    } else {
        echo json_encode(array("response" => false, "error" => mysqli_error($connection->localconn())));
    }
    exit;
}
?>
