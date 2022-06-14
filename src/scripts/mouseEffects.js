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

