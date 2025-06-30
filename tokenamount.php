<!DOCTYPE html>
<html>
<head>
  <title>Token Amount Modal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php
$tokenId = isset($_GET['tokenid']) ? $_GET['tokenid'] : '';
?>

<!-- Modal -->
<div class="modal fade" id="amountModal" tabindex="-1" aria-labelledby="amountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="amountForm">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ec008c;color:white;">
          <h5 class="modal-title">Enter Token Amount</h5>
          <button type="button" class="btn-close" id="closeAndRedirect" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="tokenid" value="<?php echo htmlspecialchars($tokenId); ?>">
          <div class="mb-3">
            <label for="amount" class="form-label">Token Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" onclick="amountsave()">Save Amount</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Show modal on load if tokenid is present -->
<?php if ($tokenId) { ?>
<script>
  $(document).ready(function () {
    var modal = new bootstrap.Modal(document.getElementById('amountModal'));
    modal.show();
  });
  document.getElementById("closeAndRedirect").addEventListener("click", function () {
    setTimeout(function () {
        window.location.href = "http://localhost/Workspace/aravindivf/token/tokenclass.php?tokenshow=true";
    }, 300); 
});
</script>
<?php } ?>

<!-- AJAX script to handle form submission -->
<script>
  $(document).ready(function () {
    $('#amountForm').on('submit', function (e) {
      e.preventDefault();
      var formData = {
        tokenid: $('input[name="tokenid"]').val(),
        amount: $('input[name="amount"]').val(),
        tokenamount :true
      };

      $.ajax({
        url: 'tokenamountclass.php',
        type: 'POST',
        data: formData,
        dataType: 'json', 
        success: function (response) {
          alert(response.message); 
          window.location.href = "http://localhost/Workspace/aravindivf/token/tokenclass.php?tokenshow=true";
          $('#amountModal').modal('hide');
        },
        error: function () {
          alert('Error while saving.');
        }
      });
    });
  });
</script>
</body>
</html>
