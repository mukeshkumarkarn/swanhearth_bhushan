// register Admin
$(document).ready(function () {


    let FisrtNameError = false;
    let LastNameNameError = false;
    let AdminemailError = false;
    let genderError = false;

    $(".first-name").keyup(function () {
        validatefirstname();
    });


    $(".last-name").keyup(function () {
        validatelastname();
    });

    $(".Adminemail").keyup(function () {
        validateAdminemail();
    });

    $(".gender").change(function () {
        validateAdmingender();
    });

    function validatefirstname() {
        let firstnameValue = $(".first-name").val();
        if (firstnameValue.trim() == "") {
            $(".firstNameError").html("Please Enter First Name");
            $(".firstNameError").show();
            FisrtNameError = false;
            AdminRegistercheckings();
            return false;
        } else {
            $(".firstNameError").hide();
            FisrtNameError = true;
            AdminRegistercheckings();
        }
    }

    function validatelastname() {
        let lastnameValue = $(".last-name").val();
        if (lastnameValue.trim() == "") {
            $(".lastNameError").html("Please Enter Last Name");
            $(".lastNameError").show();
            LastNameNameError = false;
            AdminRegistercheckings();
            return false;
        } else {
            $(".lastNameError").hide();
            LastNameNameError = true;
            AdminRegistercheckings();
        }
    }

    function validateAdminemail() {
        let AdminemailValue = $(".Adminemail").val();
        if (AdminemailValue.trim() == "") {
            $(".AdminEmailError").html("Please Enter Email");
            $(".AdminEmailError").show();
            AdminemailError = false;
            AdminRegistercheckings();
            return false;
        } else {
            let emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            if (!emailRegex.test(AdminemailValue.trim())) {
                $(".AdminEmailError").html("Please Enter Valid Email");
                $(".AdminEmailError").show();
                AdminemailError = false;
                AdminRegistercheckings();
                return false;
            } else {
                $(".AdminEmailError").hide();
                AdminemailError = true;
                AdminRegistercheckings();
            }
        }
    }

    function validateAdmingender() {
        let genderValue = $(".gender").val();
        if (genderValue === null || genderValue === "") {
            $(".genderError").html("Please select a Gender.");
            $(".genderError").show();
            return false;
        }
        $(".genderError").hide();
        return true;
    }


    setTimeout(function () {
        validatefirstname();
        validatelastname();
        validateAdminemail();
        validateAdmingender();
    }, 2000);

    function AdminRegistercheckings() {
        console.log(FisrtNameError, LastNameNameError, AdminemailError);
        if (FisrtNameError == true && LastNameNameError == true && AdminemailError == true) {

        } else {

        }
    }

    $(document).on('click', '.AdminRegiterCheck-update', function () {
        event.preventDefault();
        if (FisrtNameError == true && LastNameNameError == true && AdminemailError == true) {
            $('.loading-spinner').show();
            $(".AdminRegiterSubmit-update").click();
        } else {
            $('.loading-spinner').hide();
            validatefirstname();
            validatelastname();
            validateAdminemail();
            validateAdmingender();
        }
    });

    $('.first-name,.last-name,.Adminemail').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.AdminRegiterCheck-update').click();
            return false;
        }
    });

});
// end register admin