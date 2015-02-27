		<script type="text/javascript">
$(function () {
    $('#GraficoAlunoCidade').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Por Cidade'
        },
        xAxis: {
            categories: ['Curitiba', 'Registro', 'Mafra', 'Fraiburgo'],
            title: {
                text: null
            }
        },
        tooltip: {
            valueSuffix: ' alunos'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            floating: true,
        },
        credits: {
            enabled: false
        },
        series: [{
            name: ' ',
            data: [973, 914, 4054, 732]
        }]
    });
});
		</script>