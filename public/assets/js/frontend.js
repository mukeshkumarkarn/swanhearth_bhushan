// dashboad count Notification
$(document).ready(function () {
    var id = $('.id').val();
    var url = '/api/total-notification-dashboad/' + id;
    var csrf = $("[name=_token]").val();
    var base_url = window.location.origin;
    url = base_url + url;
    $.ajax({
        type: 'get',
        url: url,
        success: function (data) {
            if (data == 0) {
                $('.totalNotification').css('background-color', 'white').show();
            } else {
                $('.totalNotification').text(data).show();
            }
        }
    });
});
// end dashboad count Notification

// option question
$(document).ready(function () {
    let optionError = false;

    $('input[name="option_id"]').change(function () {
        validatemyoption_id();
    });

    function validatemyoption_id() {
        let submitloginValue = $('input[name="option_id"]:checked').val();
        if (!submitloginValue) {
            $(".optionError").html("Please Choose Option");
            $(".optionError").show();
            optionError = false;
            optioncheck();
            return false;
        } else {
            $(".optionError").hide();
            optionError = true;
            optioncheck();
        }
    }

    function optioncheck() {
        console.log(optionError);
        if (optionError == true) {

        } else {

        }
    }
    $(document).on('click', '.optionsubmit', function () {
        event.preventDefault();
        var csrf = $("[name=_token]").val();
        let answer = $('input[name="option_id"]:checked').val();
        let poll_question_id = $(".poll_question_id").val();
        var base_url = window.location.origin;
        var url = base_url + '/api/poll-answer';
        var option = "";
        if (optionError == true) {
            jQuery.ajax({
                type: 'post',
                url: url,
                data: {
                    "answer": answer,
                    "poll_question_id": poll_question_id,
                    "_token": csrf
                },
                success: function (result) {
                    $('.optionError').show();
                    $(".optionError").html(result.return);
                    setTimeout(function () {
                        $(".optionError").empty();
                    }, 6000)
                    $('.barchart').removeAttr('hidden');
                    $('.ans-percentage').removeAttr('hidden');
                    $('.checkhide').prop('disabled', true);
                    $('.optionsubmit').attr('hidden', 'hidden');
                }
            });
        } else {
            validatemyoption_id();
        }
    });
});
// end option question

// contact us
$(document).ready(function () {

    let nameError = false;
    let phoneError = false;
    let emailError = false;
    let subjectError = false;
    let messageError = false;
    let chaptcha = false;

    $("#Cname").keyup(function () {
        validatecname();
    });

    $(".chaptcha").keyup(function () {
        validatechapcha();
    });

    $("#Cemail").keyup(function () {
        validatecemail();
    });

    $("#Cphone").keyup(function () {
        validatecphone();
    });

    $(".message").keyup(function () {
        validatemessage();
    });

    $("#subject").keyup(function () {
        validatesubject();
    });

    function validatecname() {
        let firstnameValue = $("#Cname").val();
        if (firstnameValue.trim() == "") {
            $("#firstname").html("Please Enter Name");
            $("#firstname").show();
            nameError = false;
            checkingscontact();
            return false;
        } else {
            $("#firstname").hide();
            nameError = true;
            checkingscontact();
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

    function validatecemail() {
        let emailValue = $("#Cemail").val();
        if (emailValue.trim() == "") {
            $("#emailerror").html("Please Enter Your Email.");
            $("#emailerror").show();
            emailError = false;
            checkingscontact();
            return false;
        } else {
            let emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            if (!emailRegex.test(emailValue.trim())) {
                $("#emailerror").html("Please Enter a Valid Email.");
                $("#emailerror").show();
                emailError = false;
                checkingscontact();
                return false;
            } else {
                $("#emailerror").hide();
                emailError = true;
                checkingscontact();
            }
        }
    }


    function validatecphone() {
        let phoneValue = $("#Cphone").val();
        let phoneRegex = /^[0-9]{10}$/; // Assuming a 10-digit phone number format

        if (phoneValue.trim() == "") {
            $("#phoneerror").html("Please Enter Mobile No");
            $("#phoneerror").show();
            phoneError = false;
            checkingscontact();
            return false;
        } else if (!phoneRegex.test(phoneValue)) {
            $("#phoneerror").html("Please Enter a Valid 10-Digit Mobile No");
            $("#phoneerror").show();
            phoneError = false;
            checkingscontact();
            return false;
        } else {
            $("#phoneerror").hide();
            phoneError = true;
            checkingscontact();
        }
    }


    function validatemessage() {
        let messageValue = $(".message").val();
        if (messageValue.trim() == "") {
            $("#messageerror").html("Please Enter Message");
            $("#messageerror").show();
            messageError = false;
            checkingscontact();
            return false;
        } else {
            $("#messageerror").hide();
            messageError = true;
            checkingscontact();
        }
    }


    function validatesubject() {
        let subjectValue = $("#subject").val();
        if (subjectValue.trim() == "") {
            $("#subjecterror").html("Please Enter Subject");
            $("#subjecterror").show();
            subjectError = false;
            checkingscontact();
            return false;
        } else {
            $("#subjecterror").hide();
            subjectError = true;
            checkingscontact();
        }
    }


    function checkingscontact() {
        console.log(nameError, emailError, chaptcha);

        if (nameError == true && emailError == true && messageError == true && subjectError == true && chaptcha == true) {

        } else {

        }
    }


    $('.loading-spinner').hide();
    $(document).on('click', '.contact', function () {
        event.preventDefault();
        var name = $('#Cname').val();
        var email = $('#Cemail').val();
        var phone = $('#Cphone').val();
        var subject = $('#subject').val();
        var message = $('.message').val();

        if (nameError == true && emailError == true && messageError == true && subjectError == true && chaptcha == true) {
            $('.loading-spinner').show();
            var option = "";
            $(".validcontact").click();
        } else {
            validatecname();
            validatecemail();
            validatecphone();
            validatesubject();
            validatemessage();
            validatechapcha();
        }
    });
    $('#Cname,#Cemail,#Cphone,#subject,.chaptcha').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.contact').click();
            return false;
        }
    });

});
//end contact us

// user story
$(document).ready(function () {

    let titleError = false;
    let summaryError = false;
    let descriptionError = false;
    let imageError = false;
    let chaptchastory = false;

    $(".StoryTitle").keyup(function () {
        validateStorytitle();
    });

    $(".chaptchastory").keyup(function () {
        validatechapchastory();
    });

    $(".StorySummary").keyup(function () {
        validateStorySummary();
    });

    $("#activityPhotoUploder").keyup(function () {
        validateactivityPhotoUploder();
    });

    function validateStorytitle() {
        let titleValue = $(".StoryTitle").val();
        if (titleValue.trim() == "") {
            $(".StoryTitleError").html("Please Enter Title");
            $(".StoryTitleError").show();
            titleError = false;
            checkingsdetaing();
            return false;
        } else {
            $(".StoryTitleError").hide();
            titleError = true;
            checkingsdetaing();
        }
    }

    function validatechapchastory() {
        let chaptchaValue = $(".chaptchastory").val();
        $('#chapmessage').html('');
        $('#chapmessage').show();
        if (chaptchaValue.length == "") {
            $("#chapmessage").html("Please Enter Captcha");
            $("#chapmessage").show();
            chaptchastory = false;
            checkingsdetaing();
            return false;
        } else {
            $("#chapmessage").hide();
            chaptchastory = true;
            checkingsdetaing();
        }
    }


    function validateStorySummary() {
        let summaryValue = $(".StorySummary").val();
        if (summaryValue.trim() == "") {
            $(".StorySummaryError").html("Please Enter Summary");
            $(".StorySummaryError").show();
            summaryError = false;
            checkingsdetaing();
            return false;
        } else {
            $(".StorySummaryError").hide();
            summaryError = true;
            checkingsdetaing();
        }
    }

    CKEDITOR.instances['details'].on('change', function () {
        validateStoryDescription();
    });

    function validateStoryDescription() {
        var descriptionValue = CKEDITOR.instances['details'].getData();
        if (descriptionValue.trim() === "") {
            $(".StoryDescriptionError").html("Please Enter details");
            $(".StoryDescriptionError").show();
            descriptionError = false;
            checkingsdetaing();
            return false;
        } else {
            $(".StoryDescriptionError").hide();
            descriptionError = true;
            checkingsdetaing();
        }
    }

    function checkingsdetaing() {
        console.log(titleError, summaryError, descriptionError, chaptchastory);

        if (titleError == true && summaryError == true && descriptionError == true && chaptchastory == true) {

        } else {

        }
    }


    $('.loading-spinner').hide();
    $(document).on('click', '.checkStory', function () {
        event.preventDefault();
        var title = $('.StoryTitle').val();
        var summary = $('.StorySummary').val();
        var description = $('.StoryDescription').val();
        if (titleError == true && summaryError == true && descriptionError == true && chaptchastory == true) {
            $('.loading-spinner').show();
            var option = "";
            $(".Storyvalid").click();
        } else {
            validateStorytitle();
            validateStorySummary();
            validateStoryDescription();
            validatechapchastory();
        }
    });
    $('.StoryTitle,.StorySummary,.StoryDescription,.chaptchastory').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.checkStory').click();
            return false;
        }
    });

});
// end user story

//pincode base location
$(document).ready(function () {
    $(document).on('keyup', '.pincode', function () {
        event.preventDefault();
        var csrf = $("[name=_token]").val();
        var pincode = $('.pincode').val();
        if (pincode.length == 6) {
            var option = "";
            var base_url = window.location.origin;
            var url = base_url + '/api/getstatecity';
            jQuery.ajax({
                type: 'post',
                url: url,
                data: {
                    "pincode": pincode,
                    "_token": csrf
                },
                success: function (result) {
                    console.log(result[0])
                    $(".Errormessage").html(result[0].Message);
                    $('.Errormessage').show();

                    $('.country').val(result[0].PostOffice[0].Country);
                    $('.state').val(result[0].PostOffice[0].State);
                    $('.city').val(result[0].PostOffice[0].District);

                    $('.location').val(result[0].PostOffice[0].Name);

                    var count = (result[0].PostOffice.length);
                    option += '<option value="">Select location</option>';
                    for (var i = 0; i < count; i++) {
                        option += '<option value="' + result[0].PostOffice[i].Name + '">' + result[0].PostOffice[i].Name + '</option>';
                    }
                    console.log(option);
                    $(".location").html(option);


                    setTimeout(function () {
                        $('.Errormessage').hide();
                    }, 4000);
                }
            });
        }
    });
});
// end pincode base location

// user change password 
$(document).ready(function () {

    let userpassworError = false;
    let userconpassworError = false;

    // $(".user-password").keyup(function () {
    //     validateuserpassword();
    // });

    $(".user-confirmPassword").keyup(function () {
        validateuserconpassword();
    });


    function checkingsuserPassword() {
        console.log(
            userpassworError, userconpassworError);
        if (userpassworError == true && userconpassworError == true) {


        } else {

        }
    }

    $(document).on('click', '.userUpdatePasswordCheck', function () {
        var user_password = $('.user-password').val();
        var user_confirmpassword = $('.user-confirmPassword').val();
        event.preventDefault();
        if (userpassworError == true && userconpassworError == true) {
            $('.loading-spinner').show();
            $(".userUpdatePassword").click();
        } else {
            $('.loading-spinner').hide();
            validateuserpassword();
            validateuserconpassword();
        }
    });

    $('.user-password,.user-confirmPassword').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.sign').click();
            return false;
        }
    });


    $(".user-password").keyup(function () {
        validateuserpassword();
    });

    function validateuserpassword() {
        let userpasswordValue = $(".user-password").val();
        if (userpasswordValue.length == "") {
            $(".user-passwordError").html("Please Enter Password");
            $(".user-passwordError").show();
            userpassworError = false;
            checkingsuserPassword();
            return false;
        }
        if (userpasswordValue.length < 4 || userpasswordValue.length > 20) {
            $(".user-passwordError").show();
            $(".user-passwordError").html(
                "Password must be between 4 and 20"
            );
            $(".user-passwordError").css("color", "#b74e6d");
            userpassworError = false;
            checkingsuserPassword();
            return false;
        } else {
            $(".user-passwordError").hide();
            userpassworError = true;
            checkingsuserPassword();
        }
    }

    function validateuserconpassword() {
        let userconfirmPasswordValue = $(".user-confirmPassword").val();
        let userpasswordValue = $(".user-password").val();
        if (userconfirmPasswordValue.length == "") {
            $(".user-confirmPasswordError").html("Please Enter Confirm Password");
            $(".user-confirmPasswordError").show();
            userconpassworError = false;
            checkingsuserPassword();
            return false;
        }
        if (userpasswordValue !== userconfirmPasswordValue) {
            $(".user-confirmPasswordError").show();
            $(".user-confirmPasswordError").html("Password didn't match");
            $(".user-confirmPasswordError").css("color", "#b74e6d");
            userconpassworError = false;
            checkingsuserPassword();
            return false;
        } else {
            $(".user-confirmPasswordError").hide();
            userconpassworError = true;
            checkingsuserPassword();
        }
    }

});
// end change password




// user like
$(document).ready(function () {
    // Validate signup
    $(document).on('click', '.user-like', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var bookmarkButton = $(this);
        var url = '/api/user-like/' + user_other_person_id + '/' + user_id; // Original 'like' API endpoint
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.userlike').addClass('user-dislike');
                $('.userlike').removeClass('user-like');
                bookmarkButton.find('img').css('filter', 'hue-rotate(120deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});
// user end like




// user dislike
$(document).ready(function () {
    // Validate signup
    $(document).on('click', '.user-dislike', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var bookmarkButton = $(this);
        var url = '/api/user-dislike/' + user_other_person_id + '/' + user_id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.userlike').addClass('user-like');
                $('.userlike').removeClass('user-dislike');
                bookmarkButton.find('img').css('filter', 'hue-rotate(320deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});
// user end like




//bookmark
// $(document).ready(function () {
//     $(document).on('click', '.Bookmark', function () {
//         var user_id = $('.user_id').val();
//         var user_other_person_id = $(this).data('reference');
//         var likeButton = $(this); 
//         var textButton = $(this);
//         var url = '/api/Bookmark/' + user_other_person_id + '/' + user_id;
//         var csrf = $("[name=_token]").val();
//         var base_url = window.location.origin;
//         url = base_url + url;
//         $.ajax({
//             type: 'get',
//             url: url,
//             success: function (data) {
//                 $('.messageShow').text(data.message).show();
//                 $('.userBook').addClass('cancle-Bookmark');
//                 $('.userBook').removeClass('Bookmark');
//                 likeButton.css('color', 'green');
//                 // textButton.text('Remove Bookmark');
//                 setTimeout(function () {
//                     $('.messageShow').hide(data.message);
//                 }, 3000);
//             }
//         });
//     });
// });
// bookmark

$(document).ready(function () {
    $(document).on('click', '.Bookmark', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var bookmarkButton = $(this);
        var url = '/api/Bookmark/' + user_other_person_id + '/' + user_id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                bookmarkButton.addClass('cancle-Bookmark').removeClass('Bookmark');
                bookmarkButton.find('img').css('filter', 'hue-rotate(120deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});

//cancle bookmark
$(document).ready(function () {
    $(document).on('click', '.cancle-Bookmark', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var bookmarkButton = $(this);
        var url = '/api/cancle-Bookmark/' + user_other_person_id + '/' + user_id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.userBook').addClass('Bookmark');
                $('.userBook').removeClass('cancle-Bookmark');
                bookmarkButton.find('img').css('filter', 'hue-rotate(320deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});
// cancle bookmark

//request mobile no
$(document).ready(function () {
    $(document).on('click', '.request-mobile', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var bookmarkButton = $(this);
        var url = '/api/request-mobile/' + user_other_person_id + '/' + user_id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.RequestMobile').addClass('cancle-request-mobile');
                $('.RequestMobile').removeClass('request-mobile');
                bookmarkButton.find('img').css('filter', 'hue-rotate(120deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });

    $(document).on('click', '.request_mobile_status', function () {
        var mobile_no = $("#mobile_no").val();
        var request_mobile_status = $(this).data('request_mobile_status');
        if(request_mobile_status == 3){
            mobile_no = "1234567890";
        }
        if(mobile_no!=""){
            var thisButton = $(this);
            var action_id = $(this).data('action_id');
            
            var url = '/api/request-mobile-status/' + action_id + '/' + request_mobile_status;
            var csrf = $("[name=_token]").val();
            var base_url = window.location.origin;
            url = base_url + url;
            $.ajax({
                type: 'get',
                url: url,
                success: function (data) {
                    if(request_mobile_status == 2){
                        alert("Request Approved");
                    }else if(request_mobile_status == 3){
                        alert("Request Rejected");
                    }
                    window.location.href = base_url+"/dashboard/request-mobile-received";
                }
            });
        }
        else{
            $("#edit_div").show();
            $('html, body').animate({
                scrollTop: $("#edit_div").offset().top
            }, 500);
            $("#mobile_no").focus()
        }
    });
});
// end request mobile no

//cancle request mobile no
$(document).ready(function () {
    $(document).on('click', '.cancle-request-mobile', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var bookmarkButton = $(this);
        var url = '/api/cancle-request-mobile/' + user_other_person_id + '/' + user_id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.RequestMobile').addClass('request-mobile');
                $('.RequestMobile').removeClass('cancle-request-mobile');
                bookmarkButton.find('img').css('filter', 'hue-rotate(320deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});
// end request mobile no
$(document).ready(function () {
    $(document).on('click', '.open_edit_div', function () {
        $("#edit_div").show();
        $('html, body').animate({
            scrollTop: $("#edit_div").offset().top
        }, 500);
        $("#mobile_no").focus()
    });
});
// request email
$(document).ready(function () {
    $(document).on('click', '.request-email', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var bookmarkButton = $(this);
        var url = '/api/request-email/' + user_other_person_id + '/' + user_id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.RequestEmail').addClass('cancle-request-email');
                $('.RequestEmail').removeClass('request-email');
                bookmarkButton.find('img').css('filter', 'hue-rotate(120deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });

    $(document).on('click', '.request_email_status', function () {
        var email = $("#email").val();
        var request_email_status = $(this).data('request_email_status');
        if(request_email_status == 3){
            email = "1234567890";
        }
        if(email!=""){
            var thisButton = $(this);
            var action_id = $(this).data('action_id');
            
            var url = '/api/request-email-status/' + action_id + '/' + request_email_status;
            var csrf = $("[name=_token]").val();
            var base_url = window.location.origin;
            url = base_url + url;
            $.ajax({
                type: 'get',
                url: url,
                success: function (data) {
                    if(request_email_status == 2){
                        alert("Request Approved");
                    }else if(request_email_status == 3){
                        alert("Request Rejected");
                    }
                    window.location.href = base_url+"/dashboard/request-email-received";
                }
            });
        }
        else{
            $("#edit_div").show();
            $('html, body').animate({
                scrollTop: $("#edit_div").offset().top
            }, 500);
            $("#email").focus()
        }
    });
});
// end request email

//cancle request email
$(document).ready(function () {
    $(document).on('click', '.cancle-request-email', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var bookmarkButton = $(this);
        var url = '/api/cancle-request-email/' + user_other_person_id + '/' + user_id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.RequestEmail').addClass('request-email');
                $('.RequestEmail').removeClass('cancle-request-email');
                bookmarkButton.find('img').css('filter', 'hue-rotate(320deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});
// end cancle request email

//Match page block
$(document).ready(function () {
    $(document).on('click', '.b_product_sell_details_wrapper .block', function () {
        var thiselement = $(this);
        if(confirm("Are you sure you want to block this?")){
            var user_id = $('.user_id').val();
            var user_other_person_id = $(this).data('reference');
            var bookmarkButton = $(this);
            var url = '/api/block/' + user_other_person_id + '/' + user_id;
            var csrf = $("[name=_token]").val();
            var base_url = window.location.origin;
            url = base_url + url;
            $.ajax({
                type: 'get',
                url: url,
                success: function (data) {
                    thiselement.closest(".b_product_sell_details_wrapper").find('.messageShow').text(data.message).show();
                    thiselement.closest(".b_product_sell_details_wrapper").find('.requestBlock').addClass('unblock');
                    thiselement.closest(".b_product_sell_details_wrapper").find('.requestBlock').removeClass('block');
                    bookmarkButton.find('img').css('filter', 'hue-rotate(120deg)');
                    setTimeout(function () {
                        thiselement.closest(".b_product_sell_details_wrapper").find('.messageShow').hide(data.message);
                    }, 3000);
                }
            });
        }
    });
});
// end Match page block


// Match page unblock
$(document).ready(function () {
    $(document).on('click', '.b_product_sell_details_wrapper .unblock', function () {
        var thiselement = $(this);
        if(confirm("Are you sure you want to Unblock this?")){
            var user_id = $('.user_id').val();
            var bookmarkButton = $(this);
            var user_other_person_id = $(this).data('reference');
            var url = '/api/unblock/' + user_other_person_id + '/' + user_id;
            var csrf = $("[name=_token]").val();
            var base_url = window.location.origin;
            url = base_url + url;
            $.ajax({
                type: 'get',
                url: url,
                success: function (data) {
                    thiselement.closest(".b_product_sell_details_wrapper").find('.messageShow').text(data.message).show();
                    thiselement.closest(".b_product_sell_details_wrapper").find('.requestBlock').addClass('block');
                    thiselement.closest(".b_product_sell_details_wrapper").find('.requestBlock').removeClass('unblock');
                    bookmarkButton.find('img').css('filter', 'hue-rotate(320deg)');
                    setTimeout(function () {
                        thiselement.closest(".b_product_sell_details_wrapper").find('.messageShow').hide(data.message);
                    }, 3000);
                }
            });
        }
    });
});
// end Match page unblock
// Dasboard page block
$(document).ready(function () {
    $(document).on('click', '.tab_image_text .block', function () {
        var thiselement = $(this);
        if(confirm("Are you sure you want to block this?")){
            var user_id = $('.user_id').val();
            var user_other_person_id = $(this).data('reference');
            var bookmarkButton = $(this);
            var url = '/api/block/' + user_other_person_id + '/' + user_id;
            var csrf = $("[name=_token]").val();
            var base_url = window.location.origin;
            url = base_url + url;
            $.ajax({
                type: 'get',
                url: url,
                success: function (data) {
                    thiselement.closest(".tab_image_text").find('.messageShow').text(data.message).show();
                    thiselement.closest(".tab_image_text").find('.requestBlock').addClass('unblock');
                    thiselement.closest(".tab_image_text").find('.requestBlock').removeClass('block');
                    bookmarkButton.find('img').css('filter', 'hue-rotate(120deg)');
                    setTimeout(function () {
                        thiselement.closest(".tab_image_text").find('.messageShow').hide(data.message);
                    }, 3000);
                }
            });
        }
    });
});
// End Dasboard page block
// Dasboard page UNblock
$(document).ready(function () {
    $(document).on('click', '.tab_image_text .unblock', function () {
        var thiselement = $(this);
        if(confirm("Are you sure you want to Unblock this?")){
            var user_id = $('.user_id').val();
            var bookmarkButton = $(this);
            var user_other_person_id = $(this).data('reference');
            var url = '/api/unblock/' + user_other_person_id + '/' + user_id;
            var csrf = $("[name=_token]").val();
            var base_url = window.location.origin;
            url = base_url + url;
            $.ajax({
                type: 'get',
                url: url,
                success: function (data) {
                    thiselement.closest(".tab_image_text").find('.messageShow').text(data.message).show();
                    thiselement.closest(".tab_image_text").find('.requestBlock').addClass('block');
                    thiselement.closest(".tab_image_text").find('.requestBlock').removeClass('unblock');
                    bookmarkButton.find('img').css('filter', 'hue-rotate(320deg)');
                    setTimeout(function () {
                        thiselement.closest(".tab_image_text").find('.messageShow').hide(data.message);
                    }, 3000);
                }
            });
        }
    });
});
//End Dasboard page UNblock
//accept request mobile
$(document).ready(function () {
    $(document).on('click', '.accept-request', function () {
        var id = $(this).data('reference');
        var url = '/api/accept-mobile-request/' + id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.accept-request').hide;
                $('.deny-request').hide;
            }
        });
    });
});
//accept request mobile


//cancle request mobile
$(document).ready(function () {
    $(document).on('click', '.deny-request', function () {
        var id = $(this).data('reference');
        var url = '/api/deny-mobile-request/' + id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});
//accept request mobile



//accept request Email
$(document).ready(function () {
    $(document).on('click', '.accept-request-email', function () {
        var id = $(this).data('reference');
        var url = '/api/accept-email-request/' + id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.errorshow').text(data.errorshow).show();
                $('.accept-request-email').hide;
                $('.deny-request-email').hide;
            }
        });
    });
});
//accept request mobile


//cancle request email
$(document).ready(function () {
    $(document).on('click', '.deny-request-email', function () {
        var id = $(this).data('reference');
        var url = '/api/deny-email-request/' + id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});
//accept request email

// reset data match calculetor
$(document).ready(function () {
    $(".match-data-reset").click(function () {
        $(".percent").text("0%");
    });
});
//end

// reset data match calculetor by name
$(document).ready(function () {
    $(".match-reset").click(function () {
        $(".percentages").text("0%");
    });
});
//end

// bar CharacterData
document.addEventListener('DOMContentLoaded', function () {
    var barcharts = document.querySelectorAll('.barchart');
    barcharts.forEach(function (barchart) {
        var value = parseInt(barchart.getAttribute('data-value'));
        var bar = barchart.querySelector('.bar');
        var width = value + '%';
        bar.style.width = width;
        bar.style.backgroundColor = getColorBasedOnValue(value);
        barchart.setAttribute('title', 'Total: ' + value);
        barchart.classList.add('ans-percentage');
    });
});
function getColorBasedOnValue(value) {
    if (value >= 0 && value < 20) {
        return '#b74e6d';
    } else if (value >= 20 && value < 40) {
        return '#FF4500';
    } else if (value >= 40 && value < 60) {
        return '#FFFF00';
    } else if (value >= 60 && value < 80) {
        return '#32CD32';
    } else if (value >= 80 && value <= 100) {
        return '#0000FF';
    } else {
        return '#000000'; // Default color for out of range values
    }
}


// album delete
$(document).ready(function () {
    $(document).on('click', '.album-delete', function () {
        var id = $(this).data('reference');
        var url = '/api/album-delete-request/' + id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                    window.location.reload();
                }, 3000);
            }
        });
    });
});
// end


////  request of photo

//request photo
$(document).ready(function () {
    $(document).on('click', '.request-photo', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var photoButton = $(this);
        var url = '/api/request-photo/' + user_other_person_id + '/' + user_id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.Requestphoto').addClass('cancle-request-photo');
                $('.Requestphoto').removeClass('request-photo');
                photoButton.find('img').css('filter', 'hue-rotate(120deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});
// end requestphoto

//cancle request photo
$(document).ready(function () {
    $(document).on('click', '.cancle-request-photo', function () {
        var user_id = $('.user_id').val();
        var user_other_person_id = $(this).data('reference');
        var photoButton = $(this);
        var url = '/api/cancle-request-photo/' + user_other_person_id + '/' + user_id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.RequestMobile').addClass('request-photo');
                $('.RequestMobile').removeClass('cancle-request-photo');
                photoButton.find('img').css('filter', 'hue-rotate(320deg)');
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                }, 3000);
            }
        });
    });
});
// end request photo

//accept request photo
$(document).ready(function () {
    $(document).on('click', '.accept-req-photo', function () {
        var id = $(this).data('reference');
        var url = '/api/accept-photo-request/' + id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                $('.accept-req-photo').hide;
                $('.deny-req-photo').hide;
            }
        });
    });
});
//accept request photo


//cancle request photo
$(document).ready(function () {
    $(document).on('click', '.deny-req-photo', function () {
        var id = $(this).data('reference');
        var url = '/api/deny-photo-request/' + id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function (data) {
                $('.messageShow').text(data.message).show();
                setTimeout(function () {
                    $('.messageShow').hide(data.message);
                    window.location.reload();
                }, 3000);
            }
        });
    });
});
//accept request photo



