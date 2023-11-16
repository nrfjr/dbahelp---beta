<?php 
$title = 'Disk Storage';
require APPROOT . '/views/inc/header.php'; 
require APPROOT . '/views/inc/sidebar.php'; 
?>

    
  <div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white"><b>Disk Storage</b></h1>
    <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
</div>

    <div class="grid grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-x-10 gap-y-8 justify-center place-content-evenly">
      <?php


            $mountcnt=0;

            foreach($data as $mount => $size){

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

            Chart.defaults.font.family = "Lexend";
            
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
                      boxWidth: 20,
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

                        var percentage = parseFloat((currentValue/total*100).toFixed(2));

                        let unit;
                        let convertedVal;
                        if (currentValue/Math.pow(1024,3) >= Math.pow(1024,3)){
                          convertedVal = currentValue/Math.pow(1024,3)
                          unit = 'TB';
                        }
                        else if (currentValue/Math.pow(1024,2) <= Math.pow(1024,2)){
                          convertedVal = currentValue/Math.pow(1024,2)
                          unit = 'GB';
                        }
                        else if (currentValue/1000 <= 1024){
                          convertedVal = currentValue/1000
                          unit = 'MB';
                        }
                        else {
                          convertedVal = currentValue/Math.pow(2,10)
                          unit = 'KB';
                        }

                        return label + ": " + convertedVal.toFixed(2) +" "+ unit + ' (' + percentage + '%)';
                      }
                    },
                  },
                },
              }

            });
          </script>
      </div>

      <?php
      }
      ?>
      
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>