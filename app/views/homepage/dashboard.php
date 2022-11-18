<?php 
$title = 'Dashboard';
require APPROOT . '/views/inc/header.php'; 
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white"><b>Dashboard</b></h1>
<div class=" object-contain grid grid-cols-1 md:grid-cols-3 gap-4">
    
    <?php 

      $Sessions = $data['Sessions'];
      $FRA = $data['FRA'];
      $DBStatus = $data['DB Status'];

    ?>

      <div class="hidden" id="RMSSessions"><?php echo $Sessions['RMSSessions']; ?></div>
      <div class="hidden" id="RMSDBStatus"><?php echo $DBStatus['RMS_DBSTATUS']; ?></div>

    <!--RealLine-->
    <div class="col-span-2">
      
      <!--Rename for duplicate: chart1, options1-->
      <div class="w-full h-full p-5 rounded-lg mb-2 box">

          <div id="linechart" class="invisible"></div>

          <div class="card grid grid-rows-2 gap-2">
            <div class="row-span-1">
              <div class="grid grid-cols-3 cardp">
                <div class="cardb">
                  <h4>Hostname</h4>
                  <p>asdwasdawdas</p>
                </div>
                <div class="cardb">
                  <h4>IP Address</h4>
                  <p>12399172712</p>
                </div>
                <div class="cardb">
                  <h4>DB Size</h4>
                  <p>449626 MB</p>
                </div>
              </div>
            </div>

            <div class="row-span-1">
            <div class="grid grid-cols-4 cardp">
                <div class="cardb">
                  <h4>Total Sessions</h4>
                  <p>443</p>
                </div>
                <div class="cardb">
                  <h4>Inactive Sessions</h4>
                  <p>412</p>
                </div>
                <div class="cardb">
                  <h4>Active Sessions</h4>
                  <p>0</p>
                </div>
                <div class="cardb">
                  <h4>System Sessions</h4>
                  <p>22</p>
                </div>
              </div>
            </div>
            
          </div>

      </div>

      

      <script>
          // For Show Window
          window.Apex = {
              chart: {
              foreColor: '#fff',
              toolbar: {
                  show: false
              },
              },
              colors: ['#0099ff'], //line colors palette; Multiple Series
              stroke: {
              width: 2
              },
              dataLabels: {
              enabled: false
              },
              grid: {
              borderColor: "#fff",
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
              type: 'gradient',
              gradient: {
                  gradientToColors: ['#F55555', '#6078ea', '#6094ea']
              },
              },
              tooltip: {
              theme: 'dark',
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
              height: '60%',
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

                  // check animation end event for just 1 series to avoid multiple updates
                  //For Multiple Series
                  if (opts.el.node.getAttribute('index') === '0') {
                      window.setTimeout(function () {
                      chartCtx.updateOptions({
                          series: [{
                          data: newData1
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
              name: 'Session ',
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

          window.setInterval(function () {
                  
              iteration++;

              //For Multiple Series
              chartLine.updateSeries([{
              data: [...chartLine.w.config.series[0].data,
                  [
                  chartLine.w.globals.maxX + 1000,
                  RMS_Sessions
                  ]
              ]
              }])


          }, 1000);
      </script>
    </div>
    <!--RealLine-->

    <script>
      var RMS_Sessions;
      var RMS_DBStatus;

            setInterval(() => {
              $.ajax({ 
                url: '../app/controllers/Homepage/getRMSSessions',
                dataType: 'html', 
                success: function(response) { 
                  RMS_Sessions = jQuery(response).find('#RMSSessions').html();

                  RMS_DBStatus = jQuery(response).find('#RMSDBStatus').html();

                  document.getElementById('RMS_DBSTATUS').innerHTML = RMS_DBStatus;
                } 
                });


            }, 1000);
    </script>

    
    <div class="grid grid-cols-1 md:grid-rows-2 gap-2 justify-center col-span-1">
      <!--Donuts-->
      <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->
      <!-- <?php foreach ($FRA as $db => $fras) {
        $total = explode('/', $fras); ?> -->
        <div class="w-full box rounded-lg">
          <div class="grid grid-cols-3 place-center">
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
                  },
                  autopadding: true
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
      <!--Donuts-->

      <!-- DB Statuses -->
      <?php 
      foreach ($DBStatus as $key => $value) {
      ?>
        <div class="w-full box rounded-lg text-md justify-center items-center db-stat">
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
              <th>    </th>
              <td><span>3,490 MB</span></td>
            </tr>
            <tr>
              <th>Temp TS Usage: </th>
              <td><span>898 MB</span></td>
            </tr>
            <tr>
              <th>    </th>
              <td><span>897 MB</span></td>
            </tr>
            <tr>
              <th>Locked Session: </th>
              <td><span>0</span></td>
            </tr>
            <tr>
              <th>DB Status: </th>
              <td class="text-red-500" id="<?php echo $key; ?>"><span><?php echo $value; ?></span></td>
            </tr>
          </table>
        </div>
        <?php 
            }
      ?>
      <!-- DB Statuses -->
      </div>

</div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>