<?php 
$title = 'Dashboard';
require APPROOT . '/views/inc/header.php'; 
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

    <h1 class="text-3xl text-black pb-2 text-white"><b>Dashboard</b></h1>

    <!--RealLine-->
    <div class="grid grid-cols-1">
      
      <!--Rename for duplicate: chart1, options1-->

      <!-- <div class="w-2/7 bg-gray-600 p-5 rounded-lg mb-2">
          <div id="chart1"></div>
          <script>
                window.Promise ||
                  document.write(
                    '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
                  )
                window.Promise ||
                  document.write(
                    '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
                  )
                window.Promise ||
                  document.write(
                    '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
                  )
          </script>


          <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


          <script>
            //NOLI: I think I fixed the x-axis, or need some adjustment, but then the only problem now is Y-axis.
            // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
            // Based on https://gist.github.com/blixt/f17b47c62508be59987b
            var _seed = 42;
            Math.random = function() {
              _seed = _seed * 16807 % 2147483647;
              return (_seed - 1) / 2147483646;
            };
          </script>

          <script>
          var lastDate = 0;
          var data = []
          var TICKINTERVAL = 1000//86400000  //1000 is recommended which matches 1 second //if any changes, needs to match with the interval below
          let XAXISRANGE =  TICKINTERVAL*9//777600000  x-axis , time shown//this is like the interval, 1000000 = to 5 min; 3500000 = 15 min

          function getDayWiseTimeSeries(baseval, count, yrange) {
          var i = 0;
          while (i < count) {
            var x = baseval;
            var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min; //this one is the initial value for Y

            data.push({
              x, y
            });
            lastDate = baseval
            baseval += TICKINTERVAL;
            i++;
          }
          }

          let initNumber = 10
          getDayWiseTimeSeries(new Date().getTime()-(initNumber - 1)*TICKINTERVAL, initNumber, {
            min: 10,
            max: 90
          })


          function getNewSeries(baseval, yrange) {
          var newDate = baseval + TICKINTERVAL;
          lastDate = newDate
          //change the value below for configuring the data Reset length
          for(var i = 0; i< data.length - 150; i++) {
            // IMPORTANT
            // we reset the x and y of the data which is out of drawing area
            // to prevent memory leaks
            data[i].x = newDate - XAXISRANGE - TICKINTERVAL
            //i dunno about this code, its initial value is 0, i think this is the y value every after page refresh
            data[i].y = 0
          }

          data.push({
            x: newDate,
            y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min //this where Y axis and updating can be control
          })
          }

          function resetData(){
          // Alternatively, you can also reset the data at certain intervals to prevent creating a huge series 
          data = data.slice(data.length - 100, data.length);
          }
          </script>
          <script>
            
            var options1 = {
              series: [{
              data: data.slice()
            }],
              chart: {
              foreColor: 'white',
              id: 'realtime',
              height: 300 ,
              type: 'area',
              animations: {
                enabled: true,
                easing: 'linear',
                dynamicAnimation: {
                  speed: 1000
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
              curve: 'smooth'
            },
            title: {
              text: 'Users Session Chart Sample',
              align: 'left'
            },
            markers: {
              size: 0
            },
            xaxis: {
              type: 'datetime',
              range: XAXISRANGE,
            },
            yaxis: {
              max: 100
            },
            legend: {
              show: true
            },
            };
            var chart1 = new ApexCharts(document.querySelector("#chart1"), options1);
            chart1.render();


            window.setInterval(function () {
            getNewSeries(lastDate, {
              min: 10,
              max: 90
            })

            chart1.updateSeries([{
              data: data
            }])
          }, 1000 /*refresh interval 15 sec*/)

          </script>
      </div> -->
    
      <div class="w-full p-5 rounded-lg mb-2 box">

          <div id="linechart"></div>

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
              colors: ['#0099ff', '#0066ff', '#0000cc'], //line colors palette; Multiple Series
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
                  return moment(new Date(val)).format("HH:mm:ss")
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

          function getRandom() {
              var i = iteration;
              return (Math.sin(i / trigoStrength) * (i / trigoStrength) + i / trigoStrength + 1) * (trigoStrength * 2)
          }

          function getRangeRandom(yrange) {
              return Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
          }

          function generateMinuteWiseTimeSeries(baseval, count, yrange) {
              var i = 0;
              var series = [];
              while (i < count) {
              var x = baseval;
              var y = ((Math.sin(i / trigoStrength) * (i / trigoStrength) + i / trigoStrength + 1) * (trigoStrength * 2))

              series.push([x, y]);
              baseval += 15000;
              i++;
              }
              return series;
          }

          function getNewData(baseval, yrange) {
              var newTime = baseval + 15000;
              return {
              x: newTime,
              y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
              }
          }
          //15000 = 15 seconds per tick
          var xRange = 5000000; //1000000 equivalent to 5 minutes interval shown on x axis is long; 1000000 is 5 minutes but short
          //-------------------------------------------
          var optionsLine = {
              chart: {
              height: 320,
              type: 'area',
              id: 'realtime',
              stacked: false,
              animations: {
                  enabled: true,
                  easing: 'linear',
                  dynamicAnimation: {
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
                          }],
                          subtitle: {
                          text: parseInt(getRandom() * Math.random()).toString(),
                          }
                      }, false, false)
                      }, 300)
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
              curve: 'straight',
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
              name: 'Running',
              data: generateMinuteWiseTimeSeries(new Date().getTime()-(10 - 1)*15000, 10, {
                  min: 10,
                  max: 90
              })
              }, {
              name: 'Waiting',
              data: generateMinuteWiseTimeSeries(new Date().getTime()-(10 - 1)*15000, 10, {
                  min: 10,
                  max: 90
              })
              }, {
              name: 'Hatsusin',
              data: generateMinuteWiseTimeSeries(new Date().getTime()-(10 - 1)*15000, 10, {
                  min: 10,
                  max: 90
              })
              }],
              xaxis: {
              type: 'datetime',
              tickPlacement: 'on',
              range: xRange
              },
              title: {
              text: 'Processes',
              align: 'left',
              style: {
                  fontSize: '12px'
              }
              },
              subtitle: {
              text: 'Subtitle',
              floating: true,
              align: 'right',
              offsetY: 0,
              style: {
                  fontSize: '22px'
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


          //test function only
          function gRandom() {
              return Math.floor(Math.random() * 100);
          }

          window.setInterval(function () {
                  
              iteration++;

              //For Multiple Series
              chartLine.updateSeries([{
              data: [...chartLine.w.config.series[0].data,
                  [
                  chartLine.w.globals.maxX + 15000,
                  gRandom()
                  ]
              ]
              }, {
              data: [...chartLine.w.config.series[1].data,
                  [
                  chartLine.w.globals.maxX + 15000,
                  21
                  ]
              ]
              }, {
              data: [...chartLine.w.config.series[2].data,
                  [
                  chartLine.w.globals.maxX + 15000,
                  getRandom() * 2
                  ]
              ]
              }])


          }, 15000);
      </script>
    </div>
    <!--RealLine-->

    
    
    <!--Donuts-->
    <div class="grid grid-cols-4 gap-4 justify-center">
      <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->
      <div class="w-full box rounded-lg">
        <div>
          <canvas id="chartDonut1" class="hat">
            <a></a>
          </canvas>
        </div>

          <script>

            var u01 = ["31231231","41312311"];

            let myChart1 = document.getElementById('chartDonut1').getContext('2d');
            
            let sampleChart1 = new Chart(myChart1, {
              type: 'doughnut',
              data: {
                labels:[
                  'Free',
                  'Used'
                ],
                datasets:[{
                  label: 'My First Dataset',
                          //Free, Used
                  data: [u01[1], u01[0]],
                  backgroundColor: [
                    '#66ff33',
                    '#339933'
                  ],
                  borderColor: [
                    '#66ff33',
                    '#339933'
                  ],
                  
                  hoverOffset: 20,
                  borderWidht:4,
                }]
              },
              options:{ //this is where i do changes for chart options, ref: https://www.chartjs.org/docs/latest/configuration/title.html
                layout:{
                  padding:{
                    right: 10
                  }
                },
                rotation: 90,
                responsive: true,
                cutout: '30%',
                hoverBorderColor: '#fff',
                plugins: {
                  legend: {
                    position: 'left',
                    align: 'end',
                    display: true,     //remove the legend
                    labels: {
                      color: 'white',
                      textAlign: 'start',
                      boxWidth: 20
                    }
                  },
                  title: {
                    display: true,
                      text: 'OFIN Flash Recovery Area Usage',
                      align: 'start',
                      color: 'white',
                      position: 'top',
                      weight: 'bold',
                      font:{
                        size: 16
                      }
                  },
                  tooltip:{
                    intersect: 'true',
                    callbacks: {
                      label: function(context){
                        var label = context.label,
                            currentValue = context.raw,
                            total = context.chart._metasets[context.datasetIndex].total;

                        var percentage = parseFloat((currentValue/total*100).toFixed(1));
                        let unit;
                        let convertedVal;
                        if ((currentValue/1024) < 1024){
                          convertedVal = currentValue/1024
                          unit = 'KB';
                        }
                        else if ((currentValue/1048576) < 1024){
                          convertedVal = currentValue/1048576
                          unit = 'MB';
                        }
                        else if ((currentValue/1073741824) < 1024){
                          convertedVal = currentValue/1073741824
                          unit = 'GB';
                        }
                        else{
                          convertedVal = currentValue/1099511627776
                          unit = 'TB';
                        }

                        return label + ": " + convertedVal.toFixed(2) + unit + ' (' + percentage + '%)';
                      }
                    }
                  }
                },
              }

            });

            const config1 = {
              type: 'doughnut',
              data: data
            };
          </script>
      </div>
      <div class="w-full box rounded-lg">
        <div>
          <canvas id="chartDonut2" class="hat"></canvas>
        </div>

        
          <script>
            var u02 = ["71234123","123123"];

            let myChart2 = document.getElementById('chartDonut2').getContext('2d');

            let sampleChart2 = new Chart(myChart2, {
              type: 'doughnut',
              data: {
                labels:[
                  'Free',
                  'Used'
                ],
                datasets:[{
                  label: 'My First Dataset',
                  data: [u02[1], u02[0]],
                  backgroundColor: [
                    '#66ff33',
                    '#339933'
                  ],
                  borderColor: [
                    '#66ff33',
                    '#339933'
                  ],
                  
                  hoverOffset: 20,
                  borderWidht:4,
                }]
              },
              options:{ //this is where i do changes for chart options, ref: https://www.chartjs.org/docs/latest/configuration/title.html
                layout:{
                  padding:{
                    right: 10
                  }
                },
                rotation: 90,
                responsive: true,
                cutout: '30%',
                hoverBorderColor: '#fff',
                plugins: {
                  legend: {
                    position: 'left',
                    align: 'end',
                    display: true,     //remove the legend
                    labels: {
                      color: 'white',
                      textAlign: 'start',
                      boxWidth: 20
                    }
                  },
                  title: {
                    display: true,
                      text: 'OFIN Flash Recovery Area Usage',
                      align: 'start',
                      color: 'white',
                      position: 'top',
                      weight: 'bold',
                      font:{
                        size: 16
                      }
                  },
                  tooltip:{
                    intersect: 'true',
                    callbacks: {
                      label: function(context){
                        var label = context.label,
                            currentValue = context.raw,
                            total = context.chart._metasets[context.datasetIndex].total;

                        var percentage = parseFloat((currentValue/total*100).toFixed(1));
                        let unit;
                        let convertedVal;
                        if ((currentValue/1024) < 1024){
                          convertedVal = currentValue/1024
                          unit = 'KB';
                        }
                        else if ((currentValue/1048576) < 1024){
                          convertedVal = currentValue/1048576
                          unit = 'MB';
                        }
                        else if ((currentValue/1073741824) < 1024){
                          convertedVal = currentValue/1073741824
                          unit = 'GB';
                        }
                        else{
                          convertedVal = currentValue/1099511627776
                          unit = 'TB';
                        }

                        return label + ": " + convertedVal.toFixed(2) + unit + ' (' + percentage + '%)';
                      }
                    }
                  }
                },
              }

            });

            const config2 = {
              type: 'doughnut',
              data: data,
            };
          </script>
      </div> 
      <div class="w-full box rounded-lg">
        <div>
          <canvas id="chartDonut3" class="hat"></canvas>
        </div>

        
          <script>
            var u03 = ["488146","687928"];

            let myChart3 = document.getElementById('chartDonut3').getContext('2d');

            let sampleChart3 = new Chart(myChart3, {
              type: 'doughnut',
              data: {
                labels:[
                  'Free',
                  'Used'
                ],
                datasets:[{
                  label: 'My First Dataset',
                  data: [u03[1], u03[0]],
                  backgroundColor: [
                    '#66ff33',
                    '#339933'
                  ],
                  borderColor: [
                    '#66ff33',
                    '#339933'
                  ],
                  
                  hoverOffset: 20,
                  borderWidht:4,
                }]
              },
              options:{ //this is where i do changes for chart options, ref: https://www.chartjs.org/docs/latest/configuration/title.html
                layout:{
                  padding:{
                    right: 10
                  }
                },
                rotation: 90,
                responsive: true,
                cutout: '30%',
                hoverBorderColor: '#fff',
                plugins: {
                  legend: {
                    position: 'left',
                    align: 'end',
                    display: true,     //remove the legend
                    labels: {
                      color: 'white',
                      textAlign: 'start',
                      boxWidth: 20
                    },
                  },
                  title: {
                    display: true,
                      text: 'OFIN Flash Recovery Area Usage',
                      align: 'start',
                      color: 'white',
                      position: 'top',
                      weight: 'bold',
                      font:{
                        size: 16
                      }
                  },
                  tooltip:{
                    intersect: 'true',
                    callbacks: {
                      label: function(context){
                        var label = context.label,
                            currentValue = context.raw,
                            total = context.chart._metasets[context.datasetIndex].total;

                        var percentage = parseFloat((currentValue/total*100).toFixed(1));
                        let unit;
                        let convertedVal;
                        if ((currentValue/1024) < 1024){
                          convertedVal = currentValue/1024
                          unit = 'KB';
                        }
                        else if ((currentValue/1048576) < 1024){
                          convertedVal = currentValue/1048576
                          unit = 'MB';
                        }
                        else if ((currentValue/1073741824) < 1024){
                          convertedVal = currentValue/1073741824
                          unit = 'GB';
                        }
                        else{
                          convertedVal = currentValue/1099511627776
                          unit = 'TB';
                        }

                        return label + ": " + convertedVal.toFixed(2) + unit + ' (' + percentage + '%)';
                      }
                    }
                  }
                },
              }

            });

            const config3 = {
              type: 'doughnut',
              data: data
            };
          </script>
      </div>
      <div class="w-full  box rounded-lg">
        <div>
          <canvas id="chartDonut4" class="hat"></canvas>
        </div>

        
          <script>
            var u04 = ["312312314","5476245"];

            let myChart4 = document.getElementById('chartDonut4').getContext('2d');

            let sampleChart4 = new Chart(myChart4, {
              type: 'doughnut',
              data: {
                labels:[
                  'Free',
                  'Used'
                ],
                datasets:[{
                  label: 'DISK',
                  data: [u04[1], u04[0]],
                  backgroundColor: [
                    '#66ff33',
                    '#339933'
                  ],
                  borderColor: [
                    '#66ff33',
                    '#339933'
                  ],
                  
                  hoverOffset: 20,
                  borderWidht:4,
                }]
              },
              options:{ //this is where i do changes for chart options, ref: https://www.chartjs.org/docs/latest/configuration/title.html
                layout:{
                  padding:{
                    right: 10
                  }
                },
                rotation: 90,
                responsive: true,
                cutout: '30%',
                hoverBorderColor: '#fff',
                plugins: {
                  legend: {
                    position: 'left',
                    align: 'end',
                    display: true,     //remove the legend
                    labels: {
                      color: 'white',
                      textAlign: 'start',
                      boxWidth: 20
                    }
                  },
                  title: {
                    display: true,
                      text: 'OFIN Flash Recovery Area Usage',
                      align: 'start',
                      color: 'white',
                      position: 'top',
                      weight: 'bold',
                      font:{
                        size: 16
                      }
                  },
                  tooltip:{
                    intersect: 'true',
                    callbacks: {
                      label: function(context){
                        var label = context.label,
                            currentValue = context.raw,
                            total = context.chart._metasets[context.datasetIndex].total;

                        var percentage = parseFloat((currentValue/total*100).toFixed(1));
                        let unit;
                        let convertedVal;
                        if ((currentValue/1024) < 1024){
                          convertedVal = currentValue/1024
                          unit = 'KB';
                        }
                        else if ((currentValue/1048576) < 1024){
                          convertedVal = currentValue/1048576
                          unit = 'MB';
                        }
                        else if ((currentValue/1073741824) < 1024){
                          convertedVal = currentValue/1073741824
                          unit = 'GB';
                        }
                        else{
                          convertedVal = currentValue/1099511627776
                          unit = 'TB';
                        }

                        return label + ": " + convertedVal.toFixed(2) + unit + ' (' + percentage + '%)';
                      }
                    }
                  }
                },
              }
            });


            const config4 = {
              type: 'doughnut',
              data: data
            };
          </script>
      </div>
      
      <!-- <audio preload="auto" id="beep-one">
        <source src="../public/audio/sound.mp3"></source>
        Your browser isn't invited for super fun audio time.
      </audio> -->
      <!-- <audio preload="auto" id="beep-two0">
        <source src="../public/audio/indian1.mp3"></source>
        Your browser isn't invited for super fun audio time.
      </audio>
      <audio preload="auto" id="beep-two1">
        <source src="../public/audio/indian2.mp3"></source>
        Your browser isn't invited for super fun audio time.
      </audio>
      <audio preload="auto" id="beep-two2">
        <source src="../public/audio/indian3.mp3"></source>
        Your browser isn't invited for super fun audio time.
      </audio>
      <audio preload="auto" id="beep-two3">
        <source src="../public/audio/indian4.mp3"></source>
        Your browser isn't invited for super fun audio time.
      </audio> -->
      <!-- <script>
        // var beepOne = $("#beep-one")[0];
        // $(".hat")
        //   .mouseenter(function() {
        //     beepOne.play();
        //   });

          $(".hat")
          .each(function(i) {
            if (i != 0) {
              $("#beep-two")
                .clone()
                .attr("id", "beep-two" + i)
                .appendTo($(this).parent());
            }
            $(this).data("beeper", i);
          })
          .mouseenter(function() {
            $("#beep-two" + $(this).data("beeper"))[0].play();
          });
        $("#beep-two").attr("id", "beep-two0");
      </script> -->

    </div>
    <!--Donuts-->

<?php require APPROOT . '/views/inc/footer.php'; ?>