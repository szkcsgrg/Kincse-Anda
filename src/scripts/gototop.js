$(function () {
    var landing = $('.home-landing').height()-250;
    $(window).scroll(function() {
        if ($(this).scrollTop() > landing) {
            $('.gototop').removeClass('d-not');
            $('.gototop').addClass('d-show');
         }
         if ($(this).scrollTop() < landing) {
            $('.gototop').addClass('d-not');
            $('.gototop').removeClass('d-show');
         }
    })
})