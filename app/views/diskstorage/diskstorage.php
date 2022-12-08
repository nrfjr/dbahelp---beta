<?php 
$title = 'Disk Storage';
require APPROOT . '/views/inc/header.php'; 
require APPROOT . '/views/inc/sidebar.php'; 
?>

    <h1 class="text-3xl text-black pb-2 text-white"><b>Disk Storage</b></h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-x-10 gap-y-8 justify-center place-content-evenly">
      <?php

          // get donut array from main array
            $df = $data['df'];

            $mountcnt=0;

            foreach($df as $mount => $size){

            $mountcnt++;

            $usage = explode('/', $size);

      ?>
      <!--Must rename for duplicating: chartDonut1,myChart1, sampleChart1, config1-->
      <div class="w-full p-5 rounded-lg box">
        <div>
          <canvas id="chartDonut<?php echo $mountcnt ?>"></canvas>
        </div>

            
          <script>
            let myChart<?php echo $mountcnt ?> = document.getElementById('chartDonut'+"<?php echo $mountcnt ?>").getContext('2d');
            
            let sampleChart<?php echo $mountcnt ?> = new Chart(myChart<?php echo $mountcnt ?>, {
              type: 'doughnut',
              data: {
                labels:[
                  'Used',
                  'Free' 
                ],
                datasets:[{
                  label: 'My First Dataset',
                          //Free, Used
                  data: ["<?php  echo $usage[0]-$usage[1]; ?>", "<?php echo $usage[1]; ?>"],
                  backgroundColor: [
                    'rgba(255, 99, 132,1)',
                    'rgba(129, 140, 248,1)'
                  ],
                  borderColor: [
                    'rgba(255, 99, 132,1)',
                    'rgba(129, 140, 248,1)'
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
                      text: "<?php echo $mount ?>",
                      align: 'start',
                      color: 'white',
                      position: 'top',
                      weight: 'bold',
                      font:{
                        size: 16
                      }
                  },
                  tooltip:{
                    position: 'custom',
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

            const config<?php echo $mountcnt?>= {
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