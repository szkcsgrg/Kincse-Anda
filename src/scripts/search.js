$(document).ready(function(){
    $("#filter").on("keyup", function() {
        const value = $(this).val().toLowerCase();
        if(value.length > 0) {
            $(".row .item").each(function() {
                const row = $(this);
                $(this).children().each(function() {
                    if($(this).text().toLowerCase().includes(value)){
                        row.addClass("d-block");
                        row.removeClass("d-none");
                        return false;
                    } else {
                        row.addClass("d-none");
                        row.removeClass("d-block");
                    }
                });
            });
        } else {
            $(".row .item").each(function() {
                $(this).addClass("d-block");
                $(this).removeClass("d-none");
            });
        }
    });
});