<script type="text/javascript">
$(function () {
    $('#GraficoCursoAlunos').highcharts({
        title: {
            text: 'Total de Alunos por Curso',
            x: -20 //center
        },
        subtitle: {
            text: 'Todas as situações',
            x: -20
        },
        xAxis: {
            categories: ['2011', '2012', '2013', '2014', '2015']
        },
        yAxis: {
            title: {
                text: 'Total de Alunos'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'GE',
            data: [10, 20, 30, 40, 50]
        }, {
            name: 'CF',
            data: [20, 30, 40, 50, 60]
        }, {
            name: 'LOGO',
            data: [10, 11, 12, 13, 10]
        }, {
            name: 'SI',
            data: [0, 0, 5, 10, 15]
        }]
    });
});
		</script>