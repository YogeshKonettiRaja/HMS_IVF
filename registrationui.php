<html>
    <head>
        <title>Registration Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    </head>
    <body>
           <form action="registrationclass.php" name="regform" id="regform" style="margin:0px;">
            <div class="mb-3" style="text-align:center;font-size:20px;background-color:#ec008c;color:white;padding:5px;">Patient Registration Form</div>
        <fieldset>
            <div class="row">
                <div class="col-3">
                    <label for="fname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Full Name">
                </div>
                <div class="col-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" class="form-control" id="age" name="age" placeholder="Enter Age">
                </div>
                <div class="col-3">
                <label for="age" class="form-label">Gender</label>
                    <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                        <option selected>Select Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="martial" class="form-label">Martial Status</label>
                    <select class="form-select" name="martial" id="martial" aria-label="Default select example">
                        <option selected>Select Martial Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                </div>
                <div class="col-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                </div>
                <div class="col-3">
                    <label for="phone" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control" id="phone" name="phone" oninput="this.value = this.value.slice(0, 10)" placeholder="Enter Mobile Number">
                </div>
                <div class="col-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-3">
                    <label for="Nationality" class="form-label">Nationality</label>
                    <input type="text" class="form-control" id="Nationality" name="Nationality" placeholder="Enter Nationality">
                </div>
                <div class="col-3">
                    <label for="Occupation" class="form-label">Occupation</label>
                    <input type="text" class="form-control" id="Occupation" name="Occupation" placeholder="Enter Occupation">
                </div>
                <div class="col-3">
                    <label for="ecn" class="form-label">Emergency Contact Name</label>
                    <input type="text" class="form-control" id="ecn" name="ecn" placeholder="Enter Emergency Contact Name">
                </div>
                <div class="col-3">
                    <label for="ecr" class="form-label">Emergency Contact Relationship</label>
                    <input type="text" class="form-control" id="ecr" name="ecr" placeholder="Enter Emergency Contact Relationship">
                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-3">
                    <label for="ecnum" class="form-label">Emergency Contact Number</label>
                    <input type="text" class="form-control" id="ecnum" name="ecnum" placeholder="Enter Emergency Contact Number">
                </div>
        </div>
        </fieldset>
        <hr>
        <fieldset>
           <legend style="text-align:left;color:#96488b;">Partner Information (optional if applicable)</legend>
           <div class="row">
                <div class="col-3">
                    <label for="pfn" class="form-label">Partner Full Name</label>
                    <input type="text" class="form-control" id="pfn" name="pfn" placeholder="Enter Partner Full Name">
                </div>
                <div class="col-3">
                    <label for="pdob" class="form-label">Partner Date of Birth</label>
                    <input type="date" class="form-control" id="pdob" name="pdob" placeholder="Enter Partner Date of Birth">
                </div>
                <div class="col-3">
                    <label for="ppn" class="form-label">Partner Phone Number</label>
                    <input type="text" class="form-control" id="ppn" name="ppn" placeholder="Enter Partner Phone Number">
                </div>
                <div class="col-3">
                    <label for="po" class="form-label">Partner Occupation</label>
                    <input type="text" class="form-control" id="po" name="po" placeholder ="Enter Partner Occupation">
                </div>
            </div>
            </fieldset>
            <hr>
            <fieldset>
             <legend style="text-align:left;color:#96488b;">Medical History</legend>
             <div class="row">
                <div class="col-3">
                    <label for="bg" class="form-label">Blood Group</label>
                    <select class="form-select" name="bg" id="bg" aria-label="Default select example">
                        <option selected>Select Blood Group</option>
                        <option value="A⁺">A⁺</option>
                        <option value="A⁻">A⁻</option>
                        <option value="B⁺">B⁺</option>
                        <option value="B⁻">B⁻</option>
                        <option value="AB⁺">AB⁺</option>
                        <option value="AB⁻">AB⁻</option>
                        <option value="O⁺">O⁺</option>
                        <option value="O⁻">O⁻</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="allergy" class="form-label">Do you have any allergies ?</label>
                    <input type="text" class="form-control" id="allergy" name="allergy" placeholder="Enter Allergies">
                </div>
                <div class="col-3">
                    <label for="meditation" class="form-label">Do you take any medications ?</label>
                    <input type="text" class="form-control" id="meditation" name="meditation" placeholder="Enter Medications">
                </div>
                <div class="col-3">
                    <label for="surhos" class="form-label">Any past surgeries/hospitalizations ?</label>
                    <input type="text" class="form-control" id="surhos" name="surhos" placeholder="Enter past surgeries/hospitalizations">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label for="chrodis" class="form-label">Do you have chronic diseases ?</label>
                    <input type="text" class="form-control" id="chrodis" name="chrodis" placeholder="Enter Chronic diseases ">
                </div>
            </div>
            </fieldset>
            <hr>
            <fieldset>
                <legend style="text-align:left;color:#96488b;">Reproductive Health (for Female Patient)</legend>
            <div class="row">
                <div class="col-3">
                    <label for="firmen" class="form-label">Age at first menstruation</label>
                    <input type="number" class="form-control" id="firmen" name="firmen" placeholder="Enter first menstruation">
                </div>
                 <div class="col-3">
                    <label for="cr" class="form-label">Are your cycles regular?</label>
                    <select class="form-select" name="cr" id="cr" aria-label="Default select example">
                        <option selected>Select cycles regular</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="cld" class="form-label">Cycle length (days)</label>
                    <input type="number" class="form-control" id="cld" name="cld" placeholder="Enter Cycle length">
                </div>
                 <div class="col-3">
                    <label for="pd" class="form-label">Any menstrual pain/discomfort?</label>
                    <select class="form-select" name="pd" id="pd" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label for="pp" class="form-label">Any previous pregnancies ?</label>
                    <select class="form-select" name="pp" id="pp" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="pft" class="form-label">Previous fertility treatments ?</label>
                    <input type="text" class="form-control" id="pft" name="pft" placeholder="Enter Previous fertility treatments">
                </div>
                <div class="col-3">
                    <label for="diagnosed" class="form-label">Have you been diagnosed with PCOS, endometriosis, etc.?</label>
                    <input type="text" class="form-control" id="diagnosed" name="diagnosed" placeholder="Enter diagnosed with PCOS ...">
                </div>
            </div>
            </fieldset>
            <hr>
            <fieldset>
                <legend style="text-align:left;color:#96488b;">Partner Fertility (for Male Partner)</legend>
                <div class="row">
                        <div class="col-3">
                            <label for="semen" class="form-label">Have you had a Semen analysis ?</label>
                            <input type="text" class="form-control" id="semen" name="semen" placeholder="Enter Semen analysis">
                        </div>
                        <div class="col-3">
                            <label for="surgeries" class="form-label">History of reproductive surgeries, infections, or injuries ?</label>
                            <input type="text" class="form-control" id="surgeries" name="surgeries" placeholder="Enter History of reproductive surgeries ...">
                        </div>
                        <div class="col-3">
                            <label for="alcohol" class="form-label">Do you smoke or drink alcohol ?</label>
                            <select class="form-select" name="alcohol" id="alcohol" aria-label="Default select example">
                                <option selected>Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                </div>
            </fieldset> 
            <hr>
            <fieldset>
                <legend style="text-align:left;color:#96488b;">Family History</legend>
            <div class="row">
                <div class="col-3">
                    <label for="disorders" class="form-label">Any genetic disorders in family ?</label>
                    <input type="text" class="form-control" id="disorders" name="disorders" placeholder="Enter genetic disorders in family">
                </div>
                <div class="col-3">
                    <label for="infertility" class="form-label">Any infertility issues in family?</label>
                    <input type="text" class="form-control" id="infertility" name="infertility" placeholder="Enter infertility issues in family">
                </div>
            </div>
            </fieldset>
            <hr>  
            <fieldset>
                <legend style="text-align:left;color:#96488b;">Insurance/Payment Info</legend>
                <div class="row">
                        <div class="col-3">
                            <label for="insurance" class="form-label">Do you have insurance coverage? </label>
                            <select class="form-select" name="insurance" id="insurance" aria-label="Default select example">
                                <option selected>Select insurance coverage</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="iProvider" class="form-label">Insurance Provider Name</label>
                            <input type="text" class="form-control" id="iProvider" name="iProvider" placeholder="Enter Insurance Provider Name">
                        </div>
                        <div class="col-3">
                            <label for="policy" class="form-label">Policy Number</label>
                            <input type="text" class="form-control" id="policy" name="policy" placeholder="Enter Policy Number">
                        </div>
                        <div class="col-3">
                            <label>Date of Registration</label>
                            <input type="date" class="form-control"  name="dater" id="dater">
                        </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <label>
                            <input type="checkbox" name="consent" id="consent" required>
                            I consent to treatment and data usage.
                        </label>
                    </div>
                </div>
            </fieldset>
            <button type="button" style="margin-left: 42%;" name="inserted" id="inserted" class="btn btn-primary">Register</button>
           </form>
           <script>
           $(document).ready(function () {
                    $("#inserted").on("click", function () {
                        $.ajax({
                            url: "registrationclass.php",
                            type: "POST",
                            dataType: "json",
                            data: {
                                patientreg: true,
                                fname     : $("#fname").val(),
                                age       : $("#age").val(),
                                gender    : $("#gender").val(),
                                address   : $("#address").val(),
                                city      : $("#city").val(),
                                phone     : $("#phone").val(),
                                martial   :$("#martial").val(),
                                email     :$("#email").val(),
                                Nationality :$("#Nationality").val(),
                                Occupation  :$("#Occupation").val(),
                                ecn         :$("#ecn").val(),
                                ecr         :$("#ecr").val(),
                                ecnum       :$("#ecnum").val(), 
                                pfn         :$("#pfn").val(),
                                pdob:$("#pdob").val(),
                                ppn:$("#ppn").val(),
                                po:$("#po").val(),
                                bg:$("#bg").val(),
                                allergy:$("#allergy").val(),
                                meditation:$("#meditation").val(),
                                surhos:$("#surhos").val(),
                                chrodis:$("#chrodis").val(),
                                firmen:$("#firmen").val(),
                                cr:$("#cr").val(),
                                cld:$("#cld").val(),
                                pd:$("#pd").val(),
                                pp:$("#pp").val(),
                                pft:$("#pft").val(),
                                diagnosed:$("#diagnosed").val(),
                                semen:$("#semen").val(),
                                surgeries:$("#surgeries").val(),
                                alcohol:$("#alcohol").val(),
                                disorders:$("#disorders").val(),
                                infertility:$("#infertility").val(),
                                insurance:$("#insurance").val(),
                                iProvider:$("#iProvider").val(),
                                policy:$("#policy").val(),
                                dater:$("#dater").val(),
                                consent:$("#consent").val()
                            },
                            success: function (data) {
                                if (data.response) {
                                    alert("Patient Register successfully");
                                    $("#regform")[0].reset();
                                    parent.location.reload();
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
