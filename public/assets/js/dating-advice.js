//dating add or strories
$(document).ready(function () {
    let verificationblog = false;
    let verificationtitle = true;
    let verificationkeyword = true;
    let verificationdescription = true;
    let verificationsummary = false;
    let verificationdetails = false;
    let verificationblogimage = true;
    let verificationshortimg = true;
    let verificationhomeimg = true;
    let verificationblogslug = true;

    $(document).on('keyup', '.name', function () {
        validateblog();
    });
    function validateblog() {
        let blogname = $(".name").val();
        $(".blogkeyworderror").html("");
        $(".blogkeyworderror").show();

        $(".blogtitleerror").html("");
        $(".blogtitleerror").show();

        $(".blogdescriptionerror").html("");
        $(".blogdescriptionerror").show();

        $(".slugError").html("");
        $(".slugError").show();

        if (blogname.length == "") {
            $(".blognameerror").html("Please Enter Title");
            $(".blognameerror").show();
            verificationblog = false;
            blogcheck();
            return false;
        } else {
            $(".blognameerror").hide();
            verificationblog = true;
            blogcheck();

        }
    }

    $(document).on('keyup', '.title', function () {
        validatetitle();
    });

    $(document).on('keyup', '.summary', function () {
        validatesummary();
    });

    function validatetitle() {
        let blogtitle = $(".title").val();
        if (blogtitle.length == "") {
            $(".blogtitleerror").html("Please Enter Meta Title");
            $(".blogtitleerror").show();
            verificationtitle = false;
            blogcheck();
            return false;
        } else {
            $(".blogtitleerror").hide();
            verificationtitle = true;
            blogcheck();

        }
    }

    $(document).on('keyup', '.slug', function () {
        validateslug();
    });

    function validateslug() {
        let blogslug = $(".slug").val();
        if (blogslug.length == "") {
            $(".slugError").html("Please Enter Slug");
            $(".slugError").show();
            verificationblogslug = false;
            blogcheck();
            return false;
        } else {
            $(".slugError").hide();
            verificationblogslug = true;
            blogcheck();
        }
    }

    $(document).on('keyup', '.keyword', function () {
        validatekeyword();
    });
    function validatekeyword() {
        let blogkeyword = $(".keyword").val();
        if (blogkeyword.length == "") {
            $(".blogkeyworderror").html("Please Enter Meta keyword");
            $(".blogkeyworderror").show();
            verificationkeyword = false;
            blogcheck();
            return false;
        } else {
            $(".blogkeyworderror").hide();
            verificationkeyword = true;
            blogcheck();

        }
    }

    $(document).on('keyup', '.description', function () {
        validatedescription();
    });
    function validatedescription() {
        let blogdescription = $(".description").val();
        if (blogdescription.length == "") {
            $(".blogdescriptionerror").html("Please Enter Meta Description");
            $(".blogdescriptionerror").show();
            verificationdescription = false;
            blogcheck();
            return false;
        } else {
            $(".blogdescriptionerror").hide();
            verificationdescription = true;
            blogcheck();

        }
    }


    function validatesummary() {
        let blogsummary = $(".summary").val();
        if (blogsummary.trim() === "") {
            $(".blogsummaryerror").html("Please Enter Summary");
            $(".blogsummaryerror").show();
            verificationsummary = false;
            blogcheck();
            return false;
        } else {
            $(".blogsummaryerror").hide();
            verificationsummary = true;
            blogcheck();
        }
    }


    CKEDITOR.instances['details'].on('change', function () {
        validatedetails();
    });

    function validatedetails() {
        var blogdetails = CKEDITOR.instances['details'].getData();
        if (blogdetails.trim() === "") {
            $(".blogdetailserror").html("Please Enter details");
            $(".blogdetailserror").show();
            verificationdetails = false;
            blogcheck();
            return false;
        } else {
            $(".blogdetailserror").hide();
            verificationdetails = true;
            blogcheck();
        }
    }


    $(document).on('change', '.detail_img', function () {
        validateblogimage();
    });
    function validateblogimage() {
        let blogimage = $(".detail_img").val();
        if (blogimage.length === 0) {
            $(".blogimageerror").html("Please Upload Detail Image");
            $(".blogimageerror").show();
            verificationblogimage = false;
            blogcheck();
            return false;
        } else {
            $(".blogimageerror").hide();
            verificationblogimage = true;
            blogcheck();

        }
    }

    $(document).on('change', '.listing_img', function () {
        validateshortimg();
    });
    function validateshortimg() {
        let blogshortimg = $(".listing_img").val();
        if (blogshortimg.length === 0) {
            $(".shortImgerror").html("Please Upload Listing Image");
            $(".shortImgerror").show();
            verificationshortimg = false;
            blogcheck();
            return false;
        } else {
            $(".shortImgerror").hide();
            verificationshortimg = true;
            blogcheck();

        }
    }

    $(document).on('change', '.home_img', function () {
        validatehomeimg();
    });
    function validatehomeimg() {
        let homeimg = $(".home_img").val();
        if (homeimg.length === 0) {
            $(".homeImgerror").html("Please Upload Home Page Image");
            $(".homeImgerror").show();
            verificationhomeimg = false;
            blogcheck();
            return false;
        } else {
            $(".homeImgerror").hide();
            verificationhomeimg = true;
            blogcheck();

        }
    }

    function blogcheck() {
        console.log(verificationblog, verificationtitle, verificationkeyword, verificationdescription, verificationsummary
            , verificationdetails, verificationshortimg, verificationblogimage, verificationblogslug);
        if (verificationblog && verificationtitle && verificationkeyword && verificationdescription &&
            verificationsummary && verificationdetails && verificationshortimg && verificationblogimage && verificationblogslug && verificationhomeimg) {

        } else {

        }
    }

    $(document).on('click', '.addblog', function (event) {
        event.preventDefault();
        if (verificationblog && verificationtitle && verificationkeyword && verificationdescription &&
            verificationsummary && verificationblogslug
            && verificationdetails && verificationshortimg && verificationblogimage && verificationhomeimg) {
            $('.loading-spinner').show();
            $(".submitButton").click();
        } else {
            validateblog();
            validatetitle();
            validatekeyword();
            validatedescription();
            validatesummary();
            validatedetails();
            validateblogimage();
            validateshortimg();
            validatehomeimg();
            validateslug();
        }
    });
    $('.name,.title,.slug,.keyword,.description,.summary,.listing_img,.detail_img').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.addblog').click();
            return false;
        }
    });
});
// end dating

// edit part validation 
$(document).ready(function () {
    let verificationblogedit = false;
    let verificationtitleedit = false;
    let verificationkeywordedit = false;
    let verificationdescriptionedit = false;
    let verificationsummaryedit = false;
    let verificationdetailsedit = false;
    let verificationblogslugedit = false;

    $(document).on('keyup', '.nameedit', function () {
        validateblogedit();
    });
    function validateblogedit() {
        let blognameedit = $(".nameedit").val();
        $(".blogkeyworderroredit").html("");
        $(".blogkeyworderroredit").show();

        $(".blogtitleerroredit").html("");
        $(".blogtitleerroredit").show();

        $(".blogdescriptionerroredit").html("");
        $(".blogdescriptionerroredit").show();

        $(".slugErroredit").html("");
        $(".slugErroredit").show();

        if (blognameedit.length == "") {
            $(".blognameerroredit").html("Please Enter Title");
            $(".blognameerroredit").show();
            verificationblogedit = false;
            blogcheckedit();
            return false;
        } else {
            $(".blognameerroredit").hide();
            verificationblogedit = true;
            blogcheckedit();

        }
    }

    $(document).on('keyup', '.titleedit', function () {
        validatetitleedit();
    });

    $(document).on('keyup', '.summaryedit', function () {
        validatesummaryedit();
    });

    function validatetitleedit() {
        let blogtitleedit = $(".titleedit").val();
        if (blogtitleedit.length == "") {
            $(".blogtitleerroredit").html("Please Enter Meta Title");
            $(".blogtitleerroredit").show();
            verificationtitleedit = false;
            blogcheckedit();
            return false;
        } else {
            $(".blogtitleerroredit").hide();
            verificationtitleedit = true;
            blogcheckedit();

        }
    }

    $(document).on('keyup', '.slugedit', function () {
        validateslugedit();
    });

    function validateslugedit() {
        let blogslugedit = $(".slugedit").val();
        if (blogslugedit.length == "") {
            $(".slugErroredit").html("Please Enter Slug");
            $(".slugErroredit").show();
            verificationblogslugedit = false;
            blogcheckedit();
            return false;
        } else {
            $(".slugErroredit").hide();
            verificationblogslugedit = true;
            blogcheckedit();
        }
    }

    $(document).on('keyup', '.keywordedit', function () {
        validatekeywordedit();
    });
    function validatekeywordedit() {
        let blogkeywordedit = $(".keywordedit").val();
        if (blogkeywordedit.length == "") {
            $(".blogkeyworderroredit").html("Please Enter Meta keyword");
            $(".blogkeyworderroredit").show();
            verificationkeywordedit = false;
            blogcheckedit();
            return false;
        } else {
            $(".blogkeyworderroredit").hide();
            verificationkeywordedit = true;
            blogcheckedit();

        }
    }

    $(document).on('keyup', '.descriptionedit', function () {
        validatedescriptionedit();
    });
    function validatedescriptionedit() {
        let blogdescriptionedit = $(".descriptionedit").val();
        if (blogdescriptionedit.length == "") {
            $(".blogdescriptionerroredit").html("Please Enter Meta Description");
            $(".blogdescriptionerroredit").show();
            verificationdescriptionedit = false;
            blogcheckedit();
            return false;
        } else {
            $(".blogdescriptionerroredit").hide();
            verificationdescriptionedit = true;
            blogcheckedit();

        }
    }


    function validatesummaryedit() {
        let blogsummaryedit = $(".summaryedit").val();
        if (blogsummaryedit.trim() === "") {
            $(".blogsummaryerroredit").html("Please Enter Summary");
            $(".blogsummaryerroredit").show();
            verificationsummaryedit = false;
            blogcheckedit();
            return false;
        } else {
            $(".blogsummaryerroredit").hide();
            verificationsummaryedit = true;
            blogcheckedit();
        }
    }


    CKEDITOR.instances['details'].on('change', function () {
        validatedetailsedit();
    });

    function validatedetailsedit() {
        var blogdetailsedit = CKEDITOR.instances['details'].getData();
        if (blogdetailsedit.trim() === "") {
            $(".blogdetailserroredit").html("Please Enter details");
            $(".blogdetailserroredit").show();
            verificationdetailsedit = false;
            blogcheckedit();
            return false;
        } else {
            $(".blogdetailserroredit").hide();
            verificationdetailsedit = true;
            blogcheckedit();
        }
    }


    function blogcheckedit() {
        if (verificationblogedit && verificationtitleedit && verificationkeywordedit && verificationdescriptionedit &&
            verificationsummaryedit && verificationdetailsedit && verificationblogslugedit) {

        } else {

        }
    }

    setTimeout(function () {
        validateblogedit();
        validatetitleedit();
        validatekeywordedit();
        validatedescriptionedit();
        validatesummaryedit();
        validatedetailsedit();
        validateslugedit();
    }, 2000);

    $(document).on('click', '.addblogedit', function (event) {
        event.preventDefault();
        if (verificationblogedit && verificationtitleedit && verificationkeywordedit && verificationdescriptionedit &&
            verificationsummaryedit && verificationblogslugedit
            && verificationdetailsedit) {
            $('.loading-spinner').show();
            $(".submitButtonedit").click();
        } else {
            validateblogedit();
            validatetitleedit();
            validatekeywordedit();
            validatedescriptionedit();
            validatesummaryedit();
            validatedetailsedit();
            validateslugedit();
        }
    });
    $('.nameedit,.titleedit,.slugedit,.keywordedit,.descriptionedit,.summaryedit').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.addblogedit').click();
            return false;
        }
    });
});
//end edit part validation




// serach
$(document).ready(function () {
    $(document).on('click', '.search-user-button', function (event) {
        event.preventDefault();
        let name = $(".search-user").val();
        var base_url = window.location.origin;
        var url = base_url + '/user-search';
        var option = "";
        jQuery.ajax({
            type: 'get',
            url: url,
            data: {
                "name": name,
            },
            success: function (result) {
                console.log(result)
                var count = result.length;
                if (count > 0) {
                    var row = '';
                    $(".userdata").html("");
                    for (var i = 0; i < count; i++) {
                        var detailurl = base_url + '/admin/user-details/' + result[i].user_ref;
                        var block = base_url + '/admin-delete/' + result[i].user_ref;

                        var date = new Date(result[i].updated_at);
                        var formattedDate = date.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric'
                        });
                        var profileImg = result[i].profile_img ? base_url + '/assets/images/profile_img/' + result[i].profile_img : (result[i].gender === 'male' ? base_url + '/assets/images/profile_img/660e46c8255c62.74317369.png' : base_url + '/assets/images/profile_img/660e474dbdf8c0.17337599.png');                        

                        row += ` <div class="col-md-12">
                        <div class="friends-box">
                                <div class="friends-img">
                                <img src="${profileImg}" alt="profile-img" style="width: 60px;">
                                </div>
                                <div class="friend-name">
                                    <h4> <a href="`+ detailurl + `">${result[i].name}</a> </h4>
                                    <span>${formattedDate}</span>
                                </div>
                                <div class="request-btn">
                                    <a href="`+ block + `" class="main-btn">Block</a>
                                </div>
                            </div>
                        </div>`;
                    }
                    $(".userdata").append(row);
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                } else {
                    $(".userdata").html('<div class="NoData">No data found</div>');
                }
            }
        });
    });
    $('.search-user').on("keypress", function (e) {
        if (e.keyCode == 13) {
            $('.search-user-button').click();
            return false;
        }
    });
});
// end sarch


