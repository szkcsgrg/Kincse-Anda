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