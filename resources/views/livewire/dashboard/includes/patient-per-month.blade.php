<div>
    <div class="chart-area w-100">
        <canvas id="myAreaChartPatients" class="w-100"></canvas>
    </div>
    <div class="includes">
   <div>
    <script>
       $(document).ready(function(){

    //    })
        var chartVisit = document.getElementById("myAreaChartPatients");
        //    chartVisit.empty(); 

                    var dataSetValue = [];
                    var dataSetName = [];
                    var patientCount = [];
                    $patientCountTemp = [];
                    var i;


                    var myLineChartVisit = new Chart(chartVisit, {
                        type: 'line',
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                            datasets: [
                                {
                                    label: '{{$data[0]['year']}}',
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(219, 31, 72, 0.05)",
                                    borderColor: "rgba(219, 31, 72, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(219, 31, 72, 1)",
                                    pointBorderColor: "rgba(219, 31, 72, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(219, 31, 72, 1)",
                                    pointHoverBorderColor: "rgba(219, 31, 72, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: [
                            
                                            {{$data[0]['peryear'][1]}},
                                            {{$data[0]['peryear'][2]}},
                                            {{$data[0]['peryear'][3]}},
                                            {{$data[0]['peryear'][4]}},
                                            {{$data[0]['peryear'][5]}},
                                            {{$data[0]['peryear'][6]}},
                                            {{$data[0]['peryear'][7]}},
                                            {{$data[0]['peryear'][8]}},
                                            {{$data[0]['peryear'][9]}},
                                            {{$data[0]['peryear'][10]}},
                                            {{$data[0]['peryear'][11]}},
                                            {{$data[0]['peryear'][12]}}
                                        ],
                                },
                                {
                                    label: '{{$data[1]['year']}}',
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(97, 54, 89, 0.05)",
                                    borderColor: "rgba(97, 54, 89, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(97, 54, 89, 1)",
                                    pointBorderColor: "rgba(97, 54, 89, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(97, 54, 89, 1)",
                                    pointHoverBorderColor: "rgba(97, 54, 89, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: [
                            
                                            {{$data[1]['peryear'][1]}},
                                            {{$data[1]['peryear'][2]}},
                                            {{$data[1]['peryear'][3]}},
                                            {{$data[1]['peryear'][4]}},
                                            {{$data[1]['peryear'][5]}},
                                            {{$data[1]['peryear'][6]}},
                                            {{$data[1]['peryear'][7]}},
                                            {{$data[1]['peryear'][8]}},
                                            {{$data[1]['peryear'][9]}},
                                            {{$data[1]['peryear'][10]}},
                                            {{$data[1]['peryear'][11]}},
                                            {{$data[1]['peryear'][12]}}
                                        ],
                                },
                                {
                                    label: '{{$data[2]['year']}}',
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(0, 0, 255, 0.05)",
                                    borderColor: "rgba(0, 0, 255, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(0, 0, 255, 1)",
                                    pointBorderColor: "rgba(0, 0, 255, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(0, 0, 255, 1)",
                                    pointHoverBorderColor: "rgba(0, 0, 255, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: [
                            
                                            {{$data[2]['peryear'][1]}},
                                            {{$data[2]['peryear'][2]}},
                                            {{$data[2]['peryear'][3]}},
                                            {{$data[2]['peryear'][4]}},
                                            {{$data[2]['peryear'][5]}},
                                            {{$data[2]['peryear'][6]}},
                                            {{$data[2]['peryear'][7]}},
                                            {{$data[2]['peryear'][8]}},
                                            {{$data[2]['peryear'][9]}},
                                            {{$data[2]['peryear'][10]}},
                                            {{$data[2]['peryear'][11]}},
                                            {{$data[2]['peryear'][12]}}
                                        ],
                                },
                                {
                                    label: '{{$data[3]['year']}}',
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(255, 131, 0, 0.05)",
                                    borderColor: "rgba(255, 131, 0, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(255, 131, 0, 1)",
                                    pointBorderColor: "rgba(255, 131, 0, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(255, 131, 0, 1)",
                                    pointHoverBorderColor: "rgba(255, 131, 0, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: [
                            
                                            {{$data[3]['peryear'][1]}},
                                            {{$data[3]['peryear'][2]}},
                                            {{$data[3]['peryear'][3]}},
                                            {{$data[3]['peryear'][4]}},
                                            {{$data[3]['peryear'][5]}},
                                            {{$data[3]['peryear'][6]}},
                                            {{$data[3]['peryear'][7]}},
                                            {{$data[3]['peryear'][8]}},
                                            {{$data[3]['peryear'][9]}},
                                            {{$data[3]['peryear'][10]}},
                                            {{$data[3]['peryear'][11]}},
                                            {{$data[3]['peryear'][12]}}
                                        ],
                                },
                                {
                                    label: '{{$data[4]['year']}}',
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(194, 109, 188, 0.05)",
                                    borderColor: "rgba(194, 109, 188, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(194, 109, 188, 1)",
                                    pointBorderColor: "rgba(194, 109, 188, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(194, 109, 188, 1)",
                                    pointHoverBorderColor: "rgba(194, 109, 188, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: [
                            
                                            {{$data[4]['peryear'][1]}},
                                            {{$data[4]['peryear'][2]}},
                                            {{$data[4]['peryear'][3]}},
                                            {{$data[4]['peryear'][4]}},
                                            {{$data[4]['peryear'][5]}},
                                            {{$data[4]['peryear'][6]}},
                                            {{$data[4]['peryear'][7]}},
                                            {{$data[4]['peryear'][8]}},
                                            {{$data[4]['peryear'][9]}},
                                            {{$data[4]['peryear'][10]}},
                                            {{$data[4]['peryear'][11]}},
                                            {{$data[4]['peryear'][12]}}
                                        ],
                                },
                                {
                                    label: '{{$data[5]['year']}}',
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(10, 112, 41, 0.05)",
                                    borderColor: "rgba(10, 112, 41, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(10, 112, 41, 1)",
                                    pointBorderColor: "rgba(10, 112, 41, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(10, 112, 41, 1)",
                                    pointHoverBorderColor: "rgba(10, 112, 41, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: [
                            
                                            {{$data[5]['peryear'][1]}},
                                            {{$data[5]['peryear'][2]}},
                                            {{$data[5]['peryear'][3]}},
                                            {{$data[5]['peryear'][4]}},
                                            {{$data[5]['peryear'][5]}},
                                            {{$data[5]['peryear'][6]}},
                                            {{$data[5]['peryear'][7]}},
                                            {{$data[5]['peryear'][8]}},
                                            {{$data[5]['peryear'][9]}},
                                            {{$data[5]['peryear'][10]}},
                                            {{$data[5]['peryear'][11]}},
                                            {{$data[5]['peryear'][12]}}
                                        ],
                                },
                                {
                                    label: '{{$data[6]['year']}}',
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(248, 210, 16, 0.05)",
                                    borderColor: "rgba(248, 210, 16, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(248, 210, 16, 1)",
                                    pointBorderColor: "rgba(248, 210, 16, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(248, 210, 16, 1)",
                                    pointHoverBorderColor: "rgba(248, 210, 16, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: [
                            
                                            {{$data[6]['peryear'][1]}},
                                            {{$data[6]['peryear'][2]}},
                                            {{$data[6]['peryear'][3]}},
                                            {{$data[6]['peryear'][4]}},
                                            {{$data[6]['peryear'][5]}},
                                            {{$data[6]['peryear'][6]}},
                                            {{$data[6]['peryear'][7]}},
                                            {{$data[6]['peryear'][8]}},
                                            {{$data[6]['peryear'][9]}},
                                            {{$data[6]['peryear'][10]}},
                                            {{$data[6]['peryear'][11]}},
                                            {{$data[6]['peryear'][12]}}
                                        ],
                                }
                                // 
                                
                            ],
                        },

                    options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
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
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                            }
                        }
                    }
                }
                
            });
            // myLineChartVisit.legend_layout = "vertical"
        });
    </script>
</div>
</div>
