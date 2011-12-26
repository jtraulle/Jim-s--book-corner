$(document).ready(function(){
    $('.help-inline').hide();
    $('.error .help-inline').show();
    $("input").focus( function() {
        if ($(this).attr("class") != 'error')
            $(this).next().show();
    } );
    $("input").blur( function() {
        if ($(this).attr("class") != 'error')
            $(this).next().hide();
    } );
    $('.suppr').click(function(e) {
        e.preventDefault();
        thisHref = $(this).attr('href');
        if(confirm('Êtes vous sûr(e) de vouloir supprimer cet enregistrement ?')) {
            window.location = thisHref;
        }
    });
    $('#infosAuteur').load("lib/php/recupInfosAuteur.php?nomPrenomAuteur="+nomPrenomAuteur);
});