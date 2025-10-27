$(document).ready(function () {
    let messageError = false;

    $(".message").keyup(function () {
        validatemessage();
    });

    function validatemessage() {
        let messageValue = $(".message").val();
        if (messageValue.trim() == "") {
            $(".send-messageError").html("Please Type Message");
            $(".send-messageError").show();
            messageError = false;
            messagecheking();
            return false;
        } else {
            $(".send-messageError").hide();
            messageError = true;
            messagecheking();
        }
    }

    function messagecheking() {
        console.log(messageError);
        if (messageError == true) {

        } else {

        }
    }


    setTimeout(function () {
        window.location.reload();
    }, 70000);

    // setTimeout(function () {
    //     $('.realchart').each(function () {
    //         $(this).reload();
    //     });
    // }, 2000);


    // setInterval(function () {
    //     $('.realchart').addClass('refresh');
    //     setTimeout(function () {
    //         $('.realchart').removeClass('refresh');
    //     }, 9000);
    // }, 4000);




    $(document).on('click', '.send-message', function () {
        event.preventDefault();
        var csrf = $("[name=_token]").val();
        let user_id = $(".user_id").val();
        let other_person_user_id = $(".otheruserid").val();
        let message = $(".message").val();
        var base_url = window.location.origin;
        var url = base_url + '/api/Send-message';
        var option = "";
        if (messageError == true) {
            jQuery.ajax({
                type: 'post',
                url: url,
                data: {
                    "user_id": user_id,
                    "other_person_user_id": other_person_user_id,
                    "message": message,
                    "_token": csrf
                },
                success: function (result) {
                    $('.send-messageError').show();
                    $(".send-messageError").html(result.return);
                    var scrollPosition = window.scrollY;
                    setTimeout(function () {
                        $(".send-messageError").empty();
                        $(".message").val("");
                        window.scrollTo(0, scrollPosition);
                        window.location.reload();
                    }, 1000)
                }
            });
        } else {
            validatemessage();
        }
    });
  
    $('.message').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.send-message').click();
            return false;
        }
    });
});



