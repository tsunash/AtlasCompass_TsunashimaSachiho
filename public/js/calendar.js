$(function () {
  $('.delete-date-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var reserve_date = $(this).val();
    var reserve_part = $(this).siblings('.reserve-part-hidden').val();
    var reserve_part_text = $(this).text();

    $('.modal-inner-date span').text(reserve_date);
    $('.modal-inner-part span').text(reserve_part_text);

    $('input[name="date"]').val(reserve_date);
    $('input[name="part"]').val(reserve_part);

    return false;
  });

  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  })


  $('.js-cancel').on('click', function (event) {
    event.preventDefault();

    $('input[name="date"]').val();
    $('input[name="part"]').val();
    $('#deleteParts').submit();

  })
});
