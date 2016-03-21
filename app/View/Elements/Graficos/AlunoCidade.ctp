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
            categories: [<?php echo $cidade_nomes; ?>],
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
            data: [<?php echo $cidade_valores; ?>]
        }]
    });
});
</script>