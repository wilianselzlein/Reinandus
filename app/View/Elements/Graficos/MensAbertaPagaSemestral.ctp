
<script type="text/javascript">
$(function () {
    $('#GraficoMensAbertaPagaSemestral').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Semestral'
        },
        xAxis: {
            categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun']
        },
        yAxis: {
            min: 0,
            title: {
                text: ' '
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black'
                    }
                }
            }
        },
        credits: {
        	enabled: false
        },
        series: [{
            name: 'Abertas',
            data: [5, 3, 4, 7, 2, 1]
        }, {
            name: 'Fechadas',
            data: [2, 2, 3, 2, 1, 0]
        }]
    });
});
		</script>