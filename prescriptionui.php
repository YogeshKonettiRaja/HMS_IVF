<html>
    <head>
        <title>Branch Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    </head>
    <body>
           <form action="prescriptionclass.php" name="branchform" id="branchform">
            <div class="mb-3" style="text-align:center;font-size:20px;background-color:#ec008c;color:white;padding:5px;">Patient Prescription Search</div>
                <fieldset>
                <div class="row">
                <div class="col-4">
                    <label for="regno" class="form-label">&nbsp;</label>
                </div>
                <div class="col-3">
                    <label for="regno" class="form-label">Reg No</label>
                    <input type="text" class="form-control" name="regno" id="regno" placeholder="Select Patient Regno">
                </div>
                <div class="col-3">
                         <button type="button" name="pressearch" id="pressearch" style="margin-top:30px;background-color:#96488b;color:white;" class="btn btn-primary">Search</button>
                 </div>
                </div>
                </fieldset>
           </form>
           <hr>
           <div id="presctable" class="table"></div>
           <script>
            // Patient regno autocomplete
            $("#regno").autocomplete({
            source: function(request, response) {
                $.ajax({
                url: "prescriptionclass.php",
                type: "GET",
                dataType: "json",
                data: {
                    presearchterm: request.term // this is what jQuery normally sends automatically
                },
                success: function(data) {
                    response(data);
                }
                });
            }
            });
            
            $("#pressearch").on("click",function(){
                    $.ajax({
                    url: "prescriptionclass.php",
                    type: "GET",
                    data: {
                        regno  : $("#regno").val(),
                        pressearch: true
                    },
                    success: function(data) {
                        $('#presctable').html(data);
                        console.log("data",data);
                    }
                    });
             })
            </script>
</body>
</html>


