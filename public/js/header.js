// click btn infos perso
$(document).ready(function(){
    // afficher la div infomations Perso au click sur la flèche du bas dans le header
    $('.fa-sort-down').on('click', function(){
        $('.btn_infos a').toggle();
        $('#background_modal').show();
    })
    // caché la div infomations Perso dans le header au click hors de la div
    $('#background_modal').click(function(){
        console.log('ok');
        $('.btn_infos a').hide();
        $(this).hide();
    })


    
});