<?php 
$title = 'Dashboard';
require APPROOT . '/views/inc/header.php'; 
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

    <h1 class="text-3xl text-black pb-2 text-white"><b>Dashboard</b></h1>

    <div class="grid grid-cols-4 gap-4 ">
      <!--Rename for duplicate: chart1, options1-->
      <div class="w-2/7 bg-gray-600 p-5 rounded-lg mb-2">
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
          var TICKINTERVAL = 15000//86400000  //1000 is recommended which matches 1 second //if any changes, needs to match with the interval below
          let XAXISRANGE = 5000000//777600000  x-axis , time shown //100000 is recommended //this is like the interval, now = to 5 min

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

          getDayWiseTimeSeries(new Date(new Date().toLocaleDateString()).getTime(), 10, {
          min: 10,
          max: 90
          })


          function getNewSeries(baseval, yrange) {
          var newDate = baseval + TICKINTERVAL;
          lastDate = newDate
          //change the value below for configuring the data Reset length
          for(var i = 0; i< data.length - 350; i++) {
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
          data = data.slice(data.length - 400, data.length);
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
          }, 15000 /*refresh interval 15 sec*/)

          </script>
      </div> 

      <div class="w-2/7 bg-gray-600 p-5 rounded-lg mb-2">
          <div id="chart2"></div>
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
          var TICKINTERVAL = 15000//86400000  //1000 is recommended which matches 1 second //if any changes, needs to match with the interval below
          let XAXISRANGE = 5000000//777600000  x-axis , time shown //100000 is recommended //this is like the interval, now = to 5 min

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

          getDayWiseTimeSeries(new Date(new Date().toLocaleDateString()).getTime(), 10, {
          min: 10,
          max: 90
          })


          function getNewSeries(baseval, yrange) {
          var newDate = baseval + TICKINTERVAL;
          lastDate = newDate
          //change the value below for configuring the data Reset length
          for(var i = 0; i< data.length - 350; i++) {
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
          data = data.slice(data.length - 400, data.length);
          }
          </script>
          <script>
            
            var options2 = {
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
            var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
            chart2.render();


            window.setInterval(function () {
            getNewSeries(lastDate, {
              min: 10,
              max: 90
            })

            chart2.updateSeries([{
              data: data
            }])
          }, 15000 /*refresh interval 15 sec*/)

          </script>
      </div> 

      <div class="w-2/7 bg-gray-600 p-5 rounded-lg mb-2">
          <div id="chart3"></div>
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
          var TICKINTERVAL = 15000//86400000  //1000 is recommended which matches 1 second //if any changes, needs to match with the interval below
          let XAXISRANGE = 5000000//777600000  x-axis , time shown //100000 is recommended //this is like the interval, now = to 5 min

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

          getDayWiseTimeSeries(new Date(new Date().toLocaleDateString()).getTime(), 10, {
          min: 10,
          max: 90
          })


          function getNewSeries(baseval, yrange) {
          var newDate = baseval + TICKINTERVAL;
          lastDate = newDate
          //change the value below for configuring the data Reset length
          for(var i = 0; i< data.length - 350; i++) {
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
          data = data.slice(data.length - 400, data.length);
          }
          </script>
          <script>
            
            var options3 = {
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
            var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
            chart3.render();


            window.setInterval(function () {
            getNewSeries(lastDate, {
              min: 10,
              max: 90
            })

            chart3.updateSeries([{
              data: data
            }])
          }, 15000 /*refresh interval 15 sec*/)

          </script>
      </div> 

      <div class="w-2/7 bg-gray-600 p-5 rounded-lg mb-2">
          <div id="chart4"></div>
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
          var TICKINTERVAL = 15000//86400000  //1000 is recommended which matches 1 second //if any changes, needs to match with the interval below
          let XAXISRANGE = 5000000//777600000  x-axis , time shown //100000 is recommended //this is like the interval, now = to 5 min

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

          getDayWiseTimeSeries(new Date(new Date().toLocaleDateString()).getTime(), 10, {
          min: 10,
          max: 90
          })


          function getNewSeries(baseval, yrange) {
          var newDate = baseval + TICKINTERVAL;
          lastDate = newDate
          //change the value below for configuring the data Reset length
          for(var i = 0; i< data.length - 350; i++) {
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
          data = data.slice(data.length - 400, data.length);
          }
          </script>
          <script>
            
            var options4 = {
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
            var chart4 = new ApexCharts(document.querySelector("#chart4"), options4);
            chart4.render();


            window.setInterval(function () {
            getNewSeries(lastDate, {
              min: 10,
              max: 90
            })

            chart4.updateSeries([{
              data: data
            }])
          }, 15000 /*refresh interval 15 sec*/)

          </script>
      </div> 
    </div>

    
    
    
    <div class="grid grid-cols-4 gap-4 justify-center">
      <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->
      <div class="w-2/7 bg-gray-600 p-5 rounded-lg">
        <div>
          <canvas id="chartDonut1"></canvas>
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
                    'rgba(129, 140, 248,1)',
                    'rgba(255, 99, 132,1)'
                  ],
                  borderColor: [
                    'rgba(255, 255, 255,1)',
                    'rgba(255, 255, 255,1)'
                  ],
                  
                  hoverOffset: 4,
                  borderWidht:4,
                }]
              },
              options:{ //this is where i do changes for chart options, ref: https://www.chartjs.org/docs/latest/configuration/title.html
                rotation: 90,
                responsive: true,
                plugins: {
                  legend: {
                    display: false,     //remove the legend
                    labels: {
                      color: 'white',
                      align: 'start'
                    }
                  },
                  title: {
                    display: true,
                      text: '/u01',
                      align: 'center',
                      color: 'white',
                      position: 'top',
                      weight: 'bold'
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
      <div class="w-2/7 bg-gray-600 p-5 rounded-lg">
      <div>
          <canvas id="chartDonut2"></canvas>
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
                    'rgba(129, 140, 248,1)',
                    'rgba(255, 99, 132,1)'
                  ],
                  borderColor: [
                    'rgba(255, 255, 255,1)',
                    'rgba(255, 255, 255,1)'
                  ],
                  
                  hoverOffset: 4,
                  borderWidht:4,
                }]
              },
              options:{ //this is where i do changes for chart options, ref: https://www.chartjs.org/docs/latest/configuration/title.html
                rotation: 90,
                responsive: true,
                plugins: {
                  legend: {
                    labels: {
                      color: 'white',
                      align: 'start'
                    }
                  },
                  title: {
                    display: true,
                      text: 'u02',
                      align: 'center',
                      color: 'white',
                      position: 'top',
                      weight: 'bold'
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

      <div class="w-2/7 bg-gray-600 p-5 rounded-lg">
        <div>
          <canvas id="chartDonut3"></canvas>
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
                    'rgba(129, 140, 248,1)',
                    'rgba(255, 99, 132,1)'
                  ],
                  borderColor: [
                    'rgba(255, 255, 255,1)',
                    'rgba(255, 255, 255,1)'
                  ],
                  
                  hoverOffset: 4,
                  borderWidht:4,
                }]
              },
              options:{ //this is where i do changes for chart options, ref: https://www.chartjs.org/docs/latest/configuration/title.html
                rotation: 90,
                responsive: true,
                plugins: {
                  legend: {
                    labels: {
                      color: 'white',
                      align: 'start'
                    }
                  },
                  title: {
                    display: true,
                      text: 'u03',
                      align: 'center',
                      color: 'white',
                      position: 'top',
                      weight: 'bold'
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


      <div class="w-2/7 bg-gray-600 p-5 rounded-lg">
        <div>
          <canvas id="chartDonut4"></canvas>
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
                    'rgba(129, 140, 248,1)',
                    'rgba(255, 99, 132,1)'
                  ],
                  borderColor: [
                    'rgba(255, 255, 255,1)',
                    'rgba(255, 255, 255,1)'
                  ],
                  
                  hoverOffset: 4,
                  borderWidht:4,
                }]
              },
              options:{ //this is where i do changes for chart options, ref: https://www.chartjs.org/docs/latest/configuration/title.html
                rotation: 90,
                responsive: true,
                plugins: {
                  legend: {
                    labels: {
                      color: 'white',
                      align: 'start'
                    }
                  },
                  title: {
                    display: true,
                      text: 'u04',
                      align: 'center',
                      color: 'white',
                      position: 'top',
                      weight: 'bold'
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

    </div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>