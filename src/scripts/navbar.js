
function burgerO(){
    $('.logo').removeClass('d-show');
    $('.logo').addClass('d-not');
    $(".navigation-menu").toggleClass("d-show");
    $(".navigation-menu").toggleClass("d-not");
    $("nav").toggleClass("navigation");
    $(".burger").toggleClass("burger-active");
    
}

$(function() {
    var landing = $('.landing').height();
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