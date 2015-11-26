<script type="text/javascript">
$(function () {
    $('#GraficoComparativoRecDespAno').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Controladoria Anual'
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
                month: '%e. %b',
                year: '%b'
            }
        },
        yAxis: {
            title: {
                text: ' '
            },
            min: 0
        },
        tooltip: {
            headerFormat: '<b>{series.name}</b><br>',
            pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
        },

        plotOptions: {
            spline: {
                marker: {
                    enabled: true
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Receitas',
            data: [
                [Date.UTC(1970,  9, 18), 0   ],
                [Date.UTC(1970,  9, 26), 0.2 ],
                [Date.UTC(1970, 11,  1), 0.47],
                [Date.UTC(1970, 11, 11), 0.55],
                [Date.UTC(1970, 11, 25), 1.38],
                [Date.UTC(1971,  0,  8), 1.38],
                [Date.UTC(1971,  0, 15), 1.38],
                [Date.UTC(1971,  1,  1), 1.38],
                [Date.UTC(1971,  1,  8), 1.48],
                [Date.UTC(1971,  1, 21), 1.5 ],
                [Date.UTC(1971,  2, 12), 1.89],
                [Date.UTC(1971,  2, 25), 2.0 ],
                [Date.UTC(1971,  3,  4), 1.94],
                [Date.UTC(1971,  3,  9), 1.91],
                [Date.UTC(1971,  3, 13), 1.75],
                [Date.UTC(1971,  3, 19), 1.6 ],
                [Date.UTC(1971,  4, 25), 0.6 ],
                [Date.UTC(1971,  4, 31), 0.35],
                [Date.UTC(1971,  5,  7), 0   ]
            ]
        }, {
            name: 'Despesas',
            data: [
                [Date.UTC(1970,  9,  9), 0   ],
                [Date.UTC(1970,  9, 14), 0.15],
                [Date.UTC(1970, 10, 28), 0.35],
                [Date.UTC(1970, 11, 12), 0.46],
                [Date.UTC(1971,  0,  1), 0.59],
                [Date.UTC(1971,  0, 24), 0.58],
                [Date.UTC(1971,  1,  1), 0.62],
                [Date.UTC(1971,  1,  7), 0.65],
                [Date.UTC(1971,  1, 23), 0.77],
                [Date.UTC(1971,  2,  8), 0.77],
                [Date.UTC(1971,  2, 14), 0.79],
                [Date.UTC(1971,  2, 24), 0.86],
                [Date.UTC(1971,  3,  4), 0.8 ],
                [Date.UTC(1971,  3, 18), 0.94],
                [Date.UTC(1971,  3, 24), 0.9 ],
                [Date.UTC(1971,  4, 16), 0.39],
                [Date.UTC(1971,  4, 21), 0   ]
            ]
        }, {
            name: 'Lucro',
            data: [
                [Date.UTC(1970,  9,  9), 0   ],
                [Date.UTC(1970,  9, 14), 0.05],
                [Date.UTC(1970, 10, 28), 0.05],
                [Date.UTC(1970, 11, 12), 0.16],
                [Date.UTC(1971,  0,  1), 0.29],
                [Date.UTC(1971,  0, 24), 0.28],
                [Date.UTC(1971,  1,  1), 0.32],
                [Date.UTC(1971,  1,  7), 0.15],
                [Date.UTC(1971,  1, 23), 0.27],
                [Date.UTC(1971,  2,  8), 0.17],
                [Date.UTC(1971,  2, 14), 0.19],
                [Date.UTC(1971,  2, 24), 0.16],
                [Date.UTC(1971,  3,  4), 0.2 ],
                [Date.UTC(1971,  3, 18), 0.34],
                [Date.UTC(1971,  3, 24), 0.3 ],
                [Date.UTC(1971,  4, 16), 0.19],
                [Date.UTC(1971,  4, 21), 0   ]
            ]
        }]
    });
});
		</script>