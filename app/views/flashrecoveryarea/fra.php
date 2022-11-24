<?php
$title = 'Flash Recovery Area';
require APPROOT . '/views/inc/header.php';
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white"><b>Flash Recovery Area</b></h1>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-2 flex justify-start">


    <!-- Imma remove the php functions sa sir kay di ko kabalo asa hilabtan para mag work ang donut chart na working loop diri -->
    <!--Donuts-->
    <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->

          <div class="w-full box rounded-lg">
            <div class="grid grid-cols-3 lg:grid-cols-2 place-center gap-2">
                <div class="col-span-2 lg:col-span-1">
                    <canvas id="chartDonut1"></canvas>
                    <div class="mt-4">
                        <p>FRA Location: <span class="font-bold text-white">/u08/oracle/archivelogs</span></p>
                    </div>
                </div>
                
              <div class="z-10">
                <div class="sm-card h-full grid grid-cols-1 flex justify-start gap-2 text-left">
                    <div>
                        <p>FRA Size:</p>
                        <h1 class="text-xl">102,400 MB</h1>
                    </div>
                    <div>
                        <p>Total Usage:</p>
                        <h1 class="text-xl">12,818 MB</h1>
                    </div>
                    <div>
                        <p>Reclaimable:</p>
                        <h1 class="text-xl">234 MB</h1>
                    </div>
                    <div>
                        <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 border-1 border-solid border-gray-900 text-center px-4 py-2">Resize RFA</button>
                    </div>
                    <div>
                        <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 border-1 border-solid border-gray-900 text-center px-4 py-2">Log Switches</button>
                    </div>
                </div>
              </div>
            </div>
      
            <script>
              let myChartDonut1 = document.getElementById('chartDonut1').getContext('2d');
      
              new Chart(myChartDonut1, {
                type: 'doughnut',
                data: {
                  labels: [
                    'Free',
                    'Used'
                  ],
                  datasets: [{
                    label: 'My First Dataset',
                    //Free, Used
                    data: [21124, 5533],
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
                      text: 'Flash Recovery Area Usage 1',
                      align: 'start',
                      color: 'white',
                      position: 'top',
                      weight: 'bold',
                      font: {
                        size: '15%'
                      }
                    },
                    tooltip: {
                      position: 'average',
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
      
              const configDonut1 = {
                type: 'doughnut',
                data: data
              };
            </script>
          </div>
          <!--Donuts-->

             <!--Donuts-->
    <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->

    <div class="w-full box rounded-lg">
            <div class="grid grid-cols-3 lg:grid-cols-2 place-center gap-2">
                <div class="col-span-2 lg:col-span-1">
                    <canvas id="chartDonut2"></canvas>
                    <div class="mt-4">
                        <p>FRA Location: <span class="font-bold text-white">/u08/oracle/archivelogs</span></p>
                    </div>
                </div>
                
              <div class="z-10">
                <div class="sm-card h-full grid grid-cols-1 flex justify-start gap-2 text-left">
                    <div>
                        <p>FRA Size:</p>
                        <h1 class="text-xl">102,400 MB</h1>
                    </div>
                    <div>
                        <p>Total Usage:</p>
                        <h1 class="text-xl">12,818 MB</h1>
                    </div>
                    <div>
                        <p>Reclaimable:</p>
                        <h1 class="text-xl">234 MB</h1>
                    </div>
                    <div>
                        <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 border-1 border-solid border-gray-900 text-center px-4 py-2">Resize RFA</button>
                    </div>
                    <div>
                        <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 border-1 border-solid border-gray-900 text-center px-4 py-2">Log Switches</button>
                    </div>
                </div>
              </div>
            </div>
      
            <script>
              let myChartDonut2 = document.getElementById('chartDonut2').getContext('2d');
      
              new Chart(myChartDonut2, {
                type: 'doughnut',
                data: {
                  labels: [
                    'Free',
                    'Used'
                  ],
                  datasets: [{
                    label: 'My First Dataset',
                    //Free, Used
                    data: [21124, 5533],
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
                      text: 'Flash Recovery Area Usage 2',
                      align: 'start',
                      color: 'white',
                      position: 'top',
                      weight: 'bold',
                      font: {
                        size: '15%'
                      }
                    },
                    tooltip: {
                      position: 'average',
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
      
              const configDonut2 = {
                type: 'doughnut',
                data: data
              };
            </script>
          </div>
          <!--Donuts-->

             <!--Donuts-->
    <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->

    <div class="w-full box rounded-lg">
            <div class="grid grid-cols-3 lg:grid-cols-2 place-center gap-2">
                <div class="col-span-2 lg:col-span-1">
                    <canvas id="chartDonut3"></canvas>
                    <div class="mt-4">
                        <p>FRA Location: <span class="font-bold text-white">/u08/oracle/archivelogs</span></p>
                    </div>
                </div>
                
              <div class="z-10">
                <div class="sm-card h-full grid grid-cols-1 flex justify-start gap-2 text-left">
                    <div>
                        <p>FRA Size:</p>
                        <h1 class="text-xl">102,400 MB</h1>
                    </div>
                    <div>
                        <p>Total Usage:</p>
                        <h1 class="text-xl">12,818 MB</h1>
                    </div>
                    <div>
                        <p>Reclaimable:</p>
                        <h1 class="text-xl">234 MB</h1>
                    </div>
                    <div>
                        <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 border-1 border-solid border-gray-900 text-center px-4 py-2">Resize RFA</button>
                    </div>
                    <div>
                        <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 border-1 border-solid border-gray-900 text-center px-4 py-2">Log Switches</button>
                    </div>
                </div>
              </div>
            </div>
      
            <script>
              let myChartDonut3 = document.getElementById('chartDonut3').getContext('2d');
      
              new Chart(myChartDonut3, {
                type: 'doughnut',
                data: {
                  labels: [
                    'Free',
                    'Used'
                  ],
                  datasets: [{
                    label: 'My First Dataset',
                    //Free, Used
                    data: [21124, 5533],
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
                      text: 'Flash Recovery Area Usage 3',
                      align: 'start',
                      color: 'white',
                      position: 'top',
                      weight: 'bold',
                      font: {
                        size: '15%'
                      }
                    },
                    tooltip: {
                      position: 'average',
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
      
              const configDonut3 = {
                type: 'doughnut',
                data: data
              };
            </script>
          </div>
          <!--Donuts-->

             <!--Donuts-->
    <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->

    <div class="w-full box rounded-lg">
            <div class="grid grid-cols-3 lg:grid-cols-2 place-center gap-2">
                <div class="col-span-2 lg:col-span-1">
                    <canvas id="chartDonut4"></canvas>
                    <div class="mt-4">
                        <p>FRA Location: <span class="font-bold text-white">/u08/oracle/archivelogs</span></p>
                    </div>
                </div>
                
              <div class="z-10">
                <div class="sm-card h-full grid grid-cols-1 flex justify-start gap-2 text-left">
                    <div>
                        <p>FRA Size:</p>
                        <h1 class="text-xl">102,400 MB</h1>
                    </div>
                    <div>
                        <p>Total Usage:</p>
                        <h1 class="text-xl">12,818 MB</h1>
                    </div>
                    <div>
                        <p>Reclaimable:</p>
                        <h1 class="text-xl">234 MB</h1>
                    </div>
                    <div>
                        <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 border-1 border-solid border-gray-900 text-center px-4 py-2">Resize RFA</button>
                    </div>
                    <div>
                        <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 border-1 border-solid border-gray-900 text-center px-4 py-2">Log Switches</button>
                    </div>
                </div>
              </div>
            </div>
      
            <script>
              let myChartDonut4 = document.getElementById('chartDonut4').getContext('2d');
      
              new Chart(myChartDonut4, {
                type: 'doughnut',
                data: {
                  labels: [
                    'Free',
                    'Used'
                  ],
                  datasets: [{
                    label: 'My First Dataset',
                    //Free, Used
                    data: [21124, 5533],
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
                      text: 'Flash Recovery Area Usage 4',
                      align: 'start',
                      color: 'white',
                      position: 'top',
                      weight: 'bold',
                      font: {
                        size: '15%'
                      }
                    },
                    tooltip: {
                      position: 'average',
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
      
              const configDonut4 = {
                type: 'doughnut',
                data: data
              };
            </script>
          </div>
          <!--Donuts-->
          
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>