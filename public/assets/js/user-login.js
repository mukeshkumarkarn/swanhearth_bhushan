
// validation 

$(document).ready(function () {

  // Validate login
  let useremail = false;

  let userpasswrd = false;

  let chaptcha = false;

  let myCheckboxerrorlogin = false;
  checkingslogin();

  // $("#myCheckboxlogincheck").hide();
  // let captchaerrorlogins = false;


  $("#email-login").keyup(function () {
    validateemaillogin();
  });

  $(".chaptcha").keyup(function () {
    validatechapcha();
  });

  $("#login-pass").keyup(function () {
    validateloginpass();
  });



  $('input[name="myCheckboxlogin"]').change(function () {
    validatesubmitlogin();
  });

  function validateemaillogin() {
    let emailloginValue = $("#email-login").val();
    $('.invalid-feedback').hide();
    if (emailloginValue.length == "") {
      $("#useremail").html("Please Enter Email");
      $("#useremail").show();
      useremail = false;
      checkingslogin();
      return false;
    } else {
      $("#useremail").hide();
      useremail = true;
      checkingslogin();

    }

  }

  function validateloginpass() {
    let passwordloginValue = $("#login-pass").val();
    //alert(passwordValue);
    $('.invalid-feedback').hide();
    // $('.invalid-feedback').show();
    if (passwordloginValue.length == "") {
      $("#userpasswrd").html("Please Enter Password");
      $("#userpasswrd").show();
      userpasswrd = false;
      checkingslogin();
      return false;
    } else {
      $("#userpasswrd").hide();
      userpasswrd = true;
      checkingslogin();
    }

  }


  function validatechapcha() {
    let chaptchaValue = $(".chaptcha").val();
    $('#chapmessage').html('');
    $('#chapmessage').show();
    if (chaptchaValue.length == "") {
      $("#chapmessage").html("Please Enter Captcha");
      $("#chapmessage").show();
      chaptcha = false;
      checkingslogin();
      return false;
    } else {
      $("#chapmessage").hide();
      chaptcha = true;
      checkingslogin();
    }
  }

  // Validate Email

  function validatesubmitlogin() {
    let submitloginValue = $('input[name="myCheckboxlogin"]:checked').val();
    if (!submitloginValue) {
      $("#myCheckboxlogincheck").html("Please Agree To Terms and Conditions");
      $("#myCheckboxlogincheck").show();
      captchaerrorlogins = false;
      checkingslogin();
      return false;
    } else {
      $("#myCheckboxlogincheck").hide();
      captchaerrorlogins = true;
      checkingslogin();
    }
  }


  $(document).ready(function () {
    $('#myCheckboxlogin').change(function () {
      if ($(this).is(':checked')) {
        myCheckboxerrorlogin = true;
        checkingslogin();
      } else {
        myCheckboxerrorlogin = false;
        checkingslogin();
      }
    });
  });



  // loginfunction

  function checkingslogin() {
    console.log(useremail, userpasswrd, myCheckboxerrorlogin, chaptcha);

    if (useremail == true && userpasswrd == true && myCheckboxerrorlogin == true && chaptcha == true) {

      //console.log('abc');

    } else {

    }
  }

  $('.loading-spinner').hide();

  $(document).on('click', '.loginpage', function () {
    event.preventDefault();
    var csrf = $("[name=_token]").val();
    var email = $('#email-login').val();
    var password = $('#login-pass').val();
    if (useremail == true && userpasswrd == true && myCheckboxerrorlogin == true && chaptcha == true) {
      $('.loginpage').prop('disabled', true).addClass('classDesign');
      $('.loading-spinner').show();
      $(".valid").click();
    } else {
      validatechapcha();
      validateemaillogin();
      validateloginpass();
      validatesubmitlogin();
    }
  });


  $('#email-login,#login-pass,#myCheckboxlogin,.chaptcha').on("keypress", function (e) {
    if (e.keyCode == 13) {
      $('.loginpage').click();
      return false;
    }
  });

});
