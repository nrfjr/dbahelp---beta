<?php
$title = 'Flash Recovery Area';
require APPROOT . '/views/inc/header.php';
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white"><b>Flash Recovery Area</b></h1>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-2 relative justify-start ">

  <?php
  $count = 0;
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

        <div class="">
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
            <div x-data="{resizeFRA: false}">
              <button @click="resizeFRA = true" alt="Resize FRA" class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 hover:bg-gray-500 border-1 border-solid border-gray-900 text-center px-4 py-2">Resize RFA</button>
              <button x-show="resizeFRA" @click="resizeFRA = false" alt="Resize FRA" class="border-blue-500 md:border-green-500"></button>
              <!-- Delete User Modal -->
              <div x-show="resizeFRA" class="absolute bg-red-500 w-full z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <!-- container -->
                <div class="modal fixed fade top-0 left-0 justify-center w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="ModalCenteredScrollable" tabindex="-1" aria-labelledby="ModalCenteredScrollable" aria-modal="true" role="dialog">
                  <!-- the box -->
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable absolute pointer-events-none w-1/3 top-1/3 left-1/3">
                    <div class=" modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                      <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                          <b>Resize <?php echo $titles[$count] ?> FRA</b>
                        </h5>
                        <button type="button" @click="resizeFRA = false" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body relative p-4">
                        <font color="black">Enter a value to resize FRA:</font>
                        <input class="ml-4 bg-gray-200 text-black px-2" placeholder="number only" type="number">
                      </div>
                      <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                        <form action="" method="POST">
                          <button type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-green-700 px-4 py-2 text-base font-medium text-white shadow-sm focus:outline-none focus:ring-2  focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Resize</button>
                        </form>
                        <button type="button" @click="resizeFRA = false" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Delete User Modal -->
            </div>

            <div>
              <button class="rounded-lg w-full lg:w-1/2 xl:w-full 2xl:w-1/2 bg-gray-100 hover:bg-gray-500 border-1 border-solid border-gray-900 text-center px-4 py-2"><a href="<?php echo URLROOT; ?>/monitors/redologswitches">Log Switches</a></button>
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
              data: [<?php echo explode('/', $fras['FRA Percentage'])[0]; ?>, <?php echo explode('/', $fras['FRA Percentage'])[1]; ?>],
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