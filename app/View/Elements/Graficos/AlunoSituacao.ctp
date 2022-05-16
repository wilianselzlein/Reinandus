<script type="text/javascript">
$(function () {
    $('#GraficoAlunoSituacao').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Por Situação'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                /*{
                    name: 'Ativos',
                    y: 50,
                    sliced: true,
                    selected: true
                },
                ['Inativos', 20],
                ['TCC', 10],
                ['Outras', 20]*/
                <?php 
                foreach ($situacao_valores as $item) {
                    echo '[' . $item['valor'] . ", " . $item['quant'] . "], ";
                }
                ?>
            ]
        }]
    });
});
</script>
