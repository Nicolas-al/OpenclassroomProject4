$(document).ready(function(){
    $('aside').on({
        mouseenter : function(){
            $('aside').removeClass('mini');
            $('aside').addClass('zoom');
        },
        mouseleave : function(){
            $('aside').removeClass('zoom');
            $('aside').addClass('mini');
        }
    })
    //console.log(salut);
});