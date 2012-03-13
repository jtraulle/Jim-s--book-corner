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

    $("a[data-controls-modal]").click(function(){
        var href = $(this).attr("href");
        var id = href.match(/id=([^&]*)/)[1];
        $("#modal-from-dom a.btn-success").attr("href", $("#modal-from-dom a.btn-success").attr('href')+id);
        $("#modal-suppr a.btn-danger").attr("href", $("#modal-suppr a.btn-danger").attr('href')+id);
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

    var chart;

    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'graph',
            type: 'bar'
        },
        title: {
            text: 'Répartition des notes'
        },
        xAxis: {
            categories: ['Je trouve que c\'est un chef d\'oeuvre !','J\'ai adoré','J\'ai aimé beaucoup','J\'ai aimé un peu','Je n\'ai pas du tout aimé'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nombre de critiques',
                align: 'high'
            }
        },
        tooltip: {
            formatter: function() {
                return ''+
                    this.y +' critique(s)';
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
            series: [{
                name: 'Notes',
            data: [note1, note2, note3, note4, note5]
        }]
    });
});