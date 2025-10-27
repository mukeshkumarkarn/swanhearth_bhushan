
$(document).ready(function () {
  $(".name").keyup(function () {
    // validatename();
    var name = $(this).val();
    var slug = name.toLowerCase().replace(/[^\w\s-]/g, '-').replace(/[\s]+/g, '-');
    var title = name;
    var keyword = name;
    var discription = name;
    $('.slug').val(slug);
    $('.keyword').val(keyword);
    $('.title').val(title);
    $('.description').val(discription);
  });

  // function validatename() {
  //   let nameValue = $(".name").val();
  //   if (nameValue.length == "") {
  //     $(".name").show();
  //     nameError = false;
  //     return false;
  //   }
  // }

});

// mail email stories users

$(document).ready(function() {
  $(document).on('click', '.StoriesMail', function() {
      $('.storiesEmail').val($(this).data('email'));
  });
})