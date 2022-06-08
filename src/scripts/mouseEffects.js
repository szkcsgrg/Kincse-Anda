/* 
    Swipers Mouse Events
*/
$("#swiper").mouseenter( () =>{
    $("#cursor").addClass("drag");
})
$("#swiper").mouseleave( () =>{
    $("#cursor").removeClass("drag");
})

/* 
    Buttons Mouse Events
*/
$(".button-wrap").mouseenter( () =>{
    $("#cursor").addClass("bttn");
})
$(".button-wrap").mouseleave( () =>{
    $("#cursor").removeClass("bttn");
})

/* 
    Links Mouse Events
*/
$("li a").mouseenter( () =>{
    $("#cursor").addClass("links");
})
$("li a").mouseleave( () =>{
    $("#cursor").removeClass("links");
})

/* 
    Burger Mouse Events
*/
$(".burger").mouseenter( () =>{
    $("#cursor").addClass("bttn");
})
$(".burger").mouseleave( () =>{
    $("#cursor").removeClass("bttn");
})

