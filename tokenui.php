<html>
    <head>
        <title>Token Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    </head>
    <body>
           <form action="tokenclass.php" name="tokenform" id="tokenform">
             <div class="mb-3" style="text-align:center;font-size:20px;background-color:#ec008c;color:white;padding:5px;">Token / Appointment Schedule</div>
            <fieldset>
            <div class="row">
            <div class="col-3">
                <label for="appdate" class="form-label">Future Appointment Date</label>
                <input type="date" class="form-control" name="appdate" id="appdate">
            </div>
            <div class="col-3">
                <label for="regno" class="form-label">Reg No</label>
                <input type="text" class="form-control" name="regno" id="regno" placeholder="Select Regno">
            </div>
            <div class="col-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Select Name">
            </div>
            <div class="col-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Enter Age" readonly>
            </div>
            </div><br>
            <div class="row">
             <div class="col-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" readonly>
            </div>
            <div class="col-3">
                <label for="branch" class="form-label">Hospital City</label>
                <input type="text" class="form-control" id="branch" name="branch" placeholder="Select Hospital City">
                <input type="hidden" class="form-control" id="branchid" name="branchid">
            </div>
            <div class="col-3">
                <label for="consultant" class="form-label">Consultant</label>
                <input type="text" class="form-control" id="consultant" name="consultant" placeholder="Select Consultant">
                <input type="hidden" class="form-control" id="consultantid" name="consultantid" >
            </div>
            </div><br>
            <div class="row">
                 <div class="col-4">
                    <span>&nbsp;</span>
                </div>
                <div class="col-2">
                    <button type="button" name="tokeninserted" id="tokeninserted" class="btn btn-primary">Token Schedule</button>
                </div>
                <div class="col-2">
                    <button type="button" name="appointementinserted" id="appointementinserted" class="btn btn-success">Book Appointment</button>
                </div>
            </div>
            </fieldset>
           </form>
           <script>
            // token Booking
            $('#tokeninserted').on("click",function(){
            $.ajax({
                url :"tokenclass.php",
                type:"POST",
                dataType :"JSON",
                data :{
                    tokeninserted :true,
                    appdate      : $("#appdate").val(),
                    regno        : $("#regno").val(),
                    consultantid: $("#consultantid").val()
                },
                success:function(data){
                    alert("Token Scheduled Successfully");
                    $("#tokenform")[0].reset();
                    parent.location.reload();
                },
                error:function (xhr, status, error) {
                    alert("AJAX Error: " + error);
                 }
            });
            });
            // Apppointemnt Booking
            $('#appointementinserted').on("click",function(){
            $.ajax({
                url :"tokenclass.php",
                type:"POST",
                dataType :"JSON",
                data :{
                    appointementinserted :true,
                    appdate      : $("#appdate").val(),
                    regno        : $("#regno").val(),
                    consultantid: $("#consultantid").val()
                },
                success:function(data){
                    alert("Future Appointment Booked Successsfully");
                    $("#tokenform")[0].reset();
                    parent.location.reload();
                },
                error:function (xhr, status, error) {
                    alert("AJAX Error: " + error);
                 }
            });
            })
// For displaying the current date and past date disabled.
             document.addEventListener('DOMContentLoaded', function () {
                const today     = new Date().toISOString().split('T')[0];
                const dateInput = document.getElementById('appdate');
                dateInput.value = today;      
                dateInput.min   = today;       
            });

// Patient regno autocomplete
            $("#regno").autocomplete({
            source: function(request, response) {
                $.ajax({
                url: "tokenclass.php",
                type: "GET",
                dataType: "json",
                data: {
                    term: request.term // this is what jQuery normally sends automatically
                },
                success: function(data) {
                    response(data);
                }
                });
            },
            select: function(event, ui) {
                // This fires when an item is selected from the autocomplete list
                $('#name').val(ui.item.name); 
                $('#age').val(ui.item.age);
                $('#city').val(ui.item.city);
            }
            });
             // Clear related fields when name is cleared manually
            $('#regno').on('input', function () {
                if (!this.value.trim()) {
                    $('#age').val('');
                    $('#name').val('');
                    $('#city').val('');
                }
            });

// Patient name autocomplete
            $('#name').autocomplete({
                source:function(request,response){
                    $.ajax({
                        url:"tokenclass.php",
                        type:"GET",
                        dataType: "json",
                        data:{
                           termname : request.term
                        },
                        success:function(data) {
                           response(data);
                        }
                    })
                },
                select:function(event, ui) {
                    $('#age').val(ui.item.age);
                    $('#regno').val(ui.item.regid);
                    $('#city').val(ui.item.city);
                }
            })
            // Clear related fields when name is cleared manually
            $('#name').on('input', function () {
                if (!this.value.trim()) {
                    $('#age').val('');
                    $('#regno').val('');
                    $('#city').val('');
                }
            });
//Hospital Branch based doctor displaying
             $('#branch').autocomplete({
                source:function(request,response){
                    $.ajax({
                        url:"tokenclass.php",
                        type:"GET",
                        dataType: "json",
                        data:{
                           termbranch : request.term
                        },
                        success:function(data) {
                           response(data);
                        }
                    })
                },
                select:function(event, ui) {
                    $('#branchid').val(ui.item.branchid);
                    let branchname = ui.item.value;
                    let branchid = ui.item.branchid;
                    // Fetch doctors for selected branchname
                    $.ajax({
                        url: "tokenclass.php",
                        type: "GET",
                        dataType: "json",
                        data: {
                            branchname: branchname,
                            branchid :branchid,
                            getConsultants: true
                        },
                        success: function(datarender) {
                            $('#consultant').autocomplete({
                                source: datarender,
                                select: function(event, ui) {
                                    $('#consultantid').val(ui.item.consultantid); // hidden field
                                }
                            });
                        }
                    });
                }
            })
          
            </script>
    </body>
</html>