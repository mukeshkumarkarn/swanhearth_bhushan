// admin change password 
$(document).ready(function () {

    let adminpassworError = false;
    let adminconpassworError = false;

    $(".admin-confirmPassword").keyup(function () {
        validateadminconpassword();
    });


    function checkingsadminPassword() {
        console.log(
            adminpassworError, adminconpassworError);
        if (adminpassworError == true && adminconpassworError == true) {


        } else {

        }
    }

    $(document).on('click', '.adminUpdatePasswordCheck', function () {
        var admin_password = $('.admin-password').val();
        var admin_confirmpassword = $('.admin-confirmPassword').val();
        event.preventDefault();
        if (adminpassworError == true && adminconpassworError == true) {
            $('.loading-spinner').show();
            $(".adminUpdatePassword").click();
        } else {
            $('.loading-spinner').hide();
            validateadminpassword();
            validateadminconpassword();
        }
    });

    $('.admin-password,.admin-confirmPassword').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.sign').click();
            return false;
        }
    });


    $(".admin-password").keyup(function () {
        validateadminpassword();
    });

    function validateadminpassword() {
        let adminpasswordValue = $(".admin-password").val();
        if (adminpasswordValue.length == "") {
            $(".admin-passwordError").html("Plase Enter Password");
            $(".admin-passwordError").show();
            adminpassworError = false;
            checkingsadminPassword();
            return false;
        }
        if (adminpasswordValue.length < 4 || adminpasswordValue.length > 20) {
            $(".admin-passwordError").show();
            $(".admin-passwordError").html(
                "Password must be between 4 and 20"
            );
            $(".admin-passwordError").css("color", "#b74e6d");
            adminpassworError = false;
            checkingsadminPassword();
            return false;
        } else {
            $(".admin-passwordError").hide();
            adminpassworError = true;
            checkingsadminPassword();
        }
    }

    function validateadminconpassword() {
        let adminconfirmPasswordValue = $(".admin-confirmPassword").val();
        let adminpasswordValue = $(".admin-password").val();
        if (adminconfirmPasswordValue.length == "") {
            $(".admin-confirmPasswordError").html("Plase Enter Confirm Password");
            $(".admin-confirmPasswordError").show();
            adminconpassworError = false;
            checkingsadminPassword();
            return false;
        }
        if (adminpasswordValue !== adminconfirmPasswordValue) {
            $(".admin-confirmPasswordError").show();
            $(".admin-confirmPasswordError").html("*Password didn't Match");
            $(".admin-confirmPasswordError").css("color", "#b74e6d");
            adminconpassworError = false;
            checkingsadminPassword();
            return false;
        } else {
            $(".admin-confirmPasswordError").hide();
            adminconpassworError = true;
            checkingsadminPassword();
        }
    }

});
// end change password



// mail stories 
$(document).ready(function () {

    let mailemailError = false;
    let mailcommentError = false;

    $(".storiesEmail").keyup(function () {
        validatestoMAil();
    });

    $(".storiesComment").keyup(function () {
        validatecomment();
    });


    function validatestoMAil() {
        let emailsValue = $(".storiesEmail").val();
        if (emailsValue.trim() == "") {
            $(".storiesEmailError").html("Please Enter Your Email.");
            $(".storiesEmailError").show();
            mailemailError = false;
            checkingsStorieMail();
            return false;
        } else {
            let emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            if (!emailRegex.test(emailsValue.trim())) {
                $(".storiesEmailError").html("Please Enter a Valid Email.");
                $(".storiesEmailError").show();
                mailemailError = false;
                checkingsStorieMail();
                return false;
            } else {
                $(".storiesEmailError").hide();
                mailemailError = true;
                checkingsStorieMail();
            }
        }
    }



    function validatecomment() {
        let messagesValue = $(".storiesComment").val();
        if (messagesValue.trim() == "") {
            $(".storiesCommentError").html("Please Enter Comment");
            $(".storiesCommentError").show();
            mailcommentError = false;
            checkingsStorieMail();
            return false;
        } else {
            $(".storiesCommentError").hide();
            mailcommentError = true;
            checkingsStorieMail();
        }
    }


    function checkingsStorieMail() {
        console.log(mailemailError, mailcommentError);

        if (mailemailError == true && mailcommentError == true) {

        } else {

        }
    }


    $('.loading-spinner').hide();
    $(document).on('click', '.SendMailStories-User', function () {
        event.preventDefault();
        var csrf = $("[name=_token]").val();
        var email = $('.storiesEmail').val();
        var comment = $('.storiesComment').val();
        if (mailemailError == true && mailcommentError == true) {
            var option = "";
            var base_url = window.location.origin;
            var url = base_url + '/api/user-stories-mail';
            jQuery.ajax({
                type: 'post',
                url: url,
                data: {
                    "email": email,
                    "comment": comment,
                    "_token": csrf
                },
                success: function (result) {
                    $(".message").html(result.message);
                    $('.message').show();
                    $(".storiesComment").val("");
                    setTimeout(function () {
                        $('.message').hide();
                        location.reload();
                    }, 4000);
                }
            });
        } else {
            validatestoMAil();
            validatecomment();
        }
    });


    $('.storiesEmail,.storiesComment').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.SendMailStories-User').click();
            return false;
        }
    });

});
//end mail stories


// Admin change password 
$(document).ready(function () {

    let adminpasError = false;
    let adminpasConError = false;

    $(".adminPassrds").keyup(function () {
        validatepasAdmin();
    });

    $(".adminPassdConf").keyup(function () {
        validatepassAdminCon();
    });


    function validatepasAdmin() {
        let adminpordValue = $(".adminPassrds").val();
        if (adminpordValue.length == "") {
            $(".adminPassrdError").html("Plase Enter Password");
            $(".adminPassrdError").show();
            adminpasError = false;
            checkAdminpass();
            return false;
        }
        if (adminpordValue.length < 4 || adminpordValue.length > 20) {
            $(".adminPassrdError").show();
            $(".adminPassrdError").html(
                "Password must be between 4 and 20"
            );
            $(".adminPassrdError").css("color", "#b74e6d");
            adminpasError = false;
            checkAdminpass();
            return false;
        } else {
            $(".adminPassrdError").hide();
            adminpasError = true;
            checkAdminpass();
        }
    }

    function validatepassAdminCon() {
        let admincmPasswordValue = $(".adminPassdConf").val();
        let adminpordValue = $(".adminPassrds").val();
        if (admincmPasswordValue.length == "") {
            $(".adminPassdConfError").html("Plase Enter Confirm Password");
            $(".adminPassdConfError").show();
            adminpasConError = false;
            checkAdminpass();
            return false;
        }
        if (adminpordValue !== admincmPasswordValue) {
            $(".adminPassdConfError").show();
            $(".adminPassdConfError").html("*Password didn't Match");
            $(".adminPassdConfError").css("color", "#b74e6d");
            adminpasConError = false;
            checkAdminpass();
            return false;
        } else {
            $(".adminPassdConfError").hide();
            adminpasConError = true;
            checkAdminpass();
        }
    }



    function checkAdminpass() {
        console.log(adminpasError, adminpasConError);
        if (adminpasError == true && adminpasConError == true) {

        } else {

        }
    }


    $('.loading-spinner').hide();
    $(document).on('click', '.AdminChangePassword', function () {
        event.preventDefault();
        var csrf = $("[name=_token]").val();
        var password = $('.adminPassrds').val();
        var getid = $('.getid').val();
        if (adminpasError == true && adminpasConError == true) {
            var option = "";
            var base_url = window.location.origin;
            var url = base_url + '/api/superadmin-change-password-admin';
            jQuery.ajax({
                type: 'post',
                url: url,
                data: {
                    "password": password,
                    "getid": getid,
                    "_token": csrf
                },
                success: function (result) {
                    $(".message").html(result.message);
                    $('.message').show();
                    $(".storiesComment").val("");
                    setTimeout(function () {
                        $('.message').hide();
                        location.reload();
                    }, 4000);
                }
            });
        } else {
            validatepasAdmin();
            validatepassAdminCon();
        }
    });


    $('.adminPassrds,.adminPassdConf').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.AdminChangePassword').click();
            return false;
        }
    });

});
//end mail stories

$(document).ready(function () {
    $(document).on('click', '.AdminIdget', function () {
        $('.getid').val($(this).data('adminref'));
    });
})

// contact replay
$(document).ready(function () {
    $(document).on('click', '.ContactEmailReplay', function () {
        $('.EmailReplay').val($(this).data('emailrly'));
    });
})
// end contact reply



// contact reply
$(document).ready(function () {

    let contactmessageError = false;

    $(".contactmessage").on('keyup', function () {
        validateContactMessage();
    });

    function validateContactMessage() {
        let messagesValue = $(".contactmessage").val();
        if (messagesValue.trim() === "") {
            $(".contactmessageError").html("Please Enter Message").show();
            contactmessageError = false;
        } else {
            $(".contactmessageError").hide();
            contactmessageError = true;
        }
    }

    $(document).on('click', '.sendcontact-replay', function (event) {
        event.preventDefault();
        validateContactMessage();
        if (contactmessageError) {
            $(".sendcontact-replay-submit").click();
        }
    });

    // $('.contactmessage').on("keypress", function (e) {
    //     if (e.keyCode === 13) {
    //         e.preventDefault(); 
    //         validateContactMessage(); 
    //         if (contactmessageError) {
    //             $('.SendMailStories-User').click();
    //         }
    //     }
    // });

});
//end contact reply

// show mesaage view contact
$(document).ready(function () {
    $(document).on('click', '.view-contact-notes', function () {
        var id = $(this).data('id');
        var base_url = window.location.origin;
        var url = base_url + '/contact-message-Show/' + id;
        var option = "";
        jQuery.ajax({
            type: 'get',
            url: url,
            success: function (result) {
                console.log(result)
                var count = result.length;
                for (var i = 0; i < count; i++) {
                    var date = new Date(result[i].created_at);
                    var formattedDate = formatDate(date);
                    var formattedTime = formatTime(date);
                    option += ` <div class="note-box-e notesLists">
                    <div class="date-note">${formattedDate} <span>${formattedTime}</span></div>
                    <p class="note-content">${result[i].message}</p>
                    </div>`;
                }
                console.log(option);

                $(".notesjobapply").html(option);
            }
        });
    });

    function formatDate(date) {
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var day = date.getDate();
        var month = months[date.getMonth()];
        var year = date.getFullYear();
        return day + '-' + month + '-' + year;
    }

    function formatTime(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        return padZero(hours) + ':' + padZero(minutes) + ':' + padZero(seconds);
    }

    function padZero(num) {
        return (num < 10 ? '0' : '') + num;
    }
});
// show mesaage view contact
