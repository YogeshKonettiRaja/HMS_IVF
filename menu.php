<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVF Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body style="background:url('ui1.jpeg') no-repeat fixed center;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="IVF.png" style="width:130px;height:50px;">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="margin-left:80px;">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color:#e21212d6;" href="#" onclick="loadFrame('registration/registrationframe.php')">Registration</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" style="color:#e21212d6;" href="#" onclick="loadFrame('token/tokenframe.php')">Token</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#e21212d6;" href="#" onclick="loadFrame('siteview/siteviewframe.php')">Doctor View</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#e21212d6;" href="#" onclick="loadFrame('prescription/prescriptionframe.php')">Prescription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#e21212d6;" href="#" onclick="loadFrame('reports/reportsframe.php')">Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#e21212d6;" href="#" onclick="loadFrame('consultantconfig/consultantbranchframe.php')">Consultant Config</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#e21212d6;" href="#" onclick="loadFrame('hospitalbranch/hospitalbranchframe.php')">Hospital City Config</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#e21212d6;" href="#" onclick="loadFrame('medicineconfig/medicineframe.php')">Medicine Config</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<marquee behavior="scroll" direction="left" scrollamount="5" class="text-primary fw-bold">
  "Creating Families, One Miracle at a Time." &nbsp;&nbsp;&nbsp;
  "Where Science Meets the Miracle of Life." &nbsp;&nbsp;&nbsp;
  "The Heartbeat of Parenthood Begins Here." &nbsp;&nbsp;&nbsp;
  "You may not have chosen this path, but it may lead you to everything you’ve hoped for." &nbsp;&nbsp;&nbsp;
  "IVF gives hope when life says wait."
</marquee>

<div id="welcome" style="font-family:Sans-serif;text-align: center; margin: 30px 0; font-size: 45px; font-weight: bold; color:rgb(253, 13, 137);margin-top:170px;">
    WELCOME TO IVF FERTILITY HOSPITAL
</div>
<!-- Container for dynamic content -->
<div class="container-fluid">
  <iframe id="contentFrame" src="" style="width: 100%; height:210px; border: none;"></iframe>
</div>
<script>
  function loadFrame(url) 
  {
    document.getElementById('contentFrame').src = url;
    document.getElementById('welcome').style.display = 'none';
    document.querySelector("body").style = '';
    document.getElementById('contentFrame').style.height = '480px';
  }
</script> 
</body>
</html>