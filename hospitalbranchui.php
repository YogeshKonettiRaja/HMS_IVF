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
           <form action="hospitalbranchclass.php" name="branchform" id="branchform">
            <div class="mb-3" style="text-align:center;font-size:20px;background-color:#ec008c;color:white;padding:5px;">Hospital City Form</div>
                <fieldset>
                <div class="row">
                <div class="col-4">
                    <label for="hospitalcityname" class="form-label">&nbsp;</label>
                </div>
                <div class="col-3">
                    <label for="hospitalcityname" class="form-label">Hospital City Name</label>
                    <input type="text" class="form-control" name="hospitalcityname" id="hospitalcityname" placeholder="Enter Hospital City Name">
                </div>
                <div class="col-3">
                    <button type="button" name="cityinserted" style="margin-top:30px;background-color:#96488b;color:white;" id="cityinserted" class="btn btn-primary">Add City</button>
                </div>
                </div>
                </fieldset>
           </form>
</body>
<script>
$('#cityinserted').on("click",function(){
    $.ajax({
        url :"hospitalbranchclass.php",
        type:"POST",
        dataType:"json",
        data:{
             cityinserted: true,
             hospitalcityname     : $("#hospitalcityname").val()
        },
        success:function(data){
            alert("Hospital City Added Successfully");
            parent.bottom.location.reload();
            $("#branchform")[0].reset();
        },
        error:function(xhr,status,error){
            alert("AJAX Error: " + error);
        }
    });
});
</script>
</html>