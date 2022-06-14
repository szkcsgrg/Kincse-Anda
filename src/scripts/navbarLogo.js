$(function navbarLogo() {
    var landing = $('.home-landing').height()-250;
    $('.logo').toggleClass('d-not');
    $(window).scroll(function () {
        if ($(this).scrollTop() > landing) {
            $('.logo').removeClass('d-not');
            $('.logo').addClass('d-show');
         }
         if ($(this).scrollTop() < landing) {
            $('.logo').addClass('d-not');
            $('.logo').removeClass('d-show');
         }
    })
})