<?php
$title = 'Dashboard';
require APPROOT . '/views/inc/header.php';
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">Dashboard</b></h1>


<!--RealLine-->
<div class="grid grid-cols-1">

  <!--Rename for duplicate: chart1, options1-->
  <div class="w-full p-5 rounded-lg mb-2 box-card grid grid-cols-5 gap-x-4">

    <div id="linechart" class="w-full col-span-4"></div>
    <div class="w-9/10 col-span-1 box-card">
      <h1 class="text-xl text-white">DB Sessions</h1>
      <div class="card">
        <h2 id="RMS_num" class="text-red-500">RMS Sessions</h2>
      </div>
      <div class="card">
        <h2 id="RDW_num" class="text-blue-500">RDW Sessions</h2>
      </div>
      <div class="card">
        <h2 id="OFIN_num" class="text-green-400">OFIN Sessions</h2>
      </div>
    </div>
  </div>

  <?php

  $Sessions = $data['Sessions'];
  $FRA = $data['FRA'];

  ?>

  <div class="hidden" id="RMSSessions"><?php echo $Sessions['RMSSessions']; ?></div>
  <div class="hidden" id="RDWSessions"><?php echo $Sessions['RDWSessions']; ?></div>
  <div class="hidden" id="OFINSessions"><?php echo $Sessions['OFINSessions']; ?></div>

  <script>
    // For Show Window
    window.Apex = {
      chart: {
        foreColor: '#fff',
        toolbar: {
          show: false
        },
      },
      colors: ['#ff4d4d', '#4d4dff', '#4dff4d'], //line colors palette; Multiple Series
      stroke: {
        width: 2
      },
      dataLabels: {
        enabled: false
      },
      grid: {
        borderColor: "#fff",
        row: {
          colors: "#fff",
          opacity: 0.2
        },
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
        type: 'color',
        opacity: 0.2,
        gradient: {
          gradientToColors: ['#F55555', '#6078ea', '#6094ea']
        }
      },
      tooltip: {
        theme: 'dark',
        x: {
          formatter: function(val) {
            return moment(new Date(val).getTime() - (10 - 1) * 1000).format("hh:mm:ss")
          }
        }
      },
      yaxis: {
        decimalsInFloat: 2,
        opposite: true,
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
        var y = 0 //((Math.sin(i / trigoStrength) * (i / trigoStrength) + i / trigoStrength + 1) * (trigoStrength * 2))

        series.push([x, y]);
        baseval += 1000;
        i++;
      }
      return series;
    }

    //15000 = 15 seconds per tick
    var xRange = 1500000; //1000000 equivalent to 5 minutes interval shown on x axis is long; 5000000/1000000/1500000 is 5 minutes but short
    //------------------------------------------- 
    var optionsLine = {
      chart: {
        height: 250,
        type: 'area',
        id: 'realtime',
        stacked: false,
        animations: {
          enabled: true,
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
          animationEnd: function(chartCtx, opts) {
            const newData1 = chartCtx.w.config.series[0].data.slice()
            newData1.shift()
            const newData2 = chartCtx.w.config.series[1].data.slice()
            newData2.shift()
            const newData3 = chartCtx.w.config.series[2].data.slice()
            newData3.shift()

            // check animation end event for just 1 series to avoid multiple updates
            //For Multiple Series
            if (opts.el.node.getAttribute('index') === '0') {
              window.setTimeout(function() {
                chartCtx.updateOptions({
                  series: [{
                    data: newData1
                  }, {
                    data: newData2
                  }, {
                    data: newData3
                  }],
                  subtitle: {
                    text: RMS_Sessions,
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
          name: 'RMS',
          data: generateMinuteWiseTimeSeries(new Date().getTime() - (10 - 1) * 1000, 1, {
            min: 10,
            max: 90
          })
        },
        {
          name: 'RDW',
          data: generateMinuteWiseTimeSeries(new Date().getTime() - (10 - 1) * 1000, 1, {
            min: 10,
            max: 90
          })
        },
        {
          name: 'OFIN',
          data: generateMinuteWiseTimeSeries(new Date().getTime() - (10 - 1) * 1000, 1, {
            min: 10,
            max: 90
          })
        }
      ],
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
        text: '192.168.32.184 RMS_Sessions',
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

    window.setInterval(function() {

      iteration++;

      //For Multiple Series
      chartLine.updateSeries([{
        data: [...chartLine.w.config.series[0].data,
          [
            chartLine.w.globals.maxX + 1000,
            RMS_Sessions
          ]
        ]
      }, {
        data: [...chartLine.w.config.series[1].data,
          [
            chartLine.w.globals.maxX + 1000,
            RDW_Sessions
          ]
        ]
      }, {
        data: [...chartLine.w.config.series[2].data,
          [
            chartLine.w.globals.maxX + 1000,
            OFIN_Sessions
          ]
        ]
      }])


    }, 1000);
  </script>

  <script>
    var RMS_Sessions, RDW_Sessions, OFIN_Sessions;



    setInterval(() => {
      $.ajax({
        url: '../app/controllers/Homepage',
        dataType: 'html',
        success: function(response) {
          RMS_Sessions = jQuery(response).find('#RMSSessions').html();
          RDW_Sessions = jQuery(response).find('#RDWSessions').html();
          OFIN_Sessions = jQuery(response).find('#OFINSessions').html();

          document.getElementById("RMS_num").innerHTML = RMS_Sessions;
          document.getElementById("RDW_num").innerHTML = RDW_Sessions;
          document.getElementById("OFIN_num").innerHTML = OFIN_Sessions;
        }
      });

    }, 1000);
  </script>
</div>


<!--RealLine-->

<!--Donuts-->
<div class="grid grid-cols-1 md:grid-cols-3 gap-2 justify-center">
      <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->
      <?php foreach ($FRA as $db => $fras) {
        $total = explode('/', $fras); ?>
        <div class="w-full box-card rounded-lg">
          <div class="grid grid-cols-3">
            <canvas id="chartDonut<?php echo $db; ?>" class="col-span-2"></canvas>
            <div class="grid grid-rows-2 h-2/3">
              <div class="card">
                <h1 class="font-bold underline">Free</h1>
                <p class="text-xl"><?php echo $total[0]; ?>%</p>
              </div>
              <div class="card">
                <h1 class="font-bold underline">Used</h1>
                <p class="text-xl"><?php echo $total[1]; ?> %</p>
              </div>
            </div>
            
          </div>

          <script>
            let myChart<?php echo $db; ?> = document.getElementById('chartDonut<?php echo $db; ?>').getContext('2d');

            new Chart(myChart<?php echo $db; ?>, {
              type: 'doughnut',
              data: {
                labels: [
                  'Free',
                  'Used'
                ],
                datasets: [{
                  label: 'My First Dataset',
                  //Free, Used
                  data: [<?php echo $total[0]; ?>, <?php echo $total[1]; ?>],
                  backgroundColor: [
                    '#66ff33',
                    '#339933'
                  ],
                  borderColor: [
                    '#66ff33',
                    '#339933'
                  ],

                  hoverOffset: 20,
                  borderWidht: 4,
                }]
              },
              options: { //this is where i do changes for chart options, ref: https://www.chartjs.org/docs/latest/configuration/title.html
                layout: {
                  padding: {
                    right: 10
                  }
                },
                rotation: 90,
                responsive: false,
                cutout: '30%',
                hoverBorderColor: '#fff',
                plugins: {
                  legend: {
                    position: 'left',
                    align: 'end',
                    display: true, //remove the legend
                    labels: {
                      color: 'white',
                      textAlign: 'start',
                      boxWidth: 20
                    }
                  },
                  title: {
                    display: true,
                    text: '<?php echo str_replace('_FRA', '', $db); ?> Flash Recovery Area Usage',
                    align: 'start',
                    color: 'white',
                    position: 'top',
                    weight: 'bold',
                    font: {
                      size: 16
                    }
                  },
                  tooltip: {
                    intersect: 'true',
                    callbacks: {
                      label: function(context) {
                        var label = context.label,
                          currentValue = context.raw

                        return label + ": " + currentValue.toFixed(2) + '%)';
                      }
                    }
                  }
                },
              }
            });

            const config<?php echo $db; ?> = {
              type: 'doughnut',
              data: data
            };
          </script>

        </div>
      <?php  } ?>
    </div>
    <!--Donuts-->


<!-- DB Statuses -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-2 justify-center db-stat">
      <div class="w-full box-card rounded-lg text-md justify-center items-center  ">
        <h5 class="text-white font-bold">Hostname: <span class="underline">oradb1prd.kccmalls.com</span></h5>
        <table>
          <tr>
            <th>FRA Size: </th>
            <td><span>102,400 MB</span></td>
          </tr>
          <tr>
            <th>FRA Usage: </th>
            <td><span>10,726 MB</span></td>
          </tr>
          <tr>
            <th>Temp TS Free: </th>
            <td><span>3,489 MB</span></td>
          </tr>
          <tr>
            <th> </th>
            <td><span>3,490 MB</span></td>
          </tr>
          <tr>
            <th>Temp TS Usage: </th>
            <td><span>898 MB</span></td>
          </tr>
          <tr>
            <th> </th>
            <td><span>897 MB</span></td>
          </tr>
          <tr>
            <th>Locked Session: </th>
            <td><span>0</span></td>
          </tr>
          <tr>
            <th>DB Status: </th>
            <td class="text-red-500"><span>Bottle Neck Performance</span></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- DB Statuses -->



<?php require APPROOT . '/views/inc/footer.php'; ?>