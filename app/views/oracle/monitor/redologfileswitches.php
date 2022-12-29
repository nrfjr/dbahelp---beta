<?php
$title = 'Redo Log File Switches';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="relative">
  <div id="redologAMZoom" class="hidden absolute flex rounded-md bg-black bg-opacity-50 w-full h-full z-20 top-0 left-0 justify-center items-center p-36 backdrop-filter backdrop-blur-sm">
      <button onclick="hidePopAM()" class="top-5 right-5 absolute"><i class="text-2xl text-white fa-solid fa-xmark"></i></button>
      <div id="ZredologchartAM" class="w-full z-50 bg-white rounded-md h-fit"></div>
  </div>
  <div id="redologPMZoom" class="hidden absolute flex rounded-md bg-white bg-opacity-50 w-full h-full z-20 top-0 left-0 justify-center items-center p-36 backdrop-filter backdrop-blur-sm">
      <button onclick="hidePopPM()" class="top-5 right-5 absolute"><i class="text-2xl fa-solid fa-xmark"></i></button>
      <div id="ZredologchartPM" class="w-full z-50 bg-gray-700 rounded-md h-fit"></div>
  </div>
  <div class="flex justify-between mb-3">
    <h1 class="text-3xl text-black text-white">
      <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['MonitorDB']; ?>" class="no-underline hover:underline">Monitor</a> > <b>Redo Log File Switches</b>
    </h1>
    <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
  </div>

  <div class="flex flex-col justify-evenly gap-y-2 xl:h-5/3">
    <div class="h-auto overflow-hidden">
      <h1 class="text-white">Morning Log File Switches Within a Week</h1>
      <div class="flex gap-2 flex-col xl:flex-row">
        <div class="block justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 93%;">
          <?php

          $am_redologfile = $data['AM'];

          if (!empty($am_redologfile)) {

            //Separates Column title from result set
            foreach ($am_redologfile as $am_outer_key => $am_array) {

              foreach ($am_array as $am_inner_key => $am_value) {
                $am_column_names[] = $am_inner_key;
              }
            }
          ?>
            <table class=" sortable w-full text-sm text-center text-white">
              <thead class="cursor-pointer text-md text-black bg-indigo-200">
                <tr>
                  <?php for ($am_title = 0; $am_title <= count($am_array) - 1; $am_title++) { ?>
                    <th scope="col" class="py-2 px-6">
                      <?php echo $am_column_names[$am_title]; ?>
                    </th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody class="bg-gray-500">
                <?php
                foreach ($am_redologfile as $am_column_title => $am_value) {
                ?>
                  <tr class="focus:hover:bg-gray-700 hover:bg-gray-700">
                    <?php
                    foreach ($am_value as $am_logfile) {
                    ?>
                      <td class=" item py-4  px-6">
                        <?php echo $am_logfile; ?>
                      </td>
                    <?php
                    }
                    ?>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          <?php
          } else {
          ?>
            <div class="flex w-full shadow-md overflow-auto sm:rounded-lg bg-gray-500" style="max-height: 80%; min-height: 100%;">
              <h1 class="text-white m-auto "><b>No Morning Log File Switches Found.</b></h1>
            </div>
          <?php
          }
          ?>
        </div>
        <div ondblclick="showPopAM()" id="redologchartAM" class="cursor-pointer w-full xl:w-1/2 bg-white rounded-md h-fit">
        </div>
      </div>
    </div>

    <div class="h-auto overflow-hidden">
      <h1 class="text-white">Evening Log File Switches Within a Week</h1>
      <div class="flex gap-2 flex-col xl:flex-row">
        <div class="block justify-center w-full shadow-md overflow-auto sm:rounded-lg " style="max-height: 93%;">
          <?php

          $pm_redologfile = $data['PM'];

          if (!empty($pm_redologfile)) {

            //Separates Column title from result set
            foreach ($pm_redologfile as $pm_outer_key => $pm_array) {

              foreach ($pm_array as $pm_inner_key => $pm_value) {
                $pm_column_names[] = $pm_inner_key;
              }
            }
          ?>
            <table class=" sortable w-full text-sm text-center text-white">
              <thead class="cursor-pointer text-md text-black bg-indigo-200">
                <tr>
                  <?php for ($pm_title = 0; $pm_title <= count($pm_array) - 1; $pm_title++) { ?>
                    <th scope="col" class="py-2 px-6">
                      <?php echo $pm_column_names[$pm_title]; ?>
                    </th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody class="bg-gray-500">
                <?php
                foreach ($pm_redologfile as $pm_column_title => $pm_value) {
                ?>
                  <tr class="focus:hover:bg-gray-700 hover:bg-gray-700">
                    <?php
                    foreach ($pm_value as $pm_logfile) {
                    ?>
                      <td class=" item py-4  px-6">
                        <?php echo $pm_logfile; ?>
                      </td>
                    <?php
                    }
                    ?>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          <?php
          } else {
          ?>
            <div class="flex w-full shadow-md overflow-auto sm:rounded-lg bg-gray-500" style="max-height: 80%; min-height: 100%;">
              <h1 class="text-white m-auto "><b>No Evening Log File Switches Found.</b></h1>
            </div>
          <?php
          }
          ?>
        </div>
        <div ondblclick="showPopPM()" id="redologchartPM" class="cursor-pointer w-full xl:w-1/2 bg-gray-700 rounded-md h-fit">
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var am_names = []
  // FOR AM
  var optionsAM = {
    series: [
      <?php
      foreach ($am_redologfile as $am_column_title => $am_value) {

        echo '{';
        echo 'name: \'' . $am_value['DAY'] . '\',';
        echo 'data: [';

        foreach ($am_value as $k => $v) {
          if ($k != 'DAY') {
            echo $v . ',';
          }
        }
        echo ']';
        echo '},';
      }
      ?>
    ],
    chart: {
      fontFamily: 'Lexend',
      height: 350,
      type: 'line',
      zoom: {
        enabled: false
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      width: 5,
      curve: 'smooth',
      dashArray: 0,
      colors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#145051','#B1B2FF',]
    },
    title: {
      text: 'Morning Log File Switches',
      align: 'left'
    },
    tooltip: {
      marker: {
          show: true,
          fillColors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#145051','#B1B2FF',]
      },
    },
    legend: {
      tooltipHoverFormatter: function(val) {
        return val
      },
      markers:{
        fillColors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#145051','#B1B2FF',],
      }
    },
    markers: {
      size: 0,
      hover: {
        sizeOffset: 6
      }
    },
    xaxis: {
      categories: [<?php for ($am_title = 1; $am_title <= count($am_array) - 1; $am_title++) {
                      echo '\'' . $am_column_names[$am_title] . '\',';
                    } ?>],
    },
    yaxis: {
      tickAmount: 4,
    },
    grid: {
      show: true,
      borderColor: '#0d0d0d',
    }
  };

  var chartAM = new ApexCharts(document.querySelector("#redologchartAM"), optionsAM);
  chartAM.render();
</script>

<script>
  var am_names = []
  // FOR AM
  var ZoptionsAM = {
    series: [
      <?php
      foreach ($am_redologfile as $am_column_title => $am_value) {

        echo '{';
        echo 'name: \'' . $am_value['DAY'] . '\',';
        echo 'data: [';

        foreach ($am_value as $k => $v) {
          if ($k != 'DAY') {
            echo $v . ',';
          }
        }
        echo ']';
        echo '},';
      }
      ?>
    ],
    chart: {
      fontFamily: 'Lexend',
      height: 500,
      type: 'line',
      zoom: {
        enabled: false
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      width: 5,
      curve: 'smooth',
      dashArray: 0,
      colors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#145051','#B1B2FF',]
    },
    title: {
      text: 'Morning Log File Switches',
      align: 'left'
    },
    tooltip: {
      marker: {
          show: true,
          fillColors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#145051','#B1B2FF',]
      },
    },
    legend: {
      tooltipHoverFormatter: function(val) {
        return val
      },
      markers:{
        fillColors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#145051','#B1B2FF',],
      }
    },
    markers: {
      size: 0,
      hover: {
        sizeOffset: 6
      }
    },
    xaxis: {
      categories: [<?php for ($am_title = 1; $am_title <= count($am_array) - 1; $am_title++) {
                      echo '\'' . $am_column_names[$am_title] . '\',';
                    } ?>],
    },
    yaxis: {
      tickAmount: 4,
    },
    grid: {
      show: true,
      borderColor: '#0d0d0d',
    }
  };

  var ZchartAM = new ApexCharts(document.querySelector("#ZredologchartAM"), ZoptionsAM);
  ZchartAM.render();
</script>


<script>
  // FOR PM
  var optionsPM = {
    series: [
      <?php

      foreach ($pm_redologfile as $pm_column_title => $pm_value) {

        echo '{';
        echo 'name: \'' . $pm_value['DAY'] . '\',';
        echo 'data: [';

        foreach ($pm_value as $k => $v) {
          if ($k != 'DAY') {
            echo $v . ',';
          }
        }
        echo ']';
        echo '},';
      }

      ?>
    ],
    chart: {
      background:'#374151',
      fontFamily: 'Lexend',
      height: 350,
      type: 'line',
      zoom: {
        enabled: false
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      width: 5,
      curve: 'smooth',
      colors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#A7FFE4','#B1B2FF',]
    },
    tooltip: {
      marker: {
          show: true,
          fillColors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#A7FFE4','#B1B2FF',]
      },
    },
    title: {
      text: 'Evening Log File Switches',
      align: 'left',
      style: {
        color: 'white'
      }
    },
    legend: {
      tooltipHoverFormatter: function(val) {
        return val 
      },
      labels: {
        colors: 'white'
      },
      markers:{
        fillColors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#A7FFE4','#B1B2FF',]
      }
    },
    markers: {
      size: 0,
      hover: {
        sizeOffset: 6
      }
    },
    xaxis: {
      categories: [<?php for ($pm_title = 1; $pm_title <= count($pm_array) - 1; $pm_title++) {
                      echo '\'' . $pm_column_names[$pm_title] . '\',';
                    } ?>],
      labels: {
        style: {
          colors: 'white'
        }
      }
    },
    yaxis: {
      tickAmount: 4,
      labels: {
        style: {
          colors: ['white']
        }
      }
    },
    grid: {
      show: true,
      borderColor: 'white',
    }
  };
  var chartPM = new ApexCharts(document.querySelector("#redologchartPM"), optionsPM);
  chartPM.render();
</script>

<script>
  // FOR PM
  var ZoptionsPM = {
    series: [
      <?php

      foreach ($pm_redologfile as $pm_column_title => $pm_value) {

        echo '{';
        echo 'name: \'' . $pm_value['DAY'] . '\',';
        echo 'data: [';

        foreach ($pm_value as $k => $v) {
          if ($k != 'DAY') {
            echo $v . ',';
          }
        }
        echo ']';
        echo '},';
      }

      ?>
    ],
    chart: {
      background:'#374151',
      fontFamily: 'Lexend',
      height: 500,
      type: 'line',
      zoom: {
        enabled: false
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      width: 5,
      curve: 'smooth',
      colors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#A7FFE4','#B1B2FF',]
    },
    tooltip: {
      marker: {
          show: true,
          fillColors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#A7FFE4','#B1B2FF',]
      },
    },
    title: {
      text: 'Evening Log File Switches',
      align: 'left',
      style: {
        color: 'white'
      }
    },
    legend: {
      tooltipHoverFormatter: function(val) {
        return val 
      },
      labels: {
        colors: 'white'
      },
      markers:{
        fillColors: ['#2192FF','#38E54D','#9CFF2E','#9CFF2E','#FDFF00','#FF74B1', '#A7FFE4','#B1B2FF',]
      }
    },
    markers: {
      size: 0,
      hover: {
        sizeOffset: 6
      }
    },
    xaxis: {
      categories: [<?php for ($pm_title = 1; $pm_title <= count($pm_array) - 1; $pm_title++) {
                      echo '\'' . $pm_column_names[$pm_title] . '\',';
                    } ?>],
      labels: {
        style: {
          colors: 'white'
        }
      }
    },
    yaxis: {
      tickAmount: 4,
      labels: {
        style: {
          colors: ['white']
        }
      }
    },
    grid: {
      show: true,
      borderColor: 'white',
    }
  };
  var ZchartPM = new ApexCharts(document.querySelector("#ZredologchartPM"), ZoptionsPM);
  ZchartPM.render();
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>