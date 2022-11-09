<?php 
$title = 'Disk Storage';
require APPROOT . '/views/inc/header.php'; 
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

    <h1 class="text-3xl text-black pb-2 text-white"><b>Disk Storage</b></h1>

    <div class="grid grid-cols-4 gap-x-12 justify-center">
      <?php

          // get donut array from main array
            $donut = $data['donut'];
            $u01 = explode('/', $donut['/u01']);

      ?>
      <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->
      <div class="w-2/7 bg-gray-600 p-5 rounded-lg">
        <div>
          <canvas id="chartDonut1"></canvas>
        </div>

    
          <script>

            var u01 = ["<?php  echo $u01[0]-$u01[1]; ?>","<?php echo $u01[1]; ?>"];

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
                    position: 'bottom',
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

      <?php

        // get donut array from main array
          $donut = $data['donut'];
          $u02 = explode('/', $donut['/u02']);

      ?>
      
      <div class="w-2/7 bg-gray-600 p-5 rounded-lg">
      <div>
          <canvas id="chartDonut2"></canvas>
        </div>

        
          <script>
            var u02 = ["<?php  echo $u02[0]-$u02[1]; ?>","<?php echo $u02[1]; ?>"];

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
                    position: 'bottom',
                    labels: {
                      color: 'white',
                      align: 'start'
                    }
                  },
                  title: {
                    display: true,
                      text: '/u02',
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
        
      <?php

        // get donut array from main array
          $donut = $data['donut'];
          $u03 = explode('/', $donut['/u03']);

      ?>

      <div class="w-2/7 bg-gray-600 p-5 rounded-lg">
        <div>
          <canvas id="chartDonut3"></canvas>
        </div>

        
          <script>
            var u03 = ["<?php  echo $u03[0]-$u03[1]; ?>","<?php echo $u03[1]; ?>"];

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
                    position: 'bottom',
                    labels: {
                      color: 'white',
                      align: 'start'
                    }
                  },
                  title: {
                    display: true,
                      text: '/u03',
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

      <?php

        // get donut array from main array
          $donut = $data['donut'];
          $u04 = explode('/', $donut['/u04']);

      ?>

      <div class="w-2/7 bg-gray-600 p-5 rounded-lg">
        <div>
          <canvas id="chartDonut4"></canvas>
        </div>

     
          <script>
            var u04 = ["<?php  echo $u04[0]-$u04[1]; ?>","<?php echo $u04[1]; ?>"];

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
                    position: 'bottom',
                    labels: {
                      color: 'white',
                      align: 'start'
                    }
                  },
                  title: {
                    display: true,
                      text: '/u04',
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