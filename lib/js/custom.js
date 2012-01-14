$(document).ready(function(){
    $(".chzn-select").chosen();
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
    if(typeof(nomPrenomAuteur) != "undefined"){ 
        $('#infosAuteur').load("lib/php/recupInfosAuteur.php?nomPrenomAuteur="+nomPrenomAuteur);
    }    
    $.datepicker.setDefaults($.datepicker.regional['fr']);
    $('#dateEvenement').datetimepicker({ 
        dateFormat: 'yy-mm-dd',
        timeFormat: 'hh:mm:ss'
    });
    $('.infobulle').twipsy();
    $(".alert-message").alert();
    $( "#accordion" ).accordion();
    $('#modal').modal();
});