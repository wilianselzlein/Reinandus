<script type="text/javascript">
$(function () {
    $('#GraficoComparativoRecebPagarMes').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: 'Financeiro Mensal'
        },
        subtitle: {
            text: 'Comparativo Contas a Receber X Pagar'
        },
        xAxis: {
            allowDecimals: false,
            labels: {
                formatter: function () {
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
            title: {
                text: 'Valor Líquido (R$)'
            },
            labels: {
                formatter: function () {
                    return this.value / 1000;
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name} <b>{point.y:,.0f}</b><br/>Dia {point.x}'
        },
        credits: {
        	enabled: false
        },
        plotOptions: {
            area: {
                pointStart: 1,
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            name: 'Receber',
            data: [null, null, null, null, null, 6, 11, 32, 110, 235, 369, 640,
                1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,
                27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342, 26662]
        }, {
            name: 'Pagar',
            data: [null, null, null, null, null, null, null, null, null, null,
                5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
                4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643]
        }]
    });
});
		</script>