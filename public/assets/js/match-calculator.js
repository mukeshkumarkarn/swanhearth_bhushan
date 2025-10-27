
// validation 

$(document).ready(function () {

    // Validate signup
    let txtNumerologyNameError = false;
    let txtNumerologyDOBError = false;
    let txtNumerologyCrushNameError = false;
    let txtNumerologyCrushDOBError = false;


    $(".txtNumerologyName").keyup(function () {
        validatetxtNumerologyName();
    });

    $(".txtNumerologyDOB").on('change', function () {
        validatetxtNumerologyDOB();
    });

    $(".txtNumerologyCrushName").keyup(function () {
        validatetxtNumerologyCrushName();
    });

    $(".txtNumerologyCrushDOB").on('change', function () {
        validatetxtNumerologyCrushDOB();
    });

    function validatetxtNumerologyName() {
        let txtNumerologyName = $(".txtNumerologyName").val();
        if (txtNumerologyName.trim() == "") {
            $(".txtNumerologyNameError").html("Please enter your full name as per aadhar or birth certificate");
            $(".txtNumerologyNameError").show();
            txtNumerologyNameError = false;
            matchCalculetor();
            return false;
        } else {
            $(".txtNumerologyNameError").hide();
            txtNumerologyNameError = true;
            matchCalculetor();
        }
    }

    function validatetxtNumerologyDOB() {
        let txtNumerologyDOB = $(".txtNumerologyDOB").val();
        if (txtNumerologyDOB.trim() == "") {
            $(".txtNumerologyDOBError").html("Please enter your actual DOB");
            $(".txtNumerologyDOBError").show();
            txtNumerologyDOBError = false;
            matchCalculetor();
            return false;
        } else {
            $(".doberror").hide();
            txtNumerologyDOBError = true;
            matchCalculetor();
        }
    }

    function validatetxtNumerologyCrushName() {
        let txtNumerologyCrushName = $(".txtNumerologyCrushName").val();
        if (txtNumerologyCrushName.trim() == "") {
            $(".txtNumerologyCrushNameError").html("Please enter crush full name as per aadhar or birth certificate");
            $(".txtNumerologyCrushNameError").show();
            txtNumerologyCrushNameError = false;
            matchCalculetor();
            return false;
        } else {
            $(".txtNumerologyCrushNameError").hide();
            txtNumerologyCrushNameError = true;
            matchCalculetor();
        }
    }

    function validatetxtNumerologyCrushDOB() {
        let txtNumerologyCrushDOB = $(".txtNumerologyCrushDOB").val();
        if (txtNumerologyCrushDOB.trim() == "") {
            $(".txtNumerologyCrushDOBError").html("Please enter your crush actual DOB");
            $(".txtNumerologyCrushDOBError").show();
            txtNumerologyCrushDOBError = false;
            matchCalculetor();
            return false;
        } else {
            $(".doberror").hide();
            txtNumerologyCrushDOBError = true;
            matchCalculetor();
        }
    }


    function matchCalculetor() {
        console.log(txtNumerologyNameError, txtNumerologyDOBError, txtNumerologyCrushNameError,
            txtNumerologyCrushDOBError);
        if (txtNumerologyNameError == true && txtNumerologyDOBError == true && txtNumerologyCrushNameError == true &&
            txtNumerologyCrushDOBError == true) {

        } else {

        }
    }

    $(document).on('click', '.match-cal', function () {
        event.preventDefault();
        var csrf = $("[name=_token]").val();
        let txtNumerologyName = $(".txtNumerologyName").val();
        let txtNumerologyDOB = $(".txtNumerologyDOB").val();
        let txtNumerologyCrushName = $(".txtNumerologyCrushName").val();
        let txtNumerologyCrushDOB = $(".txtNumerologyCrushDOB").val();
        let radCountries = $(".radCountries:checked").val();
        let userId = $(".userId").val();
        var base_url = window.location.origin;
        var url = base_url + '/api/match-calculators';
        var option = "";
        if (txtNumerologyNameError == true && txtNumerologyDOBError == true && txtNumerologyCrushNameError == true &&
            txtNumerologyCrushDOBError == true) {
                jQuery.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        "txtNumerologyName": txtNumerologyName,
                        "txtNumerologyDOB" : txtNumerologyDOB,
                        "txtNumerologyCrushName": txtNumerologyCrushName,
                        "txtNumerologyCrushDOB" : txtNumerologyCrushDOB,
                        "radCountries" : radCountries,
                        "userId" : userId,
                        "_token": csrf
                    },
                    success: function (result) {
                        console.log(result.percentage);
                        $(".percent").html(result + '%');
                    }
                });
        } else {
            validatetxtNumerologyName();
            validatetxtNumerologyDOB();
            validatetxtNumerologyCrushName();
            validatetxtNumerologyCrushDOB();
        }
    });




    $('.txtNumerologyName,.txtNumerologyDOB,.txtNumerologyCrushName,.txtNumerologyCrushDOB').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.matchcalValidation').click();
            return false;
        }
    });



});

// end function 


$(document).ready(function () {

    // Validate signup
    let NumerologyNameValid = false;
    let crushnameValid = false;

    $(".NumerologyName").keyup(function () {
        NumerologyName();
    });

    $(".crushname").keyup(function () {
        CrushName();
    });

    function NumerologyName() {
        let NumerologyNames = $(".NumerologyName").val();
        if (NumerologyNames.trim() == "") {
            $(".NumerologyNameError").html("Please enter your full name");
            $(".NumerologyNameError").show();
            NumerologyNameValid = false;
            matchNameCalculator();
            return false;
        } else {
            $(".NumerologyNameError").hide();
            NumerologyNameValid = true;
            matchNameCalculator();
        }
    }

    function CrushName() {
        let crushnames = $(".crushname").val();
        if (crushnames.trim() == "") {
            $(".crushnameError").html("Please enter crush full name");
            $(".crushnameError").show();
            crushnameValid = false;
            matchNameCalculator();
            return false;
        } else {
            $(".crushnameError").hide();
            crushnameValid = true;
            matchNameCalculator();
        }
    }

    function matchNameCalculator() {
        console.log(NumerologyNameValid, crushnameValid);
        if (NumerologyNameValid && crushnameValid) {
            // Code to execute if both names are valid
        } else {
            // Code to execute if either name is not valid
        }
    }

    $(document).on('click', '.bynamecheck', function () {
        event.preventDefault();
        var csrf = $("[name=_token]").val();
        let txtNumerologyName = $(".NumerologyName").val();
        let txtNumerologyCrushName = $(".crushname").val();
        var base_url = window.location.origin;
        var url = base_url + '/api/match-calculators-name';
        var option = "";
        if (NumerologyNameValid && crushnameValid) {
            jQuery.ajax({
                type: 'post',
                url: url,
                data: {
                    "txtNumerologyName": txtNumerologyName,
                    "txtNumerologyCrushName": txtNumerologyCrushName,
                    "_token": csrf
                },
                success: function (result) {
                    console.log(result.percentages);
                    $(".percentages").html(result + '%');
                }
            });
        } else {
            NumerologyName();
            CrushName();
        }
    });

    $('.NumerologyName, .crushname').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.bynamecheck').click();
            return false;
        }
    });
});

//////


