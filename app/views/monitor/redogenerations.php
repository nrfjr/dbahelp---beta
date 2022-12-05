<?php
$title = 'Redo Log Generation';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Monitor</a> > <b>Redo Log Generation</b>
</h1>

<div class="grid grid-cols-1 gap-2 h-full" style=" overflow: clip;">
    <div class="flex flex-col box">
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-500 shadow-inner shadow-xl">
                Refresh Data
            </button>
        </div>
        <div id="redochart" class="bg-gray-300 rounded-md"></div>
    </div>
    <div class="block justify-center lg:h-full w-full shadow-md overflow-auto sm:rounded-lg lg:max-h-80 xl:max-h-96" >
        <table class="w-full text-sm text-center text-white dark:text-gray-400">
            <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="py-2 px-6">DATE GENERATED</th>
                    <th class="py-2 px-6">TOTAL LOG SWITCH MADE</th>
                    <th class="py-2 px-6">REDO SIZE PER DAY (MB)</th> 
                </tr>
            </thead>
            <tbody class="bg-gray-500">
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    var options = {
          series: [{
            name: "Desktops",
            data: [1086, 624, 1540, 1498, 1634, 1138, 1448, 1894, 1288,1208,842]
        }],
          chart: {
          height: '300px',
          type: 'area',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Redo Log Generation per Day',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#8c8c8c', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['19-NOV-22', '20-NOV-22', '21-NOV-22', '22-NOV-22', '23-NOV-22', '24-NOV-22', '25-NOV-22', '26-NOV-22', '27-NOV-22','28-NOV-22','29-NOV-22'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#redochart"), options);
        chart.render();
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
