function moderate(id) {
        $.ajax({
        url: 'index.php?action=deleteReport&commentid=' + id,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) { // success est toujours en place, bien sûr !
            let balise = '#' + id;
            $(balise).css({
                'display': 'none'
            });
        },
        error: function (resultat, statut, erreur) {
            alert('error');
        }
    });
}