 // For Show Window
 window.Apex = {
    chart: {
    foreColor: '#fff',
    toolbar: {
        show: false
    },
    },
    colors: ['#0099ff', '#0066ff', '#0000cc'], //line colors palette; Multiple Series
    stroke: {
    width: 2
    },
    dataLabels: {
    enabled: false
    },
    xaxis: {
    axisTicks: {
        color: '#873e23#'
    },
    axisBorder: {
        color: "##873e23"
    }
    },
    fill: {
    type: 'image',
    opacity: 0.2,
    gradient: {
        gradientToColors: ['#F55555', '#6078ea', '#6094ea']
    },
    image: {
        src: ['../../../../dbahelp/public/img/kcc.png'],
        width: 480,
        height: 300
    }
    },
    tooltip: {
    theme: 'dark',
    followCursor: false,
    fixed: {
        enabled: false,
        position: 'topRight',
        offsetX: 0,
        offsetY: 0,
    },
    x: {
      formatter: function (val) {
          return moment(new Date(val).getTime()-(10 - 1)*1000).format("hh:mm:ss")
        }
    }
    },
    yaxis: {
    decimalsInFloat: 2,
    opposite: false,
    labels: {
        offsetX: -10
    }
    }
};

// For Randomization (Remove in the future)
var trigoStrength = 3
var iteration = 11

function generateMinuteWiseTimeSeries(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
    var x = baseval;
    var y = 0//((Math.sin(i / trigoStrength) * (i / trigoStrength) + i / trigoStrength + 1) * (trigoStrength * 2))

    series.push([x, y]);
    baseval += 1000;
    i++;
    }
    return series;
}

//15000 = 15 seconds per tick
var xRange = 1000000; //1000000 equivalent to 5 minutes interval shown on x axis is long; 5000000/1000000/1500000 is 5 minutes but short
//------------------------------------------- 
var optionsLine = {
    chart: {
    height: 320,
    type: 'area',
    id: 'realtime',
    stacked: false,
    animations: {
        enabled: false,
        easing: 'linear',
        dynamicAnimation: {
          enabled: false, // from true to false
          speed: 1000
        }
    },
    dropShadow: {
        enabled: true,
        opacity: 0.3,
        blur: 5,
        left: -7,
        top: 22
    },
    //For Multiple Series
    events: {
        animationEnd: function (chartCtx, opts) {
        const newData1 = chartCtx.w.config.series[0].data.slice()
        newData1.shift()
        const newData2 = chartCtx.w.config.series[1].data.slice()
        newData2.shift()
        const newData3 = chartCtx.w.config.series[2].data.slice()
        newData3.shift()
        const newData4 = chartCtx.w.config.series[3].data.slice()
        newData4.shift()

        // check animation end event for just 1 series to avoid multiple updates
        //For Multiple Series
        if (opts.el.node.getAttribute('index') === '0') {
            window.setTimeout(function () {
            chartCtx.updateOptions({
                series: [{
                data: newData1
                }, {
                data: newData2
                }, {
                data: newData3
                }, {
                data: newData4
                }],
                subtitle: {
                text: sessions,
                }
            }, false, false)
            }, 1000)
        }

        }
    },
    toolbar: {
        show: false
    },
    zoom: {
        enabled: false
    }
    },
    dataLabels: {
    enabled: false
    },
    stroke: {
    curve: 'smooth',
    width: 5,
    },
    grid: {
        show: true,
        borderColor: '#99ccff',
        strokeDashArray: 0,
        position: 'back',
        xaxis: {
            lines: {
                show: true
            }
        },   
        yaxis: {
            lines: {
                show: true
            }
        },  
        row: {
            colors: undefined,
            opacity: 0.1
        },  
        column: {
            colors: undefined,
            opacity: 0.1
        },  
        padding: {
            left: 0,
            right: 0
        }
    
    },
    markers: {
    size: 0,
    hover: {
        size: 0
    }
    },
    //For Multiple Series
    //initial series range '12' of x
    series: [{
    name: 'Session',
    data: generateMinuteWiseTimeSeries(new Date().getTime()-(10 - 1)*1000, 1, {
        min: 10,
        max: 90
    })
    }, {
    name: 'Session 2',
    data: generateMinuteWiseTimeSeries(new Date().getTime()-(10 - 1)*1000, 1, {
        min: 10,
        max: 90
    })
    }, {
    name: 'Session 3',
    data: generateMinuteWiseTimeSeries(new Date().getTime()-(10 - 1)*1000, 1, {
        min: 10,
        max: 90
    })
    }, {
    name: 'Session 4',
    data: generateMinuteWiseTimeSeries(new Date().getTime()-(10 - 1)*1000, 1, {
        min: 10,
        max: 90
    })
    }],
    xaxis: {
    type: 'datetime',
    tickPlacement: 'on',
    range: xRange,
    labels: {
      // formatter: function (val) {
      //   return moment(new Date(val)).format("hh:mm")
      // }
      datetimeUTC: false, //finally the fix to the x-axis time problem
        format: 'hh:mm TT'
    }
    },
    title: {
    text: '192.168.32.184 Sessions',
    align: 'left',
    style: {
        fontSize: '12px'
    }
    },
    subtitle: {
    text: '',
    floating: true,
    align: 'right',
    offsetY: 0,
    style: {
        fontSize: '8px'
    }
    },
    legend: {
    show: true,
    floating: true,
    verticalAlign: 'right',
    onItemClick: {
        toggleDataSeries: false
    },
    position: 'top',
    offsetY: -28,
    offsetX: 60
    },
}

var chartLine = new ApexCharts(
    document.querySelector("#linechart"),
    optionsLine
);
chartLine.render()

//random Number generator - sample data purposes
function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1) ) + min;
}

window.setInterval(function () {
        
    iteration++;

    //For Multiple Series
    chartLine.updateSeries([{
    data: [...chartLine.w.config.series[0].data,
        [
        chartLine.w.globals.maxX + 1000,
        sessions
        ]
    ]
    }, {
    data: [...chartLine.w.config.series[1].data,
        [
        chartLine.w.globals.maxX + 1000,
        getRndInteger(50, 55)
        ]
    ]
    }, {
    data: [...chartLine.w.config.series[2].data,
        [
        chartLine.w.globals.maxX + 1000,
        getRndInteger(100, 110)
        ]
    ]
    }, {
    data: [...chartLine.w.config.series[3].data,
        [
        chartLine.w.globals.maxX + 1000,
        getRndInteger(10, 40)
        ]
    ]
    }])


}, 1000);