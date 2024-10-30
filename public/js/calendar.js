$(function () {
  $('.delete-date-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var reserve_date = $(this).val();
    var reserve_part = $(this).siblings('.reserve-part-hidden').val();
    $('.modal-inner-date span').text(reserve_date);
    $('.modal-inner-part span').text(reserve_part);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  })

});
