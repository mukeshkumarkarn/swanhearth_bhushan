// validation 

$(document).ready(function () {

    // Validate login
    let adminemail = false;

    let adminpasswrd = false;

    let adminchaptcha = false;

    let myCheckboxadminerrorlogin = false;
    adminlogincheking();

    $(".adminEmail").keyup(function () {
        validateadminemaillogin();
    });

    $(".chaptchas").keyup(function () {
        validateadminchapcha();
    });

    $(".adminPassword").keyup(function () {
        validateadminloginpass();
    });



    $('input[name="myCheckboxlogin"]').change(function () {
        validateadminsubmitlogin();
    });

    function validateadminemaillogin() {
        let emailValue = $(".adminEmail").val();
        $('.invalid-feedback').hide();
        if (emailValue.length == "") {
            $(".adminEmailError").html("Please Enter Email");
            $(".adminEmailError").show();
            adminemail = false;
            adminlogincheking();
            return false;
        } else {
            $(".adminEmailError").hide();
            adminemail = true;
            adminlogincheking();
        }

    }

    function validateadminloginpass() {
        let passwordloginValue = $(".adminPassword").val();
        $('.invalid-feedback').hide();
        if (passwordloginValue.length == "") {
            $(".adminPasswordError").html("Please Enter Password");
            $(".adminPasswordError").show();
            adminpasswrd = false;
            adminlogincheking();
            return false;
        } else {
            $(".adminPasswordError").hide();
            adminpasswrd = true;
            adminlogincheking();
        }

    }


    function validateadminchapcha() {
        let chaptchasValue = $(".chaptchas").val();
        $('#chapmessages').html('');
        $('#chapmessages').show();
        if (chaptchasValue.length == "") {
            $("#chapmessages").html("Please Enter Captcha");
            $("#chapmessages").show();
            adminchaptcha = false;
            adminlogincheking();
            return false;
        } else {
            $("#chapmessages").hide();
            adminchaptcha = true;
            adminlogincheking();
        }
    }

    // Validate Email

    function validateadminsubmitlogin() {
        let submitloginValue = $('input[name="myCheckboxlogin"]:checked').val();
        if (!submitloginValue) {
            $("#myCheckboxlogincheck").html("Please Agree To Terms and Conditions");
            $("#myCheckboxlogincheck").show();
            captchaerrorlogins = false;
            adminlogincheking();
            return false;
        } else {
            $("#myCheckboxlogincheck").hide();
            captchaerrorlogins = true;
            adminlogincheking();
        }
    }


    $(document).ready(function () {
        $('#myCheckboxlogin').change(function () {
            if ($(this).is(':checked')) {
                myCheckboxadminerrorlogin = true;
                adminlogincheking();
            } else {
                myCheckboxadminerrorlogin = false;
                adminlogincheking();
            }
        });
    });



    // loginfunction

    function adminlogincheking() {
        console.log(adminemail, adminpasswrd, myCheckboxadminerrorlogin, adminchaptcha);

        if (adminemail == true && adminpasswrd == true && myCheckboxadminerrorlogin == true && adminchaptcha == true) {

        } else {

        }
    }

    $('.loading-spinner').hide();

    $(document).on('click', '.adminlogin', function () {
        event.preventDefault();
        var csrf = $("[name=_token]").val();
        var email = $('.adminEmail').val();
        var password = $('.adminPassword').val();
        if (adminemail == true && adminpasswrd == true && myCheckboxadminerrorlogin == true && adminchaptcha == true) {
            $('.loading-spinner').show();
            $(".Adminvalid").click();
        } else {
            validateadminchapcha();
            validateadminemaillogin();
            validateadminloginpass();
            validateadminsubmitlogin();
        }
    });


    $('.adminEmail,.adminPassword,#myCheckboxlogin,.chaptchas').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.adminlogin').click();
            return false;
        }
    });

});

//end login
