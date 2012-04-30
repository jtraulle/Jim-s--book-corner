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
    $('.dropdown-toggle').dropdown()
    $(".alert-message").alert();
    $( "#accordion" ).accordion({
        autoHeight: false,
        navigation: true
    });
    $('#modal').modal();
    
    $("textarea").markItUp(mySettings);

    $("a[data-controls-modal]").click(function(){
        var href = $(this).attr("href");
        $("#modal-from-dom a.btn-success").attr("href", href);
        $("#modal-suppr a.btn-danger").attr("href", href);
    });

    $('.showmodal').click(function(e) {
        e.preventDefault();
        $('#modal-from-dom').modal({
            keyboard: true,
            backdrop: true
        })
        $('#modal-from-dom').modal('toogle');
    });

    $(".rating").rating({showCancel: false});
});