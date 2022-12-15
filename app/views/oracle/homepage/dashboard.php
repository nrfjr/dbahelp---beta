<?php
$title = 'Dashboard';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; 
?>

<h1 class="text-3xl text-black mb-5 text-white"><b>Dashboard</b></h1>
<div class=" object-contain grid grid-cols-1 2xl:grid-cols-3 xl:grid-cols-2 lg:grid-cols-2 gap-4 cardz place-content-evenly">

  <?php

  $Sessions = $data['Sessions'];
  $FRA = $data['FRA'];
  $FRA_Size = $FRA['FRA Size'];
  $FRA_Usage = $FRA['FRA Usage'];
  $FRA_Percent = $FRA['FRA Percentage'];
  $DBStatus = $data['DB Status'];
  $DBInfo = $data['DB Info'];
  $LockedSessions = $data['Locked Sessions'];
  $TempTS = $data['Temp TS'];

  ?>

  <div class="hidden" id="Sessions"><?php echo $Sessions; ?></div>
  <div class="hidden" id="DBStatus"><?php echo $DBStatus; ?></div>
  <div class="hidden" id="DBInfoArray"><?php foreach ($DBInfo as $i) {
                                          echo $i . '/';
                                        } ?></div>

  <!--RealLine-->
  <div class="2xl:col-span-2 lg:col-span-1">

    <!--Rename for duplicate: chart1, options1-->
    <div class="w-full h-full p-5 rounded-lg mb-2 box relative">

      <div id="linechart" ></div>
      <font id="noData" class="z-10 transition absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-2xl text-white font-bold">Loading Sessions...</font>

      <div class="card grid grid-rows-2 gap-2">
        <div class="row-span-1">
          <div class="grid grid-cols-3 cardp">
            <div class="cardb">
              <p>Hostname</p>
              <h1 id="Hostname" title="Hostname"><?php echo $DBInfo['Hostname']; ?></h1>
            </div>
            <div class="cardb">
              <p>IP Address</p>
              <h1 id="IP" title="IP Address"><?php echo $DBInfo['IP Address']; ?></h1>
            </div>
            <div class="cardb">
              <p>DB Size</p>
              <h1 id="Size" title="Database Size"><?php echo $DBInfo['DB SIZE']; ?></h1>
            </div>
          </div>
        </div>

        <div class="row-span-1">
          <div class="grid grid-cols-4 cardp">
            <div class="cardb">
              <p>Total Sessions</p>
              <h1 id="TotalSes" title="Total Sessions">Fetching...</h1>
            </div>
            <div class="cardb">
              <p>Inactive Sessions</p>
              <h1 id="InactiveSes" title="Total Inactive Sessions">Fetching...</h1>
            </div>
            <div class="cardb">
              <p>Active Sessions</p>
              <h1 id="Active_Num" title="Total Active Sessions">Fetching...</h1>
            </div>
            <div class="cardb">
              <p>System Sessions</p>
              <h1 id="SystemSes" title="Total System Sessions">Fetching...</h1>
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
            show: true
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
            gradientToColors: ['#8f99a6', '#6078ea', '#6094ea']
          },
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
          var y = 0 //((Math.sin(i / trigoStrength) * (i / trigoStrength) + i / trigoStrength + 1) * (trigoStrength * 2))

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
            animationEnd: function(chartCtx, opts) {
              const newData1 = chartCtx.w.config.series[0].data.slice()
              newData1.shift()

              // check animation end event for just 1 series to avoid multiple updates
              //For Multiple Series
              if (opts.el.node.getAttribute('index') === '0') {
                window.setTimeout(function() {
                  chartCtx.updateOptions({
                    series: [{
                      data: newData1
                    }],
                    subtitle: {
                      text: sessions,
                    },
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
          data: generateMinuteWiseTimeSeries(new Date().getTime() - (10 - 1) * 1000, 1, {
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
          text: '<?php echo $DBInfo['IP Address']; ?> Active Sessions',
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
        if (Sessions != null) {
          chartLine.updateSeries([{
            data: [...chartLine.w.config.series[0].data,
              [
                chartLine.w.globals.maxX + 1000,
                Sessions
              ]
            ]
          }])
          document.getElementById("noData").style.display = "none";
        } else {
          console.log("no session")
          document.getElementById("noData").style.display = "static";
        }

      }, 1000);
    </script>
  </div>
  <!--RealLine-->

  <script>
    var Sessions, DBStatus, DBInfo, TotalSes, InactiveSes, SystemSes;
    var DBInfoArray;

    setInterval(() => {
      $.ajax({
        url: '../app/controllers/Homepage',
        dataType: 'html',
        success: function(response) {
          
          Sessions = jQuery(response).find('#Sessions').html();

          DBStatus = jQuery(response).find('#DBStatus').html();

          DBInfoArray = jQuery(response).find('#DBInfoArray').html();

          DBInfo = DBInfoArray.split('/');

          TotalSes = DBInfo[3];
          InactiveSes = DBInfo[4];
          SystemSes = DBInfo[5];

          document.getElementById('DBSTATUS').innerHTML = DBStatus;
          document.getElementById('Active_Num').innerHTML = Sessions === null ? 'Fetching...' : Sessions;
          document.getElementById('TotalSes').innerHTML = TotalSes;
          document.getElementById('InactiveSes').innerHTML = InactiveSes;
          document.getElementById('SystemSes').innerHTML = SystemSes;
        }
      });


    }, 15000);
  </script>


  <div class="grid grid-cols-1 lg:grid-rows-2 gap-2 justify-center col-span-1">
    <!--Donuts-->
    <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->
    <!-- <?php
          $total = explode('/', $FRA_Percent); ?> -->
    <div class="w-full box rounded-lg">
      <div class="grid grid-cols-3 place-center">
        <canvas id="chartDonut" class="col-span-2"></canvas>
        <div class="grid grid-rows-2 h-2/3 col-span-1 z-10 gap-y-6 ">
          <div class="sm-card xl:card">
            <p class="font-bold">Free</p>
            <h1 class="text-xl"><?php echo $total[0]; ?>%</h1>
          </div>
          <div class="sm-card xl:card">
            <p class="font-bold">Used</p>
            <h1 class="text-xl"><?php echo $total[1]; ?> %</h1>
          </div>
        </div>
      </div>

      <script>
        let myChartDonut = document.getElementById('chartDonut').getContext('2d');

        new Chart(myChartDonut, {
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
                '#339933',
                '#66ff33'
              ],
              borderColor: [
                '#339933',
                '#66ff33'
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
                text: 'Flash Recovery Area Usage',
                align: 'start',
                color: 'white',
                position: 'top',
                weight: 'bold',
                font: {
                  size: '15%'
                }
              },
              tooltip: {
                position: 'custom',
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
      </script>
    </div>
    <!--Donuts-->

    <!-- DB Statuses -->
    <div class="w-full box rounded-lg text-md justify-center items-center db-stat">
      <h5 class="text-white font-bold">Hostname: <span id="DBStatusTitle" class="underline"><?php echo $DBInfo['Hostname']; ?></span></h5>
      <table>
        <tr title="Flash Recovery Area Size">
          <th>FRA Size: </th>
          <td><span><?php echo $FRA_Size; ?></span></td>
        </tr>
        <tr title="Flash Recovery Area Usage">
          <th>FRA Usage: </th>
          <td><span><?php echo $FRA_Usage; ?></span></td>
        </tr>
        <tr title="Temp Tablespace Free Size">
          <th>Temp TS Free: </th>
          <td>
            <?php foreach ($TempTS as $tsarray => $tsfree) { ?>
              <span><?php echo $tsfree['TEMP FREE']; ?></span>
              <br>
            <?php } ?>
          </td>
        </tr>
        <tr title="Temp Tablespace Usage Size">
          <th>Temp TS Usage: </th>
          <td>
            <?php foreach ($TempTS as $tsarray => $tsused) { ?>
              <span><?php echo $tsused['TEMP USED']; ?></span>
              <br>
            <?php } ?>
          </td>
        </tr>
        <tr title="Total Locked Sessions">
          <th>Locked Session: </th>
          <td><span><?php echo $LockedSessions; ?></span></td>
        </tr>
        <tr title="Database Performance">
          <th>DB Performance Status: </th>
          <td class="text-red-500"><span id="DBSTATUS"><?php echo $DBStatus; ?></span></td>
        </tr>
      </table>
    </div>
    <!-- DB Statuses -->
  </div>

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>