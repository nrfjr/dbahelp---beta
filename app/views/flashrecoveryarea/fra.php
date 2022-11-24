<?php
$title = 'Flash Recovery Area';
require APPROOT . '/views/inc/header.php';
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white"><b>Flash Recovery Area</b></h1>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-2 flex justify-start">

  <?php
  $count=0;
  $titles = array_keys($data);

    foreach ($data as $fras) {
  ?>

        <div class="w-full box rounded-lg">
          <div class="grid grid-cols-3 lg:grid-cols-2 place-center gap-2">
            <div class="col-span-2 lg:col-span-1">
              <canvas id="chartDonut<?php echo $count; ?>"></canvas>
              <div class="mt-4">
                <p>FRA Location: <span class="font-bold text-white"><?php echo $fras['FRA Location']; ?></span></p>
              </div>
            </div>

            <div class="z-10">
              <div class="sm-card h-full grid grid-cols-1 flex justify-start gap-2 text-left">
                <div>
                  <p>FRA Size:</p>
                  <h1 class="text-xl"><?php echo $fras['FRA Size']; ?></h1>
                </div>
                <div>
                  <p>Total Usage:</p>
                  <h1 class="text-xl"><?php echo $fras['FRA Usage']; ?></h1>
                </div>
                <div>
                  <p>Reclaimable:</p>
                  <h1 class="text-xl"><?php echo $fras['FRA Reclaimable']; ?></h1>
                </div>
                <div>
                  <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 hover:bg-gray-500 border-1 border-solid border-gray-900 text-center px-4 py-2">Resize RFA</button>
                </div>
                <div>
                  <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 hover:bg-gray-500 border-1 border-solid border-gray-900 text-center px-4 py-2">Log Switches</button>
                </div>
              </div>
            </div>
          </div>
          <script>
            let myChartDonut<?php echo $count; ?> = document.getElementById('chartDonut<?php echo $count; ?>').getContext('2d');

            new Chart(myChartDonut<?php echo $count; ?>, {
              type: 'doughnut',
              data: {
                labels: [
                  'Free',
                  'Used'
                ],
                datasets: [{
                  label: 'My First Dataset',
                  //Free, Used
                  data: [<?php echo explode('/', $fras['FRA Percentage'])[0]; ?> , <?php echo explode('/', $fras['FRA Percentage'])[1]; ?>],
                  backgroundColor: [
                    '#339933',
                    '#66ff33'
                  ],
                  borderColor: [
                    '#339933',
                    '#66ff33'
                  ],

                  hoverOffset: [15, 20]
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
                    text: '<?php echo $titles[$count]; ?> Flash Recovery Area',
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

            const configDonut<?php echo $count; ?> = {
              type: 'doughnut',
              data: data
            };
          </script>
        </div>
  <?php

        $count++;
          }
  ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>