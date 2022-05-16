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
            categories: [<?php echo $aluno_por_curso_nome; ?>]
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
            valueSuffix: ''
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
        series: [
       <?php 
            foreach ($aluno_por_curso_valores as $item) {
                echo '{ name: ' . $item['valor'] . ", data: [" . $item['quant'] . "] }, ";
            }
        ?>
        ]
    });
});
		</script>