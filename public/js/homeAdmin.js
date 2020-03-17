$(document).ready(function () {
    // affichage des couleurs du statut des chapitre (en ligne/ non posté)
    var paraTitlePost = $('.post_status');
    for (var i = 0; i < paraTitlePost.length; i++) {
        if ($(paraTitlePost[i]).html() === 'en ligne') {
            $(paraTitlePost[i]).css({
                'background': '#09a509',
                'color': '#fea'
            });
        } else {
            console.log('zut');
            $(paraTitlePost[i]).css({
                'background': '#b10606',
                'color': 'white'
            });
        };
    }
})