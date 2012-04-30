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