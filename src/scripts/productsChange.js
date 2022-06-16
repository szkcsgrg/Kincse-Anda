$("#myDropDown").on('change',function(){
  let value = this.options[this.selectedIndex].value
  let swiperHolder = document.getElementById('swiper');
  let adminSwiper = document.getElementById('adminSwiper');
  let gridHolder = document.getElementById('grid');
  if(value){
    $.ajax({
      method: "POST",
      url: "components/sort.php",
      data: { category: value }
    }).done(function( msg ) {
        swiperHolder.innerHTML = msg;

        const swiper = new Swiper('.swiper', {
          autoplay: {
            delay: 15000,
          },
          direction: 'horizontal',
          loop: true,
          effect: 'slide',
          edgeSwipeDetection: true,
          grabCursor: true,
          speed: 500,
        });
      
      
        

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
        $("#galery-image").on('mouseenter', () =>{
          $("#cursor").addClass("zoom");
        })
        $("#galery-image").on('mouseleave', () =>{
          $("#cursor").removeClass("zoom");
        })

        $(".button_propd").on('click',function(e){
          let modal = document.getElementById('Modal');
          let id = document.getElementById(e.target.id).id; 
              $.ajax({
                  method: "POST",
                  url: "components/modal.php",
                  data: { id: id }
              }).done(function( msg ) {
                  modal.innerHTML = msg;
              })
        })
        $(".button_prod").on('click',function(e){
            let modal = document.getElementById('Modal');
            let id = document.getElementById(e.target.id).id; 
                $.ajax({
                    method: "POST",
                    url: "components/modal.php",
                    data: { id: id }
                }).done(function( msg ) {
                    modal.innerHTML = msg;
                })
        })
    })
    $.ajax({
      method: "POST",
      url: "components/gridView.php",
      data: { category: value }
    }).done(function( msg ) {
            gridHolder.innerHTML = msg;
    
            const swiper = new Swiper('.swiper', {
              autoplay: {
                delay: 15000,
              },
              direction: 'horizontal',
              loop: true,
              effect: 'slide',
              edgeSwipeDetection: true,
              grabCursor: true,
              speed: 500,
            });
          
          
            
    
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
$("#galery-image").on('mouseenter', () =>{
  $("#cursor").addClass("zoom");
})
$("#galery-image").on('mouseleave', () =>{
  $("#cursor").removeClass("zoom");
})

            $(".button_propd").on('click',function(e){
              let modal = document.getElementById('Modal');
              let id = document.getElementById(e.target.id).id; 
                  $.ajax({
                      method: "POST",
                      url: "components/modal.php",
                      data: { id: id }
                  }).done(function( msg ) {
                      modal.innerHTML = msg;
                  })
            })
            $(".button_prod").on('click',function(e){
                let modal = document.getElementById('Modal');
                let id = document.getElementById(e.target.id).id; 
                    $.ajax({
                        method: "POST",
                        url: "components/modal.php",
                        data: { id: id }
                    }).done(function( msg ) {
                        modal.innerHTML = msg;
                    })
            }) 

    });
    $.ajax({
      method: "POST",
      url: "components/adminSwiper.php",
      data: { category: value }
    }).done(function( msg ) {
      adminSwiper.innerHTML = msg;

      const swiper = new Swiper('.swiper', {
        autoplay: {
          delay: 15000,
        },
        direction: 'horizontal',
        loop: true,
        effect: 'slide',
        edgeSwipeDetection: true,
        grabCursor: true,
        speed: 500,
      });
    
    
      

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
      $("#galery-image").on('mouseenter', () =>{
        $("#cursor").addClass("zoom");
      })
      $("#galery-image").on('mouseleave', () =>{
        $("#cursor").removeClass("zoom");
      })

      
  })
  }
});


