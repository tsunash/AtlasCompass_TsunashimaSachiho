$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle();
    $(this).find('.accordion_btn').toggleClass('active');
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
    $(this).find('.accordion_btn').toggleClass('active');
  });
});
