// register Admin
$(document).ready(function () {


    let FisrtNameError = false;
    let LastNameNameError = false;
    let AdminemailError = false;
    let AdminpassworError = false;
    let AdminconpassworError = false;

    $(".first-name").keyup(function () {
        validatefirstname();
    });


    $(".last-name").keyup(function () {
        validatelastname();
    });

    $(".Adminemail").keyup(function () {
        validateAdminemail();
    });

    $(".Adminpassword").keyup(function () {
        validateAdminpasswords();
    });

    $(".gender").change(function () {
        validateAdmingender();
    });

    $(".AdminConfirmPassword").keyup(function () {
        validateAdminConfirmPasswords();
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



    function AdminRegistercheckings() {
        console.log(FisrtNameError, LastNameNameError, AdminemailError,
            AdminpassworError, AdminconpassworError);
        if (FisrtNameError == true && LastNameNameError == true && AdminemailError == true &&
            AdminpassworError == true && AdminconpassworError == true) {

        } else {

        }
    }

    $(document).on('click', '.AdminRegiterCheck', function () {
        event.preventDefault();
        if (FisrtNameError == true && LastNameNameError == true && AdminemailError == true &&
            AdminpassworError == true && AdminconpassworError == true) {
            $('.loading-spinner').show();
            $(".AdminRegiterSubmit").click();
        } else {
            $('.loading-spinner').hide();
            validatefirstname();
            validatelastname();
            validateAdminemail();
            validateAdmingender();
            validateAdminpasswords();
            validateAdminConfirmPasswords();
        }
    });

    $('.first-name,.last-name,.Adminemail,.Adminpassword,.AdminConfirmPassword').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.AdminRegiterCheck').click();
            return false;
        }
    });


    function validateAdminpasswords() {
        let adminpassValue = $(".Adminpassword").val();
        if (adminpassValue.length == "") {
            $(".AdminPasswordError").html("Plase Enter Password");
            $(".AdminPasswordError").show();
            AdminpassworError = false;
            AdminRegistercheckings();
            return false;
        }
        if (adminpassValue.length < 4 || adminpassValue.length > 20) {
            $(".AdminPasswordError").show();
            $(".AdminPasswordError").html(
                "Password must be between 4 and 20"
            );
            $(".AdminPasswordError").css("color", "#b74e6d");
            AdminpassworError = false;
            AdminRegistercheckings();
            return false;
        } else {
            $(".AdminPasswordError").hide();
            AdminpassworError = true;
            AdminRegistercheckings();
        }
    }

    function validateAdminConfirmPasswords() {
        let adminconfirmPassValue = $(".AdminConfirmPassword").val();
        let adminpassValue = $(".Adminpassword").val();
        if (adminconfirmPassValue.length == "") {
            $(".AdminConfirmPasswordError").html("Plase Enter Confirm Password");
            $(".AdminConfirmPasswordError").show();
            AdminconpassworError = false;
            AdminRegistercheckings();
            return false;
        }
        if (adminpassValue !== adminconfirmPassValue) {
            $(".AdminConfirmPasswordError").show();
            $(".AdminConfirmPasswordError").html("*Password didn't Match");
            $(".AdminConfirmPasswordError").css("color", "#b74e6d");
            AdminconpassworError = false;
            AdminRegistercheckings();
            return false;
        } else {
            $(".AdminConfirmPasswordError").hide();
            AdminconpassworError = true;
            AdminRegistercheckings();
        }
    }

});
// end register admin