// Start Dashboard Chart JS Kier Aguilar 12/9/2022 

let patientsCountPerMonth;
var myLinetrial;
var dataSetsArray = [];
var labelSetsArray = [];
var dataTemp = [];
const datasetsConst =
{
    label: '',
    fillColor: '',
    strokeColor: '',
    pointColor: '',
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: '',
    data: [],

};
const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

const colorsPalette = [
    '207, 40, 31',
    '153, 59, 179',
    '0, 153, 223',
    '0, 191, 155',
    '248, 195, 1',
    '245, 120, 0',
    '123, 140, 140',
    '39, 61, 82'
]
$(document).ready(function () {
    if (window.location.href.includes('home')) {
        renderChart();
    }

});
function renderChart() {
    let currentYear = new Date().getFullYear();

    $("#perYear").val(currentYear);
    dashboardPatientPerMonth(currentYear);
}
function dashboardPatientPerMonth(year) {

    patientsCountPerMonth = [];

    var i;
    const DATA_COUNT = 12;

    const NUMBER_CFG = { count: DATA_COUNT, min: 0, max: 100 };

    var ctxs = document.getElementById("myAreaChartPatientsTrial").getContext("2d");
    var progress = document.getElementById('animationProgress');
    var data = {
        labels: labels,


        datasets: [

        ]
    };
    lineChartData = data.datasets;



    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
    }),
        $.ajax({
            url: "getPatientPerMonth",
            type: "GET",

            success: function (t) {
                console.log(t);
                $(".loader-charts-dashboard").css("display", "block");

                // Start Rendering chart
                myLineChart = new Chart(ctxs, {
                    type: 'line',
                    data: {
                        labels: labels,
                        // datasets: data.datasets
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            },

                        },
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'date'
                                },
                                // gridLines: {
                                //     display: false,
                                //     drawBorder: false
                                // },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    maxTicksLimit: 10,
                                    padding: 10,
                                    // Include a dollar sign in the ticks
                                    callback: function (value, index, values) {
                                        return '' + number_format(value);
                                    }
                                },
                                gridLines: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            }],
                        },
                        legend: {
                            labels: {
                                // boxHeight: 0
                                usePointStyle: true,
                                pointStyle: "true"
                            },
                            display: true,
                            // position: "chartArea",
                            position: "right",
                            align: "start"

                        }
                        ,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 5,
                            yPadding: 5,
                            displayColors: false,
                            intersect: false,
                            mode: 'index',
                            caretPadding: 10,
                            callbacks: {
                                label: function (tooltipItem, chart) {
                                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                    return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                                }
                            }
                        }
                    }
                });

                // End Rendering chart
                // var chartCanvas = document.getElementById("myAreaChartPatientsTrial");

                // chartCanvas.attr("hidden", true);


                patientsCountPerMonth = t.patientsCountPerMonth;

                data.datasets.length = patientsCountPerMonth.length;
                console.log(Object.keys(patientsCountPerMonth[0].peryear).length);
                for (let i = 0; i < data.datasets.length; i++) {
                    data.datasets[i] = {};

                    data.datasets[i].label = patientsCountPerMonth[i]['year'];
                    data.datasets[i].fillColor = `rgba(${colorsPalette[i]}, 1)`;
                    data.datasets[i].strokeColor = `rgba(${colorsPalette[i]}, 1)`;
                    data.datasets[i].pointColor = `rgba(${colorsPalette[i]}, 1)`;
                    data.datasets[i].borderColor = `rgba(${colorsPalette[i]}, 1)`;
                    data.datasets[i].backgroundColor = `rgba(${colorsPalette[i]}, 0.05)`;
                    data.datasets[i].pointBackgroundColor = `rgba(${colorsPalette[i]}, 1)`;
                    data.datasets[i].pointBorderColor = `rgba(${colorsPalette[i]}, 1)`;
                    data.datasets[i].pointHoverBackgroundColor = `rgba(${colorsPalette[i]}, 1)`;
                    data.datasets[i].pointHoverBorderColor = `rgba(${colorsPalette[i]}, 1)`;

                    data.datasets[i].pointRadius = 3;
                    data.datasets[i].pointHoverRadius = 3;
                    data.datasets[i].pointHitRadius = 10;

                    data.datasets[i].data = [];

                    for (let j = 1; j <= Object.keys(patientsCountPerMonth[i]['peryear']).length; j++) {
                        data.datasets[i].data.push(patientsCountPerMonth[i]['peryear'][j]);
                        // console.log(data.datasets[i].data[j]);

                        // console.log(data.datasets[i].data);
                    }

                }
                myLineChart.data.datasets = data.datasets;
                // $("#myAreaChartPatientsTrial").css("display", "block !important");
                myLineChart.update();
                // myLineChart.attr("hidden", false);

                createPieChart(t.patientsCountPerMonth);
                createBrgyLineChart(t.perBrgy);
                $(".loader-charts-dashboard").css("display", "none");
                // $("#patients-line-chart").attr('hidden', false);


            }
        });
}

function createBrgyLineChart(perBrgy) {
    console.log(perBrgy);

    var brgyLineChart = document.getElementById("brgyLineChart").getContext("2d");
    myLineChart = new Chart(brgyLineChart, {
        type: 'line',
        data: {
            labels: labels,
            // datasets: data.datasets
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                },

            },
            scales: {
                xAxes: [{
                    time: {
                        // unit: 'date'
                    },
                    // gridLines: {
                    //     display: false,
                    //     drawBorder: false
                    // },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 10,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            return '' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                labels: {
                    // boxHeight: 0
                    usePointStyle: true,
                    pointStyle: "true"
                },
                display: true,
                // position: "chartArea",
                position: "bottom",
                align: "start"

            }
            ,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 5,
                yPadding: 5,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });

    // End Rendering chart
    // var chartCanvas = document.getElementById("myAreaChartPatientsTrial");

    // chartCanvas.attr("hidden", true);


    patientsCountPerBrgy = perBrgy;

    // data.datasets.length = patientsCountPerBrgy.length;
    // console.log(patientsCountPerMonth);
    // data.datasets.length = patientsCountPerMonth.length;
    console.log(Object.keys(patientsCountPerBrgy[0].perMonth).length);
    for (let i = 0; i < Object.keys(patientsCountPerBrgy).length; i++) {
        myLineChart.data.datasets[i] = {};

        myLineChart.data.datasets[i].label = checkEmptyName(patientsCountPerBrgy[i]['brgy']);
        myLineChart.data.datasets[i].fillColor = `rgba(${colorsPalette[i]}, 1)`;
        myLineChart.data.datasets[i].strokeColor = `rgba(${colorsPalette[i]}, 1)`;
        myLineChart.data.datasets[i].pointColor = `rgba(${colorsPalette[i]}, 1)`;
        myLineChart.data.datasets[i].borderColor = `rgba(${colorsPalette[i]}, 1)`;
        myLineChart.data.datasets[i].backgroundColor = `rgba(${colorsPalette[i]}, 0.05)`;
        myLineChart.data.datasets[i].pointBackgroundColor = `rgba(${colorsPalette[i]}, 1)`;
        myLineChart.data.datasets[i].pointBorderColor = `rgba(${colorsPalette[i]}, 1)`;
        myLineChart.data.datasets[i].pointHoverBackgroundColor = `rgba(${colorsPalette[i]}, 1)`;
        myLineChart.data.datasets[i].pointHoverBorderColor = `rgba(${colorsPalette[i]}, 1)`;

        myLineChart.data.datasets[i].pointRadius = 3;
        myLineChart.data.datasets[i].pointHoverRadius = 3;
        myLineChart.data.datasets[i].pointHitRadius = 10;

        myLineChart.data.datasets[i].data = [];

        for (let j = 1; j <= Object.keys(patientsCountPerBrgy[i]['perMonth']).length; j++) {
            myLineChart.data.datasets[i].data.push(patientsCountPerBrgy[i]['perMonth'][j]);
        }

    }
    // myLineChart.data.datasets = data.datasets;
    // $("#myAreaChartPatientsTrial").css("display", "block !important");
    myLineChart.update();
}

function createPieChart(patientPerMonth) {

    var pieChart = document.getElementById("patientPieChart").getContext("2d");
    var data = {
        labels: labels,


        datasets: [

        ]
    };
    // pieChart.width = 1000;
    // pieChart.height = 1000;
    lineChartData = data.datasets;
    myPieChart = new Chart(pieChart, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: [],
                backgroundColor: [],

                // hoverBackgroundColor: ['#2e59d9', '#17a673','CC0000'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true,
                position: "bottom",
            },
            // cutoutPercentage: 80,
        },
    });

    // End Rendering chart
    // var chartCanvas = document.getElementById("myAreaChartPatientsTrial");

    // chartCanvas.attr("hidden", true);


    patientsCountPerMonth = patientPerMonth;
    let year = new Date().getFullYear();

    // if (patientsCountPerMonth[])
    for (let i = 0; i < patientsCountPerMonth.length; i++) {
        if (patientsCountPerMonth[i]['year'] == year) {
            perMonth = patientsCountPerMonth[i]['peryear'];
        }
    }
    console.log(perMonth);
    // data.datasets.length = Object.keys(perMonth).length;

    // data.datasets = {};
    // data.datasets.data = [];
    myPieChart.data.datasets[0].backgroundColor = [
        '#05445E', '#189AB4', '#75E6DA', '#E74A3B', '#E4D4C8', '#F8D210', '#0A7029', '#C26DBC', '#FF8300', '#0000FF', '#613659', '#0E86D4'


    ];
    // console.log(Object.keys(perMonth).length);

    for (let j = 1; j <= Object.keys(perMonth).length; j++) {
        // console.log("asd");
        // data.datasets.borderColor = `rgb(${colorsPalette[j]})`;
        // data.datasets.backgroundColor[j - 1] = `rgb(${colorsPalette[j - 1]})`;
        myPieChart.data.datasets[0].data.push(perMonth[j]);
        // console.log(data.datasets.data[j]);

    }
    // console.log(myPieChart.data);
    // myPieChart.data = data;
    // $("#myAreaChartPatientsTrial").css("display", "block !important");
    myPieChart.update();
    return;
}
function checkEmptyName(name) {
    if (name == "") {
        name = "NO ADDRESS GIVEN";
    } else {
        name = name;
    }
    return name;
}

// End Dashboard Chart JS Kier Aguilar 12/9/2022 