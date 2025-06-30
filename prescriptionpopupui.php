<!DOCTYPE html>
<html>
<head>
  <title>Prescription Modal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
</head>
<style>
.ui-autocomplete {
  z-index: 1060 !important;  /* Above modal */
  background-color: white;
  max-height: 200px;
}
</style>
<body>
<?php
$tokenId = isset($_GET['tokenid']) ? $_GET['tokenid'] : '';
?>
<!-- Modal -->
<div class="modal fade" id="prescModal" tabindex="-1" aria-labelledby="amountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="prescForm" action="prescriptionpopclass.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Enter Prescription</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="tokenid" value="<?php echo htmlspecialchars($tokenId); ?>">
          <div class="mb-3">
            <label for="medname" class="form-label">Medicine Name</label>
            <input type="text" name="medname" id="medname" class="form-control" required>
             <input type="text" name="mednameid" id="mednameid" class="form-control">
          </div>
          <div class="mb-3">
            <label for="medmor" class="form-label">Morning Dosage</label>
            <input type="number" step="0.01" name="medmor" class="form-control">
          </div>
          <div class="mb-3">
            <label for="medaft" class="form-label">Afternoon Dosage</label>
            <input type="number" step="0.01" name="medaft" class="form-control">
          </div>
          <div class="mb-3">
            <label for="medeve" class="form-label">Evening Dosage</label>
            <input type="number" step="0.01" name="medeve" class="form-control">
          </div>
          <div class="mb-3">
            <label for="mednyt" class="form-label">Night Dosage</label>
            <input type="number" step="0.01" name="mednyt" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="prescadd" class="btn btn-success">ADD</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Show modal on load if tokenid is present -->
<?php if ($tokenId) { ?>
<script>
  $(document).ready(function () {
    var modal = new bootstrap.Modal(document.getElementById('prescModal'));
    modal.show();
  });
</script>
<?php } ?>
<!-- AJAX script to handle form submission -->
<script>
  $(document).ready(function () {
    $("#medname").autocomplete({
            source: function(request, response) {
                $.ajax({
                url: "prescriptionpopclass.php",
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
    $.post("prescriptionpopclass.php", $("#prescForm").serialize(), function(data) {
      
  console.log("Server returned:", data);
  $("#prescForm")[0].reset();
});

  })
</script>
</body>
</html>
