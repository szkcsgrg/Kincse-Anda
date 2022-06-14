$("#myDropDown").on('change',function(){
  let value = this.options[this.selectedIndex].value
  let swiperHolder = document.getElementById('swiper');
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
  }
});


