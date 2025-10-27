
// validation 

$(document).ready(function () {

    // Validate signup
    let dobError = false;
    let usernameError = false;
    let emailError = false;
    let passworError = false;
    let conpassworError = false;
    let myCheckboxerror = false;

    let chaptcha = false;

    // let pincodeerror = false;

    $(".username").keyup(function () {
        validateusername();
    });

    $(".chaptcha").keyup(function () {
        validatechapcha();
    });

    $(".dob").on('input', function () {
        validatedob();
    });

    $(".gender").change(function () {
        validategender();
      });

    $("#email").keyup(function () {
        validateemail();
    });

    $("#password").keyup(function () {
        validatepassword();
    });

    $("#confirm-password").keyup(function () {
        validateconpassword();
    });

    $('input[name="myCheckbox"]').change(function () {
        validatemyCheckbox();
    });

    function validateusername() {
        let usernameValue = $(".username").val();
        if (usernameValue.trim() == "") {
            $(".usernameerror").html("Please Enter Display Name");
            $(".usernameerror").show();
            usernameError = false;
            checkings();
            return false;
        } else {
            $(".usernameerror").hide();
            usernameError = true;
            checkings();
        }
    }

    function validategender() {
        let genderValue = $(".gender").val();
        if (genderValue === null || genderValue === "") {
          $(".genderError").html("Please select a Gender.");
          $(".genderError").show();
          return false;
        }
        $(".genderError").hide();
        return true;
      }

    function validatechapcha() {
        let chaptchaValue = $(".chaptcha").val();
        $('#chapmessage').html('');
        $('#chapmessage').show();
        if (chaptchaValue.length == "") {
          $("#chapmessage").html("Please Enter Captcha");
          $("#chapmessage").show();
          chaptcha = false;
          checkings();
          return false;
        } else {
          $("#chapmessage").hide();
          chaptcha = true;
          checkings();
        }
      }

    function checkings() {
        console.log(usernameError, dobError, emailError,
            passworError, conpassworError, myCheckboxerror);
        if (usernameError == true && dobError == true && emailError == true &&
            passworError == true && conpassworError == true && myCheckboxerror == true && chaptcha == true) {

        } else {

        }
    }

    $(document).on('click', '.sign', function () {
        var email = $('#email').val();
        var dob = $('.dob').val();
        var username = $('.username').val();
        var password = $('#password').val();
        var confirmpassword = $('#confirm-password').val();
        var myCheckbox = $('#myCheckbox').val();
        event.preventDefault();
        if (usernameError == true && dobError == true && emailError == true &&
            passworError == true && conpassworError == true && myCheckboxerror == true && chaptcha == true) {
            $('.loading-spinner').show();
            $(".validchapcha").click();
        } else {
            $('.loading-spinner').hide();
            validatemyCheckbox();
            validateconpassword();
            validatedob();
            validateusername();
            validateemail();
            validatepassword();
            validatechapcha();
            validategender();
        }
    });
    $('.dob,.username,#email,#password,#confirm-password,#myCheckbox,.chaptcha,.gender').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.sign').click();
            return false;
        }
    });

    function validatedob() {
        let dobValue = $(".dob").val();
        if (dobValue.trim() == "") {
            $(".doberror").html("Please Enter DOB");
            $(".doberror").show();
            dobError = false;
            checkings();
            return false;
        } else {
            $(".doberror").hide();
            dobError = true;
            checkings();
        }
    }


    function validateemail() {
        let emailValue = $("#email").val();
        $("#save_data").html("");
        $("#save_data").show();
        if (emailValue.trim() == "") {
            $("#emailerror").html("Please Enter Email");
            $("#emailerror").show();
            emailError = false;
            checkings();
            return false;
        } else {
            let emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            if (!emailRegex.test(emailValue.trim())) {
                $("#emailerror").html("Please Enter Valid Email");
                $("#emailerror").show();
                emailError = false;
                checkings();
                return false;
            } else {
                $("#emailerror").hide();
                emailError = true;
                checkings();
            }
        }
    }

    function validatemyCheckbox() {
        let submitloginValue = $('input[name="myCheckbox"]:checked').val();
        if (!submitloginValue) {
            $(".myCheckboxerror").html("Please Agree To Terms And Conditions");
            $(".myCheckboxerror").show();
            myCheckboxerror = false;
            checkings();
            return false;
        } else {
            $(".myCheckboxerror").hide();
            myCheckboxerror = true;
            checkings();
        }
    }

    $("#password").keyup(function () {
        validatepassword();
    });

    function validatepassword() {
        let passwordValue = $("#password").val();
        if (passwordValue.length == "") {
            $("#passworderror").html("Plase Enter Password");
            $("#passworderror").show();
            passworError = false;
            checkings();
            return false;
        }
        if (passwordValue.length < 4 || passwordValue.length > 20) {
            $("#passworderror").show();
            $("#passworderror").html(
                "Password must be between 4 and 20"
            );
            $("#passworderror").css("color", "#b74e6d");
            passworError = false;
            checkings();
            return false;
        } else {
            $("#passworderror").hide();
            passworError = true;
            checkings();
        }
    }

    function validateconpassword() {
        let confirmPasswordValue = $("#confirm-password").val();
        let passwordValue = $("#password").val();
        if (confirmPasswordValue.length == "") {
            $("#conpassword").html("Plase Enter Confirm Password");
            $("#conpassword").show();
            conpassworError = false;
            checkings();
            return false;
        }
        if (passwordValue !== confirmPasswordValue) {
            $("#conpassword").show();
            $("#conpassword").html("*Password didn't Match");
            $("#conpassword").css("color", "#b74e6d");
            conpassworError = false;
            checkings();
            return false;
        } else {
            $("#conpassword").hide();
            conpassworError = true;
            checkings();
        }
    }





});

// end function 


// forgot password
$(document).ready(function () {
    let forgotEmailError = false;

    $(".forgotEmail").keyup(function () {
        validateForgotEmail();
    });

    function validateForgotEmail() {
        let emailValue = $(".forgotEmail").val().trim();
        if (emailValue == "") {
            $(".forgotEmailError").html("Please Enter Email");
            $(".forgotEmailError").show();
            forgotEmailError = false;
            forgotCheckings();
            return false;
        } else {
            let emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            if (!emailRegex.test(emailValue)) {
                $(".forgotEmailError").html("Please Enter Valid Email");
                $(".forgotEmailError").show();
                forgotEmailError = false;
                forgotCheckings();
                return false;
            } else {
                $(".forgotEmailError").hide();
                forgotEmailError = true;
                forgotCheckings();
            }
        }
    }

    function forgotCheckings() {
        console.log(forgotEmailError);
        if (forgotEmailError == true) {
            // Do something if email is valid
        } else {
            // Do something if email is invalid
        }
    }

    $(document).on('click', '.forgotlinkCheck', function (event) {
        var email = $('.forgotEmail').val();
        event.preventDefault();
        if (forgotEmailError == true) {
            $('.loading-spinner').show();
            $(".forgotlinkSend").click();
        } else {
            $('.loading-spinner').hide();
            validateForgotEmail();
        }
    });

    $('.forgotEmail').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.forgotlinkCheck').click();
            return false;
        }
    });
});
// forgot password end


// step2
$(document).ready(function () {

    // Validate signup
    let steptwodobError = false;
    let steptwomyCheckboxerror = false;
    let steptwochaptcha = false;

    $(".steptwochaptcha").keyup(function () {
        validatesteptwochapcha();
    });

    $(".steptwodob").on('input', function () {
        validatesteptwodob();
    });

    $(".steptwogender").change(function () {
        validatesteptwogender();
      });

    $('input[name="steptwomyCheckbox"]').change(function () {
        validatesteptwomyCheckbox();
    });

 

    function validatesteptwogender() {
        let gendersteptwoValue = $(".steptwogender").val();
        if (gendersteptwoValue === null || gendersteptwoValue === "") {
          $(".steptwogenderError").html("Please select a Gender.");
          $(".steptwogenderError").show();
          return false;
        }
        $(".steptwogenderError").hide();
        return true;
      }

    function validatesteptwochapcha() {
        let chaptchaValue = $(".steptwochaptcha").val();
        $('#steptwochapmessage').html('');
        $('#steptwochapmessage').show();
        if (chaptchaValue.length == "") {
          $("#steptwochapmessage").html("Please Enter Captcha");
          $("#steptwochapmessage").show();
          steptwochaptcha = false;
          checkingssteptwo();
          return false;
        } else {
          $("#steptwochapmessage").hide();
          steptwochaptcha = true;
          checkingssteptwo();
        }
      }

    function checkingssteptwo() {
        console.log( steptwodobError, steptwomyCheckboxerror);
        if (steptwodobError == true && steptwomyCheckboxerror == true && steptwochaptcha == true) {

        } else {

        }
    }

    $(document).on('click', '.steptwosign', function () {
        var steptwodob = $('.steptwodob').val();
        var steptwomyCheckbox = $('#myCheckbox').val();
        event.preventDefault();
        if (steptwodobError == true && steptwomyCheckboxerror == true && steptwochaptcha == true) {
            $('.loading-spinner').show();
            $(".validchapchasteptwo").click();
        } else {
            $('.loading-spinner').hide();
            validatesteptwomyCheckbox();
            validatesteptwodob();
            validatesteptwochapcha();
            validatesteptwogender();
        }
    });
    $('.steptwodob,,#steptwomyCheckbox,.steptwochaptcha,.steptwogender').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.steptwosign').click();
            return false;
        }
    });

    function validatesteptwodob() {
        let dobsteptwoValue = $(".steptwodob").val();
        if (dobsteptwoValue.trim() == "") {
            $(".steptwodoberror").html("Please Enter DOB");
            $(".steptwodoberror").show();
            steptwodobError = false;
            checkingssteptwo();
            return false;
        } else {
            $(".steptwodoberror").hide();
            steptwodobError = true;
            checkingssteptwo();
        }
    }

    function validatesteptwomyCheckbox() {
        let submitsteptwologinValue = $('input[name="steptwomyCheckbox"]:checked').val();
        if (!submitsteptwologinValue) {
            $(".steptwomyCheckboxerror").html("Please Agree To Terms And Conditions");
            $(".steptwomyCheckboxerror").show();
            steptwomyCheckboxerror = false;
            checkingssteptwo();
            return false;
        } else {
            $(".steptwomyCheckboxerror").hide();
            steptwomyCheckboxerror = true;
            checkingssteptwo();
        }
    }


   
});
// end step2