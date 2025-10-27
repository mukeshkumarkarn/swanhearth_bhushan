// register Admin
$(document).ready(function () {


    let questionError = false;
    let option1Error = false;
    let option2Error = false;
    let option3Error = false;
    let option4Error = false;



    $(".question").keyup(function () {
        validatequestion();
    });

    $(".option1").keyup(function () {
        validateoption1();
    });

    $(".option2").keyup(function () {
        validateoption2();
    });

    $(".option3").keyup(function () {
        validateoption3();
    });

    $(".option4").keyup(function () {
        validateoption4();
    });


    function validatequestion() {
        let questionValue = $(".question").val();
        if (questionValue.trim() == "") {
            $(".questionError").html("Please Enter Question");
            $(".questionError").show();
            questionError = false;
            PollQuestionCheck();
            return false;
        } else {
            $(".questionError").hide();
            questionError = true;
            PollQuestionCheck();
        }
    }

    
    function validateoption1() {
        let option1Value = $(".option1").val();
        if (option1Value.trim() == "") {
            $(".optionError1").html("Please Enter option1");
            $(".optionError1").show();
            option1Error = false;
            PollQuestionCheck();
            return false;
        } else {
            $(".optionError1").hide();
            option1Error = true;
            PollQuestionCheck();
        }
    }

    function validateoption2() {
        let option2Value = $(".option2").val();
        if (option2Value.trim() == "") {
            $(".optionError2").html("Please Enter option2");
            $(".optionError2").show();
            option2Error = false;
            PollQuestionCheck();
            return false;
        } else {
            $(".optionError2").hide();
            option2Error = true;
            PollQuestionCheck();
        }
    }

    function validateoption3() {
        let option3Value = $(".option3").val();
        if (option3Value.trim() == "") {
            $(".optionError3").html("Please Enter option3");
            $(".optionError3").show();
            option3Error = false;
            PollQuestionCheck();
            return false;
        } else {
            $(".optionError3").hide();
            option3Error = true;
            PollQuestionCheck();
        }
    }

    function validateoption4() {
        let option4Value = $(".option4").val();
        if (option4Value.trim() == "") {
            $(".optionError4").html("Please Enter option4");
            $(".optionError4").show();
            option4Error = false;
            PollQuestionCheck();
            return false;
        } else {
            $(".optionError4").hide();
            option4Error = true;
            PollQuestionCheck();
        }
    }

    function PollQuestionCheck() {
        console.log(questionError, option1Error, option2Error,
            option3Error, option4Error);
        if (questionError == true && option1Error == true && option2Error == true &&
            option3Error == true && option4Error == true) {

        } else {

        }
    }

    $(document).on('click', '.questioncheck', function () {
        event.preventDefault();
        if (questionError == true && option1Error == true && option2Error == true &&
            option3Error == true && option4Error == true) {
            $('.loading-spinner').show();
            $(".questionsubmit").click();
        } else {
            $('.loading-spinner').hide();
            validatequestion();
            validateoption1();
            validateoption2();
            validateoption3();
            validateoption4();
        }
    });

    $('.question,.option1,.option2,.option3,.option4').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.questioncheck').click();
            return false;
        }
    });


});
// end register admin