<script type="text/javascript">
$(function () {
    $('#GraficoAlunoPorAno').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Por ano'
        },
        subtitle: {
            text: 'Comparação com Ativos'
        },
        xAxis: {
            categories: ['2012', '2013', '2014', '2015', '2016']
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Total',
            data: [100, 150, 200, 250, 300]
        }, {
            name: 'Ativos',
            data: [90, 125, 150, 175, 200]
        }]
    });
});
		</script>