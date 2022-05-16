<script type="text/javascript">
$(function () {
    $('#GraficoCursoRentavel').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Curso mais Rentáveis'
        },
        xAxis: {
            categories: ['2012', '2013', '2014', '2015', '2016']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total faturamento por curso'
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'CF',
            data: [5, 3, 4, 7, 2]
        }, {
            name: 'GE',
            data: [2, 2, 3, 2, 1]
        }, {
            name: 'LOGO',
            data: [3, 4, 4, 2, 5]
        }]
    });
});
		</script>