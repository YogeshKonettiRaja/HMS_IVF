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
           <form action="consultantbranchclass.php" name="conbranchform" id="conbranchform">
            <div class="mb-3" style="text-align:center;font-size:20px;background-color:#ec008c;color:white;padding:5px;">Consultant Branch Form</div>
                <fieldset>
                <div class="row">
                <div class="col-3">
                    <label for="cityname" class="form-label">Select Consultant Hospital city</label>
                    <input type="text" class="form-control" name="cityname" id="cityname" placeholder="Select Consultant Hospital city">
                     <input type="hidden" class="form-control" name="cityid" id="cityid">
                </div>
                <div class="col-3">
                    <label for="consultantname" class="form-label">Consultant Name</label>
                    <input type="text" class="form-control" name="consultantname" id="consultantname" placeholder="Enter Consultant Name">
                </div>
                <div class="col-3">
                    <label for="consultantqua" class="form-label">Consultant Qualification</label>
                    <input type="text" class="form-control" name="consultantqua" id="consultantqua" placeholder="Enter Consultant Qualification">
                </div>
                <div class="col-3">
                    <label for="consultantphone" class="form-label">Consultant Phone No</label>
                    <input type="text" class="form-control" name="consultantphone" id="consultantphone" placeholder="Enter Consultant Phone No">
                </div>
                </div><br>
                <div class="row">
                <div class="col-12" align="center">
                  <button type="button" name="branchinserted" id="branchinserted" class="btn btn-primary" style="background-color:#96488b;color:white;">Add Consultant</button>
                </div>
                </div>
                </fieldset>
           </form>
           <script>
            $('#branchinserted').on("click",function(){
                $.ajax({
                    url :"consultantbranchclass.php",
                    type:"POST",
                    dataType:"json",
                    data:{
                        branchinserted: true,
                        cityname     : $("#cityname").val(),
                        cityid     : $("#cityid").val(),
                        consultantname     : $("#consultantname").val(),
                        consultantphone     : $("#consultantphone").val(),
                        consultantqua     : $("#consultantqua").val()
                    },
                    success:function(data){
                        alert("Hospital City Added Successfully");
                        parent.bottom.location.reload();
                        $("#conbranchform")[0].reset();
                    },
                    error:function(xhr,status,error){
                        alert("AJAX Error: " + error);
                    }
                })
            })
            $("#cityname").autocomplete({
            source: function(request, response) {
                $.ajax({
                url: "consultantbranchclass.php",
                type: "GET",
                dataType: "json",
                data: {
                    hospitalterm: request.term
                },
                success: function(data) {
                    response(data);
                }
                });
            },
            select: function(event, ui) {
                $('#cityid').val(ui.item.hospitalid); 
            }
            });
            </script>
</body>
</html>
