function index() {
    'use strict'

    // TRANSACTIONS
    var myCanvas = document.getElementById("transactions");
    myCanvas.height = "330";

    var myCanvasContext = myCanvas.getContext("2d");
    var gradientStroke1 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke1.addColorStop(0, hexToRgba(myVarVal, 0.8) || 'rgba(108, 95, 252, 0.8)');
    gradientStroke1.addColorStop(1, hexToRgba(myVarVal, 0.2) || 'rgba(108, 95, 252, 0.2) ');

    var gradientStroke2 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke2.addColorStop(0, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.8)');
    gradientStroke2.addColorStop(1, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.2) ');
    document.getElementById('transactions').innerHTML = ''; 
    var myChart;
    myChart = new Chart(myCanvas, {

        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
            type: 'line',
            datasets: [{
                label: 'Nuevos Usuarios',
                data: [100, 210, 180, 454, 454, 230, 230, 656, 656, 350, 350, 210],
                backgroundColor: gradientStroke1,
                borderColor: myVarVal,
                pointBackgroundColor: '#fff',
                pointHoverBackgroundColor: gradientStroke1,
                pointBorderColor: myVarVal,
                pointHoverBorderColor: gradientStroke1,
                pointBorderWidth: 0,
                pointRadius: 0,
                pointHoverRadius: 0,
                borderWidth: 3,
                fill: 'origin'
            }, {
                label: 'Perfiles completados',
                data: [200, 530, 110, 110, 480, 520, 780, 435, 475, 738, 454, 454],
                backgroundColor: 'transparent',
                borderColor: '#05c3fb',
                pointBackgroundColor: '#fff',
                pointHoverBackgroundColor: gradientStroke2,
                pointBorderColor: '#05c3fb',
                pointHoverBorderColor: gradientStroke2,
                pointBorderWidth: 0,
                pointRadius: 0,
                pointHoverRadius: 0,
                borderWidth: 3,
                fill: 'origin',

            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                enabled: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: false,
                },
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        color: 'rgba(119, 119, 142, 0.08)'
                    },
                    ticks: {
                        fontColor: '#b0bac9',
                        autoSkip: true,
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month',
                        fontColor: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 1050,
                        stepSize: 150,
                        fontColor: "#b0bac9",
                    },
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false,
                        zeroLineColor: 'rgba(142, 156, 173,0.1)',
                        color: "rgba(142, 156, 173,0.1)",
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'sales',
                        fontColor: 'transparent'
                    }
                }]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    });
}


reporte_estados=JSON.parse(reporte_estados);
console.log(reporte_estados)

if(reporte_estados.valor)
var max = Math.max(...reporte_estados.valor);

    /* Bar-Chart1 */

    var ctx = document.getElementById("chartBar1").getContext('2d');
    if(reporte_estados.valor)
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: reporte_estados.campo,
            datasets: [{
                label: 'Estructuras',
                data:reporte_estados.valor,
                borderWidth: 2,
                backgroundColor: '#6c5ffc',
                borderColor: '#6c5ffc',
                borderWidth: 2.0,
                pointBackgroundColor: '#ffffff',

            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: true
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: max,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                }],
                xAxes: [{
                    barPercentage: 0.4,
                    barValueSpacing: 0,
                    barDatasetSpacing: 0,
                    barRadius: 0,
                    ticks: {
                        display: true,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        display: false,
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                }]
            },
            legend: {
                labels: {
                    fontColor: "#9ba6b5"
                },
            },
        }
    });

    $("#select-estructura").change(function () {

       var id_rol =  $(this).val();

       location.href ='?idrol='+id_rol;

    })
