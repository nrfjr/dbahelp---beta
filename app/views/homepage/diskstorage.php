<?php 
$title = 'Disk Storage';
require APPROOT . '/views/inc/header.php'; 
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

    <h1 class="text-3xl text-black pb-2 text-white"><b>Disk Storage</b></h1>

    <div class="grid grid-cols-4 gap-x-10 gap-y-8 justify-center">
      <?php

          // get donut array from main array
            $donut = $data['donut'];

            for($i=1; $i<=count($donut);$i++){

            $df = explode('/', $donut['/u0'.$i.'']);

      ?>
      <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->
      <div class="w-2/7 bg-gray-600 p-5 rounded-lg">
        <div>
          <canvas id="chartDonut<?php echo $i ?>"></canvas>
        </div>

    
          <script>

            let myChart<?php echo $i ?> = document.getElementById('chartDonut'+"<?php echo $i ?>").getContext('2d');
            
            let sampleChart<?php echo $i ?> = new Chart(myChart<?php echo $i ?>, {
              type: 'doughnut',
              data: {
                labels:[
                  'Free',
                  'Used'
                ],
                datasets:[{
                  label: 'My First Dataset',
                          //Free, Used
                  data: ["<?php  echo $df[0]-$df[1]; ?>", "<?php echo $df[1]; ?>"],
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
                      text: '/u0'+"<?php echo $i ?>",
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

            const config<?php echo $i?>= {
              type: 'doughnut',
              data: data
            };
          </script>
      </div>

      <?php
      }
      ?>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>