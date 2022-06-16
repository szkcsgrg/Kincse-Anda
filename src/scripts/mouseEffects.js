/* 
    Swipers Mouse Events
*/
$("#swiper").on('mouseenter', () =>{
    $("#cursor").addClass("drag");
})
$("#swiper").on('mouseleave', () =>{
    $("#cursor").removeClass("drag");
})
$(".modal").on('mouseenter', () =>{
    $("#cursor").removeClass("drag");
})


/* 
    Buttons Mouse Events
*/
$(".button-wrap").on('mouseenter', () =>{
    $("#cursor").addClass("bttn");
})
$(".button-wrap").on('mouseleave', () =>{
    $("#cursor").removeClass("bttn");
})

/* 
    Links Mouse Events
*/
$("li a").on('mouseenter', () =>{
    $("#cursor").addClass("links");
})
$("li a").on('mouseleave', () =>{
    $("#cursor").removeClass("links");
})
$(".link").on('mouseenter', () =>{
    $("#cursor").addClass("bttn");
})
$(".link").on('mouseleave', () =>{
    $("#cursor").removeClass("bttn");
})
$(".item").on('mouseenter', () =>{
    $("#cursor").addClass("wt");
})
$(".item").on('mouseleave', () =>{
    $("#cursor").removeClass("wt");
})

/* 
    Burger Mouse Events
*/
$(".burger").on('mouseenter', () =>{
    $("#cursor").addClass("bttn");
})
$(".burger").on('mouseleave', () =>{
    $("#cursor").removeClass("bttn");
})
$(".gototop").on('mouseenter', () =>{
    $("#cursor").addClass("bttn");
})
$(".gototop").on('mouseleave', () =>{
    $("#cursor").removeClass("bttn");
})


/*
    Design elements Mouse Events
*/
$("#landing_image_logo").on('mouseenter', () =>{
    $("#cursor").addClass("logoh");
})
$("#landing_image_logo").on('mouseleave', () =>{
    $("#cursor").removeClass("logoh");
})
$("#wave").on('mouseenter', () =>{
    $("#cursor").addClass("wt");
})
$("#wave").on('mouseleave', () =>{
    $("#cursor").removeClass("wt");
})
$("#wave2").on('mouseenter', () =>{
    $("#cursor").addClass("wt");
})
$("#wave2").on('mouseleave', () =>{
    $("#cursor").removeClass("wt");
})
$("#logo").on('mouseenter', () =>{
    $("#cursor").addClass("logot");
})
$("#logo").on('mouseleave', () =>{
    $("#cursor").removeClass("logot");
})
$(".galery-image").on('mouseenter', () =>{
    $("#cursor").addClass("zoom");
})
$(".galery-image").on('mouseleave', () =>{
    $("#cursor").removeClass("zoom");
})